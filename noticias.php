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

  <!-- fontawesome -->
  <link rel="stylesheet" href="assets/css/all.min.css">
  <!-- Font Awesome Icons -->
  <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css"
    rel="stylesheet">
  <script src="https://kit.fontawesome.com/4454d5d378.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <style>

  </style>
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
            <h1 class="bg-text-line">Notícias</h1>
            <p>Esteja a par das últimas notícias</p>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="text-right">
          <button id="grid-view-btn" class="btn btn-secondary active"><i
              class="fa-solid fa-grip align-middle"></i></button>
          <button id="list-view-btn" class="btn btn-secondary"><i class="fa-solid fa-bars align-middle"></i></button>
        </div>
        <?php
        $news = my_query("SELECT * FROM noticias ORDER BY data_publicacao");
        ?>

        <!-- Visualização em Mosaico -->
        <div class="site-section news-grid-view" id="grid-view">
          <div class="container">
            <div class="row">
              <?php foreach ($news as $key => $value) {
                $titulo_url = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $value['titulo']));
                ?>
                <div class="col-lg-4 col-md-6 mb-4">
                  <div class="post-entry">
                    <div class="image">
                      <a href="noticia-unica.php?id=<?= $value['id'] ?>&title=<?= $titulo_url ?>">
                        <img class="img-fluid" src="uploads/<?= $value['imagem'] ?>" alt="<?= $value['titulo'] ?>">
                      </a>
                    </div>
                    <div class="text p-4">
                      <h2 class="h5 text-black">
                        <a
                          href="noticia-unica.php?id=<?= $value['id'] ?>&title=<?= $titulo_url ?>"><?= $value['titulo'] ?></a>
                      </h2>
                      <span class="text-uppercase date d-block mb-3">
                        <small>By <?= $value['autor'] ?> &bullet;
                          <?= date('d/m/Y', strtotime($value['data_publicacao'])) ?></small>
                      </span>
                      <p class="mb-0"><?= $value['resumo'] ?></p>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>

        <!-- Visualização em Linhas -->
        <div class="site-section news-list-view hidden" id="list-view">
          <div class="container">
            <div class="row">
              <?php foreach ($news as $key => $value) {
                $titulo_url = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $value['titulo']));
                ?>
                <div class="col-12 mb-4">
                  <div class="post-entry">
                    <div class="image">
                      <a href="noticia-unica.php?id=<?= $value['id'] ?>&title=<?= $titulo_url ?>">
                        <img class="img-fluid" src="uploads/<?= $value['imagem'] ?>" alt="<?= $value['titulo'] ?>">
                      </a>
                    </div>
                    <div class="text">
                      <h2 class="h5 text-black">
                        <a
                          href="noticia-unica.php?id=<?= $value['id'] ?>&title=<?= $titulo_url ?>"><?= $value['titulo'] ?></a>
                      </h2>
                      <span class="text-uppercase date d-block mb-3">
                        <small>By <?= $value['autor'] ?> &bullet;
                          <?= date('d/m/Y', strtotime($value['data_publicacao'])) ?></small>
                      </span>
                      <p class="mb-0"><?= $value['resumo'] ?></p>
                    </div>
                  </div>
                </div>
              <?php } ?>
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

  <script>
    document.getElementById('grid-view-btn').addEventListener('click', function () {
      document.getElementById('grid-view').classList.remove('hidden');
      document.getElementById('list-view').classList.add('hidden');
      this.classList.add('active');
      document.getElementById('list-view-btn').classList.remove('active');
    });

    document.getElementById('list-view-btn').addEventListener('click', function () {
      document.getElementById('grid-view').classList.add('hidden');
      document.getElementById('list-view').classList.remove('hidden');
      this.classList.add('active');
      document.getElementById('grid-view-btn').classList.remove('active');
    });
  </script>
</body>

</html>