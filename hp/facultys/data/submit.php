<?php
    require_once '../../db_config.php';
if (isset($_POST['userSubmitButton'])) {
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$middle_name = $_POST['middle_name'];
	$gender = $_POST['gender'];
	$date_of_joining = $_POST['date_of_joining'];	
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$alternate_phone = $_POST['alternate_phone'];
    $role = $_POST['role']; 
	$user_name = $_POST['user_name'];
	$password = $_POST['password'];

    echo isset($_FILES['facultyProfile']);

    $fileName = '';
    $insertQuery = '';
    if (isset($_REQUEST['id'])) {
        $insertQuery = "UPDATE `faculty` SET `first_name`='$first_name',`last_name`='$last_name',`middle_name`='$middle_name',`gender`='$gender',`date_of_joining`='$date_of_joining',`email`='$email',`phone`='$phone',`alternate_phone`='$alternate_phone',`role`='$role',`user_name`='$user_name',`password`='$password' WHERE id=" . $_REQUEST['id'];
        $fileName = $fileName.$_REQUEST['id'];
          mysqli_query($connection, $insertQuery);
	} else {
        $insertQuery = "INSERT INTO `faculty`(`first_name`, `last_name`, `middle_name`, `gender`, `date_of_joining`, `email`, `phone`, `alternate_phone`, `role`, `user_name`, `password`) VALUES ('$first_name', '$last_name', '$middle_name', '$gender', '$date_of_joining', '$email', '$phone', '$alternate_phone', '$role', '$user_name', '$password');";	
        $lastRecordId = mysqli_insert_id($connection);
        $fileName = $fileName.$lastRecordId;
          mysqli_query($connection, $insertQuery);
    }
    if (isset($_FILES["facultyProfile"])) {

        $uploadFileDir = '../uploads/';

        $dest_path = $uploadFileDir . $fileName . '.jpg';

        move_uploaded_file($_FILES['facultyProfile']['tmp_name'], $dest_path);
    }
  
    echo "Data inserted successfully";
    header("Location:../index.php");
    mysqli_close($connection);
}else{
   header("Location:../index.php");
}
?>




