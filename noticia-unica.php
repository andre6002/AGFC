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


		<div class="site-blocks-cover overlay mb-5" style="background-image: url(img/bg-stadium.webp); height: 600px"
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

		<div class="container">
			<?php
			$news_id = intval($_GET['id']);
			$news = my_query("SELECT * FROM noticias WHERE id = $news_id ORDER BY data_publicacao DESC LIMIT 3");
			?>
			<div class="row">
				<?php
				foreach ($news as $key => $value) {
					?>
					<div class="col-lg-8">
						<div class="single-article-section">
							<div class="single-article-text">
								<div><img class="single-artcile-bg" src="uploads/<?= $value['imagem'] ?>" alt=""></div>
								<p class="blog-meta">
									<span class="author"><i class="fas fa-user"></i>
										<?= $value['autor'] ?>
									</span>
									<span class="date"><i class="fas fa-calendar"></i>
										<?= date('d/m/Y', strtotime($value['data_publicacao'])) ?>
									</span>
								</p>
								<h2>
									<?= $value['titulo'] ?>
								</h2>
								<p>
									<?= $value['conteudo'] ?>
								</p>
							</div>
						</div>
					</div>
					<?php
				}
				?>
			</div>
		</div>
		<br>
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