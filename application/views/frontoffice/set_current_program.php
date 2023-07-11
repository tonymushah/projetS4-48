duree_jouridDetails
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
				<img src="assets/img/logo.png" alt="">
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

	<!-- ======= Sidebar ======= -->
	<aside id="sidebar" class="sidebar">

		<ul class="sidebar-nav" id="sidebar-nav">

			<li class="nav-heading">Pages</li>

			<li class="nav-item">
				<a class="nav-link " href="users-profile.html">
					<i class="bi bi-person"></i>
					<span>Profile</span>
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link collapsed" href="pages-contact.html">
					<i class="bi bi-envelope"></i>
					<span>Contact</span>
				</a>
			</li><!-- End Contact Page Nav -->

		</ul>

	</aside><!-- End Sidebar-->

	<main id="main" class="main">
		<script>
			let regimes = <?php
							echo json_encode($all_programs);
							?>;

			function change_prix_duree(id) {
				try {
					let prog = regimes.find((v) => v.iddetails == id);
					document.getElementById("prix").innerText = prog.prix;
					document.getElementById("durree").innerText = prog.duree_jour;
				} catch (error) {
					document.getElementById("prix").innerText = "?";
					document.getElementById("durree").innerText = "?";
				}
			}
		</script>
		<div class="container">
			<div class="row">
				<h2>
					Selectionner ce qui est adapteee a votre niveau
				</h2>

			</div>
			<div class="row">
				<form action='<?php echo site_url("index.php/profil/validate_program_selection");?>' method="POST">
					<div class="form-floating mb-3">
						<select name="program" class="form-select" id="floatingSelect" aria-label="Floating label select example">
							<option selected value="-1"></option>Veuillez choisir</option>
							<?php
								foreach ($all_programs as $key => $value) {
							?>
									<option onclick='change_prix_duree(<?php echo $value->iddetails;?>)' value='<?php echo $value->iddetails;?>'>
										<?php echo $value->nom;?>
									</option>
							<?php
								}
							?>
						</select>
						<label for="floatingSelect">Selectionnez !</label>
					</div>
					<div class="form-floating mb-3">
						<h4>Prix : <span id="prix">?</span></h4>
					</div>
					<div class="form-floating mb-3">
						<h4>Duree : <span id="durree">?</span> jour</h4>
					</div>
					<div class="form-floating mb-3">
						<div class="col-sm-10">
							<button type="submit" class="btn btn-primary">Valider</button>
						</div>
					</div>

				</form>

			</div>
		</div>

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
