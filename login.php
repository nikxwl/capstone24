<title> Graduateer-Login</title>
<?php include 'navbar.php'; ?>
  <main id="main" data-aos="fade-up">
   

    <section class="inner-page">
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-4 col-md-4 col-sm-6 col-12">
            <div class="card card-outline card-primary ">
              <div class="card-header text-center">
                <!-- <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a> -->
                <a href="login.php" class="h1">
                  <img src="images/alumnilogo2.jpg" alt="logo" class="img-fluid shadow-sm img-circle" width="110" height="110" style="border-radius: 50%;">
                </a>
              </div>
              <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="processes.php" method="post">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="user_role">User Role</label>
                    </div>
                    <select class="form-control form-select custom-select" id="user_role" name="user_role" required>
                      <option value="" selected disabled>Select user role</option>
                      <option value="0">Admin</option>
                      <option value="1">Evaluator</option>
                      <option value="2">Alumni Officer</option>
                      <option value="3">Department Secretary</option>
                      <option value="4">Alumni</option>
                    </select>
                  </div>
                  
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Enter your username" name="username" id="username" style="text-transform: none;" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-user"></span>
                      </div>
                    </div>
                  </div>
                  
                  <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Enter your password" id="password" name="password" minlength="8" style="text-transform: none;" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-8">
                      <div class="icheck-primary">
                        <input type="checkbox" id="remember" onclick="showPassword()">
                        <label for="remember">
                          Show password
                        </label>
                      </div>
                    </div>
                    <div class="col-4">
                      <button type="submit" class="btn btn-primary btn-sm btn-block" name="login" id="submit_button">Sign In</button>
                    </div>
                  </div>
                </form>
                <!-- <div class="social-auth-links text-center mt-2 mb-3">
                  <a href="#" class="btn btn-block btn-primary">
                    <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                  </a>
                  <a href="#" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                  </a>
                </div> -->
                <p>
                  <a href="forgot-password.php">Forgot password?</a>
                </p>
                <!-- <p class="mb-0">
                  No account? <a href="register.php" class="text-center">Register here!</a>
                </p> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

<?php include 'footer.php'; ?>