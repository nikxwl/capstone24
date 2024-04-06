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
                <a href="#" class="h2"><b>Send code to </b>email</a>
              </div>
              <div class="card-body">
                <?php
                if(isset($_GET['user_Id'])) {
                $user_Id = $_GET['user_Id'];
                $fetch = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$user_Id'");
                $row = mysqli_fetch_array($fetch);
                ?>
                <p class="login-box-msg text-center">Click continue to proceed for email verification.</p>
                <form action="processes.php" method="POST">
                  <input type="hidden" class="form-control mb-3" name="email" value="<?php echo $row['email']; ?>">
                  <input type="hidden" class="form-control mb-3" name="user_Id" value="<?php echo $user_Id; ?>">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="input-group mb-3">
                        <img src="images-users/<?php echo $row['image']; ?>" alt="" style="width: 60px;height: 60px; border-radius: 50%; display: block;margin-left: auto;margin-right: auto;margin-bottom: -12px;">
                      </div>
                      <p class="text-center mb-4"><?php echo ' '.$row['firstname'].' '.$row['lastname'].' '.$row['suffix'].' '; ?></p>
                    </div>
                    
                    <div class="col-md-12">
                      <div class="input-group">
                        <p>We can send a verification code to:</p>
                      </div>
                    </div>
                    <div class="col-md-12" style="margin-top: -18px;">
                      <div class="input-group">
                        <p><b><?php echo $row['email']; ?></b></p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <button type="submit" class="btn btn-primary btn-sm btn-block"  name="sendcode">Continue</button>
                      <p class="mt-1"><a href="forgot-password.php" class="text-center">Not you?</a></p>
                    </div>
                  </div>
                </form>
                <?php } else { require_once '404.php'; } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

<?php include 'footer.php'; ?>