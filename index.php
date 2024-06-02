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



    <div class="site-blocks-cover overlay" style="background-image: url(img/bg-stadium.webp); height: 650px" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-start">
          <div class="col-md-6 text-center text-md-left" data-aos="fade-up" data-aos-delay="400">
            <h1 class="bg-text-line" style="font-size: 4rem !important;">AGFC</h1>
            <br>
            <h1 class="bg-text-line">Gestão de Sócios</h1>
            <p><a href="#" class="btn btn-primary btn-sm rounded-0 py-3 px-5">Ver Mais</a></p>
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

    <div class="site-blocks-vs site-section bg-light">
      <div class="container">

        <div class="border mb-3 rounded d-block d-lg-flex align-items-center p-3 next-match">

          <div class="mr-auto order-md-1 w-60 text-center text-lg-left mb-3 mb-lg-0">
            Next match
            <div id="date-countdown"></div>
          </div>

          <div class="ml-auto pr-4 order-md-2">
            <div class="h5 text-black text-uppercase text-center text-lg-left">
              <div class="d-block d-md-inline-block mb-3 mb-lg-0">
                <img src="images/img_1_sq.jpg" alt="Image" class="mr-3 image"><span class="d-block d-md-inline-block ml-0 ml-md-3 ml-lg-0">Sea Hawlks </span>
              </div>
              <span class="text-muted mx-3 text-normal mb-3 mb-lg-0 d-block d-md-inline ">vs</span>
              <div class="d-block d-md-inline-block">
                <img src="images/img_3_sq.jpg" alt="Image" class="mr-3 image"><span class="d-block d-md-inline-block ml-0 ml-md-3 ml-lg-0">Patriots</span>
              </div>
            </div>
          </div>


        </div>

        <div class="bg-image overlay-success rounded mb-5" style="background-image: url('images/hero_bg_1.jpg');" data-stellar-background-ratio="0.5">

          <div class="row align-items-center">
            <div class="col-md-12 col-lg-4 mb-4 mb-lg-0">

              <div class="text-center text-lg-left">
                <div class="d-block d-lg-flex align-items-center">
                  <div class="image mx-auto mb-3 mb-lg-0 mr-lg-3">
                    <img src="images/img_1_sq.jpg" alt="Image" class="img-fluid">
                  </div>
                  <div class="text">
                    <h3 class="h5 mb-0 text-black">Sea Hawks</h3>
                    <span class="text-uppercase small country text-black">Brazil</span>
                  </div>
                </div>
              </div>

            </div>
            <div class="col-md-12 col-lg-4 text-center mb-4 mb-lg-0">
              <div class="d-inline-block">
                <p class="mb-2"><small class="text-uppercase text-black font-weight-bold">Premier League &mdash; Round 10</small></p>
                <div class="bg-black py-2 px-4 mb-2 text-white d-inline-block rounded"><span class="h3">3:2</span></div>
                <p class="mb-0"><small class="text-uppercase text-black font-weight-bold">10 September / 7:30 AM</small></p>
              </div>
            </div>

            <div class="col-md-12 col-lg-4 text-center text-lg-right">
              <div class="">
                <div class="d-block d-lg-flex align-items-center">
                  <div class="image mx-auto ml-lg-3 mb-3 mb-lg-0 order-2">
                    <img src="images/img_4_sq.jpg" alt="Image" class="img-fluid">
                  </div>
                  <div class="text order-1">
                    <h3 class="h5 mb-0 text-black">Steelers</h3>
                    <span class="text-uppercase small country text-black">London</span>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

        <div class="row">
          <div class="col-md-12">

            <h2 class="h6 text-uppercase text-black font-weight-bold mb-3">Latest Matches</h2>
            <div class="site-block-tab">
              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Match 1</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Match 2</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Match 3</a>
                </li>
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                  <div class="row align-items-center">
                    <div class="col-md-12">


                      <div class="row bg-white align-items-center ml-0 mr-0 py-4 match-entry">
                        <div class="col-md-4 col-lg-4 mb-4 mb-lg-0">

                          <div class="text-center text-lg-left">
                            <div class="d-block d-lg-flex align-items-center">
                              <div class="image image-small text-center mb-3 mb-lg-0 mr-lg-3">
                                <img src="images/img_1_sq.jpg" alt="Image" class="img-fluid">
                              </div>
                              <div class="text">
                                <h3 class="h5 mb-0 text-black">Packers</h3>
                                <span class="text-uppercase small country">Brazil</span>
                              </div>
                            </div>
                          </div>

                        </div>
                        <div class="col-md-4 col-lg-4 text-center mb-4 mb-lg-0">
                          <div class="d-inline-block">
                            <div class="bg-black py-2 px-4 mb-2 text-white d-inline-block rounded"><span class="h5">3:2</span></div>
                          </div>
                        </div>

                        <div class="col-md-4 col-lg-4 text-center text-lg-right">
                          <div class="">
                            <div class="d-block d-lg-flex align-items-center">
                              <div class="image image-small ml-lg-3 mb-3 mb-lg-0 order-2">
                                <img src="images/img_4_sq.jpg" alt="Image" class="img-fluid">
                              </div>
                              <div class="text order-1 w-100">
                                <h3 class="h5 mb-0 text-black">Steelers</h3>
                                <span class="text-uppercase small country">London</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- END row -->

                      <div class="row bg-white align-items-center ml-0 mr-0 py-4 match-entry">
                        <div class="col-md-4 col-lg-4 mb-4 mb-lg-0">

                          <div class="text-center text-lg-left">
                            <div class="d-block d-lg-flex align-items-center">
                              <div class="image image-small text-center mb-3 mb-lg-0 mr-lg-3">
                                <img src="images/img_1_sq.jpg" alt="Image" class="img-fluid">
                              </div>
                              <div class="text">
                                <h3 class="h5 mb-0 text-black">Patriots</h3>
                                <span class="text-uppercase small country">Brazil</span>
                              </div>
                            </div>
                          </div>

                        </div>
                        <div class="col-md-4 col-lg-4 text-center mb-4 mb-lg-0">
                          <div class="d-inline-block">
                            <div class="bg-black py-2 px-4 mb-2 text-white d-inline-block rounded"><span class="h5">3:2</span></div>
                          </div>
                        </div>

                        <div class="col-md-4 col-lg-4 text-center text-lg-right">
                          <div class="">
                            <div class="d-block d-lg-flex align-items-center">
                              <div class="image image-small ml-lg-3 mb-3 mb-lg-0 order-2">
                                <img src="images/img_4_sq.jpg" alt="Image" class="img-fluid">
                              </div>
                              <div class="text order-1 w-100">
                                <h3 class="h5 mb-0 text-black">Cowboys</h3>
                                <span class="text-uppercase small country">London</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- END row -->

                      <div class="row bg-white align-items-center ml-0 mr-0 py-4 match-entry">
                        <div class="col-md-4 col-lg-4 mb-4 mb-lg-0">

                          <div class="text-center text-lg-left">
                            <div class="d-block d-lg-flex align-items-center">
                              <div class="image image-small text-center mb-3 mb-lg-0 mr-lg-3">
                                <img src="images/img_1_sq.jpg" alt="Image" class="img-fluid">
                              </div>
                              <div class="text">
                                <h3 class="h5 mb-0 text-black">Raiders</h3>
                                <span class="text-uppercase small country">Brazil</span>
                              </div>
                            </div>
                          </div>

                        </div>
                        <div class="col-md-4 col-lg-4 text-center mb-4 mb-lg-0">
                          <div class="d-inline-block">
                            <div class="bg-black py-2 px-4 mb-2 text-white d-inline-block rounded"><span class="h5">3:2</span></div>
                          </div>
                        </div>

                        <div class="col-md-4 col-lg-4 text-center text-lg-right">
                          <div class="">
                            <div class="d-block d-lg-flex align-items-center">
                              <div class="image image-small ml-lg-3 mb-3 mb-lg-0 order-2">
                                <img src="images/img_4_sq.jpg" alt="Image" class="img-fluid">
                              </div>
                              <div class="text order-1 w-100">
                                <h3 class="h5 mb-0 text-black">Chiefs</h3>
                                <span class="text-uppercase small country">London</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- END row -->

                    </div>

                  </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                  <div class="row align-items-center">
                    <div class="col-md-12">


                      <div class="row bg-white align-items-center ml-0 mr-0 py-4 match-entry">
                        <div class="col-md-4 col-lg-4 mb-4 mb-lg-0">

                          <div class="text-center text-lg-left">
                            <div class="d-block d-lg-flex align-items-center">
                              <div class="image image-small text-center mb-3 mb-lg-0 mr-lg-3">
                                <img src="images/img_1_sq.jpg" alt="Image" class="img-fluid">
                              </div>
                              <div class="text">
                                <h3 class="h5 mb-0 text-black">Packers</h3>
                                <span class="text-uppercase small country">Brazil</span>
                              </div>
                            </div>
                          </div>

                        </div>
                        <div class="col-md-4 col-lg-4 text-center mb-4 mb-lg-0">
                          <div class="d-inline-block">
                            <div class="bg-black py-2 px-4 mb-2 text-white d-inline-block rounded"><span class="h5">3:2</span></div>
                          </div>
                        </div>

                        <div class="col-md-4 col-lg-4 text-center text-lg-right">
                          <div class="">
                            <div class="d-block d-lg-flex align-items-center">
                              <div class="image image-small ml-lg-3 mb-3 mb-lg-0 order-2">
                                <img src="images/img_4_sq.jpg" alt="Image" class="img-fluid">
                              </div>
                              <div class="text order-1 w-100">
                                <h3 class="h5 mb-0 text-black">Steelers</h3>
                                <span class="text-uppercase small country">London</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- END row -->

                      <div class="row bg-white align-items-center ml-0 mr-0 py-4 match-entry">
                        <div class="col-md-4 col-lg-4 mb-4 mb-lg-0">

                          <div class="text-center text-lg-left">
                            <div class="d-block d-lg-flex align-items-center">
                              <div class="image image-small text-center mb-3 mb-lg-0 mr-lg-3">
                                <img src="images/img_1_sq.jpg" alt="Image" class="img-fluid">
                              </div>
                              <div class="text">
                                <h3 class="h5 mb-0 text-black">Patriots</h3>
                                <span class="text-uppercase small country">Brazil</span>
                              </div>
                            </div>
                          </div>

                        </div>
                        <div class="col-md-4 col-lg-4 text-center mb-4 mb-lg-0">
                          <div class="d-inline-block">
                            <div class="bg-black py-2 px-4 mb-2 text-white d-inline-block rounded"><span class="h5">3:2</span></div>
                          </div>
                        </div>

                        <div class="col-md-4 col-lg-4 text-center text-lg-right">
                          <div class="">
                            <div class="d-block d-lg-flex align-items-center">
                              <div class="image image-small ml-lg-3 mb-3 mb-lg-0 order-2">
                                <img src="images/img_4_sq.jpg" alt="Image" class="img-fluid">
                              </div>
                              <div class="text order-1 w-100">
                                <h3 class="h5 mb-0 text-black">Cowboys</h3>
                                <span class="text-uppercase small country">London</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- END row -->

                      <div class="row bg-white align-items-center ml-0 mr-0 py-4 match-entry">
                        <div class="col-md-4 col-lg-4 mb-4 mb-lg-0">

                          <div class="text-center text-lg-left">
                            <div class="d-block d-lg-flex align-items-center">
                              <div class="image image-small text-center mb-3 mb-lg-0 mr-lg-3">
                                <img src="images/img_1_sq.jpg" alt="Image" class="img-fluid">
                              </div>
                              <div class="text">
                                <h3 class="h5 mb-0 text-black">Raiders</h3>
                                <span class="text-uppercase small country">Brazil</span>
                              </div>
                            </div>
                          </div>

                        </div>
                        <div class="col-md-4 col-lg-4 text-center mb-4 mb-lg-0">
                          <div class="d-inline-block">
                            <div class="bg-black py-2 px-4 mb-2 text-white d-inline-block rounded"><span class="h5">3:2</span></div>
                          </div>
                        </div>

                        <div class="col-md-4 col-lg-4 text-center text-lg-right">
                          <div class="">
                            <div class="d-block d-lg-flex align-items-center">
                              <div class="image image-small ml-lg-3 mb-3 mb-lg-0 order-2">
                                <img src="images/img_4_sq.jpg" alt="Image" class="img-fluid">
                              </div>
                              <div class="text order-1 w-100">
                                <h3 class="h5 mb-0 text-black">Chiefs</h3>
                                <span class="text-uppercase small country">London</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- END row -->

                    </div>

                  </div>
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                  <div class="row align-items-center">
                    <div class="col-md-12">


                      <div class="row bg-white align-items-center ml-0 mr-0 py-4 match-entry">
                        <div class="col-md-4 col-lg-4 mb-4 mb-lg-0">

                          <div class="text-center text-lg-left">
                            <div class="d-block d-lg-flex align-items-center">
                              <div class="image image-small text-center mb-3 mb-lg-0 mr-lg-3">
                                <img src="images/img_1_sq.jpg" alt="Image" class="img-fluid">
                              </div>
                              <div class="text">
                                <h3 class="h5 mb-0 text-black">Packers</h3>
                                <span class="text-uppercase small country">Brazil</span>
                              </div>
                            </div>
                          </div>

                        </div>
                        <div class="col-md-4 col-lg-4 text-center mb-4 mb-lg-0">
                          <div class="d-inline-block">
                            <div class="bg-black py-2 px-4 mb-2 text-white d-inline-block rounded"><span class="h5">3:2</span></div>
                          </div>
                        </div>

                        <div class="col-md-4 col-lg-4 text-center text-lg-right">
                          <div class="">
                            <div class="d-block d-lg-flex align-items-center">
                              <div class="image image-small ml-lg-3 mb-3 mb-lg-0 order-2">
                                <img src="images/img_4_sq.jpg" alt="Image" class="img-fluid">
                              </div>
                              <div class="text order-1 w-100">
                                <h3 class="h5 mb-0 text-black">Steelers</h3>
                                <span class="text-uppercase small country">London</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- END row -->

                      <div class="row bg-white align-items-center ml-0 mr-0 py-4 match-entry">
                        <div class="col-md-4 col-lg-4 mb-4 mb-lg-0">

                          <div class="text-center text-lg-left">
                            <div class="d-block d-lg-flex align-items-center">
                              <div class="image image-small text-center mb-3 mb-lg-0 mr-lg-3">
                                <img src="images/img_1_sq.jpg" alt="Image" class="img-fluid">
                              </div>
                              <div class="text">
                                <h3 class="h5 mb-0 text-black">Patriots</h3>
                                <span class="text-uppercase small country">Brazil</span>
                              </div>
                            </div>
                          </div>

                        </div>
                        <div class="col-md-4 col-lg-4 text-center mb-4 mb-lg-0">
                          <div class="d-inline-block">
                            <div class="bg-black py-2 px-4 mb-2 text-white d-inline-block rounded"><span class="h5">3:2</span></div>
                          </div>
                        </div>

                        <div class="col-md-4 col-lg-4 text-center text-lg-right">
                          <div class="">
                            <div class="d-block d-lg-flex align-items-center">
                              <div class="image image-small ml-lg-3 mb-3 mb-lg-0 order-2">
                                <img src="images/img_4_sq.jpg" alt="Image" class="img-fluid">
                              </div>
                              <div class="text order-1 w-100">
                                <h3 class="h5 mb-0 text-black">Cowboys</h3>
                                <span class="text-uppercase small country">London</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- END row -->

                      <div class="row bg-white align-items-center ml-0 mr-0 py-4 match-entry">
                        <div class="col-md-4 col-lg-4 mb-4 mb-lg-0">

                          <div class="text-center text-lg-left">
                            <div class="d-block d-lg-flex align-items-center">
                              <div class="image image-small text-center mb-3 mb-lg-0 mr-lg-3">
                                <img src="images/img_1_sq.jpg" alt="Image" class="img-fluid">
                              </div>
                              <div class="text">
                                <h3 class="h5 mb-0 text-black">Raiders</h3>
                                <span class="text-uppercase small country">Brazil</span>
                              </div>
                            </div>
                          </div>

                        </div>
                        <div class="col-md-4 col-lg-4 text-center mb-4 mb-lg-0">
                          <div class="d-inline-block">
                            <div class="bg-black py-2 px-4 mb-2 text-white d-inline-block rounded"><span class="h5">3:2</span></div>
                          </div>
                        </div>

                        <div class="col-md-4 col-lg-4 text-center text-lg-right">
                          <div class="">
                            <div class="d-block d-lg-flex align-items-center">
                              <div class="image image-small ml-lg-3 mb-3 mb-lg-0 order-2">
                                <img src="images/img_4_sq.jpg" alt="Image" class="img-fluid">
                              </div>
                              <div class="text order-1 w-100">
                                <h3 class="h5 mb-0 text-black">Chiefs</h3>
                                <span class="text-uppercase small country">London</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- END row -->

                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="site-section block-13 bg-primary fixed overlay-primary bg-image" style="background-image: url('images/hero_bg_3.jpg');" data-stellar-background-ratio="0.5">

      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12 text-center">
            <h2 class="text-white">More Game Highlights</h2>
          </div>
        </div>

        <div class="row">
          <div class="nonloop-block-13 owl-carousel">
            <div class="item">
              <!-- uses .block-12 -->
              <div class="block-12">
                <figure>
                  <img src="images/img_1.jpg" alt="Image" class="img-fluid">
                </figure>
                <div class="text">
                  <span class="meta">May 20th 2018</span>
                  <div class="text-inner">
                    <h2 class="heading mb-3"><a href="#" class="text-black">World Cup Championship</a></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad culpa, consectetur! Eligendi illo, repellat repudiandae cumque fugiat optio!</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="item">
              <div class="block-12">
                <figure>
                  <img src="images/img_2.jpg" alt="Image" class="img-fluid">
                </figure>
                <div class="text">
                  <span class="meta">May 20th 2018</span>
                  <div class="text-inner">
                    <h2 class="heading mb-3"><a href="#" class="text-black">World Cup Championship</a></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad culpa, consectetur! Eligendi illo, repellat repudiandae cumque fugiat optio!</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="item">
              <div class="block-12">
                <figure>
                  <img src="images/img_3.jpg" alt="Image" class="img-fluid">
                </figure>
                <div class="text">
                  <span class="meta">May 20th 2018</span>
                  <div class="text-inner">
                    <h2 class="heading mb-3"><a href="#" class="text-black">World Cup Championship</a></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad culpa, consectetur! Eligendi illo, repellat repudiandae cumque fugiat optio!</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="item">
              <div class="block-12">
                <figure>
                  <img src="images/img_4.jpg" alt="Image" class="img-fluid">
                </figure>
                <div class="text">
                  <span class="meta">May 20th 2018</span>
                  <div class="text-inner">
                    <h2 class="heading mb-3"><a href="#" class="text-black">World Cup Championship</a></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad culpa, consectetur! Eligendi illo, repellat repudiandae cumque fugiat optio!</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <!-- uses .block-12 -->
              <div class="block-12">
                <figure>
                  <img src="images/img_1.jpg" alt="Image" class="img-fluid">
                </figure>
                <div class="text">
                  <span class="meta">May 20th 2018</span>
                  <div class="text-inner">
                    <h2 class="heading mb-3"><a href="#" class="text-black">World Cup Championship</a></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad culpa, consectetur! Eligendi illo, repellat repudiandae cumque fugiat optio!</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="item">
              <div class="block-12">
                <figure>
                  <img src="images/img_2.jpg" alt="Image" class="img-fluid">
                </figure>
                <div class="text">
                  <span class="meta">May 20th 2018</span>
                  <div class="text-inner">
                    <h2 class="heading mb-3"><a href="#" class="text-black">World Cup Championship</a></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad culpa, consectetur! Eligendi illo, repellat repudiandae cumque fugiat optio!</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="item">
              <div class="block-12">
                <figure>
                  <img src="images/img_3.jpg" alt="Image" class="img-fluid">
                </figure>
                <div class="text">
                  <span class="meta">May 20th 2018</span>
                  <div class="text-inner">
                    <h2 class="heading mb-3"><a href="#" class="text-black">World Cup Championship</a></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad culpa, consectetur! Eligendi illo, repellat repudiandae cumque fugiat optio!</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="item">
              <div class="block-12">
                <figure>
                  <img src="images/img_4.jpg" alt="Image" class="img-fluid">
                </figure>
                <div class="text">
                  <span class="meta">May 20th 2018</span>
                  <div class="text-inner">
                    <h2 class="heading mb-3"><a href="#" class="text-black">World Cup Championship</a></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad culpa, consectetur! Eligendi illo, repellat repudiandae cumque fugiat optio!</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <!-- uses .block-12 -->
              <div class="block-12">
                <figure>
                  <img src="images/img_1.jpg" alt="Image" class="img-fluid">
                </figure>
                <div class="text">
                  <span class="meta">May 20th 2018</span>
                  <div class="text-inner">
                    <h2 class="heading mb-3"><a href="#" class="text-black">World Cup Championship</a></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad culpa, consectetur! Eligendi illo, repellat repudiandae cumque fugiat optio!</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="item">
              <div class="block-12">
                <figure>
                  <img src="images/img_2.jpg" alt="Image" class="img-fluid">
                </figure>
                <div class="text">
                  <span class="meta">May 20th 2018</span>
                  <div class="text-inner">
                    <h2 class="heading mb-3"><a href="#" class="text-black">World Cup Championship</a></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad culpa, consectetur! Eligendi illo, repellat repudiandae cumque fugiat optio!</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="item">
              <div class="block-12">
                <figure>
                  <img src="images/img_3.jpg" alt="Image" class="img-fluid">
                </figure>
                <div class="text">
                  <span class="meta">May 20th 2018</span>
                  <div class="text-inner">
                    <h2 class="heading mb-3"><a href="#" class="text-black">World Cup Championship</a></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad culpa, consectetur! Eligendi illo, repellat repudiandae cumque fugiat optio!</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="item">
              <div class="block-12">
                <figure>
                  <img src="images/img_4.jpg" alt="Image" class="img-fluid">
                </figure>
                <div class="text">
                  <span class="meta">May 20th 2018</span>
                  <div class="text-inner">
                    <h2 class="heading mb-3"><a href="#" class="text-black">World Cup Championship</a></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad culpa, consectetur! Eligendi illo, repellat repudiandae cumque fugiat optio!</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <!-- uses .block-12 -->
              <div class="block-12">
                <figure>
                  <img src="images/img_1.jpg" alt="Image" class="img-fluid">
                </figure>
                <div class="text">
                  <span class="meta">May 20th 2018</span>
                  <div class="text-inner">
                    <h2 class="heading mb-3"><a href="#" class="text-black">World Cup Championship</a></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad culpa, consectetur! Eligendi illo, repellat repudiandae cumque fugiat optio!</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="item">
              <div class="block-12">
                <figure>
                  <img src="images/img_2.jpg" alt="Image" class="img-fluid">
                </figure>
                <div class="text">
                  <span class="meta">May 20th 2018</span>
                  <div class="text-inner">
                    <h2 class="heading mb-3"><a href="#" class="text-black">World Cup Championship</a></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad culpa, consectetur! Eligendi illo, repellat repudiandae cumque fugiat optio!</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="item">
              <div class="block-12">
                <figure>
                  <img src="images/img_3.jpg" alt="Image" class="img-fluid">
                </figure>
                <div class="text">
                  <span class="meta">May 20th 2018</span>
                  <div class="text-inner">
                    <h2 class="heading mb-3"><a href="#" class="text-black">World Cup Championship</a></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad culpa, consectetur! Eligendi illo, repellat repudiandae cumque fugiat optio!</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="item">
              <div class="block-12">
                <figure>
                  <img src="images/img_4.jpg" alt="Image" class="img-fluid">
                </figure>
                <div class="text">
                  <span class="meta">May 20th 2018</span>
                  <div class="text-inner">
                    <h2 class="heading mb-3"><a href="#" class="text-black">World Cup Championship</a></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad culpa, consectetur! Eligendi illo, repellat repudiandae cumque fugiat optio!</p>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

    </div>

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12 text-center">
            <h2 class="text-black">Latest News</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4">
            <div class="post-entry">
              <div class="image">
                <img src="images/img_1.jpg" alt="Image" class="img-fluid">
              </div>
              <div class="text p-4">
                <h2 class="h5 text-black"><a href="#">RealMad vs Striker Who Will Win?</a></h2>
                <span class="text-uppercase date d-block mb-3"><small>By Colorlib &bullet; Sep 25, 2018</small></span>
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat beatae doloremque, ex corrupti perspiciatis.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="post-entry">
              <div class="image">
                <img src="images/img_2.jpg" alt="Image" class="img-fluid">
              </div>
              <div class="text p-4">
                <h2 class="h5 text-black"><a href="#">RealMad vs Striker Who Will Win?</a></h2>
                <span class="text-uppercase date d-block mb-3"><small>By Colorlib &bullet; Sep 25, 2018</small></span>
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat beatae doloremque, ex corrupti perspiciatis.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="post-entry">
              <div class="image">
                <img src="images/img_3.jpg" alt="Image" class="img-fluid">
              </div>
              <div class="text p-4">
                <h2 class="h5 text-black"><a href="#">RealMad vs Striker Who Will Win?</a></h2>
                <span class="text-uppercase date d-block mb-3"><small>By Colorlib &bullet; Sep 25, 2018</small></span>
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat beatae doloremque, ex corrupti perspiciatis.</p>
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