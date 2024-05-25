<?php

include 'include/config.inc.php';

$page_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($page_id > 0) {
    $pages = my_query("SELECT * FROM paginas WHERE id = $page_id");
} else {
    header('Location: 404.php');
    exit;
}
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
	<title>Notícias</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="img/logo.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
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
		<div class="main-menu-wrap">
			<div class="site-logo" style="margin-left: 7rem; padding-top: 0px">
				<a href="index.php">
					<img src="img/logo.png" alt="" style="width: 70px; height: auto">
				</a>
			</div>
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
						<p>Leia os Detalhes</p>
						<h1>Notícia</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- single article section -->
    <div class="mt-150 mb-150">
        <div class="container">
            <div class="row">
                <?php foreach ($pages as $page): ?>
                    <div class="col-lg-8">
                        <div class="single-article-section">
                            <div class="single-article-text">
                                <div>
                                    <img class="single-artcile-bg" src="uploads/<?= $page['imagem'] ?>" alt="">
                                </div>
                                <h2><?= $page['titulo'] ?></h2>
                                <p><?= $page['texto'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
	<!-- end single article section -->

	<!-- footer -->
	<?php
	include 'include/carousel.inc.php';
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