<?php
include 'include/config.inc.php';
add_log('noticias', 'visita');
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
						<p>Mantenha-se Atualizado</p>
						<h1>Notícias</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- latest news -->
	<div class="latest-news mt-150 mb-150">
		<div class="container">
			<?php

			$page = isset ($_GET['page']) ? intval($_GET['page']) : 1;
			$perPage = 15;
			$offset = ($page - 1) * $perPage;

			$news = my_query("SELECT * FROM noticias ORDER BY data_publicacao DESC LIMIT $offset, $perPage");
			?>
			<div class="row">
				<?php
				foreach ($news as $key => $value) {
					?>

					<div class="col-lg-4 col-md-6">
						<div class="single-latest-news">
							<a href="noticia-unica.php?id=<?= $value['id'] ?>">
								<div><img class="latest-news-img" style="border-radius: 10px 10px 0 0;"
										src="uploads/<?= $value['imagem'] ?>" alt=""></div>
							</a>
							<div class="news-text-box" style="height: 380px !important;">
								<h3><a href="<?= $value['link'] ?>"></a>
									<?= $value['titulo'] ?>
								</h3>
								<p class="blog-meta">
									<span class="Autor"><i class="fas fa-user"></i>
										<?= $value['autor'] ?>
									</span>
									<span class="Data"><i class="fas fa-calendar"></i>
										<?= date('d/m/Y', strtotime($value['data_publicacao'])) ?>
									</span>
								</p>
								<p class="excerpt">
									<?= $value['resumo'] ?>
								</p>
								<a href="noticia-unica.php?id=<?= $value['id'] ?>" class="read-more-btn">ler mais <i
										class="fas fa-angle-right"></i></a>
							</div>
						</div>
					</div>

					<?php
				}
				?>
			</div>
			<?php
			// Consulta para obter o total de registros
			$countQuery = 'SELECT COUNT(*) AS total FROM noticias';
			$totalRows = my_query($countQuery)[0]['total'];
			$totalPages = ceil($totalRows / $perPage);
			?>
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="pagination-wrap">
						<ul>
							<li class="page-item <?php echo ($page <= 1) ? 'disabled' : ''; ?>">
								<a href="?page=<?php echo ($page > 1) ? $page - 1 : 1; ?>" tabindex="-1">
									<i class="fa-solid fa-angle-left"></i>
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
								<a href="?page=<?php echo ($page < $totalPages) ? $page + 1 : $totalPages; ?>">
									<i class="fas fa-angle-right"></i>
									<span class="sr-only">Próximo</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end latest news -->

	<!-- logo carousel simbolos do colegio -->
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