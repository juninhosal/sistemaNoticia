<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= isset($title) ? $title : ''?></title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="<?= PATH_ADMINLET . 'plugins/fontawesome-free/css/all.min.css' . VERSION_EXT; ?>">
	<!-- jQuery -->
	<script src="<?= PATH_ADMINLET . 'plugins/jquery/jquery.min.js' . VERSION_EXT; ?>"></script>
	<!-- Bootstrap 4 -->
	<script src="<?= PATH_ADMINLET . 'plugins/bootstrap/js/bootstrap.bundle.min.js' . VERSION_EXT; ?>"></script>
	<!-- Select2 -->
	<link rel="stylesheet" href="<?= PATH_ADMINLET . 'plugins/select2/css/select2.min.css' . VERSION_EXT; ?>">
	<link rel="stylesheet" href="<?= PATH_ADMINLET . 'plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css' . VERSION_EXT; ?>">
	<!-- Bootstrap4 Duallistbox -->
	<link rel="stylesheet" href="<?= PATH_ADMINLET . 'plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css' . VERSION_EXT; ?>">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?= PATH_ADMINLET . 'plugins/datatables-bs4/css/dataTables.bootstrap4.min.css' . VERSION_EXT; ?>">
	<link rel="stylesheet" href="<?= PATH_ADMINLET . 'plugins/datatables-responsive/css/responsive.bootstrap4.min.css' . VERSION_EXT; ?>">
	<link rel="stylesheet" href="<?= PATH_ADMINLET . 'plugins/datatables-buttons/css/buttons.bootstrap4.min.css' . VERSION_EXT; ?>">

	<!-- DataTables  & Plugins -->
	<script src="<?= PATH_ADMINLET . 'plugins/datatables/jquery.dataTables.min.js' . VERSION_EXT; ?>"></script>
	<script src="<?= PATH_ADMINLET . 'plugins/datatables-bs4/js/dataTables.bootstrap4.min.js' . VERSION_EXT; ?>"></script>
	<script src="<?= PATH_ADMINLET . 'plugins/datatables-responsive/js/dataTables.responsive.min.js' . VERSION_EXT; ?>"></script>
	<script src="<?= PATH_ADMINLET . 'plugins/datatables-responsive/js/responsive.bootstrap4.min.js' . VERSION_EXT; ?>"></script>
	<script src="<?= PATH_ADMINLET . 'plugins/datatables-buttons/js/dataTables.buttons.min.js' . VERSION_EXT; ?>"></script>
	<script src="<?= PATH_ADMINLET . 'plugins/datatables-buttons/js/buttons.bootstrap4.min.js' . VERSION_EXT; ?>"></script>
	<script src="<?= PATH_ADMINLET . 'plugins/jszip/jszip.min.js' . VERSION_EXT; ?>"></script>
	<script src="<?= PATH_ADMINLET . 'plugins/pdfmake/pdfmake.min.js' . VERSION_EXT; ?>"></script>
	<script src="<?= PATH_ADMINLET . 'plugins/pdfmake/vfs_fonts.js' . VERSION_EXT; ?>"></script>
	<script src="<?= PATH_ADMINLET . 'plugins/datatables-buttons/js/buttons.html5.min.js' . VERSION_EXT; ?>"></script>
	<script src="<?= PATH_ADMINLET . 'plugins/datatables-buttons/js/buttons.print.min.js' . VERSION_EXT; ?>"></script>
	<script src="<?= PATH_ADMINLET . 'plugins/datatables-buttons/js/buttons.colVis.min.js' . VERSION_EXT; ?>"></script>
	<!-- Requisições Ajax -->
	<script src="<?= PATH_ADMINLET . 'ajax.js' . VERSION_EXT; ?>"></script>
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= PATH_ADMINLET . 'dist/css/adminlte.min.css' . VERSION_EXT; ?>">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

	<!-- Preloader -->
	<div class="preloader flex-column justify-content-center align-items-center">
		<img class="animation__wobble" src="<?= PATH_ADMINLET . 'dist/img/AdminLTELogo.png' . VERSION_EXT; ?>" alt="AdminLTELogo" height="60" width="60">
	</div>

	<!-- Navbar -->
	<nav class="main-header navbar navbar-expand navbar-dark">
		<!-- Left navbar links -->
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-arrow-left"></i></a>
			</li>
			<li class="nav-item d-none d-sm-inline-block">
				<a href="<?= site_url('Categoria'); ?>" class="nav-link">Home</a>
			</li>
		</ul>

		<!-- Right navbar links -->
		<ul class="navbar-nav ml-auto">
			<!-- Notifications Dropdown Menu -->
			<li class="nav-item dropdown">
				<a class="nav-link" data-toggle="dropdown" href="#">
					<i class="fas fa-bars"></i>
				</a>

				<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
					<div class="dropdown-divider"></div>
					<a href="<?= site_url('Login/deslogar'); ?>" class="dropdown-item">
						<i class="fas fa-door-open mr-2"></i> Logout
					</a>
					<div class="dropdown-divider"></div>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-widget="fullscreen" href="#" role="button">
					<i class="fas fa-expand-arrows-alt"></i>
				</a>
			</li>
		</ul>
	</nav>
	<!-- /.navbar -->

	<!-- Main Sidebar Container -->
	<aside class="main-sidebar sidebar-dark-primary elevation-4">
		<!-- Brand Logo -->
		<a href="index3.html" class="brand-link">
			<img src="<?= PATH_ADMINLET . 'dist/img/AdminLTELogo.png' . VERSION_EXT; ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
			<span class="brand-text font-weight-light">Administração</span>
		</a>

		<!-- Sidebar -->
		<div class="sidebar">

			<!-- Sidebar Menu -->
			<nav class="mt-2">
				<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
					<!-- Add icons to the links using the .nav-icon class
						 with font-awesome or any other icon font library -->
					<li class="treeview nav-item">
						<a href="#" class="nav-link ">
							<i class="nav-icon fas fa-edit"></i>
							<p>
								Cadastros
								<i class="fas fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="<?= site_url('Categoria') ?>" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>Categoria</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?= site_url('Noticia') ?>" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>Notícia</p>
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</nav>
			<!-- /.sidebar-menu -->
		</div>
		<!-- /.sidebar -->
	</aside>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
							<h1 class="m-0"><?= isset($title) ? $title : ''?></h1>
					</div>
					<!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active"><?= isset($title) ? $title : ''?></li>
						</ol>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->

		<!-- Main content -->
		<?php if (!empty($retorno['msg'])) { ?>
			<div class="alert alert-<?= $retorno['msg']['class'] ?>" role="alert" style="text-align: center">
				<?php echo $retorno['msg']['msg']; ?>
			</div>
		<?php } ?>

		<section class="content">
			<div class="container-fluid">
				<!-- Info boxes -->

					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-tools">
										<button type="button" class="btn btn-tool" data-card-widget="collapse">
											<i class="fas fa-minus"></i>
										</button>
									</div>
								</div>
								<!-- /.card-header -->
								<section class="content">
									<div class="container-fluid">
										<div class="card-body">
											<div class="row">
												<div class="col-12">
													<div class="card">
														<div class="card-body">
															<p><?= !empty($contents) ? $contents : ''; ?></p>
														</div>
													</div>
												</div>
											</div>
											<!-- /.row -->
										</div>
									</div>
								</section>
								<!-- ./card-body -->
								<!-- /.card-footer -->
							</div>
							<!-- /.card -->
						</div>
						<!-- /.col -->
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
			</div><!--/. container-fluid -->
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

	<!-- Control Sidebar -->
	<aside class="control-sidebar control-sidebar-dark">
		<!-- Control sidebar content goes here -->
	</aside>
	<!-- /.control-sidebar -->

	<!-- Main Footer -->
</div>
<!-- ./wrapper -->
<!-- AdminLTE App -->
<script src="<?= PATH_ADMINLET . 'dist/js/adminlte.min.js' . VERSION_EXT; ?>"></script>
<script src="<?= PATH_ADMINLET . 'sweetalert2@11.js' . VERSION_EXT; ?>"></script>
<!-- Select2 -->
<script src="<?= PATH_ADMINLET . 'plugins/select2/js/select2.full.min.js' . VERSION_EXT; ?>"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?= PATH_ADMINLET . 'plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js' . VERSION_EXT; ?>"></script>
<!-- AdminLTE for demo purposes -->
<!--<script src="--><?//= PATH_ADMINLET . 'dist/js/demo.js' . VERSION_EXT; ?><!--"></script>-->
</body>
</html>

<script>
	$(document).ready(function(){
		$('.treeview ul.treeview-menu li.nav-item a.nav-link').each(function(index){
			if(window.location.href === $(this).attr('href')){
				$(this).parents('li').addClass('active');
				$(this).parents('a').addClass('active');
			}
		})
	});
	$(function () {
		//Initialize Select2 Elements
		$('.select2').select2()
	})
</script>
