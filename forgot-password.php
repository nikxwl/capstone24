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
                <a href="index.php" class="h2"><b>Find your </b>ACCOUNT</a>
              </div>
              <div class="card-body">
                <p class="login-box-msg">Please enter your email or mobile number to search for your account.</p>
                <form action="processes.php" method="post">
                  <div class="input-group">
                    <input type="email" class="form-control" placeholder="email@gmail.com" name="email"  id="email" onkeydown="validation()" onkeyup="validation()" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                      </div>
                    </div>
                  </div>
                  <!-- FOR INVALID EMAIL -->
                  <div class="input-group mt-1 mb-3">
                    <small id="text" style="font-style: italic;"></small>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <button type="submit" class="btn btn-primary btn-sm btn-block"  name="search" id="submit_button">Search</button>
                    </div>
                  </div>
                </form>
                <p class="mt-3 mb-1">
                  <a href="login.php">Login</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

<?php include 'footer.php'; ?>