<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="<?= PATH_FONTSLOGIN . 'icomoon/style.css' . VERSION_EXT; ?>" />


	<link rel="stylesheet" href="<?= PATH_CSSLOGIN . 'owl.carousel.min.css' . VERSION_EXT; ?>">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?= PATH_CSSLOGIN . 'bootstrap.min.css' . VERSION_EXT; ?>">

	<!-- Style -->
	<link rel="stylesheet" href="<?= PATH_CSSLOGIN . 'style.css' . VERSION_EXT; ?>">

	<title>Login #7</title>
</head>
<body>



<div class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<img src="<?= PATH_IMGLOGIN . 'undraw_remotely_2j6y.svg' . VERSION_EXT; ?>" alt="Image" class="img-fluid">
			</div>
			<div class="col-md-6 contents">
				<div class="row justify-content-center">
					<div class="col-md-8">
						<div class="mb-4">
							<h3>Sign In</h3>
							<p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p>
						</div>
						<form action="<?= site_url('Login/logar/') ?>" method="post">
							<div class="form-group first">
								<label for="username">Username</label>
								<input type="text" class="form-control" id="username" name="username">

							</div>
							<div class="form-group last mb-4">
								<label for="password">Password</label>
								<input type="password" class="form-control" id="password" name="password">

							</div>

							<?php if (!empty($_SESSION['login'])) { ?>
								<div class="alert alert-<?= $_SESSION['login']['tipo'] ?>" role="alert" style="text-align: center">
									<?php echo $_SESSION['login']['msg']; ?>
								</div>
							<?php } ?>

<!--							<div class="d-flex mb-5 align-items-center">-->
<!--								<label class="control control--checkbox mb-0"><span class="caption">Remember me</span>-->
<!--									<input type="checkbox" checked="checked"/>-->
<!--									<div class="control__indicator"></div>-->
<!--								</label>-->
<!--								<span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>-->
<!--							</div>-->

							<input type="submit" value="Log In" class="btn btn-block btn-primary">

						</form>
					</div>
				</div>

			</div>

		</div>
	</div>
</div>


<script src="<?= PATH_JSLOGIN . 'jquery-3.3.1.min.js' . VERSION_EXT; ?>"></script>
<script src="<?= PATH_JSLOGIN . 'popper.min.js' . VERSION_EXT; ?>"></script>
<script src="<?= PATH_JSLOGIN . 'bootstrap.min.js' . VERSION_EXT; ?>"></script>
<script src="<?= PATH_JSLOGIN . 'main.js' . VERSION_EXT; ?>"></script>
</body>
</html>
