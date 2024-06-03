<?php
include 'include/config.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>AGFC &mdash; Gestão de Sócios</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
          <div class="d-inline-block d-md-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

          <?php
          include 'include/menu.inc.php';
          ?>
        </div>
      </nav>
    </header>



    <div class="site-blocks-cover overlay" style="background-image: url(img/bg-stadium.webp); height: 600px" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-start justify-content-start" style="padding-top: 170px;">
          <div class="col-md-6 text-center text-md-left mb-12 mb-md-0" data-aos="fade-up" data-aos-delay="400">
            <h1 class="bg-text-line" style="font-size: 4rem !important;">AGFC</h1>
            <br>
            <h1 class="bg-text-line">Gestão de Sócios</h1>
            <p><a href="sobre.php" class="btn btn-primary btn-sm rounded-0 py-3 px-5">Ver Mais</a></p>
          </div>
        </div>
      </div>
    </div>



    <div class="site-section pt-0 feature-blocks-1" data-aos="fade" data-aos-delay="100">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4">
            <div class="p-3 p-md-5 feature-block-1 mb-5 mb-lg-0 bg" style="background-image: url('img/socios.jpg');">
              <div class="text">
                <h2 class="h5 text-white">Inscrever um sócio</h2>
                <p>Torne-se já sócio do nosso clube e beneficie de vantagens exclusivas. Junte-se a nós!</p>
                <p class="mb-0"><a href="socios.php" class="btn btn-primary btn-sm px-4 py-2 rounded-0">Inscrever</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="p-3 p-md-5 feature-block-1 mb-5 mb-lg-0 bg" style="background-image: url('img/lugar-anual.jpg');">
              <div class="text">
                <h2 class="h5 text-white">Lugar Anual</h2>
                <p>Adquira um lugar anual e garanta um lugar reservado no estádio, com o melhor custo-beneficio.</p>
                <p class="mb-0"><a href="lugar-anual.php" class="btn btn-primary btn-sm px-4 py-2 rounded-0">Adquirir</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="p-3 p-md-5 feature-block-1 mb-5 mb-lg-0 bg" style="background-image: url('img/vantagens.jpg');">
              <div class="text">
                <h2 class="h5 text-white">Vantangens</h2>
                <p>Veja todas as vantagens que obtém ao tornar-se sócio. Desfrute de descontos exclusivos e muito mais.</p>
                <p class="mb-0"><a href="vantagens.php" class="btn btn-primary btn-sm px-4 py-2 rounded-0">Ver Mais</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-blocks-vs site-section bg-light">
      <div class="site-section" data-aos="fade-up">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6 order-2 order-md-1">
              <h2 class="text-black">Como Funciona?</h2>
              <p class="lead">O nosso sistema de gestão de sócios de um clube desportivo apresenta planos de associação para várias idades, a opção de aquisição de um lugar anual*, bem como algumas vantagens ao aderir a estes planos.
                Ao clicar para inscrever/registar um sócio irá aparecer um formulário a pedir os dados necessários para a adesão.</p>
              <p class="lead" style="color: gray">*apenas disponível no caso de já ser sócio</p>
            </div>
            <div class="col-md-6 order-1 order-md-2">
              <img src="img/bg-stadium2.webp" alt="Image" class="img-fluid full-height-image">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12 text-center">
            <h2 class="text-black">Últimas notícias</h2>
          </div>
        </div>
        <?php
        $news = my_query("SELECT * FROM noticias ORDER BY data_publicacao DESC LIMIT 3");
        ?>
        <div class="row">
          <?php foreach ($news as $key => $value) {
            // Gerar URL amigável para SEO
            $titulo_url = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $value['titulo']));
          ?>
            <div class="col-md-6 col-lg-4 mb-4">
              <div class="post-entry" style="height: 500px; border-radius: 10px">
                <div class="image">
                  <a href="noticia-unica.php?id=<?= $value['id'] ?>&title=<?= $titulo_url ?>">
                    <img class="img-fluid" src="uploads/<?= $value['imagem'] ?>" alt="<?= $value['titulo'] ?>" style="border-radius: 10px 10px 0 0;">
                  </a>
                </div>
                <div class="text p-4">
                  <h2 class="h5 text-black">
                    <a href="noticia-unica.php?id=<?= $value['id'] ?>&title=<?= $titulo_url ?>"><?= $value['titulo'] ?></a>
                  </h2>
                  <span class="text-uppercase date d-block mb-3">
                    <small>By <?= $value['autor'] ?> &bullet; <?= date('d/m/Y', strtotime($value['data_publicacao'])) ?></small>
                  </span>
                  <p class="mb-0"><?= $value['resumo'] ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
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