<?php
require_once '../../db_config.php';
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	
	$insertQuery = "DELETE FROM `company` WHERE id=" . $id;

	mysqli_query($connection, $insertQuery);
	echo "Data inserted successfully";
	header("Location: /hp/manage_company/index.php");
	mysqli_close($connection);
}
?>



	

	
