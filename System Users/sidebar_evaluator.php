<li class="nav-item">
  <a href="questionnaire.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'questionnaire.php' || basename($_SERVER['PHP_SELF']) == 'questionnaire_mgmt.php') ? 'active' : ''; ?>">
    <i class="nav-icon fas fa-question-circle"></i>
    <p>Survey Questionnaire</p>
  </a>
</li>
<li class="nav-header text-secondary" style="margin-bottom: -10px;">SYSTEM USER</li>
<li class="nav-item">
  <a href="alumni.php" class="nav-link <?php echo in_array(basename($_SERVER['PHP_SELF']), ['alumni.php', 'alumni_mgmt.php', 'alumni_view.php']) ? 'active' : ''; ?>">
    <i class="fas fa-user-graduate nav-icon"></i>
    <p>Alumni</p>
  </a>
</li>
<li class="nav-item">
  <a href="log_history.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'log_history.php') ? 'active' : ''; ?>">
    <i class="fas fa-list-alt"></i>
    <p>&nbsp;&nbsp; Login history</p>
  </a>
</li>
