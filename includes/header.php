<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AGTGT</title>
    <!---FAVICON ICON FOR WEBSITE--->
    <link rel="shortcut icon" type="image/png" href="../images/alumnilogo2.jpg">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <script src="../plugins/fontawesome-free/js/font-awesome-ni-erwin.js" crossorigin="anonymous"></script>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="../plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <style>
      /*body {
        font-family: 'Roboto', sans-serif;
      }*/
      .modal-content{
        -webkit-box-shadow: 0 5px 15px rgba(0,0,0,0);
        -moz-box-shadow: 0 5px 15px rgba(0,0,0,0);
        -o-box-shadow: 0 5px 15px rgba(0,0,0,0);
        box-shadow: 0 5px 15px rgba(0,0,0,0);
      }
      
      .form-control:not([type="email"]):not([type="password"]) {
        text-transform: capitalize;
      }
    </style>
  </head>
  <body class="hold-transition sidebar-mini layout-fixed layout-footer-fixed">
    <div class="wrapper">
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="dashboard.php" class="nav-link">Home</a>
          </li>
        

        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          
         
          <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
              <span class="d-none d-md-inline"><?php echo ' '.$row['firstname'].' '.$row['lastname'].' '; ?></span>
            </a>
            <div class="dropdown-menu">
                <a href="profile.php" class="dropdown-item">Profile</a>
                <a href="#" class="dropdown-item" onclick="logout()">Sign out</a>
            </div>
          </li>
          
        </ul>
      </nav>
 

<script>

  function logout() {
    swal({
      title: 'Are you sure you want to logout?',
      text: "You won't be able to revert this!",
      icon: "warning",
      buttons: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        // Make an AJAX request to the PHP file
        $.ajax({
          url: '../includes/ajax_autoLogout.php',
          type: 'POST',
          data: { 
            id: '<?php echo $id; ?>', 
            login_time: '<?php echo $login_time; ?>',
          },
          success: function(response) {
            // Handle the response if needed
            // swal("Logged out successfully!", {
            //   icon: "success",
            // }).then(() => {
              // Redirect to another page
              window.location = "../logout.php";
            // });
          },
          error: function(xhr, status, error) {
            // Handle the error if needed
            swal("Error occurred while logging out!", {
              icon: "error",
            });
          }
        });
      } else {
        // Handle the cancellation if needed
        swal("Logout canceled.", {
          icon: "info",
        });
      }
    });
  }

</script>

