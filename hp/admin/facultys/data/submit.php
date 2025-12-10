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
	//$date_of_joining = $_POST['date_of_joining'];






    $insertQuery = '';
    if (isset($_REQUEST['id'])) {
       // $insertQuery = "UPDATE `students` SET `first_name`='$first_name',`last_name`='$last_name',`middle_name`='$middle_name',`gender`='$gender',`dob`='$dob',`enrollement_number`='$enrollement_number',`backlog`='$backlog',`email`='$email',`phone`='$phone',`alternate_phone`='$alternate_phone',`user_name`='$user_name',`password`='$password',`sgpa`='$sgpa',`address1`='$address1',`address2`='$address2',`state`='$state',`city`='$city',`zipcode`='$zipcode' WHERE id=" . $_REQUEST['id'];
		//$insertQuery = "UPDATE `faculty` SET `first_name`='$first_name',`last_name`='$last_name',`middle_name`='$middle_name',`gender`='$gender',`date_of_joining`='$date_of_joining',`email`='$email',`phone`='$phone',`alternate_phone`='$alternate_phone',`username`='$username',`password`='$password' WHERE id=" . $_REQUEST['id'];
        //$insertQuery = "UPDATE `faculty` SET `first_name`='$first_name',`last_name`='$last_name',`middle_name`='$middle_name',`gender`='$gender',`date_of_joining`='$date_of_joining',`email`='$email',`phone`='$phone',`alternate_phone`='$alternate_phone',`username`='$username',`password`='$password' WHERE id=" . $_REQUEST['id'];    
       // $insertQuery = "UPDATE `faculty` SET `first_name`='$first_name',`last_name`='$last_name',`middle_name`='[value-4]',`gender`='[value-5]',`date_of_joining`='[value-6]',`email`='[value-7]',`phone`='[value-8]',`alternate_phone`='[value-9]',`role`='[value-10]',`username`='[value-11]',`password`='[value-12]',`profile_image_url`='[value-13]',`is_admin`='[value-14]' WHERE 1;
        $insertQuery = "UPDATE `faculty` SET `first_name`='$first_name',`last_name`='$last_name',`middle_name`='$middle_name',`gender`='$gender',`date_of_joining`='$date_of_joining',`email`='$email',`phone`='$phone',`alternate_phone`='$alternate_phone',`role`='$role',`user_name`='$user_name',`password`='$password' WHERE id=" . $_REQUEST['id'];
	} else {
      //  $insertQuery = "INSERT INTO `students`(`first_name`, `last_name`, `middle_name`, `gender`, `dob`, `enrollement_number`, `backlog`, `email`, `phone`, `alternate_phone`, `user_name`, `password`, `sgpa`, `address1`, `address2`, `state`, `city`, `zipcode`) VALUES ('$first_name', '$last_name', '$middle_name', '$gender', '$dob', '$enrollement_number', '$backlog', '$email', '$phone', '$alternate_phone', '$user_name', '$password', '$sgpa','$address1', '$address2', '$state', '$city', '$zipcode');";
		//$insertQuery = "INSERT INTO `faculty`(`first_name`, `last_name`, `middle_name`, `gender`, `date_of_joining`, `email`, `phone`, `alternate_phone`, `username`, `password`) VALUES ('$first_name', '$last_name', '$middle_name', '$gender', '$date_of_joining', '$email', '$phone', '$alternate_phone', '$username', '$password');";
                $insertQuery = "INSERT INTO `faculty`(`first_name`, `last_name`, `middle_name`, `gender`, `date_of_joining`, `email`, `phone`, `alternate_phone`, `role`, `user_name`, `password`) VALUES ('$first_name', '$last_name', '$middle_name', '$gender', '$date_of_joining', '$email', '$phone', '$alternate_phone', '$role', '$user_name', '$password');";	
    }
    mysqli_query($connection, $insertQuery);
    echo "Data inserted successfully";
    header("Location:../index.php");
    mysqli_close($connection);
}else{
   header("Location:../index.php");
}
?>





