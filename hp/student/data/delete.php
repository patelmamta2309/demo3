<?php
   require_once '../../db_config.php';
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	
	$insertQuery = "DELETE FROM `students` WHERE id=".$id;

	mysqli_query($connection, $insertQuery);
	echo "Data deleted successfully";
	header("Location: ../index.php");
	mysqli_close($connection);
}
?>