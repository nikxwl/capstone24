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
                <a href="#" class="h2"><b>Enter security </b>code</a>
              </div>
              <div class="card-body">
                <?php
                if(isset($_GET['user_Id']) && isset($_GET['email'])) {
                $user_Id = $_GET['user_Id'];
                $email   = $_GET['email'];
                ?>
                <p class="login-box-msg text-center">Please check your email for a message with your code. Your code is 6 numbers long.</p>
                <form action="processes.php" method="POST">
                  <input type="hidden" class="form-control mb-3" value="<?php echo $user_Id; ?>" name="user_Id">
                  <input type="hidden" class="form-control mb-3" value="<?php echo $email; ?>" name="email">
                  <div class="input-group mb-3 mt-3">
                    <input type="number" class="form-control" placeholder="Enter verification code" name="code" id="codeInput" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>
                    </div>
                  </div>
                  <div class="input-group">
                    <p>We sent your code to: <b><?php echo $email; ?></b></p>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <button type="submit" class="btn btn-primary btn-sm btn-block"  name="verify_code">Continue</button> 
                      <p><a href="sendcode.php?user_Id=<?php echo $user_Id; ?>" >Didn't get a code?</a></p>
                    </div>
                  </div>
                </form>
                <p>
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
<script>
  $(document).ready(function() {
    $('#codeInput').on('input', function() {
      if ($(this).val().length > 6) {
        $(this).val($(this).val().slice(0, 6));
      }
    });
  });
</script>