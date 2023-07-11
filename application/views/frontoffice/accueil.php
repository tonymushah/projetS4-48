<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>Users / Profile - NiceUser Bootstrap Template</title>
	<meta content="" name="description">
	<meta content="" name="keywords">

	<!-- Favicons -->
	<link href="<?php echo site_url('assets/img/favicon.png'); ?>" rel="icon">
	<link href="<?php echo site_url('assets/img/apple-touch-icon.png'); ?>" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link href="https://fonts.gstatic.com" rel="preconnect">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="<?php echo site_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo site_url('assets/vendor/bootstrap-icons/bootstrap-icons.css'); ?>" rel="stylesheet">
	<link href="<?php echo site_url('assets/vendor/boxicons/css/boxicons.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo site_url('assets/vendor/quill/quill.snow.css'); ?>" rel="stylesheet">
	<link href="<?php echo site_url('assets/vendor/quill/quill.bubble.css'); ?>" rel="stylesheet">
	<link href="<?php echo site_url('assets/vendor/remixicon/remixicon.css'); ?>" rel="stylesheet">
	<link href="<?php echo site_url('assets/vendor/simple-datatables/style.css'); ?>" rel="stylesheet">

	<link href="<?php echo site_url('assets/css/style.css'); ?>" rel="stylesheet">

</head>

<body>

	<!-- ======= Header ======= -->
	<header id="header" class="header fixed-top d-flex align-items-center">

		<div class="d-flex align-items-center justify-content-between">
			<a href="#" class="logo d-flex align-items-center">
				<img src="<?php echo site_url('assets/img/logo.png'); ?>" alt="">
				<span class="d-none d-lg-block">NiceUser</span>
			</a>
			<i class="bi bi-list toggle-sidebar-btn"></i>
		</div><!-- End Logo -->

		<nav class="header-nav ms-auto">
			<ul class="d-flex align-items-center">

				<li class="nav-item dropdown pe-3">

					<a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
						<img src="<?php echo site_url('assets/img/profile-img.jpg'); ?>" alt="Profile" class="rounded-circle">
						<span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
					</a><!-- End Profile Iamge Icon -->

					<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
						<li class="dropdown-header">
							<h6>Kevin Anderson</h6>
							<span>Web Designer</span>
						</li>
						<li>
							<hr class="dropdown-divider">
						</li>

						<li>
							<a class="dropdown-item d-flex align-items-center" href="<?php echo site_url('index.php/Auth/logout'); ?>">
								<i class="bi bi-box-arrow-right"></i>
								<span>Sign Out</span>
							</a>
						</li>

					</ul><!-- End Profile Dropdown Items -->
				</li><!-- End Profile Nav -->

			</ul>
		</nav><!-- End Icons Navigation -->

	</header><!-- End Header -->
	<!-- ======= Header ======= -->
	<main id="main" class="main">
		<section class="section profile">
			<div class="row">
				<div class="col-xl-4">
					<div class="card">
						<div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

							<img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
							<h2><?php echo $user_data->nom; ?></h2>
							<?php
							if (!isset($current_program)) {
							?>
								<div class="alert alert-info">
									<h4 class="p-3">Vous n'avez pas de programme en cours</h4>
									<a type="button" href="<?php echo base_url("index.php/Profil/select_program"); ?>" class="btn btn-primary">Selectionner un programme</a>
								</div>
							<?php
							}
							?>
						</div>
					</div>
				</div>

				<div class="col-xl-8">
					<div class="card">
						<div class="card-body pt-3">
							<!-- Bordered Tabs -->
							<ul class="nav nav-tabs nav-tabs-bordered">

								<li class="nav-item">
									<button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Profil</button>
								</li>
								<?php
								if (isset($current_program)) {
								?>
									<li class="nav-item">
										<button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Régime</button>
									</li>

									<li class="nav-item">
										<button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Activités sportifs</button>
									</li>
								<?php
								}
								?>
							</ul>
							<div class="tab-content pt-2">

								<div class="tab-pane fade show active profile-overview" id="profile-overview">
									<h5 class="card-title">Statistique</h5>

									<div class="row">
										<div class="col-lg-3 col-md-4 label ">Nom</div>
										<div class="col-lg-9 col-md-8"> <?php echo $user_data->nom; ?></div>
										<div class="col-lg-9 col-md-8"> <?php echo $user_data->nom; ?> </div>
									</div>
									<div class="row">
										<div class="col-lg-3 col-md-4 label ">Poids</div>
										<div class="col-lg-9 col-md-8"><?php echo $user_data->poids; ?> </div>
									</div>
									<div class="row">
										<div class="col-lg-3 col-md-4 label ">Taille</div>
										<div class="col-lg-9 col-md-8"> <?php echo $user_data->taille; ?> </div>
									</div>

								</div>
								<?php
								if (isset($current_program)) {
								?>
									<div class="tab-pane fade profile-edit pt-3" id="profile-edit">
										<p>zaefdfjjnkj</p>
									</div>

									<div class="tab-pane fade pt-3" id="profile-settings">
										<p>activite</p>

									</div>
								<?php
								}
								?>
							</div>

						</div>

					</div>

				</div>

				<form action="<?php echo site_url('index.php/Programme/code'); ?>" method="post">
					<div class="center" style="display: flex;justify-content: space-around;">
						<div class="gauche">
							<p>Ajouter les codes encore disponibles</p>
							<p><?php echo isset($erreur) ? $erreur : ''; ?></p>
							<p><input type="text" name="code" id="code"></p>
							<p><input type="submit" value="Valider"></p>
						</div>
						<div class="droite">
							<p>Listes des codes presents</p>
							<p><?php echo isset($erreur) ? $erreur : ''; ?></p>
							<?php for ($i = 0; $i < count($code); $i++) { ?>
								<p><?php echo $code[$i]['idcode']; ?></p>
							<?php } ?>
						</div>
					</div>
				</form>
		</section>
	</main>

	<footer id="footer" class="footer">
		<div class="copyright">
			&copy; Copyright <strong><span>NiceUser</span></strong>. All Rights Reserved
		</div>
		<div class="credits">

			Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
		</div>
	</footer>

	<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

	<script src="<?php echo site_url('assets/vendor/apexcharts/apexcharts.min.js'); ?>"></script>
	<script src="<?php echo site_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
	<script src="<?php echo site_url('assets/vendor/chart.js/chart.umd.js'); ?>"></script>
	<script src="<?php echo site_url('assets/vendor/echarts/echarts.min.js'); ?>"></script>
	<script src="<?php echo site_url('assets/vendor/quill/quill.min.js'); ?>"></script>
	<script src="<?php echo site_url('assets/vendor/simple-datatables/simple-datatables.js'); ?>"></script>
	<script src="<?php echo site_url('assets/vendor/tinymce/tinymce.min.js'); ?>"></script>
	<script src="<?php echo site_url('assets/vendor/php-email-form/validate.js'); ?>"></script>

	<!-- Template Main JS File -->
	<script src="<?php echo site_url('assets/js/main.js'); ?>"></script>

</body>

</html>
