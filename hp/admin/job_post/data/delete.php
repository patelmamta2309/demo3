<?php
require_once '../../db_config.php';
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	//$connection = mysqli_connect($server, $username, $password, $database);
	if (!$connection) {
		echo "Connection failed!";
	}
	$insertQuery = "DELETE FROM `job_post` WHERE id=" . $id;

	mysqli_query($connection, $insertQuery);
	echo "Data inserted successfully";
	header("Location: /hp/job_post/index.php");
	mysqli_close($connection);
}
?>



	

	
