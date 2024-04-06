<?php include 'navbar.php'; ?>
  <main id="main" data-aos="fade-up">
   <!--  <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Inner Page</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Inner Page</li>
          </ol>
        </div>

      </div>
    </section> -->

    <section class="inner-page">
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-4 col-md-4 col-sm-6 col-12">
            <div class="card card-outline card-primary">
              <div class="card-header text-center">
                <a href="#" class="h2"><b>Create new </b>Password</a>
              </div>
              <div class="card-body">
                <?php
                if(isset($_GET['user_Id'])) {
                $user_Id = $_GET['user_Id'];
                ?>
                <p class="login-box-msg text-center">Secure your account by creating new password.</p>
                <form action="processes.php" method="POST">
                  <input type="hidden" class="form-control" name="user_Id" value="<?php echo $user_Id; ?>">
                  <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="New password" name="password" id="password" minlength="8">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>
                    </div>
                  </div>
                  <p id="password-message" class="text-bold" style="font-style: italic;font-size: 12px;color: #e60000;"></p>
                  
                  <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Confirm new password" name="cpassword" id="cpassword" onkeyup="validate_confirm_password()" minlength="8">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>
                    </div>
                  </div>
                  <p id="wrong_pass_alert" class="text-bold" style="font-style: italic;font-size: 12px;color: #e60000;"></p>
                  <div class="icheck-primary mt-3">
                    <input type="checkbox" id="remember" onclick="showBothPassword()">
                    <label for="remember">
                      Show password
                    </label>
                  </div>
                  <div class="row mt-1">
                    <div class="col-12">
                      <button class="btn btn-block btn-primary btn-sm" type="submit" name="changepassword" id="submit_button">Change password</button>
                    </div>
                  </div>
                </form>
                <p class="mt-3">
                  <a href="login.php">Login</a>
                </p>
                <?php } else { require_once '404.php'; } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

<?php include 'footer.php'; ?>
