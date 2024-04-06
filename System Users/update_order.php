<?php 
	include '../config.php';

	 if (isset($_POST['checkOrderExists'])) {
      $orderId = mysqli_real_escape_string($conn, $_POST['orderId']);
      $questId = mysqli_real_escape_string($conn, $_POST['questId']);

      $checkQuery = "SELECT COUNT(*) as count FROM question WHERE order_by = $orderId AND quest_ID != $questId";
      $result = mysqli_query($conn, $checkQuery);
      $row = mysqli_fetch_assoc($result);

      if ($row['count'] > 0) {
        echo 'exists';
      } else {
        echo 'not_exists';
      }
    } else {
      // Handle the actual update here
      $orderId = mysqli_real_escape_string($conn, $_POST['orderId']);
      $questId = mysqli_real_escape_string($conn, $_POST['questId']);

      // Update order_by in the database
      $updateQuery = "UPDATE question SET order_by = $orderId WHERE quest_ID = $questId";
      mysqli_query($conn, $updateQuery);

      // Optionally send a success response
      echo "Order updated successfully!";
    }

?>
