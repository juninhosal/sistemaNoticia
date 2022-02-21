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
								<li class="nav-item">
									<a href="pages/index-inner.html" class="nav-link">Advertise</a>
								</li>
								<li class="nav-item">
									<a href="pages/aboutus.html" class="nav-link">About</a>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link">Events</a>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link">Write for Us</a>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link">In the Press</a>
								</li>
							</ul>
							<ul class="navbar-top-right-menu">
								<li class="nav-item">
									<a href="#" class="nav-link"><i class="mdi mdi-magnify"></i></a>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link">Login</a>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link">Sign in</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="navbar-bottom">
						<div class="d-flex justify-content-between align-items-center">
							<div>
								<a class="navbar-brand" href="#"
								><img src="assets/images/logo.svg" alt=""
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
											<a class="nav-link" href="index.html">Home</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="pages/magazine.html">MAGAZINE</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="pages/business.html">Business</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="pages/sports.html">Sports</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="pages/art.html">Art</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="pages/politics.html">POLITICS</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="pages/travel.html">Travel</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="pages/contactus.html">Contact</a>
										</li>
									</ul>
								</div>
							</div>
							<ul class="social-media">
								<li>
									<a href="#">
										<i class="mdi mdi-facebook"></i>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="mdi mdi-youtube"></i>
									</a>
								</li>
								<li>
									<a href="#">
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
									<li><a href="#">Politics</a></li>
									<li><a href="#">International</a></li>
									<li><a href="#">Finance</a></li>
									<li><a href="#">Health care</a></li>
									<li><a href="#">Technology</a></li>
									<li><a href="#">Jobs</a></li>
									<li><a href="#">Media</a></li>
									<li><a href="#">Administration</a></li>
									<li><a href="#">Sports</a></li>
									<li><a href="#">Game</a></li>
									<li><a href="#">Art</a></li>
									<li><a href="#">Kids</a></li>
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
										<div class="fs-13 mb-2">
											<span class="mr-2">Photo </span>10 Minutes ago
										</div>
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
										<div class="fs-13 mb-2">
											<span class="mr-2">Photo </span>10 Minutes ago
										</div>
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
										<div class="fs-13 mb-2">
											<span class="mr-2">Photo </span>10 Minutes ago
										</div>
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
								Newspaper is your news, entertainment, music fashion website. We
								provide you with the latest breaking news and videos straight from
								the entertainment industry.
							</h5>
							<ul class="social-media mb-3">
								<li>
									<a href="#">
										<i class="mdi mdi-facebook"></i>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="mdi mdi-youtube"></i>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="mdi mdi-twitter"></i>
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
							<div class="footer-border-bottom pb-2">
								<div class="d-flex justify-content-between align-items-center">
									<h5 class="mb-0 font-weight-600">Magazine</h5>
									<div class="count">1</div>
								</div>
							</div>
							<div class="footer-border-bottom pb-2 pt-2">
								<div class="d-flex justify-content-between align-items-center">
									<h5 class="mb-0 font-weight-600">Business</h5>
									<div class="count">1</div>
								</div>
							</div>
							<div class="footer-border-bottom pb-2 pt-2">
								<div class="d-flex justify-content-between align-items-center">
									<h5 class="mb-0 font-weight-600">Sports</h5>
									<div class="count">1</div>
								</div>
							</div>
							<div class="footer-border-bottom pb-2 pt-2">
								<div class="d-flex justify-content-between align-items-center">
									<h5 class="mb-0 font-weight-600">Arts</h5>
									<div class="count">1</div>
								</div>
							</div>
							<div class="pt-2">
								<div class="d-flex justify-content-between align-items-center">
									<h5 class="mb-0 font-weight-600">Politics</h5>
									<div class="count">1</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<div class="d-sm-flex justify-content-between align-items-center">
								<div class="fs-14 font-weight-600">
									© 2020 @ <a href="https://www.bootstrapdash.com/" target="_blank" class="text-white"> BootstrapDash</a>. All rights reserved.
								</div>
								<div class="fs-14 font-weight-600">
									Handcrafted by <a href="https://www.bootstrapdash.com/" target="_blank" class="text-white">BootstrapDash</a>
								</div>
							</div>
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
