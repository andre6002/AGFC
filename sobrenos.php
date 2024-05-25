<?php
include 'include/config.inc.php';
add_log('sobrenos', 'visita');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description"
		content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Sobre Nós</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="img/logo.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- Font Awesome Icons -->
	<link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css"
		rel="stylesheet">
	<script src="https://kit.fontawesome.com/4454d5d378.js" crossorigin="anonymous"></script>
	<link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
	<!-- fontawesome -->
	<link rel="stylesheet" href="assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="assets/css/responsive.css">

</head>

<body>

	<!--PreLoader-->
	<div class="loader">
		<div class="loader-inner">
			<div class="circle"></div>
		</div>
	</div>
	<!--PreLoader Ends-->

	<!-- header -->
	<div class="top-header-area">
		<div class="site-logo" style="margin-left: 7rem">
			<a href="index.php">
				<img src="img/logo.png" alt="">
			</a>
		</div>
		<div class="main-menu-wrap">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-sm-12 text-center">
						<!-- menu start -->
						<?php
						include 'include/menu.inc.php';
						?>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->


	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Conheça-nos melhor</p>
						<h1>Sobre Nós</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->
	<?php
	$sobrenos = my_query("SELECT * FROM sobrenos WHERE ativo = 1");
	foreach ($sobrenos as $key => $sobrenos) {
		?>

		<section class="pt-100 pb-100" style="background-color: #f5f5f5;">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 col-md-12" style="padding-right: 20px;">
						<div class="section-title">
							<h3><?= $sobrenos['titulo'] ?></h3>
						</div>
						<p style="font-size: 18px"><S></S><?= $sobrenos['paragrafo1'] ?></p>
					</div>
					<div class="col-lg-5 col-md-12">
						<img style="padding-top: 20px" src="uploads/<?= $sobrenos['imagem'] ?>" alt="Logo da Loja" style="max-width: 80%; height: auto;">
					</div>
				</div>
			</div>
		</section>

		<section class="pb-100" style="background-color: #f5f5f5;">
			<div class="container">
				<p style="font-size: 16px"><?= $sobrenos['paragrafo2'] ?></p>
				</p>
			</div>
		</section>

		<section class="pb-100" style="background-color: #f5f5f5;">
			<div class="container">
				<div class="section-title">
					<h3><?= $sobrenos['subtitulo'] ?></h3>
				</div>
				<p style="font-size: 16px"><?= $sobrenos['paragrafo3'] ?></p>
			</div>
		</section>

		<?php
	}
	?>
	<!-- logo carousel -->
	<?php
	include 'include/carousel.inc.php';
	?>
	<!-- end logo carousel -->

	<!-- footer -->
	<?php
	include 'include/rodape.inc.php';
	?>
	<!-- end footer -->



	<!-- jquery -->
	<script src="assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="assets/js/main.js"></script>

</body>

</html>