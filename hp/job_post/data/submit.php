<?php
require_once '../../db_config.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_POST['userSubmitButton'])) {
	//$id = $_POST['id'];
	$comapany_id = $_SESSION['user']['id'];
	$job_title = $_POST['job_title'];
	$job_description = $_POST['job_description'];
	$min_percentage = $_POST['min_percentage'];
	$backlog = $_POST['backlog'];
	$subject_name = $_POST['subject_name'];
	$city = $_POST['city'];
	$is_local_candidate_only = $_POST['is_local_candidate_only'];
	$job_post_date = $_POST['job_post_date'];
	$last_date_for_apply = $_POST['last_date_for_apply'];
	$percentage_of_10th = $_POST['percentage_of_10th'];
	$percentage_of_12th = $_POST['percentage_of_12th'];

  // $connection = mysqli_connect($server, $username, $password, $database);
	if (!$connection) {
		echo "Connection failed!";
	}
	 $insertQuery = '';
    if (isset($_REQUEST['id'])) {
	 $insertQuery = "UPDATE `job_post` SET `job_title`='$job_title',`job_description`='$job_description',`minimum_percentage`='$min_percentage',`backlog`='$backlog',`subject_name`='$subject_name',`branch_city`='$city',`is_local_candidate_only`='$is_local_candidate_only',`job_post_date`='$job_post_date',`last_date_for_apply`='$last_date_for_apply',`percentage_of_10th`='$percentage_of_10th',`percentage_of_12th`='$percentage_of_12th' WHERE id=" . $_REQUEST['id'];
    } else {
	$insertQuery = "INSERT INTO `job_post` (`company_id`, `job_title`, `job_description`, `minimum_percentage`, `backlog`, `subject_name`, `branch_city`, `is_local_candidate_only`, `job_post_date`, `last_date_for_apply`, `percentage_of_10th`, `percentage_of_12th`) VALUES ('$comapany_id','$job_title', '$job_description', '$min_percentage', '$backlog', '$subject_name', '$city', '$is_local_candidate_only', '$job_post_date', '$last_date_for_apply', '$percentage_of_10th', '$percentage_of_12th')";
	}
	mysqli_query($connection, $insertQuery);
	echo "Data inserted successfully";
	header("Location: /hp/job_post/index.php");
	mysqli_close($connection);
}else{
	header("Location: /hp/job_post/index.php");
}
?>

	




