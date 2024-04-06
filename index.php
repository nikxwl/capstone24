<title>Graduateer: Assessing Graduates Through Graduate Tracer </title>
<?php include 'navbar.php'; ?>
  
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1>Welcome to <span>AGTGT</span></h1>
      <h2>Empowering education through comprehensive graduate assessments and tracking</h2>
      <div class="d-flex">
        <a href="#about" class="btn-get-started scrollto">Get Started</a>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About</h2>
          <h3>Discover More <span>About Assessing Graduates Through Graduate Tracer</span></h3>
          <p>Empowering education through comprehensive graduate assessments and tracking for a brighter future.</p>
        </div>

        <div class="row">
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <h3>Facilitating dignified opportunities through accurate graduate evaluations.</h3>
            <p class="fst-italic">
              Our mission is to provide exceptional education by offering accurate graduate assessments and tracking services. We aim to create opportunities for students by ensuring reliable evaluations that contribute to their future success.
            </p>
            <ul>
              <li>
                <i class="bx bx-store-alt"></i>
                <div>
                  <h5>Quality Work Environments</h5>
                  <p>We focus on creating conducive work environments through diligent and efficient processes.</p>
                </div>
              </li>
              <li>
                <i class="bx bx-images"></i>
                <div>
                  <h5>Exemplary Solutions</h5>
                  <p>Providing exemplary solutions that address challenges and propel individuals towards their goals.</p>
                </div>
              </li>
            </ul>
            <p>
              We are dedicated to the betterment of education and strive to make a positive impact on the lives of students. Our commitment lies in fostering a supportive environment that encourages growth and success.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Employment Status</h2>
          <h3>Present <span>Employment</span></h3>
          <p>Explore our current team's diverse employment statuses, fostering a collaborative and inclusive workplace.</p>
        </div>


          <div class="row d-flex justify-content-center mb-5 mt-5">
            <?php 
            $sql = mysqli_query($conn, "SELECT employment_status, COUNT(*) as total_count FROM answers GROUP BY employment_status");
            
            if ($sql) {
                // Fetch the results and display or process them
                while ($row = mysqli_fetch_assoc($sql)) {
                    $employmentStatus = $row['employment_status'];
                    $totalCount = $row['total_count'];
                    
                    $iconClass = '';
                    switch ($employmentStatus) {
                        case 'Regular or Permanent':
                            $iconClass = 'bi bi-emoji-smile';
                            break;
                        case 'Contractual':
                            $iconClass = 'bi bi-briefcase';
                            break;
                        case 'Temporary':
                            $iconClass = 'bi bi-clock';
                            break;
                        case 'Self-employed':
                            $iconClass = 'bi bi-person';
                            break;
                        case 'Casual':
                            $iconClass = 'bi bi-people';
                            break;
                    }
            ?>
                <div class="col-lg-3 col-md-6">
                    <div class="count-box">
                        <i class="<?= $iconClass ?>"></i>
                        <span data-purecounter-start="0" data-purecounter-end="<?= $totalCount ?>" data-purecounter-duration="1" class="purecounter"></span>
                        <p><?= ucwords($employmentStatus) ?></p>
                    </div>
                </div>
            <?php
                }
                mysqli_free_result($sql);
            } else {
                echo "Error executing query: " . mysqli_error($your_db_connection);
            }
            ?>
        </div>


      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <h3><span>Contact Us</span></h3>
          <p>Send us a message using our contact form below.</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Our Address</h3>
              <p>83JP+F52, National Hi-way, Sto. Niño,, Biñan, Laguna</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Email Us</h3>
              <p>info@uphsl.edu.ph</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Call Us</h3>
              <p>(049) 531 4775</p>
            </div>
          </div>

        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-6 ">
            <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3865.660678713888!2d121.08281817393059!3d14.33113208361955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd63ad4c1a178d%3A0x76688d7ab7914234!2sUniversity%20of%20Perpetual%20Help%20System%20Laguna!5e0!3m2!1sen!2sph!4v1709742625871!5m2!1sen!2sph" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
          </div> 
        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

<?php include 'footer.php'; ?>