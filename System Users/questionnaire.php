<title>AGTGT | Survey questionnaire records</title>
<?php
require_once 'sidebar.php';
?>

<!-- Add the following CDN links to include DataTables and RowReorder extension libraries -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">



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
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header p-2">
              <a href="questionnaire_mgmt.php?page=create" class="btn btn-sm bg-primary ml-2"><i class="fa-sharp fa-solid fa-square-plus"></i> New Survey questionnaire</a>
              <div class="card-tools mr-1 mt-3">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-hover table-sm text-sm">
                <thead>
  <tr>
    <th width="8%">ORDER BY</th>
    <th width="35%">QUESTION</th>
    <th width="35%">TYPE/OPTIONS</th>
    <th width="17%">DATE CREATED</th>
    <th width="13%">TOOLS</th>
  </tr>
</thead>
<tbody id="users_data">
  <?php
    $sql = mysqli_query($conn, "SELECT * FROM question ORDER BY order_by");
    while ($row = mysqli_fetch_array($sql)) {
    $labels = $row['label'];
    $labelArray = explode(', ', $labels);
  ?>
  <tr>
    <td>
      <input type="hidden" class="quest-id" value="<?php echo $row['quest_ID']; ?>">
      <input class="order-by-input form-control" type="number" name="order_by[]" value="<?php echo $row['order_by']; ?>">
    </td>
    <td><?php echo ucwords($row['question']); ?></td>
    <td>
      <?php 
        echo $row['choice_type'];
        if (!empty($labelArray)) {
            echo '<ul>';
            foreach ($labelArray as $label) {
                if (!empty($label)) {
                    echo '<li>' . htmlspecialchars($label) . '</li>';
                }
            }
            echo '</ul>';
        }
      ?>                    
    </td>
    <td class="text-primary"><?php echo date("F d, Y h:i A", strtotime($row['date_created'])); ?></td>
    <td>
      <a class="btn btn-info btn-xs" href="questionnaire_mgmt.php?page=<?php echo $row['quest_ID']; ?>"><i class="fas fa-pencil-alt"></i> Edit</a>
      <button type="button" class="btn bg-danger btn-xs" data-toggle="modal" data-target="#delete<?php echo $row['quest_ID']; ?>"><i class="fas fa-trash"></i> Delete</button>
    </td>
  </tr>
  <?php include 'questionnaire_delete.php'; } ?>
</tbody>

              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php require_once '../includes/footer.php'; ?>

<script>
  $(document).ready(function() {
    $('.order-by-input').on('blur', function() {
      var inputElement = $(this);
      var orderId = inputElement.val();
      var questId = inputElement.closest('tr').find('.quest-id').val();
      var errorMessageContainer = inputElement.closest('tr').find('.error-message');

      // Send AJAX request to check if order_by exists
      $.ajax({
        url: 'update_order.php',
        method: 'POST',
        data: { checkOrderExists: true, orderId: orderId, questId: questId },
        beforeSend: function() {
          // Reset the error message
          errorMessageContainer.text('');
        },
        success: function(response) {
          if (response === 'exists') {
            // Display an alert or a Bootstrap alert here
            alert('This number is already assigned to another question.');
            // Reset the input value
            inputElement.val('');
          } else {
            // Proceed with the actual update
            // Dynamically retrieve orderId and questId again
            orderId = inputElement.val();
            questId = inputElement.closest('tr').find('.quest-id').val();

            $.ajax({
              url: 'update_order.php',
              method: 'POST',
              data: { orderId: orderId, questId: questId },
              success: function(response) {
                console.log(response);
              },
              error: function(xhr, status, error) {
                console.error("Update Error:", xhr.responseText);
              }
            });
          }
        },
        error: function(xhr, status, error) {
          console.error("Check Order Exists Error:", xhr.responseText);
        }
      });
    });
  });
</script>




