<?php
include_once '../include/config.inc.php';
include_once $arrConfig['dir_site'] . '/include/auth.inc.php';

// Obter número total de sócios
$sql_total = "SELECT COUNT(*) as total_socios FROM socios"; // substitua "socios" pelo nome da sua tabela
$result_total = my_query($sql_total);
$total_socios = $result_total[0]['total_socios'];

// Obter número de sócios inscritos nas últimas 24 horas
$sql_recent = "SELECT COUNT(*) as recent_socios FROM socios WHERE dataNasc >= NOW() - INTERVAL 1 DAY"; // substitua "dataNasc" pela sua coluna de data de inscrição
$result_recent = my_query($sql_recent);
$recent_socios = $result_recent[0]['recent_socios'];
?>
<!DOCTYPE html>
<html lang="en">

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
  <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css"
    rel="stylesheet">
  <script src="https://kit.fontawesome.com/4454d5d378.js" crossorigin="anonymous"></script>
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
  <style>
  </style>
</head>

<body class="g-sidenav-show bg-gray-100">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3"
    id="sidenav-main">
    <div class="sidenav-header mb-3">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true" id="iconSidenav"></i>
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
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
      navbar-scroll="true">
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
            <li class="nav-item px-3 d-flex align-items-center"
              style="padding-right: 8px !important; padding-left: 8px !important;">
              <a href="../index.php" class="nav-link text-body p-0">
                <i class="fa fa-right-from-bracket fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row mt-4">
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
              <p class="mb-0 text-white">Meeting</p>
            </div>
            <a href="<?php echo $arrConfig["url_admin"] ?>/socios" class="w-100 text-center py-1"
              data-bs-toggle="tooltip" data-bs-placement="top" title="Show More">
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
            <a href="<?php echo $arrConfig["url_admin"] ?>/socios" class="w-100 text-center py-1"
              data-bs-toggle="tooltip" data-bs-placement="top" title="Show More">
              <i class="fas fa-chevron-down text-white"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>

</html>