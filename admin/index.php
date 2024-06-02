<?php
include_once '../include/config.inc.php';
include_once $arrConfig['dir_site'] . '/include/auth.inc.php';

// Obter número total de sócios
$sql_total = "SELECT COUNT(*) as total_socios FROM socios";
$result_total = my_query($sql_total);
$total_socios = $result_total[0]['total_socios'];

// Obter número total de sócios com lugar anual
$sql_lugar_anual = "SELECT COUNT(*) as total_lugar_anual FROM lugar_anual";
$result_lugar_anual = my_query($sql_lugar_anual);
$total_lugar_anual = $result_lugar_anual[0]['total_lugar_anual'];

// Obter número de sócios inscritos nas últimas 24 horas
$today = date('Y-m-d');
$yesterday = date('Y-m-d', strtotime('-1 day', strtotime($today)));
$sql_recent = "SELECT COUNT(*) as recent_socios FROM socios WHERE dataInscricao BETWEEN '$yesterday' AND '$today'";
$result_recent = my_query($sql_recent);
$recent_socios = $result_recent[0]['recent_socios'];


// Obter quotas
$sql_quotas = "SELECT tipo, idadeMin, idadeMax, cartao, quota, inscricao FROM quotas";
$result_quotas = my_query($sql_quotas);


// Obter número de sócios inscritos nas últimas 24 horas
$today = date('Y-m-d');
$yesterday = date('Y-m-d', strtotime('-1 day', strtotime($today)));
$sql_recent = "SELECT COUNT(*) as recent_socios FROM socios WHERE dataInscricao BETWEEN '$yesterday' AND '$today'";
$result_recent = my_query($sql_recent);
$recent_socios = $result_recent[0]['recent_socios'];

// Obter sócios inscritos nos últimos 7 dias
$last_week = date('Y-m-d', strtotime('-6 days', strtotime($today)));
$sql_last_week = "SELECT dataInscricao as data, COUNT(*) as inscritos FROM socios WHERE dataInscricao BETWEEN '$last_week' AND '$today' GROUP BY dataInscricao";
$result_last_week = my_query($sql_last_week);

// Preparar dados para o gráfico
$inscritos_data = [];
$max_inscritos = 0;
foreach ($result_last_week as $row) {
  $inscritos_data[$row['data']] = $row['inscritos'];
  if ($row['inscritos'] > $max_inscritos) {
    $max_inscritos = $row['inscritos'];
  }
}

// Preencher dias faltantes com 0
for ($i = 6; $i >= 0; $i--) {
  $date = date('Y-m-d', strtotime("-$i days", strtotime($today)));
  if (!isset($inscritos_data[$date])) {
    $inscritos_data[$date] = 0;
  }
}

ksort($inscritos_data);

// Obter bancadas
$sql_bancadas = "SELECT * FROM bancadas";
$result_bancadas = my_query($sql_bancadas);

$bancadas_agrupadas = [];
foreach ($result_bancadas as $bancada) {
  $nome_parts = explode(' ', $bancada['nomeBancada']);
  $primeira_parte = $nome_parts[0];
  if (!isset($bancadas_agrupadas[$primeira_parte])) {
    $bancadas_agrupadas[$primeira_parte] = [
      'nomes_completos' => [],
      'preco' => $bancada['precoBancada']
    ];
  }
  if (isset($nome_parts[1])) {
    $bancadas_agrupadas[$primeira_parte]['nomes_completos'][] = $nome_parts[1];
  }
}
?>
<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../img/logo.png">
  <title>
    Admin
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/4454d5d378.js" crossorigin="anonymous"></script>
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    .chart-container {
      width: 100%;
      height: 400px;
    }
  </style>
</head>

<body class="g-sidenav-show bg-gray-100">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3" id="sidenav-main">
    <div class="sidenav-header mb-3">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <img src="../img/logo.png" onclick="window.location.href=''" class="navbar-brand-img" alt="main_logo">
    </div>
    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto max-height-vh-100 h-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <?php
        include '../include/sidebar.inc.php';
        ?>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">FrontOffice</h6>
        </li>
        <?php
        include '../include/sidebar2.inc.php';
        ?>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="../">FrontOffice</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Dashboard</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" style="justify-content: flex-end">
          <ul class="navbar-nav justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none" onclick="window.location.href='logout.php'">Log Out</span>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center" style="padding-right: 8px !important;">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center" style="padding-right: 8px !important; padding-left: 8px !important;">
              <a href="../index.php" class="nav-link text-body p-0">
                <i class="fa fa-right-from-bracket fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="row mt-4 justify-content-center">
      <div class="col-lg-5 mb-lg-0 mb-4">
        <div class="card bg-gradient-dark move-on-hover">
          <div class="card-body">
            <div class="d-flex">
              <h2 class="mb-0 text-white">Total de Sócios</h2>
              <div class="ms-auto">
                <h1 class="text-white text-end mb-0 mt-n2"><?php echo $total_socios; ?></h1>
                <p class="text-sm mb-0 text-white">sócios</p>
              </div>
            </div>
          </div>
          <a href="<?php echo $arrConfig["url_admin"] ?>/socios" class="w-100 text-center py-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Show More">
            <i class="fas fa-chevron-down text-white"></i>
          </a>
        </div>
      </div>

      <div class="col-lg-5 mb-lg-0 mb-4">
        <div class="card bg-gradient-dark move-on-hover">
          <div class="card-body">
            <div class="d-flex">
              <h2 class="mb-0 text-white">Sócios Inscritos nas Últimas 24h</h2>
              <div class="ms-auto">
                <h1 class="text-white text-end mb-0 mt-n2"> <?php echo $recent_socios; ?>
                </h1>
                <p class="text-sm mb-0 text-white">sócios</p>
              </div>
            </div>
          </div>
          <a href="<?php echo $arrConfig["url_admin"] ?>/socios" class="w-100 text-center py-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Show More">
            <i class="fas fa-chevron-down text-white"></i>
          </a>
        </div>
      </div>
    </div>

    <!-- <div class="col-lg-5 mb-lg-0 mb-4">
      <div class="card bg-gradient-dark move-on-hover">
        <div class="card-body">
          <div class="d-flex">
            <h2 class="mb-0 text-white">Total de Sócios com Lugar Anual</h2>
            <div class="ms-auto">
              <h1 class="text-white text-end mb-0 mt-n2"> <?php echo $total_lugar_anual; ?>
              </h1>
              <p class="text-sm mb-0 text-white">sócios</p>
            </div>
          </div>
        </div>
        <a href="<?php echo $arrConfig["url_admin"] ?>/socios" class="w-100 text-center py-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Show More">
          <i class="fas fa-chevron-down text-white"></i>
        </a>
      </div>
    </div> -->


    <div class="row mt-4 justify-content-center">
      <div class="col-lg-5 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-header pb-2 px-3 pt-3">
            <h4 class="card-title mb-0">Sócios Inscritos na Última Semana</h4>
          </div>
          <div class="card-body px-3 pt-0 pb-4">
            <canvas id="weeklyChart"></canvas>
          </div>
        </div>
      </div>

      <div class="col-lg-5 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-header pb-2 px-3 pt-3">
            <h4 class="card-title mb-0">Bancadas - Lugar Anual</h4>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary font-weight-bolder opacity-7">Nome da Bancada</th>
                    <th class="text-uppercase text-secondary font-weight-bolder opacity-7">Preço da Bancada</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (!empty($bancadas_agrupadas)) {
                    foreach ($bancadas_agrupadas as $nomeBancada => $bancada) {
                      $nomes_completos = implode(' / ', $bancada['nomes_completos']);
                      echo "<tr><td>{$nomeBancada} {$nomes_completos}</td><td>{$bancada['preco']}€</td></tr>";
                    }
                  } else {
                    echo "<tr><td colspan='2' class='text-center'>Nenhuma bancada encontrada</td></tr>";
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>

    <div class="row mt-4 justify-content-center">
      <div class="col-lg-8 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-header pb-0 px-3 pt-3">
            <h4 class="card-title mb-0">Quotas</h4>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="tabela-quotas">
                <thead>
                  <tr>
                    <th>Tipo</th>
                    <th>Idade Mínima</th>
                    <th>Idade Máxima</th>
                    <th>Cartão</th>
                    <th>Quota</th>
                    <th>Inscrição</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (!empty($result_quotas)) {
                    foreach ($result_quotas as $quota) {
                      $class = '';
                      if (stripos($quota['tipo'], 'Superior') !== false) {
                        $class = 'tipo-superior';
                      } elseif (stripos($quota['tipo'], 'Arquibancada') !== false) {
                        $class = 'tipo-arquibancada';
                      } elseif (stripos($quota['tipo'], 'Lateral') !== false) {
                        $class = 'tipo-lateral';
                      } elseif (stripos($quota['tipo'], 'Central') !== false) {
                        $class = 'tipo-central';
                      }
                      echo "<tr class='{$class}'>";
                      echo "<td class='align-middle text-center'><span class='text-s'>{$quota['tipo']}</span></td>";
                      echo "<td class='align-middle text-center'><span class='text-s'>{$quota['idadeMin']}</span></td>";
                      echo "<td class='align-middle text-center'><span class='text-s'>{$quota['idadeMax']}</span></td>";
                      echo "<td class='align-middle text-center'><span class='text-s'>{$quota['cartao']}€</span></td>";
                      echo "<td class='align-middle text-center'><span class='text-s'>{$quota['quota']}€</span></td>";
                      echo "<td class='align-middle text-center'><span class='text-s'>{$quota['inscricao']}€</span></td>";
                      echo "</tr>";
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="row mt-4 justify-content-center">

  </main>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var ctx = document.getElementById('weeklyChart').getContext('2d');
      var maxInscritos = <?php echo $max_inscritos; ?>;
      var weeklyChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: <?php echo json_encode(array_keys($inscritos_data)); ?>,
          datasets: [{
            label: 'Sócios Inscritos',
            data: <?php echo json_encode(array_values($inscritos_data)); ?>,
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 2,
            fill: false
          }]
        },
        options: {
          scales: {
            x: {
              type: 'category',
              title: {
                display: true,
                text: 'Data'
              }
            },
            y: {
              title: {
                display: true,
                text: 'Número de Sócios'
              },
              beginAtZero: true,
              suggestedMax: maxInscritos
            }
          }
        }
      });
    });
  </script>
</body>

</html>


<style>

</style>