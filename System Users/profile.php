<title>AGTGT | Profile</title>
<?php
require_once 'sidebar.php';
?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h1>Profile</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active"><?= $title ?> Profile</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <?php if($row['user_type'] != 4): ?>
          <div class="card card-primary card-outline">
            <div class="card-body box-profile"> 
              <h3 class="profile-username text-center"><?php echo ' '.$row['firstname'].' '.$row['lastname'].' '; ?></h3>
              <p class="text-muted text-center">
                <?php
                  $userTypeMapping = [
                      0 => 'Admin',
                      1 => 'Evaluator',
                      2 => 'Alumni Officer',
                      3 => 'Department Secretary',
                      4 => 'Alumni',
                  ];

                  $userType = $row['user_type'];

                  echo '<small>' . (isset($userTypeMapping[$userType]) ? $userTypeMapping[$userType] : 'Unknown') . '</small>';
                ?>
              </p>
              <a class="btn bg-gradient-primary btn-block">Profile</a>
            </div>
          </div>
          <?php endif; ?>
          <div class="card card-primary">
            <div class="card-header bg-gradient-primary">
              <h3 class="card-title">About Me</h3>
            </div>
            <div class="card-body">
              <strong><i class="fas fa-location mr-1"></i> Address</strong>
              <p class="text-muted">
                <?php echo ''.$row['house_no'].' '.$row['street_name'].' '.$row['purok'].' '.$row['zone'].' '.$row['barangay'].' '.$row['municipality'].' '.$row['province'].' '.$row['region'].''; ?>
              </p>
              
            </div>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#viewprofile" data-toggle="tab">Profile info</a></li>
                <li class="nav-item"><a class="nav-link" href="#updateprofile" data-toggle="tab">Update info</a></li>
                <li class="nav-item"><a class="nav-link" href="#accountsecurity" data-toggle="tab">Account security</a></li>
              </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="viewprofile">
                    <div class="form-group row">
                      <label for="Username" class="col-sm-2 col-form-label">Username</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="Username" placeholder="Username" value="<?php echo $row['username']; ?>" readonly>
                      </div>
                    </div>                   
                    <div class="form-group row">
                      <label for="First name" class="col-sm-2 col-form-label">Full name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="First name" placeholder="First name" value="<?php echo $row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix']; ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="First name" class="col-sm-2 col-form-label">Date of birth</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="First name" placeholder="First name" value="<?php echo date("F d, Y", strtotime($row['dob'])).' - '.$ageValue = calculateFormattedAge($row['dob']) ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="First name" class="col-sm-2 col-form-label">Birthplace</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="First name" placeholder="Birthplace" value="<?php echo $row['birthplace']; ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="First name" class="col-sm-2 col-form-label">Gender</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="First name" placeholder="Gender" value="<?php echo $row['gender']; ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="First name" class="col-sm-2 col-form-label">Civil Status</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="First name" placeholder="Civil Status" value="<?php echo $row['civilstatus']; ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="First name" class="col-sm-2 col-form-label">Occupation</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="First name" placeholder="Occupation" value="<?php echo $row['occupation']; ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="First name" class="col-sm-2 col-form-label">Religion</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="First name" placeholder="Religion" value="<?php echo $row['religion']; ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="Email" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="Email" placeholder="Email" value="<?php echo $row['email']; ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="Contact number" class="col-sm-2 col-form-label">Contact number</label>
                      <div class="col-sm-10">
                        <div class="input-group">
                          <div class="input-group-text">+63</div>
                          <input type="tel" class="form-control" pattern="[7-9]{1}[0-9]{9}" id="Contact number" name="contact" placeholder = "9123456789" required maxlength="10" value="<?php echo $row['contact']; ?>" readonly>
                        </div>
                      </div>
                    </div>

                    <?php if($row['user_type'] == 4): ?>
                    <div class="form-group row">
                      <label for="Year Graduated" class="col-sm-2 col-form-label">Year Graduated</label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" placeholder="2000" name="year_graduated" id="year_graduated" pattern="\d{4}" minlength="4" maxlength="4" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 4)" value="<?php echo $row['year_graduated']; ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="Current Job" class="col-sm-2 col-form-label">Current Job</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="Current Job" placeholder="Current Job" name="current_job" value="<?php echo $row['current_job']; ?>" readonly>
                      </div>
                    </div>
                    <?php endif; ?>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <a type="button" class="btn bg-gradient-primary" href="#updateprofile" data-toggle="tab">Update info</a>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="updateprofile">
                    <form action="process_update.php" method="POST">
                      <input type="hidden" class="form-control" value="<?php echo $row['user_Id']; ?>" name="user_Id">
                      <div class="form-group row">
                        <a  class="col-sm-12 text-primary text-bold">Basic information</a>
                      </div>
                      <div class="form-group row">
                        <label for="Username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="Username" placeholder="Username" name="username" value="<?php echo $row['username']; ?>" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="First name" class="col-sm-2 col-form-label">First name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="First name" placeholder="First name" value="<?php echo $row['firstname']; ?>" onkeyup="lettersOnly(this)" name="firstname" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Middle name" class="col-sm-2 col-form-label">Middle name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="Middle name" placeholder="Middle name" value="<?php echo $row['middlename']; ?>"  onkeyup="lettersOnly(this)"name="middlename">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Last name" class="col-sm-2 col-form-label">Last name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="Last name" placeholder="Last name" value="<?php echo $row['lastname']; ?>" onkeyup="lettersOnly(this)" name="lastname" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Suffix" class="col-sm-2 col-form-label">Suffix</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="Suffix" placeholder="Suffix" value="<?php echo $row['suffix']; ?>" name="suffix">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="txtbirthdate" class="col-sm-2 col-form-label">Date of Birth</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" name="dob" placeholder="Date of birth" required id="birthdate" onchange="calculateAge()" value="<?php echo $row['dob']; ?>" max="<?php echo date('Y-m-d'); ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="txtage" class="col-sm-2 col-form-label">Age</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control bg-white" placeholder="Age" required id="txtage" name="age" readonly value="<?php echo $ageValue = calculateFormattedAge($row['dob']); ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="email" name="email" placeholder = "email@gmail.com" required onkeydown="validation()" onkeyup="validation()"  value="<?php echo $row['email']; ?>">
                          <small id="text" style="font-style: italic;"></small>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Contact number" class="col-sm-2 col-form-label">Contact number</label>
                        <div class="col-sm-10">
                          <div class="input-group">
                            <div class="input-group-text bg-white">+63</div>
                            <input type="tel" class="form-control" pattern="[7-9]{1}[0-9]{9}" id="Contact number" name="contact" placeholder = "9123456789" required maxlength="10" value="<?php echo $row['contact']; ?>">
                          </div>
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <label for="Contact number" class="col-sm-2 col-form-label">Place of Birth</label>
                        <div class="col-sm-10">
                          <div class="input-group">
                            <textarea name="birthplace" id="" cols="30" rows="1" class="form-control" required placeholder="Place of Birth"><?php echo $row['birthplace']; ?></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Contact number" class="col-sm-2 col-form-label">Sex</label>
                        <div class="col-sm-10">
                          <div class="input-group">
                            <?php
                            $genders = ['Male', 'Female', 'Non-Binary'];
                            $selectedGender = $row['gender']; // Assuming $row contains the data for the current user
                            ?>
                            <select class="form-control" name="gender" required>
                              <option selected disabled value="">Select sex</option>
                              <?php foreach ($genders as $gender): ?>
                              <option value="<?php echo $gender; ?>" <?php if ($selectedGender === $gender) { echo 'selected'; } ?>><?php echo $gender; ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Contact number" class="col-sm-2 col-form-label">Civil Status</label>
                        <div class="col-sm-10">
                          <div class="input-group">
                            <?php
                            $statuses = ['Single', 'Married', 'Widow/ER', 'Separated'];
                            $selectedStatus = $row['civilstatus']; // Assuming $row contains the data for the current user
                            ?>
                            <select class="form-control" name="civilstatus" required>
                              <option selected disabled value="">Select status</option>
                              <?php foreach ($statuses as $status): ?>
                              <option value="<?php echo $status; ?>" <?php if ($selectedStatus === $status) { echo 'selected'; } ?>><?php echo $status; ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Contact number" class="col-sm-2 col-form-label">Profession/ Occupation</label>
                        <div class="col-sm-10">
                          <div class="input-group">
                            <input type="text" class="form-control"  placeholder="Profession/ Occupation" name="occupation" required value="<?php echo $row['occupation']; ?>">
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Contact number" class="col-sm-2 col-form-label">Religion</label>
                        <div class="col-sm-10">
                          <div class="input-group">
                            <?php
                            $religions = ['Roman Catholic', 'Iglesia Ni Cristo', 'Evangelical Christianity', 'Islam', 'Protestants', 'Seventh-day Adventism', 'Aglipayan', 'Bible Baptist Church', 'United Church of Christ in the Philippines', "Jehovah's Witnesses", 'Buddhist', 'Methodist', 'Hindu', 'Judaism', 'Ang Dating Daan', 'Other Religion'];
                            $selectedreligion = $row['religion']; // Assuming $row contains the data for the current user
                            ?>
                            <select class="form-control" name="religion" required>
                              <option selected disabled value="">Select religion</option>
                              <?php foreach ($religions as $religion): ?>
                              <option value="<?php echo $religion; ?>" <?php if ($selectedreligion === $religion) { echo 'selected'; } ?>><?php echo $religion; ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <a  class="col-sm-12 text-primary text-bold">Complete address</a>
                      </div>
                      <div class="form-group row">
                        <label for="Contact number" class="col-sm-2 col-form-label">House No.</label>
                        <div class="col-sm-10">
                          <div class="input-group">
                            <input type="text" class="form-control"  placeholder="House No." name="house_no" required value="<?php echo $row['house_no']; ?>">
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Contact number" class="col-sm-2 col-form-label">Street name</label>
                        <div class="col-sm-10">
                          <div class="input-group">
                            <input type="text" class="form-control"  placeholder="Street name" name="street_name" required value="<?php echo $row['street_name']; ?>">
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Contact number" class="col-sm-2 col-form-label">Sitio/Purok</label>
                        <div class="col-sm-10">
                          <div class="input-group">
                            <input type="text" class="form-control"  placeholder="Sitio/Purok" name="purok" required value="<?php echo $row['purok']; ?>">
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Contact number" class="col-sm-2 col-form-label">Zone</label>
                        <div class="col-sm-10">
                          <div class="input-group">
                            <input type="text" class="form-control"  placeholder="Zone" name="zone" required value="<?php echo $row['zone']; ?>">
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Contact number" class="col-sm-2 col-form-label">Barangay</label>
                        <div class="col-sm-10">
                          <div class="input-group">
                            <input type="text" class="form-control"  placeholder="Barangay" name="barangay" required value="<?php echo $row['barangay']; ?>">
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Contact number" class="col-sm-2 col-form-label">Municipality</label>
                        <div class="col-sm-10">
                          <div class="input-group">
                            <input type="text" class="form-control"  placeholder="Municipality" name="municipality" required value="<?php echo $row['municipality']; ?>">
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Contact number" class="col-sm-2 col-form-label">Province</label>
                        <div class="col-sm-10">
                          <div class="input-group">
                            <input type="text" class="form-control"  placeholder="Province" name="province" required value="<?php echo $row['province']; ?>">
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Contact number" class="col-sm-2 col-form-label">Region</label>
                        <div class="col-sm-10">
                          <div class="input-group">
                            <input type="text" class="form-control"  placeholder="Region" name="region" required value="<?php echo $row['region']; ?>">
                          </div>
                        </div>
                      </div>
                      <?php if($row['user_type'] == 4): ?>
                      <div class="form-group row">
                        <label for="Year Graduated" class="col-sm-2 col-form-label">Year Graduated</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" placeholder="2000" name="year_graduated" id="year_graduated" pattern="\d{4}" minlength="4" maxlength="4" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 4)" value="<?php echo $row['year_graduated']; ?>" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Current Job" class="col-sm-2 col-form-label">Current Job</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="Current Job" placeholder="Current Job" name="current_job" value="<?php echo $row['current_job']; ?>" required>
                        </div>
                      </div>
                      <?php endif; ?>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn bg-gradient-primary" id="update_admin" name="update_profile_info">Submit</button>
                        </div>
                      </div>
                    </form>
                    
                  </div>
                  <div class="tab-pane" id="accountsecurity">
                    <form action="process_update.php" method="POST" enctype="multipart/form-data">
                      <input type="hidden" class="form-control" value="<?php echo $row['user_Id']; ?>" name="user_Id">
                      <div class="form-group row">
                        <label for="Old password" class="col-sm-2 col-form-label">Old password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="Old password" placeholder="Old password" name="OldPassword" required minlength="8">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="new_password" class="col-sm-2 col-form-label">New password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" placeholder="Password" name="password" required id="password" minlength="8">
                          <span id="password-message" class="text-bold" style="font-style: italic;font-size: 12px;color: #e60000;"></span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="cpassword" class="col-sm-2 col-form-label">Confirm password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" placeholder="Confirm password" name="cpassword" required id="cpassword" onkeyup="validate_confirm_password()" minlength="8">
                          <small id="wrong_pass_alert" class="text-bold" style="font-style: italic;font-size: 12px;"></small>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn bg-gradient-primary" name="update_password_admin" id="submit_button">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <?php require_once '../includes/footer.php'; ?>