<title>AGTGT | Survey questionnaire records</title>
<?php
require_once 'sidebar.php';
?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Survey questionnaire</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Survey questionnaire records</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Please answer the survey questionnaire honestly.</h3>
            </div>
            <div class="card-body p-0">
              <div class="bs-stepper">
                <div class="bs-stepper-header" role="tablist">
                  <!-- Step 1 -->
                  <div class="step" data-target="#form-step-1">
                    <button type="button" class="step-trigger" role="tab" aria-controls="form-step-1">
                    <span class="bs-stepper-circle">1</span>
                    <span class="bs-stepper-label">Educational Background</span>
                    </button>
                  </div>
                  <div class="line"></div>
                  <!-- Step 2 -->
                  <div class="step" data-target="#form-step-2">
                    <button type="button" class="step-trigger" role="tab" aria-controls="form-step-2">
                    <span class="bs-stepper-circle">2</span>
                    <span class="bs-stepper-label">Training(s)/Advance Studies Attended After College</span>
                    </button>
                  </div>
                  <div class="line"></div>
                  <!-- Step 3 -->
                  <div class="step" data-target="#form-step-3">
                    <button type="button" class="step-trigger" role="tab" aria-controls="form-step-3">
                    <span class="bs-stepper-circle">3</span>
                    <span class="bs-stepper-label">Employment Data</span>
                    </button>
                  </div>
                  <!-- Step 4 -->
                  <div class="step" data-target="#form-step-4">
                    <button type="button" class="step-trigger" role="tab" aria-controls="form-step-4">
                    <span class="bs-stepper-circle">4</span>
                    <span class="bs-stepper-label">Employment Data</span>
                    </button>
                  </div>
                </div>
                <div class="bs-stepper-content">
                  <form action="process_save.php" method="POST" onsubmit="return onSubmit();">

                    <input type="hidden" class="form-control" name="alumni_ID" value="<?= $id ?>">

                    <!-- Form Step 1 -->
                    <div id="form-step-1" class="content p-4" role="tabpanel">

                      <div class="form-group mb-3">
                        <?php 
                          $twelve = mysqli_query($conn, "SELECT * FROM question WHERE order_by=12");
                          $r_12 = mysqli_fetch_array($twelve);
                        ?>
                        <label for=""><?= $r_12['question'] ?></label>
                        <input type="hidden" class="form-control" id="" name="r_12" value="<?= $r_12['quest_ID'] ?>">
                          <button type="button" class="btn btn-success btn-sm mb-3 float-right" onclick="addRow()">Add Row</button>
                          <table class="table table-bordered table-sm table-hover" id="educationTable">
                              <thead>
                                  <tr>
                                      <th>Degree(s) & Specialization(s)</th>
                                      <th>College or University</th>
                                      <th>Year Graduated</th>
                                      <th>Honor(s) or Award(s) Received</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td><input type="text" class="form-control form-control-sm" name="degree[]" /></td>
                                      <td><input type="text" class="form-control form-control-sm" name="university[]" /></td>
                                      <td><input type="date" class="form-control form-control-sm" name="year[]" /></td>
                                      <td><input type="text" class="form-control form-control-sm" name="honor[]" /></td>
                                      <td><button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">Remove</button></td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>

                      <div class="form-group">
                        <hr>
                        <?php 
                          $thirteen = mysqli_query($conn, "SELECT * FROM question WHERE order_by=13");
                          $r_13 = mysqli_fetch_array($thirteen);
                        ?>
                          <label for=""><?= $r_13['question'] ?></label>
                          <input type="hidden" class="form-control" id="" name="r_13" value="<?= $r_13['quest_ID'] ?>">
                          <button type="button" class="btn btn-success btn-sm mb-3 float-right" onclick="addRow2()">Add Row</button>
                          <table class="table table-bordered" id="examinationTable">
                              <thead>
                                  <tr>
                                      <th>Name of Examination</th>
                                      <th>Date Taken</th>
                                      <th>Rating</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td><input type="text" class="form-control form-control-sm" name="examination[]" /></td>
                                      <td><input type="date" class="form-control form-control-sm" name="date_taken[]" /></td>
                                      <td><input type="text" class="form-control form-control-sm" name="rating[]" /></td>
                                      <td><button type="button" class="btn btn-danger btn-sm" onclick="removeRow2(this)">Remove</button></td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>

                      <div class="form-group">
                        <hr>
                        <?php 
                            $fourteen = mysqli_query($conn, "SELECT * FROM question WHERE order_by=14");
                            $r_14 = mysqli_fetch_array($fourteen);
                        ?>
                        <label for="<?= $r_14['quest_ID'] ?>"><?= $r_14['question'] ?></label>
                        <input type="hidden" class="form-control" id="<?= $r_14['quest_ID'] ?>" name="r_14" value="<?= $r_14['quest_ID'] ?>">

                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-12">
                              <label for="">Description</label>
                                <?php
                                // Explode the values in the label column by commas
                                $labels_14 = explode(',', $r_14['label']);

                                // Iterate through each label and create corresponding label elements
                                foreach ($labels_14 as $label_14) {
                                    echo '<p class="checkbox-label">' . trim($label_14) . '</p>';
                                }
                                ?>
                              <label for="">Others, please specify...</label>
                              <textarea class="form-control" placeholder="Enter other answer" name="r_14_others" rows="2"></textarea>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12 text-center">
                              <label for="">Undergraduate/AB/BS</label>
                                <?php
                                // Iterate through each label and create corresponding checkboxes
                                foreach ($labels_14 as $label_14) {
                                    echo '<input type="checkbox" name="undergraduate[]" value="' . trim($label_14) . '" style="margin-bottom: 28px;"><br>';
                                }
                                ?>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12 text-center">
                              <label for="">Graduate/MS/MA/PhD</label>
                                <?php
                                // Iterate through each label and create corresponding checkboxes
                                foreach ($labels_14 as $label_14) {
                                    echo '<input type="checkbox" name="graduate[]" value="' . trim($label_14) . '" style="margin-bottom: 28px;"> <br>';
                                }
                                ?>

                            </div>
                        </div>
                      </div>
                      
                      <button type="button" class="btn btn-primary" onclick="stepper.next()" >Next</button>
                    </div>
                  
                    <!-- Form Step 2 -->
                    <div id="form-step-2" class="content p-4" role="tabpanel">

                      <div class="form-group">
                        <?php 
                          $fifteen = mysqli_query($conn, "SELECT * FROM question WHERE order_by=15");
                          $r_15 = mysqli_fetch_array($fifteen);
                        ?>
                          <label for=""><?= $r_15['question'] ?></label>
                          <input type="hidden" class="form-control" id="" name="r_15" value="<?= $r_15['quest_ID'] ?>">
                          <button type="button" class="btn btn-success btn-sm mb-3 float-right" onclick="addRow3()">Add Row</button>
                          <table class="table table-bordered" id="trainingTable">
                              <thead>
                                  <tr>
                                      <th>Title of Training or Advance Study</th>
                                      <th>Duration and Credits Earned</th>
                                      <th>Name of Training Institution/College/University</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td><input type="text" class="form-control form-control-sm" name="training_title[]" /></td>
                                      <td><input type="text" class="form-control form-control-sm" name="duration[]" /></td>
                                      <td><input type="text" class="form-control form-control-sm" name="training_institution[]" /></td>
                                      <td><button type="button" class="btn btn-danger btn-sm" onclick="removeRow3(this)">Remove</button></td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>

                      <div class="form-group hide-if-yes">
                        <hr>
                        <?php 
                          $fifteen_2 = mysqli_query($conn, "SELECT * FROM question WHERE order_by=152");
                          $r_15_2 = mysqli_fetch_array($fifteen_2);
                          $labels_15_2 = explode(',', $r_15_2['label']);
                        ?>
                          <label for=""><?= $r_15_2['question'] ?></label> <br>
                          <input type="hidden" class="form-control" id="" name="r_15_2" value="<?= $r_15_2['quest_ID'] ?>">
                          <?php
                            // Iterate through each label and create corresponding checkboxes
                            foreach ($labels_15_2 as $label_15_2) {
                                echo '<input type="checkbox" name="pursue_studies[]" value="' . trim($label_15_2) . '" style="margin-bottom: 5px;"> <span style="margin-right: 10px;">' . trim($label_15_2) . '</span><br>';
                            }
                          ?>
                          <label for="" class="mt-2">Others, please specify...</label>
                          <textarea class="form-control" placeholder="Enter other answer" name="r_15_2_others" rows="2"></textarea>
                      </div>

                     
                      <button type="button" class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                      <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                    </div>

                    <!-- Form Step 3 -->
                    <div id="form-step-3" class="content p-4" role="tabpanel">
                      <div class="form-group">
                        <?php 
                          $sixteen = mysqli_query($conn, "SELECT * FROM question WHERE order_by=16");
                          $r_16 = mysqli_fetch_array($sixteen);
                          $labels_16 = explode(',', $r_16['label']);
                        ?>
                          <label for=""><?= $r_16['question'] ?></label> <br>
                          <input type="hidden" class="form-control" id="" name="r_16" value="<?= $r_16['quest_ID'] ?>">
                          <?php
                            // Iterate through each label and create corresponding checkboxes
                            foreach ($labels_16 as $label_16) {
                                echo '<input type="radio" name="presently_employed" class="presently-employed-checkbox" value="' . trim($label_16) . '" style="margin-bottom: 5px;"> <span style="margin-right: 10px;">' . trim($label_16) . '</span><br>';
                            }
                          ?>
                      </div>
                      
                      <div class="form-group hide-if-yes">
                        <hr>
                        <?php 
                          $seventeen = mysqli_query($conn, "SELECT * FROM question WHERE order_by=17");
                          $r_17 = mysqli_fetch_array($seventeen);
                          $labels_17 = explode(',', $r_17['label']);
                        ?>
                          <label for=""><?= $r_17['question'] ?></label> <br>
                          <input type="hidden" class="form-control" id="" name="r_17" value="<?= $r_17['quest_ID'] ?>">
                          <?php
                            // Iterate through each label and create corresponding checkboxes
                            foreach ($labels_17 as $label_17) {
                                echo '<input type="checkbox" name="unemployed_reason[]" value="' . trim($label_17) . '" style="margin-bottom: 5px;"> <span style="margin-right: 10px;">' . trim($label_17) . '</span><br>';
                            }
                          ?>
                          <label for="" class="mt-2">Others, please specify...</label>
                          <textarea class="form-control" placeholder="Enter other answer" name="r_17_others" rows="2"></textarea>
                      </div>

                      <div class="form-group">
                        <hr>
                        <?php 
                          $eighteen = mysqli_query($conn, "SELECT * FROM question WHERE order_by=18");
                          $r_18 = mysqli_fetch_array($eighteen);
                          $labels_18 = explode(',', $r_18['label']);
                        ?>
                          <label for=""><?= $r_18['question'] ?></label> <br>
                          <input type="hidden" class="form-control" id="" name="r_18" value="<?= $r_18['quest_ID'] ?>">
                          <?php
                            // Iterate through each label and create corresponding checkboxes
                            foreach ($labels_18 as $label_18) {
                                echo '<input type="radio" name="employment_status" value="' . trim($label_18) . '" style="margin-bottom: 5px;"> <span style="margin-right: 10px;">' . trim($label_18) . '</span><br>';
                            }
                          ?>
                          <label for="" class="mt-2">If self-employed, what skills acquired in college were you able to apply in your work? </label>
                          <textarea class="form-control" placeholder="Enter other answer" name="r_18_skills" rows="2"></textarea>
                      </div>

                      <div class="form-group">
                        <hr>
                        <?php 
                          $nineteen = mysqli_query($conn, "SELECT * FROM question WHERE order_by=19");
                          $r_19 = mysqli_fetch_array($nineteen);
                        ?>
                          <label for=""><?= $r_19['question'] ?></label> <br>
                          <input type="hidden" class="form-control" name="r_19" value="<?= $r_19['quest_ID'] ?>">
                          <textarea class="form-control" placeholder="Enter answer" name="r_19_answer" rows="2"></textarea>
                      </div>

                      <div class="form-group">
                        <hr>
                        <?php 
                          $twenty = mysqli_query($conn, "SELECT * FROM question WHERE order_by=20");
                          $r_20 = mysqli_fetch_array($twenty);
                          $labels_20 = explode(',', $r_20['label']);
                        ?>
                          <label for=""><?= $r_20['question'] ?></label> <br>
                          <input type="hidden" class="form-control" id="" name="r_20" value="<?= $r_20['quest_ID'] ?>">
                          <?php
                            // Iterate through each label and create corresponding checkboxes
                            foreach ($labels_20 as $label_20) {
                                echo '<input type="checkbox" name="line_of_business[]" value="' . trim($label_20) . '" style="margin-bottom: 5px;"> <span style="margin-right: 10px;">' . trim($label_20) . '</span><br>';
                            }
                          ?>
                      </div>

                      <div class="form-group">
                        <hr>
                        <?php 
                          $twenty_1 = mysqli_query($conn, "SELECT * FROM question WHERE order_by=21");
                          $r_21 = mysqli_fetch_array($twenty_1);
                          $labels_21 = explode(',', $r_21['label']);
                        ?>
                          <label for=""><?= $r_21['question'] ?></label> <br>
                          <input type="hidden" class="form-control" id="" name="r_21" value="<?= $r_21['quest_ID'] ?>">
                          <?php
                            // Iterate through each label and create corresponding checkboxes
                            foreach ($labels_21 as $label_21) {
                                echo '<input type="radio" name="place_work" value="' . trim($label_21) . '" style="margin-bottom: 5px;"> <span style="margin-right: 10px;">' . trim($label_21) . '</span><br>';
                            }
                          ?>
                      </div>

                      <div class="form-group">
                        <hr>
                        <?php 
                          $twenty_2 = mysqli_query($conn, "SELECT * FROM question WHERE order_by=22");
                          $r_22 = mysqli_fetch_array($twenty_2);
                          $labels_22 = explode(',', $r_22['label']);
                        ?>
                          <label for=""><?= $r_22['question'] ?></label> <br>
                          <input type="hidden" class="form-control" id="" name="r_22" value="<?= $r_22['quest_ID'] ?>">
                          <?php
                            // Iterate through each label and create corresponding checkboxes
                            foreach ($labels_22 as $label_22) {
                                echo '<input type="radio" name="is_first_job" value="' . trim($label_22) . '" class="first-job-radio" style="margin-bottom: 5px;"> <span style="margin-right: 10px;">' . trim($label_22) . '</span><br>';
                            }
                          ?>
                      </div>

                     

                      <button type="button" class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                      <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                    </div>

                    <!-- Form Step 4 -->
                    <div id="form-step-4" class="content p-4" role="tabpanel">

                      <div class="form-group hide-if-no">
                        <hr>
                        <?php 
                          $twenty_3 = mysqli_query($conn, "SELECT * FROM question WHERE order_by=23");
                          $r_23 = mysqli_fetch_array($twenty_3);
                          $labels_23 = explode(',', $r_23['label']);
                        ?>
                          <label for=""><?= $r_23['question'] ?></label> <br>
                          <input type="hidden" class="form-control" id="" name="r_23" value="<?= $r_23['quest_ID'] ?>">
                          <?php
                            // Iterate through each label and create corresponding checkboxes
                            foreach ($labels_23 as $label_23) {
                                echo '<input type="checkbox" name="staying_job[]" value="' . trim($label_23) . '" style="margin-bottom: 5px;"> <span style="margin-right: 10px;">' . trim($label_23) . '</span><br>';
                            }
                          ?>
                          <label for="" class="mt-2">Others, please specify...</label>
                          <textarea class="form-control" placeholder="Enter other answer" name="r_23_others" rows="2"></textarea>
                      </div>

                      

                      <div class="form-group hide-if-no">
                        <hr>
                        <?php 
                          $twenty_4 = mysqli_query($conn, "SELECT * FROM question WHERE order_by=24");
                          $r_24 = mysqli_fetch_array($twenty_4);
                          $labels_24 = explode(',', $r_24['label']);
                        ?>
                          <label for=""><?= $r_24['question'] ?></label> <br>
                          <input type="hidden" class="form-control" id="" name="r_24" value="<?= $r_24['quest_ID'] ?>">
                          <?php
                            // Iterate through each label and create corresponding checkboxes
                            foreach ($labels_24 as $label_24) {
                                echo '<input type="radio" name="job_related" value="' . trim($label_24) . '" class="job-related-radio" style="margin-bottom: 5px;"> <span style="margin-right: 10px;">' . trim($label_24) . '</span><br>';
                            }
                          ?>
                      </div>

                      <div class="form-group hide-if-no hide_25_if-no">
                        <hr>
                        <?php 
                          $twenty_5 = mysqli_query($conn, "SELECT * FROM question WHERE order_by=25");
                          $r_25 = mysqli_fetch_array($twenty_5);
                          $labels_25 = explode(',', $r_25['label']);
                        ?>
                          <label for=""><?= $r_25['question'] ?></label> <br>
                          <input type="hidden" class="form-control" id="" name="r_25" value="<?= $r_25['quest_ID'] ?>">
                          <?php
                            // Iterate through each label and create corresponding checkboxes
                            foreach ($labels_25 as $label_25) {
                                echo '<input type="checkbox" name="accepting_job[]" value="' . trim($label_25) . '" style="margin-bottom: 5px;"> <span style="margin-right: 10px;">' . trim($label_25) . '</span><br>';
                            }
                          ?>
                          <label for="" class="mt-2">Others, please specify...</label>
                          <textarea class="form-control" placeholder="Enter other answer" name="r_25_others" rows="2"></textarea>
                      </div>

                      <div class="form-group">
                        <hr>
                        <?php 
                          $twenty_6 = mysqli_query($conn, "SELECT * FROM question WHERE order_by=26");
                          $r_26 = mysqli_fetch_array($twenty_6);
                          $labels_26 = explode(',', $r_26['label']);
                        ?>
                          <label for=""><?= $r_26['question'] ?></label> <br>
                          <input type="hidden" class="form-control" id="" name="r_26" value="<?= $r_26['quest_ID'] ?>">
                          <?php
                            // Iterate through each label and create corresponding checkboxes
                            foreach ($labels_26 as $label_26) {
                                echo '<input type="checkbox" name="changing_job[]" value="' . trim($label_26) . '" style="margin-bottom: 5px;"> <span style="margin-right: 10px;">' . trim($label_26) . '</span><br>';
                            }
                          ?>
                          <label for="" class="mt-2">Others, please specify...</label>
                          <textarea class="form-control" placeholder="Enter other answer" name="r_26_others" rows="2"></textarea>
                      </div>

                      <div class="form-group">
                        <hr>
                        <?php 
                          $twenty_7 = mysqli_query($conn, "SELECT * FROM question WHERE order_by=27");
                          $r_27 = mysqli_fetch_array($twenty_7);
                        ?>
                          <label for=""><?= $r_27['question'] ?></label> <br> 
                          <input type="hidden" class="form-control" id="" name="r_27" value="<?= $r_27['quest_ID'] ?>">
                              <?php
                                  // Explode the values in the label column by commas
                                  $labels_27 = explode(',', $r_27['label']);
                                  // Iterate through each label and create corresponding checkboxes
                                  foreach ($labels_27 as $label_27) {
                                      echo '<input type="radio" name="job_longevity" value="' . trim($label_27) . '" style="margin-bottom: 5px;"> <span style="margin-right: 10px;">' . trim($label_27) . '</span><br>';
                                  }
                                ?>
                            <label for="" class="mt-2">Others, please specify...</label>
                            <textarea class="form-control" placeholder="Enter other answer" name="r_27_others" rows="2"></textarea>
                      </div>

                      <div class="form-group">
                        <hr>
                        <?php 
                          $twenty_8 = mysqli_query($conn, "SELECT * FROM question WHERE order_by=28");
                          $r_28 = mysqli_fetch_array($twenty_8);
                        ?>
                          <label for=""><?= $r_28['question'] ?></label> <br> 
                          <input type="hidden" class="form-control" id="" name="r_28" value="<?= $r_28['quest_ID'] ?>">
                              <?php
                                  // Explode the values in the label column by commas
                                  $labels_28 = explode(',', $r_28['label']);
                                  // Iterate through each label and create corresponding checkboxes
                                  foreach ($labels_28 as $label_28) {
                                      echo '<input type="radio" name="founding_job" value="' . trim($label_28) . '" style="margin-bottom: 5px;"> <span style="margin-right: 10px;">' . trim($label_28) . '</span><br>';
                                  }
                                ?>
                            <label for="" class="mt-2">Others, please specify...</label>
                            <textarea class="form-control" placeholder="Enter other answer" name="r_28_others" rows="2"></textarea>
                      </div>

                      <div class="form-group">
                        <hr>
                        <?php 
                          $twenty_9 = mysqli_query($conn, "SELECT * FROM question WHERE order_by=29");
                          $r_29 = mysqli_fetch_array($twenty_9);
                        ?>
                          <label for=""><?= $r_29['question'] ?></label> <br> 
                          <input type="hidden" class="form-control" id="" name="r_29" value="<?= $r_29['quest_ID'] ?>">
                              <?php
                                  // Explode the values in the label column by commas
                                  $labels_29 = explode(',', $r_29['label']);
                                  // Iterate through each label and create corresponding checkboxes
                                  foreach ($labels_29 as $label_29) {
                                      echo '<input type="radio" name="job_landing" value="' . trim($label_29) . '" style="margin-bottom: 5px;"> <span style="margin-right: 10px;">' . trim($label_29) . '</span><br>';
                                  }
                                ?>
                            <label for="" class="mt-2">Others, please specify...</label>
                            <textarea class="form-control" placeholder="Enter other answer" name="r_29_others" rows="2"></textarea>
                      </div>

                      <div class="form-group">
                        <hr>
                        <?php 
                            $thirty = mysqli_query($conn, "SELECT * FROM question WHERE order_by=30");
                            $r_30 = mysqli_fetch_array($thirty);
                        ?>
                        <label for="<?= $r_30['quest_ID'] ?>"><?= $r_30['question'] ?></label>
                        <input type="hidden" class="form-control" id="<?= $r_30['quest_ID'] ?>" name="r_30" value="<?= $r_30['quest_ID'] ?>">

                        <div class="row">
                            <div class="col-lg-6 col-md-8 col-12">
                              <label for="">Description</label><br>
                                <?php
                                // Explode the values in the label column by commas
                                $labels_30 = explode(',', $r_30['label']);

                                // Iterate through each label and create corresponding label elements
                                foreach ($labels_30 as $label_30) {
                                    echo '<p class="checkbox-label">' . trim($label_30) . '</p>';
                                }
                                ?>
                            </div>
                            <div class="col-lg-3 col-md-3 col-12 text-center">
                              <label for="">First Job</label> <br>
                                <?php
                                // Iterate through each label and create corresponding checkboxes
                                foreach ($labels_30 as $label_30) {
                                    echo '<input type="checkbox" name="first_job[]" value="' . trim($label_30) . '" style="margin-bottom: 28px;"><br>';
                                }
                                ?>
                            </div>
                            <div class="col-lg-3 col-md-3 col-12 text-center">
                              <label for="">Current or Present Job</label> <br>
                                <?php
                                // Iterate through each label and create corresponding checkboxes
                                foreach ($labels_30 as $label_30) {
                                    echo '<input type="checkbox" name="current_job[]" value="' . trim($label_30) . '" style="margin-bottom: 28px;"> <br>';
                                }
                                ?>

                            </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <hr>
                        <?php 
                          $thirty_1 = mysqli_query($conn, "SELECT * FROM question WHERE order_by=31");
                          $r_31 = mysqli_fetch_array($thirty_1);
                        ?>
                          <label for=""><?= $r_31['question'] ?></label> <br> 
                          <input type="hidden" class="form-control" id="" name="r_31" value="<?= $r_31['quest_ID'] ?>">
                              <?php
                                // Explode the values in the label column by commas
                                $labels_31 = explode(',', $r_31['label']);
                                // Iterate through each label and create corresponding checkboxes
                                foreach ($labels_31 as $label_31) {
                                    echo '<input type="radio" name="monthly_earning" value="' . trim($label_31) . '" style="margin-bottom: 5px;"> <span style="margin-right: 10px;">' . trim($label_31) . '</span><br>';
                                }
                              ?>
                      </div>

                      <div class="form-group">
                        <hr>
                        <?php 
                          $thirty_2 = mysqli_query($conn, "SELECT * FROM question WHERE order_by=32");
                          $r_32 = mysqli_fetch_array($thirty_2);
                        ?>
                          <label for=""><?= $r_32['question'] ?></label> <br> 
                          <input type="hidden" class="form-control" id="" name="r_32" value="<?= $r_32['quest_ID'] ?>">
                              <?php
                                  // Explode the values in the label column by commas
                                  $labels_32 = explode(',', $r_32['label']);
                                  // Iterate through each label and create corresponding checkboxes
                                  foreach ($labels_32 as $label_32) {
                                      echo '<input type="radio" name="curriculum" value="' . trim($label_32) . '" class="curriculum-radio" style="margin-bottom: 5px;"> <span style="margin-right: 10px;">' . trim($label_32) . '</span><br>';
                                  }
                                ?>
                      </div>

                      <div class="form-group hide-if-curriculum-no">
                        <hr>
                        <?php 
                          $thirty_3 = mysqli_query($conn, "SELECT * FROM question WHERE order_by=33");
                          $r_33 = mysqli_fetch_array($thirty_3);
                        ?>
                          <label for=""><?= $r_33['question'] ?></label> <br> 
                          <input type="hidden" class="form-control" id="" name="r_33" value="<?= $r_33['quest_ID'] ?>">
                              <?php
                                  // Explode the values in the label column by commas
                                  $labels_33 = explode(',', $r_33['label']);
                                  // Iterate through each label and create corresponding checkboxes
                                  foreach ($labels_33 as $label_33) {
                                      echo '<input type="radio" name="competencies_learned[]" value="' . trim($label_33) . '" style="margin-bottom: 5px;"> <span style="margin-right: 10px;">' . trim($label_33) . '</span><br>';
                                  }
                                ?>
                            <label for="" class="mt-2">Other skills, please specify...</label>
                            <textarea class="form-control" placeholder="Enter other answer" name="r_33_others" rows="2"></textarea>
                      </div>

                      <div class="form-group">
                        <hr>
                        <?php 
                          $thirty_4 = mysqli_query($conn, "SELECT * FROM question WHERE order_by=34");
                          $r_34 = mysqli_fetch_array($thirty_4);
                        ?>
                        <label for=""><?= $r_34['question'] ?></label>
                        <input type="hidden" class="form-control" id="" name="r_34" value="<?= $r_34['quest_ID'] ?>">
                        <textarea class="form-control" placeholder="Enter suggestions for improvement" name="r_34_answer" rows="2"></textarea>
                      </div>

                      <div class="form-group mt-5">
                          <hr>
                          <p><b>Thank you</b> for taking time out to fill out this questionnaire. <b>Please return this GTS to your Institution.</b> Being one of the alumni of your institution, may we request you to list down the names of other college graduates (AY 2000-2001 to AY 2003-2004) from your institution, including their addresses and contact numbers. Their participation will also be needed to make this study more meaningful and useful.</p>
                          <button type="button" class="btn btn-success btn-sm mb-3 float-right" onclick="addRow4()">Add Row</button>
                          <table class="table table-bordered" id="collegeGraduate">
                              <thead>
                                  <tr>
                                      <th>Name</th>
                                      <th>Full Address</th>
                                      <th>Contact Number</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td><input type="text" class="form-control form-control-sm" name="graduate_name[]" /></td>
                                      <td><input type="text" class="form-control form-control-sm" name="graduate_address[]" /></td>
                                      <td><input type="text" class="form-control form-control-sm" name="graduate_contact[]" /></td>
                                      <td><button type="button" class="btn btn-danger btn-sm" onclick="removeRow4(this)">Remove</button></td>
                                  </tr>
                              </tbody>
                          </table>
                          <hr>
                      </div>


                      <button type="button" class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                      <!-- <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button> -->
                      <button type="submit" class="btn btn-primary" name="save_answer">Submit</button>
                    </div>

                  </form>
                </div>
              </div>
            </div>
            <!-- <div class="card-footer">
              Visit <a href="https://github.com/Johann-S/bs-stepper/#how-to-use-it">bs-stepper documentation</a> for more examples and information about the plugin.
            </div> -->
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

<script>

    function onSubmit() {
      var table = document.getElementById("educationTable").getElementsByTagName('tbody')[0];
      var rows = table.getElementsByTagName("tr");
      
      for (var i = 0; i < rows.length; i++) {
        var inputsInRow = rows[i].getElementsByTagName("input");

        for (var j = 0; j < inputsInRow.length; j++) {
          // Check if the input is required and empty
          if (inputsInRow[j].hasAttribute("required") && inputsInRow[j].value.trim() === "") {
            alert("Please fill in all fields in row " + (i + 1));
            return false; // Prevent form submission
          }
        }
      }

      // If all required fields are filled, the form will be submitted
      console.log("Form is valid. Submitting...");
      return true;
    }

    // Function to add a new row
    function addRow() {
      var table = document.getElementById("educationTable").getElementsByTagName('tbody')[0];
      var newRow = table.insertRow(table.rows.length);

      for (var i = 0; i < 4; i++) {
        var cell = newRow.insertCell(i);
        var input = document.createElement("input");
        input.className = "form-control form-control-sm";

        if (i === 2) {
          // For the "year[]" input, use "date" type without a default value
          input.type = "date";
        } else {
          // For other inputs, use "text" type
          input.type = "text";
        }

        input.name = (i === 0) ? "degree[]" : (i === 1) ? "university[]" : (i === 2) ? "year[]" : "honor[]";
        input.setAttribute("oninput", "setRequired(this)");
        cell.appendChild(input);
      }

      var actionCell = newRow.insertCell(4);
      var removeButton = document.createElement("button");
      removeButton.type = "button";
      removeButton.className = "btn btn-danger btn-sm";
      removeButton.innerHTML = "Remove";
      removeButton.onclick = function () {
        removeRow(this);
      };
      actionCell.appendChild(removeButton);
    }

    // Function to set "required" attribute for all input fields in the same row
    function setRequired(input) {
      var row = input.parentNode.parentNode;
      var inputsInRow = row.getElementsByTagName("input");
      for (var i = 0; i < inputsInRow.length; i++) {
        inputsInRow[i].required = true;
      }
    }

    // Function to remove a row
    function removeRow(button) {
      var row = button.parentNode.parentNode;
      row.parentNode.removeChild(row);
    }
</script>

<script>
    function onSubmit() {
        var table = document.getElementById("examinationTable").getElementsByTagName('tbody')[0];
        var rows = table.getElementsByTagName("tr");

        for (var i = 0; i < rows.length; i++) {
            var inputsInRow = rows[i].getElementsByTagName("input");

            for (var j = 0; j < inputsInRow.length; j++) {
                // Check if the input is required and empty
                if (inputsInRow[j].hasAttribute("required") && inputsInRow[j].value.trim() === "") {
                    alert("Please fill in all fields in row " + (i + 1));
                    return false; // Prevent form submission
                }
            }
        }

        // If all required fields are filled, the form will be submitted
        console.log("Form is valid. Submitting...");
        return true;
    }

    function setRequired(input) {
        var row = input.parentNode.parentNode;
        var inputsInRow = row.getElementsByTagName("input");
        for (var i = 0; i < inputsInRow.length; i++) {
            inputsInRow[i].required = true;
        }
    }

    function addRow2() {
        var table = document.getElementById("examinationTable").getElementsByTagName('tbody')[0];
        var newRow = table.insertRow(table.rows.length);

        for (var i = 0; i < 3; i++) {
            var cell = newRow.insertCell(i);
            var input = document.createElement("input");
            input.type = (i === 1) ? "date" : "text";
            input.className = "form-control form-control-sm";
            input.name = (i === 0) ? "examination[]" : (i === 1) ? "date_taken[]" : "rating[]";
            input.required = true; // Set the "required" attribute for new inputs
            cell.appendChild(input);
        }

        var actionCell = newRow.insertCell(3);
        var removeButton = document.createElement("button");
        removeButton.type = "button";
        removeButton.className = "btn btn-danger btn-sm";
        removeButton.innerHTML = "Remove";
        removeButton.onclick = function () {
            removeRow2(this);
        };
        actionCell.appendChild(removeButton);
    }

    function removeRow2(button) {
        var row = button.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }
</script>

<script>
    function onSubmit() {
        var table = document.getElementById("trainingTable").getElementsByTagName('tbody')[0];
        var rows = table.getElementsByTagName("tr");

        for (var i = 0; i < rows.length; i++) {
            var inputsInRow = rows[i].getElementsByTagName("input");

            for (var j = 0; j < inputsInRow.length; j++) {
                // Check if the input is required and empty
                if (inputsInRow[j].hasAttribute("required") && inputsInRow[j].value.trim() === "") {
                    alert("Please fill in all fields in row " + (i + 1));
                    return false; // Prevent form submission
                }
            }
        }

        // If all required fields are filled, the form will be submitted
        console.log("Form is valid. Submitting...");
        return true;
    }

    function setRequired(input) {
        var row = input.parentNode.parentNode;
        var inputsInRow = row.getElementsByTagName("input");
        for (var i = 0; i < inputsInRow.length; i++) {
            inputsInRow[i].required = true;
        }
    }

    function addRow3() {
        var table = document.getElementById("trainingTable").getElementsByTagName('tbody')[0];
        var newRow = table.insertRow(table.rows.length);

        for (var i = 0; i < 3; i++) {
            var cell = newRow.insertCell(i);
            var input = document.createElement("input");
            input.type = "text";
            input.className = "form-control form-control-sm";
            input.name = (i === 0) ? "training_title[]" : (i === 1) ? "duration[]" : "training_institution[]";
            input.required = true; // Set the "required" attribute for new inputs
            cell.appendChild(input);
        }

        var actionCell = newRow.insertCell(3);
        var removeButton = document.createElement("button");
        removeButton.type = "button";
        removeButton.className = "btn btn-danger btn-sm";
        removeButton.innerHTML = "Remove";
        removeButton.onclick = function () {
            removeRow3(this);
        };
        actionCell.appendChild(removeButton);
    }

    function removeRow3(button) {
        var row = button.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }
</script>

<script>
    function addRow4() {
        var table = document.getElementById("collegeGraduate").getElementsByTagName('tbody')[0];
        var newRow = table.insertRow(table.rows.length);

        for (var i = 0; i < 3; i++) {
            var cell = newRow.insertCell(i);
            var input = document.createElement("input");
            input.className = "form-control form-control-sm";

            if (i === 1) {
                // For the "graduate_address[]" input, use "text" type
                input.type = "text";
            } else {
                // For other inputs, use "text" type
                input.type = "text";
            }

            input.name = (i === 0) ? "graduate_name[]" : (i === 1) ? "graduate_address[]" : "graduate_contact[]";
            input.setAttribute("oninput", "setRequired(this)");
            cell.appendChild(input);
        }

        var actionCell = newRow.insertCell(3);
        var removeButton = document.createElement("button");
        removeButton.type = "button";
        removeButton.className = "btn btn-danger btn-sm";
        removeButton.innerHTML = "Remove";
        removeButton.onclick = function () {
            removeRow4(this);
        };
        actionCell.appendChild(removeButton);
    }

    function setRequired(input) {
        // Set "required" attribute for the current input field
        // input.required = true;
        input.required = false;
    }

    function removeRow4(button) {
        var row = button.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }

    // Function to be called on form submission
    function onSubmit() {
        var table = document.getElementById("collegeGraduate").getElementsByTagName('tbody')[0];
        var rows = table.getElementsByTagName("tr");

        for (var i = 0; i < rows.length; i++) {
            var inputsInRow = rows[i].getElementsByTagName("input");
            var values = [];

            for (var j = 0; j < inputsInRow.length; j++) {
                values.push(inputsInRow[j].value);
            }

            // Check if any input field in the row is empty
            // if (values.some(value => value.trim() === '')) {
            //     alert("Please fill in all fields before submitting.");
            //     return;
            // }

            // Assuming you want to concatenate the values with commas
            var concatenatedValues = values.join(",");
            console.log("Row " + (i + 1) + ": " + concatenatedValues);
        }

        // Add the logic to submit the form or perform other actions
    }
</script>

<script>
$(document).ready(function() {
    // Function to toggle visibility based on checkbox value
    function toggleVisibility(checkbox, targetDiv) {
        if (checkbox.prop('checked') && checkbox.val() === 'Yes') {
            targetDiv.hide();
        } else {
            targetDiv.show();
        }
    }

    // Initial check on page load
    toggleVisibility($('.presently-employed-checkbox'), $('.form-group.hide-if-yes'));

    // Attach change event to checkbox
    $('.presently-employed-checkbox').change(function() {
        toggleVisibility($(this), $('.form-group.hide-if-yes'));
    });
});
</script>

<script>
$(document).ready(function() {
    // Function to toggle visibility based on radio button value
    function toggleVisibility(radio, targetDiv) {
        if (radio.prop('checked') && radio.val().toLowerCase() === 'no') {
            targetDiv.hide();
        } else {
            targetDiv.show();
        }
    }

    // Initial check on page load
    toggleVisibility($('.first-job-radio:checked'), $('.form-group.hide-if-no'));

    // Attach change event to radio button
    $('.first-job-radio').change(function() {
        toggleVisibility($(this), $('.form-group.hide-if-no'));
    });
});
</script>

<script>
$(document).ready(function() {
    // Function to toggle visibility based on radio button value
    function toggleVisibility(radio, targetDiv) {
        if (radio.prop('checked') && radio.val().toLowerCase() === 'no') {
            targetDiv.hide();
        } else {
            targetDiv.show();
        }
    }

    // Initial check on page load
    toggleVisibility($('.job-related-radio:checked'), $('.form-group.hide_25_if-no'));

    // Attach change event to radio button
    $('.job-related-radio').change(function() {
        toggleVisibility($(this), $('.form-group.hide_25_if-no'));
    });
});
</script>

<script>
$(document).ready(function() {
    // Function to toggle visibility based on radio button value
    function toggleVisibility(radio, targetDiv) {
        if (radio.prop('checked') && radio.val().toLowerCase() === 'no') {
            targetDiv.hide();
        } else {
            targetDiv.show();
        }
    }

    // Initial check on page load
    toggleVisibility($('.curriculum-radio:checked'), $('.form-group.hide-if-curriculum-no'));

    // Attach change event to radio button
    $('.curriculum-radio').change(function() {
        toggleVisibility($(this), $('.form-group.hide-if-curriculum-no'));
    });
});
</script>


<script>
  document.addEventListener('DOMContentLoaded', function () {
    var stepper = new Stepper(document.querySelector('.bs-stepper'));
  });
</script>
