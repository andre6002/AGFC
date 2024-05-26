<?php
include '../../include/config.inc.php';
include $arrConfig['dir_site'] . '/include/auth.inc.php';
include 'dados.inc.php';

$arrCamposChave = array();
foreach ($arrCampos as $kCampos => $vCampos) {
  if (isset($vCampos['chave']) && $vCampos['chave']) {
    $arrCamposChave[] = array('nome' => $kCampos, 'valor' => '{valor_' . $kCampos . '}');
  }
}
$strCamposChave = '';
foreach ($arrCamposChave as $v) {
  $strCamposChave .= "$v[nome]=$v[valor]&";
}
$strCamposChave = substr($strCamposChave, 0, -1);
?>

<!DOCTYPE html>
<html lang="en">

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
<link rel="icon" type="image/png" href="../../img/logo.png">
<title>
  Admin
</title>
<!--     Fonts and icons     -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
<!-- Nucleo Icons -->
<link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
<!-- Font Awesome Icons -->
<link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/4454d5d378.js" crossorigin="anonymous"></script>
<link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
<!-- CSS Files -->
<link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
    id="sidenav-main">
    <div class="sidenav-header mb-3">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true" id="iconSidenav"></i>
      <img src="../../img/logo.png" onclick="window.location.href=''" class="navbar-brand-img" alt="main_logo">
    </div>
    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100 h-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <?php
        include '../../include/sidebar.inc.php';
        ?>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">FrontOffice</h6>
        </li>
        <?php
        include '../../include/sidebar2.inc.php';
        ?>


      </ul>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
      navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="../index.php">Páginas</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
              <?php echo $nome_modulo; ?>
            </li>
          </ol>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" style="justify-content: flex-end"
          id="navbar">

          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none" onclick="window.location.href='../logout.php'">Log Out</span>
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
            <li class="nav-item px-3 d-flex align-items-center"
              style="padding-right: 8px !important; padding-left: 8px !important;">
              <a href="../../index.php" class="nav-link text-body p-0">
                <i class="fa fa-right-from-bracket fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>

          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>
                <?php echo $nome_modulo; ?>
              </h6>
            </div>
            <p class="d-inline-block" style="margin-left: 20px">
              <a href="inserir.php" class="btn btn-primary">Registar socio</a>
            </p>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <?php
                      foreach ($arrCampos as $kCampos => $vCampos) {
                        if (isset($vCampos['listagem']) && $vCampos['listagem']) {
                          if ($kCampos == 'ativo') {
                            echo "<th class='text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>$vCampos[legenda]</th>";
                          } else {
                            echo "<th class='text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>$vCampos[legenda]</th>";
                          }
                        }
                      }
                      ?>
                      <th class='text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
                    $perPage = 15;
                    $offset = ($page - 1) * $perPage;

                    $query = "SELECT $modulo.*, socios.nomeSocio AS nomeSocio, socios.codSocio AS socioId
                    FROM $modulo
                    INNER JOIN socios ON $modulo.codSocio = socios.codSocio";
                    $arrResultados = my_query($query);

                    foreach ($arrResultados as $v) {
                      echo "<tr>";

                      foreach ($arrCampos as $kCampos => $vCampos) {
                        if (isset($vCampos['listagem']) && $vCampos['listagem']) {
                          $valorCampo = $v[$kCampos];

                          if ($kCampos == 'ativo') {
                            $valorCampo = $v[$kCampos] == 1
                              ? "<i class='fa fa-check-circle text-success'></i>"
                              : "<i class='fa fa-times-circle text-danger'></i>";
                          } elseif (isset($vCampos['carrega_opcoes'])) {
                            $tabela = $vCampos['carrega_opcoes']['tabela'];
                            $chave = $vCampos['carrega_opcoes']['chave'];
                            $campoLegenda = $vCampos['carrega_opcoes']['legenda'];
                            $ativo = $vCampos['carrega_opcoes']['ativo'];
                            $where = "$chave = '" . $v[$kCampos] . "'";
                            if ($ativo !== null) {
                              $where .= " AND $ativo = '1'";
                            }
                            $queryOpcoes = "SELECT $campoLegenda FROM $tabela WHERE $where";
                            $arrCarregaOpcoes = my_query($queryOpcoes);
                            if (isset($arrCarregaOpcoes[0][$campoLegenda])) {
                              $valorCampo = $arrCarregaOpcoes[0][$campoLegenda];
                            } else if (isset($vCampos['carrega_opcoes']['null_valor_legenda'])) {
                              $valorCampo = $vCampos['carrega_opcoes']['null_valor_legenda'];
                            }
                          }

                          if ($vCampos['tipo'] == 'file') {
                            $valorCampo = "<img src='$arrConfig[url_site]/uploads/$v[$kCampos]' style='max-width: 80px; max-height: 80px; height: auto; width: auto;'>";
                          }


                          echo "<td height='80px'>$valorCampo</td>";
                        }
                      }
                      $strCamposChave_aux = $strCamposChave;
                      foreach ($arrCamposChave as $vChave) {
                        $strCamposChave_aux = str_replace('{valor_' . $vChave['nome'] . '}', $v[$vChave['nome']], $strCamposChave_aux);
                      }

                      echo "<td style='width: 10%;' class='align-middle text-center'>
                                            <a href='editar.php?$strCamposChave_aux' class='btn btn-link text-secondary mb-0' style='margin-right: 5px;'>
                                            <i class='fa fa-pencil text-xs'></i>
                                            </a>
                                            <a href='eliminar.php?$strCamposChave_aux' class='btn btn-link text-danger mb-0' style='margin-left: 5px;'>
                                            <i class='fa fa-trash text-xs'></i>
                                            </a>    
                                            </td>";
                    }
                    $countQuery = "SELECT COUNT(*) AS total FROM $modulo";
                    $totalRows = my_query($countQuery)[0]['total'];
                    $totalPages = ceil($totalRows / $perPage);
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- Paginação -->
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination">
                  <li class="page-item <?php echo ($page <= 1) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo ($page > 1) ? $page - 1 : 1; ?>" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Anterior</span>
                    </a>
                  </li>
                  <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item <?php echo ($i === $page) ? 'active' : ''; ?>">
                      <a class="page-link" href="?page=<?php echo $i; ?>">
                        <?php echo $i; ?>
                      </a>
                    </li>
                  <?php endfor; ?>
                  <li class="page-item <?php echo ($page >= $totalPages) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo ($page < $totalPages) ? $page + 1 : $totalPages; ?>">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Próximo</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>

  </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg ">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Soft UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">

        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent"
            onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white"
            onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3">
          <h6 class="mb-0">Navbar Fixed</h6>
        </div>
        <div class="form-check form-switch ps-0">
          <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
        </div>
        <hr class="horizontal dark my-sm-4">
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
</body>

</html>