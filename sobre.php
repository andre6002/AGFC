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

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-logo">
          <a href="#"><img src="img/logo.png" alt="Image"></a>
        </div>
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar absolute transparent" role="banner">
      <nav class="site-navigation position-relative text-right bg-black text-md-right" role="navigation">
        <div class="container position-relative">
          <div class="site-logo">
            <a href="index.php"><img src="img/logo.png" alt=""></a>
          </div>
          <div class="d-inline-block d-md-none ml-md-0 mr-auto py-3"><a href="#"
              class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

          <?php
          include 'include/menu.inc.php';
          ?>
        </div>
      </nav>
    </header>


    <div class="site-blocks-cover overlay" style="background-image: url(img/sobre-hero.jpg);" data-aos="fade"
      data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-start">
          <div class="col-md-6 text-center text-md-left" data-aos="fade-up" data-aos-delay="400">
            <h1 class="bg-text-line">Sobre Nós</h1>
            <p class="mt-4">O AGFC é mais do que uma equipa de futebol, é uma comunidade apaixonada pelo desporto e pela
              excelência. Desde a sua fundação, o AGFC promove o futebol, cultiva talentos, incentiva a participação da
              comunidade e inspira futuras gerações de atletas.
          </div>
        </div>
      </div>
    </div>

    <div class="site-section" data-aos="fade-up">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <img src="images/about_1.jpg" alt="Image" class="img-fluid">
          </div>
          <div class="col-md-6 pl-md-5">
            <h2 class="text-black">Nossa História</h2>
            <p class="lead">O AGFC foi fundado em 1947, por um grupo de entusiastas locais que partilhavam uma visão
              comum: criar um clube que fosse um pilar da comunidade. Ao longo dos anos, crescemos em tamanho e
              prestígio, alcançando diversos marcos importantes tanto a nível regional como nacional. A nossa história é
              marcada por dedicação, esforço e uma paixão imensurável pelo futebol, que se reflete em cada jogo que
              disputamos..</p>

          </div>
        </div>
      </div>
    </div>

    <div class="site-section" data-aos="fade-up">
      <div class="container mb-4">
        <div class="row align-items-center">
          <div class="col-md-6 order-2">
            <img src="images/about_2.jpg" alt="Image" class="img-fluid">
          </div>
          <div class="col-md-6 pr-md-5">
            <h2 class="text-black">Missão e Valores</h2>
            <p class="lead">A missão do AGFC é promover o futebol como uma ferramenta de inclusão, saúde e educação,
              valorizando o fair play, a disciplina e o espírito de equipa. Os nossos valores fundamentais incluem
              respeito, integridade e compromisso com a excelência. Acreditamos que através do desporto, podemos
              inspirar e capacitar os nossos jogadores a alcançarem o seu potencial máximo, dentro e fora do campo.</p>
          </div>
        </div>
      </div>

      <div class="site-section feature-blocks-1 no-margin-top bg-light">
        <div class="container">
          <div class="row mb-5">
            <div class="col-md-12 text-center">
              <h2 class="text-black">O que nos diferencia</h2>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-lg-4" data-aos="fade" data-aos-delay="100">
              <div class="p-3 p-md-5 feature-block-1 mb-5 mb-lg-0 bg" style="background-image: url('img/sobre2.jpg');">
                <div class="text">
                  <h2 class="h5 text-white">Formação de Jovens Talentos</h2>
                  <p>No AGFC, acreditamos no futuro do futebol e investimos na formação de jovens jogadores,
                    oferecendo-lhes as ferramentas e o suporte necessários para crescerem no desporto e como indivíduos.
                  </p>

                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade" data-aos-delay="200">
              <div class="p-3 p-md-5 feature-block-1 mb-5 mb-lg-0 bg" style="background-image: url('img/sobre3.jpg');">
                <div class="text">
                  <h2 class="h5 text-white">Envolvimento Comunitário</h2>
                  <p>Estamos profundamente ligados à nossa comunidade, participando e organizando eventos locais que
                    promovem o desporto e a solidariedade, criando um ambiente de apoio mútuo.</p>

                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade" data-aos-delay="300">
              <div class="p-3 p-md-5 feature-block-1 mb-5 mb-lg-0 bg" style="background-image: url('img/sobre1.jpg');">
                <div class="text">
                  <h2 class="h5 text-white">Infraestruturas de Excelência</h2>
                  <p>O AGFC orgulha-se das suas instalações de primeira linha, que incluem campos de treino, um estádio
                    moderno e equipamentos de última geração. Garantimos as melhores condições </p>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>



      <?php include 'include/rodape.inc.php'; ?>
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