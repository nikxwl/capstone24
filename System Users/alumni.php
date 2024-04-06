<title>AGTGT | Alumni records</title>
<?php
require_once 'sidebar.php';
?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Alumni</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Alumni records</li>
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
              <a href="alumni_mgmt.php?page=create" class="btn btn-xs bg-primary ml-2"><i class="fa-sharp fa-solid fa-square-plus"></i> New Alumni</a>
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
                    <th>NAME</th>
                    <th>GENDER</th>
                    <th>EMAIL/CONTACT</th>
                    <th>YEAR GRADUATED</th>
                    <th>CURRENT JOB</th>
                    <th>DATE ADDED</th>
                    <th>TOOLS</th>
                  </tr>
                </thead>
                <tbody id="users_data">
                  <?php
                  $sql = mysqli_query($conn, "SELECT * FROM users WHERE user_type = 4 ");
                  while ($row = mysqli_fetch_array($sql)) {
                  ?>
                  <tr>
                    <td><?php echo $row['firstname'].' '.$row['lastname'].' '.$row['suffix']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['email']; ?> <br> <span class="text-info"><?php if($row['contact'] !== '') { echo '+63 '.$row['contact']; } ?></span></td>
                    <td><?php echo $row['year_graduated']; ?></td>
                    <td><?php echo ucwords($row['current_job']); ?></td>
                    <td class="text-primary"><?php echo date("F d, Y h:i A", strtotime($row['created_at'])); ?></td>
                    <td>
                      <a class="btn btn-primary btn-xs" href="alumni_view.php?user_Id=<?php echo $row['user_Id']; ?>"><i class="fas fa-folder"></i> View</a>
                      <a class="btn btn-info btn-xs" href="alumni_mgmt.php?page=<?php echo $row['user_Id']; ?>"><i class="fas fa-pencil-alt"></i> Edit</a>
                      <button type="button" class="btn bg-danger btn-xs" data-toggle="modal" data-target="#delete<?php echo $row['user_Id']; ?>"><i class="fas fa-trash"></i> Delete</button>
                      <!-- <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#password<?php echo $row['user_Id']; ?>"><i class="fa-solid fa-lock"></i> Security</button> -->
                    </td>
                  </tr>
                  <?php include 'alumni_delete.php'; } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php require_once '../includes/footer.php'; ?>