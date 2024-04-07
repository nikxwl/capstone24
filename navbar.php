<?php 
  include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Inner Page - BizLand Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="shortcut icon" type="image/png" href="images/alumnilogo2.jpg">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">

  <link href="assets/css/style.css" rel="stylesheet">
  <style>
    .form-control:focus {
      border-color: skyblue;
      box-shadow: none;
    }

    .input-group-text {
      height: 100%;
      align-items: center;
    }
  </style>
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center">
      <div class="contact-info d-flex align-items-center">
        Assessing Graduates Through Graduate Tracer
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between p-0">

      <!-- <h1 class="logo"><a href="index.html">AGTGT<span>.</span></a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
       <a href="index.php" onkeypress="" class="h4 text-primary"><img src="images/alumnilogo2.jpg" alt="" width="45" height="45" style="border-radius: 50%;"><span style="margin-left: 10px;"><b>AGTGT</b></span></a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto <?php echo (basename($_SERVER['PHP_SELF']) == 'index..php') ? 'active' : ''; ?>"  href="index.php?#hero"      >Home</a></li>
          <li><a class="nav-link scrollto <?php echo (basename($_SERVER['PHP_SELF']) == 'log_history.php') ? 'active' : ''; ?>"  href="#about"     >About</a></li>
          <li><a class="nav-link scrollto <?php echo (basename($_SERVER['PHP_SELF']) == 'log_history.php') ? 'active' : ''; ?>"  href="#counts"     >Employment Status</a></li>
          <!-- <li><a class="nav-link scrollto <?php echo (basename($_SERVER['PHP_SELF']) == 'log_history.php') ? 'active' : ''; ?>"  href="#portfolio" >Portfolio</a></li> -->
          <!-- <li><a class="nav-link scrollto <?php echo (basename($_SERVER['PHP_SELF']) == 'log_history.php') ? 'active' : ''; ?>"  href="#testimonials"      >Testimonials</a></li> -->
          <!-- <li><a class="nav-link scrollto <?php echo (basename($_SERVER['PHP_SELF']) == 'log_history.php') ? 'active' : ''; ?>"  href="#team"      >Team</a></li> -->

          <li><a class="nav-link scrollto <?php echo (basename($_SERVER['PHP_SELF']) == 'log_history.php') ? 'active' : ''; ?>"  href="#contact"   >Contact</a></li>
          <?php 
            $current_page = basename($_SERVER['PHP_SELF']);
            if ($current_page !== 'login.php') { ?>
              <li><a class="nav-link scrollto <?php echo (basename($_SERVER['PHP_SELF']) == 'login.php') ? 'active' : ''; ?>"        href="login.php"  >Login</a></li>
          <?php } ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

    </div>
  </header><!-- End Header -->

  