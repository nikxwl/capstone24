<?php
  require_once '../config.php';
  if(isset($_SESSION['user_Id']) && isset($_SESSION['login_time'])) {
    $id = $_SESSION['user_Id'];
    $users = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$id'");
    $row = mysqli_fetch_array($users);
    $logged_in_user_type = $row['user_type'];

    if($row['user_type'] == 0) {
      $title = 'Administrator';
      $home = 'dashboard.php';
    } elseif($row['user_type'] == 1) {
      $title = 'Evaluator';
      $home = 'dashboard.php';
    } elseif($row['user_type'] == 2) {
      $title = 'Alumni Officer';
      $home = 'dashboard.php';
    } elseif($row['user_type'] == 3) {
      $title = 'Department Secretary';
      $home = 'dashboard.php';
    } else {
      $title = 'Alumni';
      $home = 'dashboard.php';
    }

    $login_time = $_SESSION['login_time'];
    // RECORD TIME LOGGED IN TO BE USED IN AUTO LOGOUT - CODE CAN BE FOUND ON ../INCLUDES/FOOTER.PHP
    $_SESSION['last_active'] = time();
    require_once '../includes/header.php';
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="<?= $home ?>" class="brand-link">
    <img src="../images/alumnilogo2.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AGTGT</span>
    <br>
  </a>
  <br>
  <div class="sidebar">
    
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <?php
          if($row['user_type'] === '0') {
            include 'sidebar_admin.php';
          } elseif($row['user_type'] === '1') {
            include 'sidebar_evaluator.php';
          } elseif($row['user_type'] === '2') { 
        ?>
            <li class="nav-item">
              <a href="dashboard.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'dashboard.php') ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="log_history.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'log_history.php') ? 'active' : ''; ?>">
                <i class="fas fa-list-alt"></i>
                <p>&nbsp;&nbsp; Login history</p>
              </a>
            </li>

        <?php } elseif($row['user_type'] === '3') { ?>

            <li class="nav-item">
              <a href="dashboard.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'dashboard.php') ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="log_history.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'log_history.php') ? 'active' : ''; ?>">
                <i class="fas fa-list-alt"></i>
                <p>&nbsp;&nbsp; Login history</p>
              </a>
            </li>

        <?php } else { ?>

            <li class="nav-item">
              <?php 
                $taken = mysqli_query($conn, "SELECT * FROM answers WHERE alumni_ID=$id");
                if(mysqli_num_rows($taken) > 0) { 
              ?>
              <a href="#" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'survey.php') ? 'active' : ''; ?>" data-toggle="modal" data-target="#taken">
                <i class="nav-icon fas fa-question-circle"></i>
                <p>Survey Questionnaire</p>
              </a>
              <?php } else { ?>
                <a href="survey.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'survey.php') ? 'active' : ''; ?>">
                  <i class="nav-icon fas fa-question-circle"></i>
                  <p>Survey Questionnaire</p>
                </a>
              <?php } ?>
            </li>

           <!--  <li class="nav-item">
            <?php 
              $take2 = mysqli_query($conn, "SELECT * FROM answers WHERE alumni_ID=$id");
              if(mysqli_num_rows($take2) > 0) { 
            ?>
              <a href="survey_history.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'survey_history.php') ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-question-circle"></i>
                <p>Survey History</p>
              </a>
            <?php } else { ?>
              <a href="#" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'survey_history.php') ? 'active' : ''; ?>" data-toggle="modal" data-target="#notYet">
                <i class="nav-icon fas fa-question-circle"></i>
                <p>Survey History</p>
              </a>
            <?php } ?>
            </li> -->

            <li class="nav-item">
              <a href="log_history.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'log_history.php') ? 'active' : ''; ?>">
                <i class="fas fa-list-alt"></i>
                <p>&nbsp;&nbsp; Login history</p>
              </a>
            </li>

        <?php } ?>
      </ul>
    </nav>
  </div>
</aside>

<!-- MODAL FOR ALUMNI WHO HAVE TAKEN THE SURVEY -->
<div class="modal fade" id="taken" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-bell"></i> System notification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <!-- <p class="text-center">You have already taken the survey. Click <a href="survey_history.php">here</a> to start view survey history.</p> -->
        <p class="text-center">You have already taken the survey.</p>
        
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn bg-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Close</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL FOR ALUMNI WHO HAVE NOT YET TAKEN THE SURVEY -->
<div class="modal fade" id="notYet" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-bell"></i> System notification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <p class="text-center">You have not yet taken a survey. Click <a href="survey.php">here</a> to start taking the survey.</p>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn bg-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Close</button>
      </div>
    </div>
  </div>
</div>

<?php
  } else {
    header('Location: ../login.php');
  }
?>