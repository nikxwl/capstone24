<?php 
	include '../config.php';
	include '../includes/function_delete.php';

	// DELETE ADMIN - ADMIN_DELETE.PHP
	if (isset($_POST['delete_admin'])) {
	    $user_Id = $_POST['user_Id'];
	    deleteRecord($conn, "users", "user_Id", $user_Id, "admin.php");
	}


	// DELETE ALUMNI - ALUMNI_DELETE.PHP
	if (isset($_POST['delete_alumni'])) {
	    $user_Id = $_POST['user_Id'];
	    deleteRecord($conn, "users", "user_Id", $user_Id, "alumni.php");
	}


	// DELETE EVALUATOR - EVALUATOR_DELETE.PHP
	if (isset($_POST['delete_evaluator'])) {
	    $user_Id = $_POST['user_Id'];
	    deleteRecord($conn, "users", "user_Id", $user_Id, "evaluator.php");
	}


	// DELETE ACTIVITY - ACTIVITY_UPDATE_DELETE.PHP
	if (isset($_POST['delete_question'])) {
	    $quest_ID = $_POST['quest_ID'];
	    deleteRecord($conn, "question", "quest_ID", $quest_ID, "questionnaire.php");
	}




?>




