<?php 
	include '../config.php';
	include '../includes/function_update.php';

		
	// UPDATE ADMIN - ADMIN_MGMT.PHP
	if(isset($_POST['update_admin'])) {
		$user_Id = mysqli_real_escape_string($conn, $_POST['user_Id']);
		updateSystemUser($conn, $user_Id, "admin_mgmt.php?page=".$user_Id);
	}




	// CHANGE ADMIN PASSWORD - ADMIN_DELETE.PHP
	if (isset($_POST['password_admin'])) {
	    $user_Id     = $_POST['user_Id'];
	    $OldPassword = md5($_POST['OldPassword']);
	    $password    = md5($_POST['password']);
	    $cpassword   = md5($_POST['cpassword']);

	    changePassword($conn, $user_Id, $OldPassword, $password, $cpassword, "admin.php");
	}



	// UPDATE ALUMNI - ALUMNI_MGMT.PHP
	if(isset($_POST['update_alumni'])) {
		$user_Id		  = mysqli_real_escape_string($conn, $_POST['user_Id']);
		$year_graduated = $_POST['year_graduated'];
		$current_job = mysqli_real_escape_string($conn, $_POST['current_job']);
		updateSystemUser($conn, $user_Id, "alumni_mgmt.php?page=".$user_Id."", $year_graduated, $current_job);
	}



	// UPDATE ALUMNI - ALUMNI_MGMT.PHP
	if(isset($_POST['update_evaluator'])) {
		$user_Id		  = mysqli_real_escape_string($conn, $_POST['user_Id']);
		updateSystemUser($conn, $user_Id, "evaluator_mgmt.php?page=".$user_Id."");
	}
    


    // UPDATE DEPARTMENT SECRETARY - DEPT_SECRETARY_MGMT.PHP
	if(isset($_POST['update_dept_secretary'])) {
		$user_Id = mysqli_real_escape_string($conn, $_POST['user_Id']);
		updateSystemUser($conn, $user_Id, "dept_secretary_mgmt.php?page=".$user_Id."");
	}



	// UPDATE ALUMNI OFFICER - OFFICER.PHP
	if(isset($_POST['update_officer'])) {
		$user_Id = mysqli_real_escape_string($conn, $_POST['user_Id']);
		updateSystemUser($conn, $user_Id, "officer_mgmt.php?page=".$user_Id."");
	}
    




	// CHANGE USERS PASSWORD - USERS_DELETE.PHP
	if (isset($_POST['password_user'])) {
	    $user_Id     = $_POST['user_Id'];
	    $OldPassword = md5($_POST['OldPassword']);
	    $password    = md5($_POST['password']);
	    $cpassword   = md5($_POST['cpassword']);

	    changePassword($conn, $user_Id, $OldPassword, $password, $cpassword, "users.php");
	}




	// UPDATE ADMIN INFO - PROFILE.PHP
	if (isset($_POST['update_profile_info'])) {
	    $user_Id = mysqli_real_escape_string($conn, $_POST['user_Id']);
		$year_graduated = $_POST['year_graduated'];
		$current_job = mysqli_real_escape_string($conn, $_POST['current_job']);
	    updateProfileInfo($conn, $user_Id, "profile.php", $year_graduated, $current_job);
	}




	// CHANGE USERS PASSWORD - USERS_DELETE.PHP
	if (isset($_POST['update_password_admin'])) {
	    $user_Id     = $_POST['user_Id'];
	    $OldPassword = md5($_POST['OldPassword']);
	    $password    = md5($_POST['password']);
	    $cpassword   = md5($_POST['cpassword']);

	    changePassword($conn, $user_Id, $OldPassword, $password, $cpassword, "profile.php");
	}

		


	// UPDATE ADMIN PROFILE - PROFILE.PHP
	if (isset($_POST['update_profile_admin'])) {
	    $user_Id = $_POST['user_Id'];
	    updateProfileAdmin($conn, $user_Id, "profile.php");
	}





	// UPDATE QUESTIONNAIRE - QUESTIONNAIRE_MGMT.PHP
	if (isset($_POST['update_question'])) {
	    $quest_ID    = mysqli_real_escape_string($conn, $_POST['quest_ID']);
	    $question    = mysqli_real_escape_string($conn, $_POST['question']);
	    $choice_type = mysqli_real_escape_string($conn, $_POST['choice_type']);
	    
	    if (empty($question)) {
	        displayErrorMessage("Question cannot be empty.", "questionnaire.php");
	    } else {
	        if ($choice_type === 'Multiple Answer/Checkboxes') {
	            $labels = isset($_POST['label']) ? $_POST['label'] : [];
	        } elseif ($choice_type === 'Single Answer/Radio Button') {
	            $labels = isset($_POST['radio_label']) ? $_POST['radio_label'] : [];
	        } else {
	            $labels = [];
	        }

	        if($choice_type === 'Textfield/Textarea') {
	        	$check_query = "SELECT quest_ID FROM question WHERE question = '$question' AND quest_ID != '$quest_ID'";
	            $result = mysqli_query($conn, $check_query);

	            if (mysqli_num_rows($result) > 0) {
	                displayErrorMessage("Question already exists", "questionnaire.php");
	            } else {
	                $update_query = mysqli_query($conn, "UPDATE question SET question = '$question', choice_type = '$choice_type', label = '$label_values' WHERE quest_ID = '$quest_ID'");
                    displayUpdateMessage($update_query, "questionnaire.php");
	            }
	        } else {
        	    // Use array_unique to remove duplicates, and implode the array with commas
		        $label_values = implode(', ', array_unique($labels));

		        if (empty($label_values)) {
		            displayErrorMessage("Labels cannot be empty.", "questionnaire.php");
		        } else {
		            $check_query = "SELECT quest_ID FROM question WHERE question = '$question' AND quest_ID != '$quest_ID'";
		            $result = mysqli_query($conn, $check_query);

		            if (mysqli_num_rows($result) > 0) {
		                displayErrorMessage("Question already exists", "questionnaire.php");
		            } else {
		                $check_label_query = "SELECT quest_ID FROM question WHERE label = '$label_values' AND quest_ID != '$quest_ID'";
		                $label_result = mysqli_query($conn, $check_label_query);

		                if (mysqli_num_rows($label_result) > 0) {
		                    displayErrorMessage("Label already exists", "questionnaire.php");
		                } else {
		                    $update_query = mysqli_query($conn, "UPDATE question SET question = '$question', choice_type = '$choice_type', label = '$label_values' WHERE quest_ID = '$quest_ID'");
		                    displayUpdateMessage($update_query, "questionnaire.php");
		                }
		            }
		        }
	        }
	    }
	}





?>
