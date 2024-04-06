<?php 
	include '../config.php';
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['job'])) {
	    $selectedJob = $_POST['job'];

	    $query = mysqli_query($conn, "SELECT COUNT(*) AS totalAlumni FROM users WHERE user_type = 4 AND current_job = '$selectedJob'");
	    
	    if ($query) {
	        $result = mysqli_fetch_assoc($query);
	        echo json_encode($result);
	    } else {
	        echo json_encode(['error' => 'Error in database query']);
	    }
	} else {
	    echo json_encode(['error' => 'Invalid request']);
	}
?>




