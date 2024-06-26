<?php
include 'include/config.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>AGFC &mdash; Gestão de Sócios</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="img/logo.png">
  <!-- fontawesome -->
  <link rel="stylesheet" href="assets/css/all.min.css">
  <!-- Font Awesome Icons -->
  <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css"
    rel="stylesheet">
  <script src="https://kit.fontawesome.com/4454d5d378.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">


  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/style.css">

</head>

<body>
  <div class="site-wrap">
    <header class="site-navbar absolute transparent" role="banner">
      <nav class="site-navigation position-relative text-right bg-black text-md-right" role="navigation">
        <div class="container position-relative">
          <div class="site-logo">
            <a href="index.php"><img src="img/logo.png" alt=""></a>
          </div>
          <div class="d-inline-block d-md-none ml-md-0 mr-auto py-3">
            <a href="#" class="site-menu-toggle js-menu-toggle text-white">
              <span class="icon-menu h3"></span>
            </a>
          </div>
          <?php include 'include/menu.inc.php'; ?>
        </div>
      </nav>
    </header>


    <div class="site-blocks-cover overlay" style="background-image: url(img/bg-stadium.webp); height: 600px"
      data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-start">
          <div class="col-md-6 text-center text-md-left" data-aos="fade-up" data-aos-delay="400">
            <h1 class="bg-text-line">Vantagens</h1>
          </div>
        </div>
      </div>
    </div>

    <div class="container advantages-container mt-4">
      <h1 class="title text-center">Vantagens de Sócio</h1>
      <div class="advantages">
        <div class="advantage">
          <div class="icon-container">
            <i class="fa-solid fa-trophy fa-3x icon"></i>
          </div>
          <p class="advantage-text">40% de desconto em visitas ao museu</p>
        </div>
        <div class="advantage">
          <div class="icon-container">
            <i class="fa-solid fa-shirt fa-3x icon"></i>
          </div>
          <p class="advantage-text">15% de retorno, por mês, se for a todos os jogos em casa</p>
        </div>
        <div class="advantage">
          <div class="icon-container">
            <i class="fa-solid fa-percent fa-3x icon"></i>
          </div>
          <p class="advantage-text">10% de desconto na loja do clube</p>
        </div>
        <div class="advantage">
          <div class="icon-container">
            <i class="fa-solid fa-ticket fa-3x icon"></i>
          </div>
          <p class="advantage-text">Prioridade na aquisição de bilhetes</p>
        </div>
      </div>
      <p class="footer-text text-center mb-4">
        Assim que um adepto se torne sócio, terá imediatamente acesso a vantagens exclusivas.
      </p>
    </div>

    <style>

    </style>

    <div class="site-section"
      style="background-image: url('img/vantagens-bg.webp'); background-size: cover; background-position: center;">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12 text-center">
            <h1 class="text-white display-3"><strong>Vantagens - Lugar Anual</strong></h1>
          </div>
        </div>
        <div class="row text-center justify-content-center">
          <div class="col-md-4">
            <div class="advantage-box">
              <img src="img/trocar-lugar.png" alt="Trocar lugar" class="img-fluid mb-3 icon-image">
              <div class="line-above"></div>
              <h3>Trocar lugar</h3>
            </div>
          </div>
          <div class="col-md-4">
            <div class="advantage-box">
              <img src="img/partilhar-lugar.png" alt="Partilhar lugar" class="img-fluid mb-3 icon-image">
              <div class="line-above"></div>
              <h3>Partilhar lugar</h3>
            </div>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-md-12 text-center">
            <p>Ao ser sócio, a opção de adquirir um lugar anual estará disponível. Caso pretenda, posteriormente poderá
              partilhar o lugar, trocar de lugar ou até mesmo vender o lugar.</p>
          </div>
        </div>
      </div>
    </div>

    <?php
    include 'include/rodape.inc.php';
    ?>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>

</body>

</html>