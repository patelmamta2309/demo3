<?php
require_once '../../db_config.php';
if (isset($_POST['submitBtn'])) {
	//$id = $_POST['id'];
	
    $is_hire= $_POST['status'];
    $reason = $_POST['reason'];
  // $connection = mysqli_connect($server, $username, $password, $database);
	if (!$connection) {
		echo "Connection failed!";
	}
	 $insertQuery = '';
    if (isset($_REQUEST['id'])) {
	 $insertQuery = "UPDATE `job_request` SET `is_hire`='$is_hire',`reason`='$reason' WHERE id=" . $_REQUEST['id'];
    }
	mysqli_query($connection, $insertQuery);
	echo "Data inserted successfully";
	header("Location: /hp/job_request/index.php");
	mysqli_close($connection);
}else{
	header("Location: /hp/job_request/index.php");
}
?>

	




