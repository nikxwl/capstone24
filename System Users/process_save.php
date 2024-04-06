<?php 
	include '../config.php';
	// include('../phpqrcode/qrlib.php');
	include '../includes/function_create.php';
	

	// SAVE ADMIN - ADMIN_MGMT.PHP
	if (isset($_POST['create_admin'])) {
	    $user_type = "0";
	    $path = "../images-users/";
	    saveUser($conn, "admin_mgmt.php?page=create", $user_type, $path);
	}


	// SAVE ALUMNI - ALUMNI_MGMT.PHP
	if (isset($_POST['create_alumni'])) {
		$user_type = "4";
		$year_graduated = $_POST['year_graduated'];
		$current_job = mysqli_real_escape_string($conn, $_POST['current_job']);
	    saveAlumni($conn, "alumni_mgmt.php?page=create", $user_type, $year_graduated, $current_job);
	}


	// SAVE EVALUATOR - EVALUATOR_MGMT.PHP
	if (isset($_POST['create_evaluator'])) {
		$user_type = "1";
		$path = "../images-users/";
	    saveUser($conn, "evaluator_mgmt.php?page=create", $user_type, $path);
	}


	// SAVE DEPARTMENT SECRETARY - DEPT_SECRETARY_MGMT.PHP
	if (isset($_POST['create_dept_secretary'])) {
		$user_type = "3";
		$path = "../images-users/";
	    saveUser($conn, "dept_secretary_mgmt.php?page=create", $user_type, $path);
	}



	// SAVE ALUMNI OFFICER - OFFICER.PHP
	if (isset($_POST['create_officer'])) {
		$user_type = "2";
		$path = "../images-users/";
	    saveUser($conn, "officer_mgmt.php?page=create", $user_type, $path);
	}




	// SAVE ACTIVITY - ANNOUNCEMENT_ADD.PHP
	if (isset($_POST['create_question'])) {
	    $question    = mysqli_real_escape_string($conn, $_POST['question']);
	    $choice_type = mysqli_real_escape_string($conn, $_POST['choice_type']);

	    // Process the label based on the choice_type
	    if ($choice_type !== "Textfield/Textarea") {
	        // If choice_type is not "Textfield/Textarea", trim and filter out empty labels
	        $labels = array_filter(array_map('trim', $_POST['label']));

	        // Check for duplicate labels
	        if (count($labels) !== count(array_unique($labels))) {
	             displayErrorMessage("Duplicate label values are not allowed", "questionnaire_mgmt.php?page=create");
	            exit; // Stop further execution
	        }

	        $label = implode(', ', $labels);
	    } else {
	        // If choice_type is "Textfield/Textarea", set label to an empty string
	        $label = '';
	    }

	    // Check if the question already exists
	    $checkQuestionQuery = "SELECT COUNT(*) FROM question WHERE question = ?";
	    $checkQuestionStmt = mysqli_prepare($conn, $checkQuestionQuery);

	    if ($checkQuestionStmt) {
	        mysqli_stmt_bind_param($checkQuestionStmt, "s", $question);
	        mysqli_stmt_execute($checkQuestionStmt);
	        mysqli_stmt_bind_result($checkQuestionStmt, $questionCount);
	        mysqli_stmt_fetch($checkQuestionStmt);

	        // If the question already exists, do not proceed with the insertion
	        if ($questionCount > 0) {
	             displayErrorMessage("Question with the same text already exists", "questionnaire_mgmt.php?page=create");
	            exit; // Stop further execution
	        }

	        mysqli_stmt_close($checkQuestionStmt);
	    } else {
	         displayErrorMessage("Error preparing check statement for question", "questionnaire_mgmt.php?page=create");
	        exit; // Stop further execution
	    }

	    // Check if the labels for the same question already exist
	    $checkLabelQuery = "SELECT COUNT(*) FROM question WHERE question = ? AND label = ?";
	    $checkLabelStmt = mysqli_prepare($conn, $checkLabelQuery);

	    if ($checkLabelStmt) {
	        mysqli_stmt_bind_param($checkLabelStmt, "ss", $question, $label);
	        mysqli_stmt_execute($checkLabelStmt);
	        mysqli_stmt_bind_result($checkLabelStmt, $labelCount);
	        mysqli_stmt_fetch($checkLabelStmt);

	        // If the labels for the same question already exist, do not proceed with the insertion
	        if ($labelCount > 0) {
	            displayErrorMessage("Question with the same labels already exists", "questionnaire_mgmt.php?page=create");
	            exit; // Stop further execution
	        }

	        mysqli_stmt_close($checkLabelStmt);
	    } else {
	    	displayErrorMessage("Error preparing check statement for labels", "questionnaire_mgmt.php?page=create");
	        exit; // Stop further execution
	    }

	    // Use prepared statement for better security
	    $stmt = mysqli_prepare($conn, "INSERT INTO question (question, choice_type, label) VALUES (?, ?, ?)");

	    if ($stmt) {
	        // Bind parameters and execute the statement
	        mysqli_stmt_bind_param($stmt, "sss", $question, $choice_type, $label);

	        // Execute the statement
	        $result = mysqli_stmt_execute($stmt);

	        // Check and display save message
	        displaySaveMessage($result, "questionnaire_mgmt.php?page=create");

	        // Close the statement
	        mysqli_stmt_close($stmt);
	    } else {
	        // Handle the case where the statement could not be prepared
	        displayErrorMessage("Error preparing insert statement", "questionnaire_mgmt.php?page=create");
	    }
	}







	// DATABASE RESTORATION - RESTORE.PHP
	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['restore'])) {
	    $file = $_FILES['fileToRestore']['tmp_name'];
	    if (!$file) {
	        die("Please choose a file to restore.");
	    }
	    $sql = file_get_contents($file);
	    $queries = explode(';', $sql);
	    foreach ($queries as $query) {
	        if (!empty(trim($query))) {
	            $result = mysqli_query($conn, $query);
	            if (!$result) {
	                die("Error executing SQL query: " . mysqli_error($conn));
	            }
	        }
	    }
	    $_SESSION['message'] = "Database restoration successful";
		$_SESSION['text'] = "Sent successfully!";
		$_SESSION['status'] = "success";
		header("Location: restore.php");
	}



	if(isset($_POST['save_answer'])) {
	    $alumni_ID            = $_POST['alumni_ID'];
	    $r_12                 = $_POST['r_12'];
	    $degree               = isset($_POST['degree']) ? implode(',', $_POST['degree']) : '';
	    $university           = isset($_POST['university']) ? implode(',', $_POST['university']) : '';
	    $year                 = isset($_POST['year']) ? implode(',', $_POST['year']) : '';
	    $honor                = isset($_POST['honor']) ? implode(',', $_POST['honor']) : '';

	    $r_13                 = $_POST['r_13'];
	    $examination          = isset($_POST['examination']) ? implode(',', $_POST['examination']) : '';
	    $date_taken           = isset($_POST['date_taken']) ? implode(',', $_POST['date_taken']) : '';
	    $rating               = isset($_POST['rating']) ? implode(',', $_POST['rating']) : '';

	    $r_14                 = $_POST['r_14'];
	    $undergraduate        = isset($_POST['undergraduate']) ? implode(',', $_POST['undergraduate']) : '';
	    $graduate             = isset($_POST['graduate']) ? implode(',', $_POST['graduate']) : '';
	    $r_14_others          = $_POST['r_14_others'];
	    
	    $r_15                 = $_POST['r_15'];
	    $training_title       = isset($_POST['training_title']) ? implode(',', $_POST['training_title']) : '';
	    $duration             = isset($_POST['duration']) ? implode(',', $_POST['duration']) : '';
	    $training_institution = isset($_POST['training_institution']) ? implode(',', $_POST['training_institution']) : '';
		
		$r_15_2               = $_POST['r_15_2'];
		$r_15_2_others        = $_POST['r_15_2_others'];
		$pursue_studies       = isset($_POST['pursue_studies']) ? implode(',', $_POST['pursue_studies']) : '';

		$r_16                 = $_POST['r_16'];
		$presently_employed   = $_POST['presently_employed'];

		$r_17                 = $_POST['r_17'];
		$unemployed_reason    = isset($_POST['unemployed_reason']) ? implode(',', $_POST['unemployed_reason']) : '';
		$r_17_others          = $_POST['r_17_others'];

		$r_18                 = $_POST['r_18'];
		$employment_status    = $_POST['employment_status'];
		$r_18_skills          = $_POST['r_18_skills'];

		$r_19                 = $_POST['r_19'];
		$r_19_answer          = $_POST['r_19_answer'];

		$r_20                 = $_POST['r_20'];
		$line_of_business     = isset($_POST['line_of_business']) ? implode(',', $_POST['line_of_business']) : '';
		
		$r_21                 = $_POST['r_21'];
		$place_work           = $_POST['place_work'];

		$r_22                 = $_POST['r_22'];
		$is_first_job         = $_POST['is_first_job'];

		$r_23                 = $_POST['r_23'];
		$staying_job          = isset($_POST['staying_job']) ? implode(',', $_POST['staying_job']) : '';
		$r_23_others          = $_POST['r_23_others'];
		
		$r_24                 = $_POST['r_24'];
		$job_related          = $_POST['job_related'];
		
		$r_25                 = $_POST['r_25'];
		$accepting_job        = isset($_POST['accepting_job']) ? implode(',', $_POST['accepting_job']) : '';
		$r_25_others          = $_POST['r_25_others'];

		$r_26                 = $_POST['r_26'];
		$changing_job         = isset($_POST['changing_job']) ? implode(',', $_POST['changing_job']) : '';
		$r_26_others          = $_POST['r_26_others'];
		
		$r_27                 = $_POST['r_27'];
		$job_longevity        = $_POST['job_longevity'];
		$r_27_others          = $_POST['r_27_others'];

		$r_28                 = $_POST['r_28'];
		$founding_job         = $_POST['founding_job'];
		$r_28_others          = $_POST['r_28_others'];
		
		$r_29                 = $_POST['r_29'];
		$job_landing          = $_POST['job_landing'];
		$r_29_others          = $_POST['r_29_others'];
		
		$r_30                 = $_POST['r_30'];
		$first_job            = isset($_POST['first_job']) ? implode(',', $_POST['first_job']) : '';
		$current_job          = isset($_POST['current_job']) ? implode(',', $_POST['current_job']) : '';
		
		$r_31                 = $_POST['r_31'];
		$monthly_earning      = $_POST['monthly_earning'];
		
		$r_32                 = $_POST['r_32'];
		$curriculum           = $_POST['curriculum'];
		
		$r_33                 = $_POST['r_33'];
		$competencies_learned = isset($_POST['competencies_learned']) ? implode(',', $_POST['competencies_learned']) : '';
		$r_33_others          = $_POST['r_33_others'];

		$r_34_answer          = $_POST['r_34_answer'];
		
		$graduate_name        = isset($_POST['graduate_name']) ? implode(',', $_POST['graduate_name']) : '';
		$graduate_address     = isset($_POST['graduate_address']) ? implode(',', $_POST['graduate_address']) : '';
		$graduate_contact     = isset($_POST['graduate_contact']) ? implode(',', $_POST['graduate_contact']) : '';
		

	    $save = mysqli_query($conn, "INSERT INTO answers (alumni_ID, r_12, degree, university, year, honor, r_13, examination, date_taken, rating, r_14, undergraduate, graduate, r_14_others, r_15, training_title, duration, training_institution, r_15_2, r_15_2_others, pursue_studies, r_16, presently_employed, r_17, unemployed_reason, r_17_others, r_18, employment_status, r_18_skills, r_19, r_19_answer, r_20, line_of_business, r_21, place_work, r_22, is_first_job, r_23, staying_job, r_23_others, r_24, job_related, r_25, accepting_job, r_25_others, r_26, changing_job, r_26_others, r_27, job_longevity, r_27_others, r_28, founding_job, r_28_others, r_29, job_landing, r_29_others, r_30, first_job, current_job, r_31, monthly_earning, r_32, curriculum, r_33, competencies_learned, r_33_others, r_34_answer, graduate_name, graduate_address, graduate_contact) VALUES ('$alumni_ID', '$r_12', '$degree', '$university', '$year', '$honor', '$r_13', '$examination', '$date_taken', '$rating', '$r_14', '$undergraduate', '$graduate', '$r_14_others', '$r_15', '$training_title', '$duration', '$training_institution', '$r_15_2', '$r_15_2_others', '$pursue_studies', '$r_16', '$presently_employed', '$r_17', '$unemployed_reason', '$r_17_others', '$r_18', '$employment_status', '$r_18_skills', '$r_19', '$r_19_answer', '$r_20', '$line_of_business', '$r_21', '$place_work', '$r_22', '$is_first_job', '$r_23', '$staying_job', '$r_23_others', '$r_24', '$job_related', '$r_25', '$accepting_job', '$r_25_others', '$r_26', '$changing_job', '$r_26_others', '$r_27', '$job_longevity', '$r_27_others', '$r_28', '$founding_job', '$r_28_others', '$r_29', '$job_landing', '$r_29_others', '$r_30', '$first_job', '$current_job', '$r_31', '$monthly_earning', '$r_32', '$curriculum', '$r_33', '$competencies_learned', '$r_33_others', '$r_34_answer', '$graduate_name', '$graduate_address', '$graduate_contact')");
	    displaySaveMessage($save, 'profile.php');
	}

	
	
?>



