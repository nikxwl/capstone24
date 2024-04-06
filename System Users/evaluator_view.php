<title>AGTGT | Evaluator info</title>
<?php 
    require_once 'sidebar.php'; 
    if(isset($_GET['user_Id'])) {
    $user_Id = $_GET['user_Id'];
    $fetch = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$user_Id'");
    $row = mysqli_fetch_array($fetch);
?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Evaluator</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Evaluator info</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">You are currently viewing the evaluator information</h3>
            <div class="card-tools mt-2">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="row p-2">
              <div class="col-lg-12 mt-1 mb-2">
                <a class="h5 text-primary"><b>Basic information</b></a>
                <div class="dropdown-divider"></div>
              </div>
              <div class="col-lg-9 col-md-6 col-12">
                <div class="row">
                  <div class="col-lg-12 col col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <small class="text-muted"><b>Full name:</b></small>
                      <h6><?php echo $row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix']; ?></h6>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <small class="text-muted"><b>Date of Birth:</b></small>
                      <h6><?php echo date("F d, Y", strtotime($row['dob'])); ?></h6>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <small class="text-muted"><b>Age:</b></small>
                      <h6><?php echo $ageValue = calculateFormattedAge($row['dob']); ?></h6>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <small class="text-muted"><b>Sex:</b></small>
                      <h6><?php echo $row['gender']; ?></h6>
                    </div>
                  </div>
                  <div class="col-lg-8 col col-md-8 col-sm-6 col-12">
                    <div class="form-group">
                      <small class="text-muted"><b>Place of Birth:</b></small>
                      <h6><?php echo $row['birthplace']; ?></h6>
                    </div>
                  </div>
                  <div class="col-lg-4 col col-md-4 col-sm-6 col-12">
                    <div class="form-group">
                      <small class="text-muted"><b>Civil Status:</b></small>
                      <h6><?php echo $row['civilstatus']; ?></h6>
                    </div>
                  </div>
                  <div class="col-lg-4 col col-md-4 col-sm-6 col-12">
                    <div class="form-group">
                      <small class="text-muted"><b>Profession/ Occupation:</b></small>
                      <h6><?php echo $row['occupation']; ?></h6>
                    </div>
                  </div>
                  <div class="col-lg-4 col col-md-4 col-sm-6 col-12">
                    <div class="form-group">
                      <small class="text-muted"><b>Religion:</b></small>
                      <h6><?php echo $row['religion']; ?></h6>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-12 text-dark">
                  <div class="d-flex justify-content-center bg-dark d-block m-auto" style="max-height: 120px; min-height: 120px; width: 120px; border: 3px solid darkgray; overflow: hidden;">
                      <img src="../images-users/<?php echo $row['image']; ?>" alt="Profile" class="img-fluid d-block m-auto" style="object-fit: cover; width: 100%; height: 100%;">
                  </div>
                  <p class="text-center text-sm text-muted">Profile</p>
              </div>
            </div>
            <div class="row p-2">
              <div class="col-lg-12 mt-3 mb-2 col-md-12 col-sm-12 col-12">
                <a class="h5 text-primary"><b>Contact details</b></a>
                <div class="dropdown-divider"></div>
              </div>
              <div class="col-lg-12 col-md-6 col-12">
                <div class="row">
                  <div class="col-lg-6 col col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <small class="text-muted"><b>Email:</b></small>
                      <h6><?php echo $row['email']; ?></h6>
                    </div>
                  </div>
                  <div class="col-lg-6 col col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <small class="text-muted"><b>Contact number:</b></small>
                      <h6><?php if($row['contact'] !== '') { echo '+63 '.$row['contact']; } ?></h6>
                    </div>
                  </div>
                  
                </div>
              </div>
              
            </div>
            
            <div class="row p-2">
              <div class="col-lg-12 mt-3 mb-2 col-md-12 col-sm-12 col-12">
                <a class="h5 text-primary"><b>Evaluator address</b></a>
                <div class="dropdown-divider"></div>
              </div>
              <div class="col-lg-12 col-md-6 col-12">
                <div class="row">
                  <div class="col-lg-3 col col-md-3 col-sm-6 col-12">
                    <div class="form-group">
                      <small class="text-muted"><b>House No:</b></small>
                      <h6><?php echo $row['house_no']; ?></h6>
                    </div>
                  </div>
                  <div class="col-lg-3 col col-md-3 col-sm-6 col-12">
                    <div class="form-group">
                      <small class="text-muted"><b>Street name:</b></small>
                      <h6><?php echo $row['street_name']; ?></h6>
                    </div>
                  </div>
                  <div class="col-lg-3 col col-md-3 col-sm-6 col-12">
                    <div class="form-group">
                      <small class="text-muted"><b>Sitio/Purok:</b></small>
                      <h6><?php echo $row['purok']; ?></h6>
                    </div>
                  </div>
                  <div class="col-lg-3 col col-md-3 col-sm-6 col-12">
                    <div class="form-group">
                      <small class="text-muted"><b>Zone:</b></small>
                      <h6><?php echo $row['zone']; ?></h6>
                    </div>
                  </div>
                  <div class="col-lg-3 col col-md-3 col-sm-6 col-12">
                    <div class="form-group">
                      <small class="text-muted"><b>Barangay:</b></small>
                      <h6><?php echo $row['barangay']; ?></h6>
                    </div>
                  </div>
                  <div class="col-lg-3 col col-md-3 col-sm-6 col-12">
                    <div class="form-group">
                      <small class="text-muted"><b>Municipality:</b></small>
                      <h6><?php echo $row['municipality']; ?></h6>
                    </div>
                  </div>
                  <div class="col-lg-3 col col-md-3 col-sm-6 col-12">
                    <div class="form-group">
                      <small class="text-muted"><b>Province:</b></small>
                      <h6><?php echo $row['province']; ?></h6>
                    </div>
                  </div>
                  <div class="col-lg-3 col col-md-3 col-sm-6 col-12">
                    <div class="form-group">
                      <small class="text-muted"><b>Region:</b></small>
                      <h6><?php echo $row['region']; ?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <a href="evaluator.php" class="btn btn-secondary"><i class="fa-solid fa-backward"></i> Back</a>
            <a href="evaluator_mgmt.php?page=<?php echo $row['user_Id']; ?>" class="btn btn-info float-right"><i class="fas fa-pencil-alt"></i> Edit</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php }  else { require_once '../includes/404.php'; } ?>
<br>
<br>
<br>
<?php require_once '../includes/footer.php'; ?>