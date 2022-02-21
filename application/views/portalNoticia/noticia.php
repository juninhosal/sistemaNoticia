<!DOCTYPE html>
<html lang="zxx">
<head>
	<!-- Required meta tags -->
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>World Time</title>

	<!-- plugin css for this page -->
	<link rel="stylesheet" href="<?= PATH_VENDORS . 'aos/dist/aos.css/aos.css' . VERSION_EXT; ?>" />

	<!-- plugin css for this page -->
	<link
		rel="stylesheet"
		href="<?= PATH_VENDORS . 'mdi/css/materialdesignicons.min.css' . VERSION_EXT; ?>"
	/>
	<link rel="stylesheet" href="<?= PATH_VENDORS . 'aos/dist/aos.css/aos.css' . VERSION_EXT; ?>" />

	<!-- End plugin css for this page -->
	<link rel="shortcut icon" href="<?= PATH_IMG . 'favicon.png' . VERSION_EXT; ?>" />

	<!-- inject:css -->
	<link rel="stylesheet" href="<?= PATH_CSS . 'style.css' . VERSION_EXT; ?>">
	<!-- endinject -->

	<!-- fontawesome -->
	<link href="<?= PATH_FONTAWESOME . 'css/all.css' . VERSION_EXT; ?>" rel="stylesheet">
	<script src="<?= PATH_FONTAWESOME . 'js/all.js' . VERSION_EXT; ?>"></script>

</head>

<body>
<div class="container-scroller">
	<div class="main-panel">
		<!-- partial:partials/_navbar.html -->
		<header id="header">
			<div class="container">
				<nav class="navbar navbar-expand-lg navbar-light">
					<div class="navbar-top">
						<div class="d-flex justify-content-between align-items-center">
							<ul class="navbar-top-left-menu">
							</ul>
							<ul class="navbar-top-right-menu">
								<li class="nav-item">
									<a href="<?= site_url("Login")?>" class="nav-link">Login</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="navbar-bottom">
						<div class="d-flex justify-content-between align-items-center">
							<div>
								<a class="navbar-brand" href="<?= site_url("PortalNoticia")?>"
								><img src="assets/images/logo.svg" alt="World Time"
									/></a>
							</div>
							<div>
								<button
									class="navbar-toggler"
									type="button"
									data-target="#navbarSupportedContent"
									aria-controls="navbarSupportedContent"
									aria-expanded="false"
									aria-label="Toggle navigation"
								>
									<span class="navbar-toggler-icon"></span>
								</button>
								<div
									class="navbar-collapse justify-content-center collapse"
									id="navbarSupportedContent"
								>
									<ul
										class="navbar-nav d-lg-flex justify-content-between align-items-center"
									>
										<li>
											<button class="navbar-close">
												<i class="mdi mdi-close"></i>
											</button>
										</li>
										<li class="nav-item active">
											<a class="nav-link" href="<?= site_url("PortalNoticia")?>">Home</a>
										</li>
										<?php foreach ($ultimasCategorias AS $item){ ?>
											<li class="nav-item">
												<a class="nav-link" href="pages/magazine.html"><?= $item['nomeCategoria'] ?></a>
											</li>
										<?php }?>
									</ul>
								</div>
							</div>
							<ul class="social-media">
								<li>
									<a href="https://br.linkedin.com/company/easyworkoutsourcing">
										<i class="mdi mdi-linkedin"></i>
									</a>
								</li>
								<li>
									<a href="">
										<i class="mdi mdi-youtube"></i>
									</a>
								</li>
								<li>
									<a href="">
										<i class="mdi mdi-twitter"></i>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</nav>
			</div>
		</header>

		<!-- partial -->
		<div class="flash-news-banner">
			<div class="container">
				<div class="d-lg-flex align-items-center justify-content-between">
					<div class="d-flex align-items-center">
						<span class="badge badge-dark mr-3">Flash news</span>
						<p class="mb-0">
							Lorem Ipsum has been the industry's standard dummy text ever
							since the 1500s.
						</p>
					</div>
					<div class="d-flex">
						<span class="mr-3 text-danger"><?= agoraDateTimeBr()  ?></span>
					</div>
				</div>
			</div>
		</div>
		<div class="content-wrapper">
			<div class="container">
				<div class="row" data-aos="fade-up">
					<div class="col-lg-3 stretch-card grid-margin">
						<div class="card">
							<div class="card-body">
								<h2>Category</h2>
								<ul class="vertical-menu">
									<?php foreach ($categoria AS $item){ ?>
									<li><a href="#"><?= $item['nomeCategoria'] ?></a></li>
									<?php }?>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-9 stretch-card grid-margin">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-sm-4 grid-margin">
										<div class="position-relative">
											<div class="rotate-img">
												<img
													src="assets/images/dashboard/home_4.jpg"
													alt="thumb"
													class="img-fluid"
												/>
											</div>
											<div class="badge-positioned">
                            <span class="badge badge-danger font-weight-bold"
							>Flash news</span
							>
											</div>
										</div>
									</div>
									<div class="col-sm-8  grid-margin">
										<h2 class="mb-2 font-weight-600">
											South Korea’s Moon Jae-in sworn in vowing to address
											North
										</h2>
										<p class="mb-0">
											Lorem Ipsum has been the industry's standard dummy
											text ever since the 1500s, when an
										</p>
									</div>
								</div>

								<div class="row">
									<div class="col-sm-4 grid-margin">
										<div class="position-relative">
											<div class="rotate-img">
												<img
													src="assets/images/dashboard/home_5.jpg"
													alt="thumb"
													class="img-fluid"
												/>
											</div>
											<div class="badge-positioned">
                            <span class="badge badge-danger font-weight-bold"
							>Flash news</span
							>
											</div>
										</div>
									</div>
									<div class="col-sm-8  grid-margin">
										<h2 class="mb-2 font-weight-600">
											No charges over 2017 Conservative battle bus cases
										</h2>
										<p class="mb-0">
											Lorem Ipsum has been the industry's standard dummy
											text ever since the 1500s, when an
										</p>
									</div>
								</div>

								<div class="row">
									<div class="col-sm-4">
										<div class="position-relative">
											<div class="rotate-img">
												<img
													src="assets/images/dashboard/home_6.jpg"
													alt="thumb"
													class="img-fluid"
												/>
											</div>
											<div class="badge-positioned">
                            <span class="badge badge-danger font-weight-bold"
							>Flash news</span
							>
											</div>
										</div>
									</div>
									<div class="col-sm-8">
										<h2 class="mb-2 font-weight-600">
											Kaine: Trump Jr. may have committed treason
										</h2>
										<p class="mb-0">
											Lorem Ipsum has been the industry's standard dummy
											text ever since the 1500s, when an
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- main-panel ends -->
		<!-- container-scroller ends -->

		<!-- partial:partials/_footer.html -->
		<footer>
			<div class="footer-top">
				<div class="container">
					<div class="row">
						<div class="col-sm-5">
							<img src="assets/images/logo.svg" class="footer-logo" alt="" />
							<h5 class="font-weight-normal mt-4 mb-5">

							</h5>
							<ul class="social-media mb-3">
								<li>
									<a href="https://br.linkedin.com/company/easyworkoutsourcing">
										<i class="mdi mdi-linkedin"></i>
									</a>
								</li>
								<li>
									<a href="">
										<i class="mdi mdi-twitch"></i>
									</a>
								</li>
								<li>
									<a href="">
										<i class="mdi mdi-facebook"></i>
									</a>
								</li>
							</ul>
						</div>
						<div class="col-sm-4">
							<h3 class="font-weight-bold mb-3">RECENT POSTS</h3>
							<div class="row">
								<div class="col-sm-12">
									<div class="footer-border-bottom pb-2">
										<div class="row">
											<div class="col-3">
												<img
													src="assets/images/dashboard/home_1.jpg"
													alt="thumb"
													class="img-fluid"
												/>
											</div>
											<div class="col-9">
												<h5 class="font-weight-600">
													Cotton import from USA to soar was American traders
													predict
												</h5>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="footer-border-bottom pb-2 pt-2">
										<div class="row">
											<div class="col-3">
												<img
													src="assets/images/dashboard/home_2.jpg"
													alt="thumb"
													class="img-fluid"
												/>
											</div>
											<div class="col-9">
												<h5 class="font-weight-600">
													Cotton import from USA to soar was American traders
													predict
												</h5>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div>
										<div class="row">
											<div class="col-3">
												<img
													src="assets/images/dashboard/home_3.jpg"
													alt="thumb"
													class="img-fluid"
												/>
											</div>
											<div class="col-9">
												<h5 class="font-weight-600 mb-3">
													Cotton import from USA to soar was American traders
													predict
												</h5>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<h3 class="font-weight-bold mb-3">CATEGORIES</h3>
							<?php foreach ($ultimasCategorias AS $item){ ?>
								<div class="footer-border-bottom pb-2">
									<div class="d-flex justify-content-between align-items-center">
										<h5 class="mb-0 font-weight-600"><?= $item['nomeCategoria'] ?></h5>
									</div>
								</div>
							<?php }?>
						</div>
					</div>
				</div>
			</div>
		</footer>

		<!-- partial -->
	</div>
</div>
<!-- inject:js -->
<script src="<?= PATH_VENDORS . 'js/vendor.bundle.base.js' . VERSION_EXT; ?>"></script>
<!-- endinject -->
<!-- plugin js for this page -->
<script src="<?= PATH_VENDORS . 'aos/dist/aos.js/aos.js' . VERSION_EXT; ?>"></script>
<!-- End plugin js for this page -->
<!-- Custom js for this page-->
<script src="<?= PATH_JS . 'demo.js' . VERSION_EXT; ?>"></script>
<!-- End custom js for this page-->

</body>
</html>
