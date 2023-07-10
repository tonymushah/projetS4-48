<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Register - NiceUser Bootstrap Template</title>
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

  <!-- =======================================================
  * Template Name: NiceUser
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">NiceUser</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>

                  <form action="<?php echo site_url('index.php/Auth/process_inscription');?>" method="post" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                    <?php if(isset($errors)) { ?>
                      <div class="col-12">
                        <label style="color:red" for="yourName" class="form-label"><?php echo $errors;?></label>
                      </div>
                    <?php } ?>
                    <div class="col-12">
                      <label for="yourName" class="form-label">Your Name</label>
                      <input type="text" name="name" class="form-control" id="name" value="<?php echo isset($formdata) ? $formdata['name'] : ''; ?>" required>
                      <div class="invalid-feedback">Please, enter your name!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Your E-mail</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" name="email" class="form-control" id="email" value="<?php echo isset($formdata) ? $formdata['email'] : ''; ?>" required>
                        <div class="invalid-feedback">Please choose a username.</div>
                      </div>
                    </div>                    

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Your Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" value="<?php echo isset($formdata) ? $formdata['password'] : ''; ?>" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Your weight</label>
                      <input type="poids" name="poids" class="form-control" id="poids" value="<?php echo isset($formdata) ? $formdata['poids'] : ''; ?>" required>
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Your taille</label>
                      <input type="taille" name="taille" class="form-control" id="taille" value="<?php echo isset($formdata) ? $formdata['taille'] : ''; ?>" required>
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">File Upload</label>
                      <input class="form-control" type="file" id="formFile" name="image">
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Create Account</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="<?php echo site_url('index.php/Auth/index');?>">Log in</a></p>
                    </div>

                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo site_url('assets/vendor/apexcharts/apexcharts.min.js'); ?>"></script>
  <script src="<?php echo site_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
  <script src="<?php echo site_url('assets/vendor/chart.js/chart.umd.js'); ?>"></script>
  <script src="<?php echo site_url('assets/vendor/echarts/echarts.min.js'); ?>"></script>
  <script src="<?php echo site_url('assets/vendor/quill/quill.min.js'); ?>"></script>
  <script src="<?php echo site_url('assets/vendor/simple-datatables/simple-datatables.js'); ?>"></script>
  <script src="<?php echo site_url('assets/vendor/tinymce/tinymce.min.js'); ?>"></script>
  <script src="<?php echo site_url('assets/vendor/php-email-form/validate.js'); ?>"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>