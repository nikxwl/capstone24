<title>AGTGT | Manage Questionnaire</title>
<?php 
    require_once 'sidebar.php'; 
    if(isset($_GET['page'])) {
      $page = $_GET['page'];
?>

<div class="content-wrapper">
  <?php if($page === 'create') { ?>
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manage Questionnaire</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Manage Questionnaire Add</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <form action="process_save.php" method="POST" enctype="multipart/form-data">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Fill-in the required fields below</h3>
              <div class="card-tools mt-2">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="">Question</label>
                    <textarea name="question" id="" cols="30" rows="2" placeholder="Enter question" class="form-control" required></textarea>
                  </div>
                  <div class="form-group">
                    <label for="">Question Answer Type</label>
                    <select name="choice_type" id="choice_type" class="form-control" required onchange="showHideOptions()">
                      <option value="" selected disabled>Select type</option>
                      <option value="Single Answer/Radio Button">Single Answer/Radio Button</option>
                      <option value="Multiple Answer/Checkboxes">Multiple Answer/Checkboxes</option>
                      <option value="Textfield/Textarea">Textfield/Textarea</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                  <div id="check_opt_clone"  style="display: none">
                    <div class="callout callout-info">
                      <table width="100%" class="table">
                        <colgroup>
                        <col width="10%">
                        <col width="80%">
                        <col width="10%">
                        </colgroup>
                        <thead>
                          <tr class="">
                            <th class="text-center"></th>
                            <th class="text-center">
                              <label for="" class="control-label">Label</label>
                            </th>
                            <th class="text-center"></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="">
                            <td class="text-center">
                              <div class="icheck-primary d-inline" data-count = '1'>
                                <input type="checkbox" id="checkboxPrimary1" checked="">
                                <label for="checkboxPrimary1">
                                </label>
                              </div>
                            </td>
                            <td class="text-center">
                              <input type="text" class="form-control form-control-sm check_inp" name="label[]">
                            </td>
                            <td class="text-center"></td>
                          </tr>
                          <tr class="">
                            <td class="text-center">
                              <div class="icheck-primary d-inline" data-count = '2'>
                                <input type="checkbox" id="checkboxPrimary2" >
                                <label for="checkboxPrimary2">
                                </label>
                              </div>
                            </td>
                            <td class="text-center">
                              <input type="text" class="form-control form-control-sm check_inp" name="label[]">
                            </td>
                            <td class="text-center"></td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="row">
                        <div class="col-sm-12 text-center">
                          <button class="btn btn-sm btn-flat btn-default" type="button" onclick="new_check($(this))"><i class="fa fa-plus"></i> Add</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="radio_opt_clone" style="display: none">
                    <div class="callout callout-info">
                      <table width="100%" class="table">
                        <colgroup>
                        <col width="10%">
                        <col width="80%">
                        <col width="10%">
                        </colgroup>
                        <thead>
                          <tr class="">
                            <th class="text-center"></th>
                            <th class="text-center">
                              <label for="" class="control-label">Label</label>
                            </th>
                            <th class="text-center"></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="">
                            <td class="text-center">
                              <div class="icheck-primary d-inline" data-count = '1'>
                                <input type="radio" id="radioPrimary1" name="radio" checked="">
                                <label for="radioPrimary1">
                                </label>
                              </div>
                            </td>
                            <td class="text-center">
                              <input type="text" class="form-control form-control-sm check_inp"  name="label[]">
                            </td>
                            <td class="text-center"></td>
                          </tr>
                          <tr class="">
                            <td class="text-center">
                              <div class="icheck-primary d-inline" data-count = '2'>
                                <input type="radio" id="radioPrimary2" name="radio" >
                                <label for="radioPrimary2">
                                </label>
                              </div>
                            </td>
                            <td class="text-center">
                              <input type="text" class="form-control form-control-sm check_inp"  name="label[]">
                            </td>
                            <td class="text-center"></td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="row">
                        <div class="col-sm-12 text-center">
                          <button class="btn btn-sm btn-flat btn-default" type="button" onclick="new_radio($(this))"><i class="fa fa-plus"></i> Add</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="textfield_s_clone" style="display: none">
                    <div class="callout callout-info">
                      <textarea name="frm_opt" id="" cols="30" rows="10" class="form-control" disabled=""  placeholder="Write Something here..."></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary float-right btn-sm" name="create_question" id="submit_button"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
              <a href="questionnaire.php" class="btn btn-secondary float-right btn-sm mr-1"><i class="fa-solid fa-backward"></i> Cancel</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
  <?php } else { 
    $quest_ID = $page;
    $fetch = mysqli_query($conn, "SELECT * FROM question WHERE quest_ID=$quest_ID");
    $row = mysqli_fetch_array($fetch);
    $labels = explode(', ', $row['label']);
  ?>
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Alumni</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Alumni Update</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <form action="process_update.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" class="form-control" name="quest_ID" required value="<?php echo $row['quest_ID']; ?>">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Fill-in the required fields below</h3>
              <div class="card-tools mt-2">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="">Question</label>
                    <textarea name="question" id="" cols="30" rows="2" placeholder="Enter question" class="form-control" required><?= $row['question'] ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="">Question Answer Type</label>
                    <select name="choice_type" id="choice_type" class="form-control" required onchange="showHideOptions()">
                      <option value="" selected disabled>Select type</option>
                      <option value="Single Answer/Radio Button" <?php if($row['choice_type'] == 'Single Answer/Radio Button') { echo 'selected'; } ?>>Single Answer/Radio Button</option>
                      <option value="Multiple Answer/Checkboxes" <?php if($row['choice_type'] == 'Multiple Answer/Checkboxes') { echo 'selected'; } ?>>Multiple Answer/Checkboxes</option>
                      <option value="Textfield/Textarea" <?php if($row['choice_type'] == 'Textfield/Textarea') { echo 'selected'; } ?>>Textfield/Textarea</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div id="check_opt_clone"  style="display: <?php if($row['choice_type'] == 'Multiple Answer/Checkboxes') { echo 'block'; } else { echo 'none';  } ?>">
                      <div class="callout callout-info">
                        <table width="100%" class="table">
                          <colgroup>
                          <col width="10%">
                          <col width="80%">
                          <col width="10%">
                          </colgroup>
                          <thead>
                            <tr class="">
                              <th class="text-center"></th>
                              <th class="text-center">
                                <label for="" class="control-label">Label</label>
                              </th>
                              <th class="text-center"></th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php
                              $checkboxCount = 1;

                              foreach ($labels as $label) {
                              ?>
                                  <tr class="">
                                      <td class="text-center">
                                          <div class="icheck-primary d-inline" data-count='<?php echo $checkboxCount; ?>'>
                                              <input type="checkbox" id="checkboxPrimary<?php echo $checkboxCount; ?>" checked="">
                                              <label for="checkboxPrimary<?php echo $checkboxCount; ?>">
                                              </label>
                                          </div>
                                      </td>
                                      <td class="text-center">
                                          <input type="text" class="form-control form-control-sm check_inp" name="label[]" value="<?php echo htmlspecialchars($label); ?>">
                                      </td>
                                      <td class="text-center">
                                          <button class="btn btn-sm btn-flat btn-default" type="button" onclick="remove_check($(this))"><i class="fa fa-minus"></i> Remove</button>
                                      </td>
                                      <td class="text-center"></td>
                                  </tr>
                              <?php
                                  $checkboxCount++;
                              }
                              ?>
                          </tbody>
                        </table>
                        <div class="row">
                          <div class="col-sm-12 text-center">
                            <button class="btn btn-sm btn-flat btn-default" type="button" onclick="new_check($(this))"><i class="fa fa-plus"></i> Add</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="radio_opt_clone" style="display: <?php if($row['choice_type'] == 'Single Answer/Radio Button') { echo 'block'; } else { echo 'none';  } ?>">
                      <div class="callout callout-info">
                        <table width="100%" class="table">
                          <colgroup>
                          <col width="10%">
                          <col width="80%">
                          <col width="10%">
                          </colgroup>
                          <thead>
                            <tr class="">
                              <th class="text-center"></th>
                              <th class="text-center">
                                <label for="" class="control-label">Label</label>
                              </th>
                              <th class="text-center"></th>
                            </tr>
                          </thead>
                          <tbody>
                        <?php
                        
                        $radioCount = 1;

                        foreach ($labels as $label) {
                        ?>
                            <tr class="">
                                <td class="text-center">
                                    <div class="icheck-primary d-inline" data-count='<?php echo $radioCount; ?>'>
                                        <input type="radio" id="radioPrimary<?php echo $radioCount; ?>" name="radio" <?php echo ($radioCount == 1) ? 'checked' : ''; ?>>
                                        <label for="radioPrimary<?php echo $radioCount; ?>">
                                        </label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <input type="text" class="form-control form-control-sm check_inp" name="radio_label[]" value="<?php echo htmlspecialchars($label); ?>">
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-fbtn-flat btn-default" type="button" onclick="remove_radio($(this))"><i class="fa fa-minus"></i> Remove</button>
                                </td>
                                <td class="text-center"></td>
                            </tr>
                        <?php
                            $radioCount++;
                        }
                        ?>
                    </tbody>
                        </table>
                        <div class="row">
                          <div class="col-sm-12 text-center">
                            <button class="btn btn-sm btn-flat btn-default" type="button" onclick="update_radio($(this))"><i class="fa fa-plus"></i> Add</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  <div id="textfield_s_clone" style="display: <?php if($row['choice_type'] == 'Textfield/Textarea') { echo 'block'; } else { echo 'none';  } ?>">
                    <div class="callout callout-info">
                      <textarea name="frm_opt" id="" cols="30" rows="10" class="form-control" disabled=""  placeholder="Write Something here..."></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary float-right btn-sm" name="update_question" id="submit_button"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
              <a href="questionnaire.php" class="btn btn-secondary float-right btn-sm mr-2"><i class="fa-solid fa-backward"></i> Cancel</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
  <?php } } else { require_once '../includes/404.php'; } ?>
<br>
<br>
<br>
<?php require_once '../includes/footer.php'; ?>

<script>
  function new_radio(button) {
    var count = button.closest('.callout-info').find('tbody tr').length + 1;
    var newRow = '<tr class="">' +
      '<td class="text-center">' +
      '<div class="icheck-primary d-inline" data-count="' + count + '">' +
      '<input type="radio" id="radioPrimary' + count + '" name="radio">' +
      '<label for="radioPrimary' + count + '"></label>' +
      '</div>' +
      '</td>' +
      '<td class="text-center">' +
      '<input type="text" class="form-control form-control-sm check_inp" name="label[]">' +
      '</td>' +
      '<td class="text-center">' +
      '<button class="btn btn-sm btn-flat btn-default" type="button" onclick="remove_radio($(this))"><i class="fa fa-minus"></i> Remove</button>' +
      '</td>' +
      '</tr>';
    
    button.closest('.callout-info').find('tbody').append(newRow);
  }


  function update_radio(button) {
    var count = button.closest('.callout-info').find('tbody tr').length + 1;
    var newRow = '<tr class="">' +
      '<td class="text-center">' +
      '<div class="icheck-primary d-inline" data-count="' + count + '">' +
      '<input type="radio" id="radioPrimary' + count + '" name="radio">' +
      '<label for="radioPrimary' + count + '"></label>' +
      '</div>' +
      '</td>' +
      '<td class="text-center">' +
      '<input type="text" class="form-control form-control-sm check_inp" name="radio_label[]">' +
      '</td>' +
      '<td class="text-center">' +
      '<button class="btn btn-sm btn-flat btn-default" type="button" onclick="remove_radio($(this))"><i class="fa fa-minus"></i> Remove</button>' +
      '</td>' +
      '</tr>';
    
    button.closest('.callout-info').find('tbody').append(newRow);
  }

  function remove_radio(button) {
    button.closest('tr').remove();
  }
</script>
<script>
  function showHidseOptions() {

       


    var choiceType = $('#choice_type').val();

    // Hide all option divs
    $('#check_opt_clone, #radio_opt_clone, #textfield_s_clone').hide();

    // Show the selected option div
    if (choiceType === 'Single Answer/Radio Button') {
      $('#radio_opt_clone').show();
      initRadioOptions();
    } else if (choiceType === 'Multiple Answer/Checkboxes') {
      $('#check_opt_clone').show();
    } else if (choiceType === 'Textfield/Textarea') {
      $('#textfield_s_clone').show();
    }

     document.getElementById('check_opt_clone').style.display = (choiceType === 'Multiple Answer/Checkboxes') ? 'block' : 'none';
        document.getElementById('radio_opt_clone').style.display = (choiceType === 'Single Answer/Radio Button') ? 'block' : 'none';
    }

  function initRadioOptions() {
    // Initialize the radio options table with at least one row
    new_radio($('#radio_opt_clone').find('.btn-default'));
  }
</script>




<script>
  function new_check(button) {
    var count = button.closest('.callout-info').find('tbody tr').length + 1;
    var newRow = '<tr class="">' +
      '<td class="text-center">' +
      '<div class="icheck-primary d-inline" data-count="' + count + '">' +
      '<input type="checkbox" id="checkboxPrimary' + count + '" checked>' +
      '<label for="checkboxPrimary' + count + '"></label>' +
      '</div>' +
      '</td>' +
      '<td class="text-center">' +
      '<input type="text" class="form-control form-control-sm check_inp" name="label[]">' +
      '</td>' +
      '<td class="text-center">' +
      '<button class="btn btn-sm btn-flat btn-default" type="button" onclick="remove_check($(this))"><i class="fa fa-minus"></i> Remove</button>' +
      '</td>' +
      '</tr>';

    button.closest('.callout-info').find('tbody').append(newRow);
  }

  function remove_check(button) {
    button.closest('tr').remove();
  }
</script>
<script>
  function showHideOptions() {
    var choiceType = $('#choice_type').val();

    // Hide all option divs
    $('#check_opt_clone, #radio_opt_clone, #textfield_s_clone').hide();

    // Show the selected option div
    if (choiceType === 'Single Answer/Radio Button') {
      $('#radio_opt_clone').show();
      initRadioOptions();
    } else if (choiceType === 'Multiple Answer/Checkboxes') {
      $('#check_opt_clone').show();
      initCheckboxOptions();
    } else if (choiceType === 'Textfield/Textarea') {
      $('#textfield_s_clone').show();
    }
  }

  function initRadioOptions() {
    var radioOptionsTable = $('#radio_opt_clone').find('tbody');
    
    // Check if there are existing rows and remove them
    if (radioOptionsTable.children().length > 0) {
      radioOptionsTable.empty();
    }

    // Initialize the radio options table with at least one row
    new_radio($('#radio_opt_clone').find('.btn-default'));
  }

  function initCheckboxOptions() {
    var checkboxOptionsTable = $('#check_opt_clone').find('tbody');

    // Check if there are existing rows and remove them
    if (checkboxOptionsTable.children().length > 0) {
      checkboxOptionsTable.empty();
    }

    // Initialize the checkbox options table with at least one row
    new_check($('#check_opt_clone').find('.btn-default'));
  }
</script>
