<li class="nav-item">
  <a href="dashboard.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'dashboard.php') ? 'active' : ''; ?>">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>Dashboard</p>
  </a>
</li>
<li class="nav-item">
  <a href="#" class="nav-link
    <?php
    echo (
    basename($_SERVER['PHP_SELF']) == 'admin.php' ||
    basename($_SERVER['PHP_SELF']) == 'admin_mgmt.php' ||
    basename($_SERVER['PHP_SELF']) == 'admin_view.php' ||
    basename($_SERVER['PHP_SELF']) == 'evaluator.php' ||
    basename($_SERVER['PHP_SELF']) == 'evaluator_mgmt.php' ||
    basename($_SERVER['PHP_SELF']) == 'evaluator_view.php' ||
    basename($_SERVER['PHP_SELF']) == 'officer.php' ||
    basename($_SERVER['PHP_SELF']) == 'officer_mgmt.php' ||
    basename($_SERVER['PHP_SELF']) == 'officer_view.php' ||
    basename($_SERVER['PHP_SELF']) == 'dept_secretary.php' ||
    basename($_SERVER['PHP_SELF']) == 'dept_secretary_mgmt.php' ||
    basename($_SERVER['PHP_SELF']) == 'dept_secretary_view.php' ||
    basename($_SERVER['PHP_SELF']) == 'alumni.php' ||
    basename($_SERVER['PHP_SELF']) == 'alumni_mgmt.php' ||
    basename($_SERVER['PHP_SELF']) == 'alumni_view.php'
    ) ? 'active' : '';
    ?>
    ">
    <i class="fa-solid fa-users-gear"></i>
    <p>&nbsp;&nbsp;System Users<i class="right fas fa-angle-left"></i></p>
  </a>
  <ul class="nav nav-treeview"
    <?php
    echo (
    basename($_SERVER['PHP_SELF']) == 'admin.php' ||
    basename($_SERVER['PHP_SELF']) == 'admin_mgmt.php' ||
    basename($_SERVER['PHP_SELF']) == 'admin_view.php' ||
    basename($_SERVER['PHP_SELF']) == 'evaluator.php' ||
    basename($_SERVER['PHP_SELF']) == 'evaluator_mgmt.php' ||
    basename($_SERVER['PHP_SELF']) == 'evaluator_view.php' ||
    basename($_SERVER['PHP_SELF']) == 'officer.php' ||
    basename($_SERVER['PHP_SELF']) == 'officer_mgmt.php' ||
    basename($_SERVER['PHP_SELF']) == 'officer_view.php' ||
    basename($_SERVER['PHP_SELF']) == 'dept_secretary.php' ||
    basename($_SERVER['PHP_SELF']) == 'dept_secretary_mgmt.php' ||
    basename($_SERVER['PHP_SELF']) == 'dept_secretary_view.php' ||
    basename($_SERVER['PHP_SELF']) == 'alumni.php' ||
    basename($_SERVER['PHP_SELF']) == 'alumni_mgmt.php' ||
    basename($_SERVER['PHP_SELF']) == 'alumni_view.php'
    ) ? 'style="display: block;"' : '';
    ?>
    >
    <li class="nav-item">
      <a href="admin.php" class="nav-link <?php echo in_array(basename($_SERVER['PHP_SELF']), ['admin.php', 'admin_mgmt.php', 'admin_view.php']) ? 'active' : ''; ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>&nbsp;&nbsp; Administrators</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="evaluator.php" class="nav-link <?php echo in_array(basename($_SERVER['PHP_SELF']), ['evaluator.php', 'evaluator_mgmt.php', 'evaluator_view.php']) ? 'active' : ''; ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>&nbsp;&nbsp; Evaluator</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="officer.php" class="nav-link <?php echo in_array(basename($_SERVER['PHP_SELF']), ['officer.php', 'officer_mgmt.php', 'officer_view.php']) ? 'active' : ''; ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>&nbsp;&nbsp; Alumni Officer</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="dept_secretary.php" class="nav-link <?php echo in_array(basename($_SERVER['PHP_SELF']), ['dept_secretary.php', 'dept_secretary_mgmt.php', 'dept_secretary_view.php']) ? 'active' : ''; ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>&nbsp;&nbsp; Department Secretary</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="alumni.php" class="nav-link <?php echo in_array(basename($_SERVER['PHP_SELF']), ['alumni.php', 'alumni_mgmt.php', 'alumni_view.php']) ? 'active' : ''; ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>&nbsp;&nbsp; Alumni</p>
      </a>
    </li>
  </ul>
</li>
<!--  <li class="nav-item">
  <a href="announcement.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'announcement.php') ? 'active' : ''; ?>">
    <i class="fa-solid fa-bell"></i>
    <p>&nbsp;&nbsp; Announcement</p>
  </a>
</li> -->
<li class="nav-item">
  <a href="questionnaire.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'questionnaire.php' || basename($_SERVER['PHP_SELF']) == 'questionnaire_mgmt.php') ? 'active' : ''; ?>">
    <i class="nav-icon fas fa-question-circle"></i>
    <p>Survey Questionnaire</p>
  </a>
</li>
<li class="nav-item">
  <a href="log_history.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'log_history.php') ? 'active' : ''; ?>">
    <i class="fas fa-list-alt"></i>
    <p>&nbsp;&nbsp; Login history</p>
  </a>
</li>
<li class="nav-header text-secondary" style="margin-bottom: -10px;">DATABASE MGMT</li>
<li class="nav-item">
  <a href="#" class="nav-link
    <?php
    echo (
    basename($_SERVER['PHP_SELF']) == 'backup.php' ||
    basename($_SERVER['PHP_SELF']) == 'restore.php'
    ) ? 'active' : '';
    ?>
    ">
    <i class="fa-solid fa-database"></i>
    <p>&nbsp;&nbsp;Manage Database<i class="right fas fa-angle-left"></i></p>
  </a>
  <ul class="nav nav-treeview"
    <?php
    echo (
    basename($_SERVER['PHP_SELF']) == 'backup.php' ||
    basename($_SERVER['PHP_SELF']) == 'restore.php'
    ) ? 'style="display: block;"' : '';
    ?>
    >
    <li class="nav-item">
      <a href="backup.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'backup.php') ? 'active' : ''; ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>&nbsp; Back-up database</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="restore.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'restore.php') ? 'active' : ''; ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>&nbsp;&nbsp; Restore database</p>
      </a>
    </li>
  </ul>
</li>