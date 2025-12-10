<?php
require_once '../../db_config.php';
if (isset($_POST['userSubmitButton'])) {
	//$id = $_POST['id'];
    //$company_logo_url = "";
    $company_name= $_POST['company_name'];
    $company_description = $_POST['company_description'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $alternate_phone = $_POST['alternate_phone'];
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $zipcode = $_POST['zipcode'];
    $coordinator_name = $_POST['coordinator_name'];
    $coordinator_phone = $_POST['coordinator_phone'];
    $coordinator_email = $_POST['coordinator_email'];
    echo isset($_FILES['companyLogo']);

    $fileName = '';
	$insertQuery = '';
    if (isset($_REQUEST['id'])) {
	 $insertQuery = "UPDATE `company` SET `company_name`='$company_name',`company_description`='$company_description',`email`='$email',`phone`='$phone',`alternate_phone`='$alternate_phone',`user_name`='$user_name',`password`='$password',`address1`='$address1',`address2`='$address2', `coordinator_name`='$coordinator_name',`coordinator_phone`='$coordinator_phone',`coordinator_email`='$coordinator_email' WHERE id=" . $_REQUEST['id'];
       // $insertQuery = "UPDATE `company` SET`company_name`='$company_name',`company_description`='$company_description',`email`='$email',`phone`='$phone',`alternate_phone`='$alternate_phone',`user_name`='$user_name',`password`='$password',`address1`='$address1',`address2`='$address2',`state`='$state',`city`='$city',`zipcode`='$zipcode',`coordinator_phone`='$coordinator_phone',`coordinator_name`='$coordinator_name',`coordinator_email`='$coordinator_email' WHERE  id=" . $_REQUEST['id']; 
        $fileName = $fileName.$_REQUEST['id'];
     mysqli_query($connection, $insertQuery);
    } else {
	$insertQuery = "INSERT INTO `company` (`company_name`, `company_description`, `email`, `phone`, `alternate_phone`, `user_name`, `password`,`address1`, `address2`, `coordinator_name`, `coordinator_phone`, `coordinator_email`) VALUES ( '$company_name', '$company_description', '$email', '$phone', '$alternate_phone', '$user_name', '$password', '$address1',  '$address2','$coordinator_name', '$coordinator_phone', '$coordinator_email')" ;
      //  $insertQuery = "INSERT INTO `company`(`id`, `company_name`, `company_description`, `email`, `phone`, `alternate_phone`, `user_name`, `password`, `address1`, `address2`, `state`, `city`, `zipcode`, `coordinator_phone`, `coordinator_phone`, `coordinator_email`) VALUES ('$id','$company_name','$company_description','$email','$phone','$alternate_phone','$user_name','$password','$address1','$address2','$state','$city','$zipcode','$coordinator_phone','$coordinator_phone','$coordinator_email')";
        mysqli_query($connection, $insertQuery);
        $lastRecordId = mysqli_insert_id($connection);
        $fileName = $fileName.$lastRecordId;
    }
  
    if (isset($_FILES["companyLogo"])) {

        $uploadFileDir = '../uploads/';

        $dest_path = $uploadFileDir . $fileName . '.jpg';

        move_uploaded_file($_FILES['companyLogo']['tmp_name'], $dest_path);
    }
	
	echo "Data inserted successfully";
	header("Location: /hp/company/index.php");
	mysqli_close($connection);
}else{
	header("Location: /hp/company/index.php");
}
?>


