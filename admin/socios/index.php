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
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6><?php echo $nome_modulo; ?></h6>
            </div>
            <p class="d-inline-block" style="margin-left: 20px">
              <a href="inserir.php" class="btn btn-primary">Registar sócio</a>
            </p>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <?php
                      foreach ($arrCampos as $kCampos => $vCampos) {
                        if (isset($vCampos['listagem']) && $vCampos['listagem']) {
                          echo "<th class='text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>$vCampos[legenda]</th>";
                        }
                      }
                      ?>
                      <th class='text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Lugar Anual</th>
                      <th class='text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
                    $perPage = 15;
                    $offset = ($page - 1) * $perPage;

                    $query = "SELECT * FROM $modulo LIMIT $perPage OFFSET $offset";
                    $arrResultados = my_query($query);

                    foreach ($arrResultados as $index => $v) {
                      echo "<tr>";
                      foreach ($arrCampos as $kCampos => $vCampos) {
                        if (isset($vCampos['listagem']) && $vCampos['listagem']) {
                          // Inicialmente, considera-se o valor direto da coluna
                          $valorCampo = $v[$kCampos];

                          if ($kCampos == 'ativo') {
                            $valorCampo = $v[$kCampos] == 1
                              ? "<i class='fa fa-check-circle text-success'></i>"
                              : "<i class='fa fa-times-circle text-danger'></i>";
                          }

                          if (isset($vCampos['carrega_opcoes'])) {
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
                            $valorCampo = "<img src='$arrConfig[url_site]/uploads/$v[$kCampos]' width='50'>";
                          }

                          echo "<td>$valorCampo</td>";
                        }
                      }

                      $codSocio = $v['codSocio'];
                      $queryLugarAnual = "SELECT COUNT(*) as count FROM lugar_anual WHERE codSocio1 = '$codSocio'";
                      $resultLugarAnual = my_query($queryLugarAnual);
                      $isLugarAnual = $resultLugarAnual[0]['count'] > 0;

                      // Adicionar coluna Lugar Anual
                      $lugarAnualIcon = $isLugarAnual
                        ? "<i class='fa fa-check-circle text-success'></i>"
                        : "<i class='fa fa-times-circle text-danger'></i>";
                      echo "<td class='text-center'>$lugarAnualIcon</td>";

                      $strCamposChave_aux = $strCamposChave;
                      foreach ($arrCamposChave as $vChave) {
                        $strCamposChave_aux = str_replace('{valor_' . $vChave['nome'] . '}', $v[$vChave['nome']], $strCamposChave_aux);
                      }

                      echo "<td style='width: 10%;' class='align-middle text-center'>
                        <a href='editar.php?$strCamposChave_aux' class='btn btn-link text-secondary mb-0' style='margin-right: 5px;'>
                          <i class='fa fa-pencil text-xs'></i>
                        </a>
                        <a href='eliminar.php?$strCamposChave_aux' class='btn btn-link text-danger mb-0' style='margin-left: 5px; margin-right: 5px;'>
                          <i class='fa fa-trash text-xs'></i>
                        </a>    
                        <a class='myBtn btn btn-link text-secondary mb-0' data-index='$index' style='margin-left: 5px;'>
                          <i class='fa fa-address-card'></i>
                        </a>
                        <div class='myModal modal' data-index='$index'>
                          <div class='modal-content'>
                            <span class='close'>&times;</span>
                            <div class='card-socio'>
                              <img src='" . $arrConfig['url_site'] . "/uploads/" . $v['fotoSocio'] . "' alt='Foto de " . $v['nomeSocio'] . "'>
                              <div class='nomeSocio'>" . $v['nomeSocio'] . "</div>
                              <div class='codSocio'>Nº: " . $v['codSocio'] . "</div>
                              <div class='dataInscricao'>Sócio desde: " . date('d/m/Y', strtotime($v['dataInscricao'])) . "</div>
                            </div>
                          </div>
                        </div>
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
  <!-- Core JS Files -->
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
  <!-- Control Center for Soft Dashboard -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var modalBtns = document.querySelectorAll('.myBtn');
      var modals = document.querySelectorAll('.myModal');

      modalBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
          var index = btn.getAttribute('data-index');
          var modal = document.querySelector('.myModal[data-index="' + index + '"]');
          modal.style.display = "flex";
        });
      });

      modals.forEach(function (modal) {
        var span = modal.querySelector('.close');
        span.addEventListener('click', function () {
          modal.style.display = "none";
        });
      });

      window.addEventListener('click', function (event) {
        modals.forEach(function (modal) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        });
      });
    });
  </script>
</body>

</html>

<style>
  .modal {
    width: 100%;
    height: 100%;
    overflow: auto;
    align-items: center;
    justify-content: center;
  }

  .modal-content {
    position: relative;
    width: 600px;
    height: 315px;
    max-width: 100%;
    background-color: transparent;
    border: none;
  }

  .close {
    position: absolute;
    top: 10px;
    right: 25px;
    color: white;
    font-size: 35px;
    font-weight: bold;
    cursor: pointer;
  }

  .card-socio {
    width: 100%;
    height: 100%;
    background: url('../../img/bg-socio.webp') no-repeat center center;
    color: white;
    position: relative;
    padding: 20px;
    box-sizing: border-box;
  }

  .card-socio img {
    width: 100px;
    height: 100px;
    border-radius: 3%;
    position: absolute;
    object-fit: cover;
    top: 20px;
    left: 20px;
    max-width: 100%;
    max-height: 100%;
    margin-top: 20px;
  }

  .card-socio .nomeSocio {
    position: absolute;
    bottom: 60px;
    left: 20px;
    font-size: 18px;
    font-weight: bold;
  }

  .card-socio .codSocio,
  .card-socio .dataInscricao {
    position: absolute;
    bottom: 20px;
    left: 20px;
    font-size: 14px;
  }

  .card-socio .dataInscricao {
    left: 200px;
  }
</style>