<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin / List Person </title>
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
        <img src="<?php echo site_url('assets/img/logo.png');?>" alt="">
        <span class="d-none d-lg-block">NiceAdmin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?php echo site_url('assets/img/apple-touch-icon.png');?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Abinci</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Abinci</h6>
              <span>Site Web</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?php echo site_url('index.php/Auth/logout');?>">
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

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo site_url('index.php/Admin');?>">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-heading">Taches</li>

      <li class="nav-item">
        <a class="nav-link " href="<?php echo site_url('index.php/Admin/list_person');?>">
          <i class="bi bi-people"></i>
          <span>List Person</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo site_url('index.php/Admin/notification');?>">
          <i class="bi bi-envelope"></i>
          <span>Notification</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo site_url('index.php/Admin/list_sakafo');?>">
          <i class="bi bi-grid-fill"></i>
          <span>List des sakafo</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo site_url('index.php/Admin/list_activite');?>">
          <i class="bi bi-award-fill"></i>
          <span>Lists Activities</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo site_url('index.php/Programme/insert_detailsProgramme');?>">
          <i class="bi bi-award-fill"></i>
          <span>Inserer details programme</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo site_url('index.php/Programme/getallDetailsProgramme');?>">
          <i class="bi bi-award-fill"></i>
          <span>Liste details programme</span>
        </a>
      </li>

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

            <div class="col-12">
              <div class="card top-selling overflow-auto">
                <div class="card-body pb-0">
                  <h5 class="card-title">All Details <span>| actually</span></h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Durée en jour</th>
                        <th scope="col">Prix</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php for($i = 0;$i<count($detail) ; $i++){ ?>
                            <tr>
                                <td><?php echo $detail[$i]['nom'];?></td>
                                <td><?php echo $detail[$i]['duree_jour'];?> jours</td>
                                <td class="fw-bold"><?php echo $detail[$i]['prix'];?> Ar</td>
                                <td><a href="<?php echo site_url('index.php/Programme/modiferDetails/'.$detail[$i]['iddetails']) ?>"><button type="button" class="btn btn-success rounded-pill">Modifier</button></a></td>
                            </tr>
                        <?php } ?>                      
                    </tbody>
                  </table>

                </div>

              </div>
            </div>

  </main>

  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
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
  <script src="<?php echo site_url('assets/js/main.js');?>"></script>

</body>

</html>