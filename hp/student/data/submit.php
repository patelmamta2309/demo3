<?php
    require_once '../../db_config.php';
if (isset($_POST['submitBtn'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $middle_name = $_POST['middle_name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $enrollement_number = $_POST['enrollement_number'];
    $backlog = $_POST['backlog'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $alternate_phone = $_POST['alternative_number'];
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $sgpa = $_POST['sgpa'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $zipcode = $_POST['zipcode'];
    echo isset($_FILES['studentProfile']);
    //$_FILES['studentProfile']
    $fileName = '';
    $insertQuery = '';
    if (isset($_REQUEST['id'])) {
        $insertQuery = "UPDATE `students` SET `first_name`='$first_name',`last_name`='$last_name',`middle_name`='$middle_name',`gender`='$gender',`dob`='$dob',`enrollement_number`='$enrollement_number',`backlog`='$backlog',`email`='$email',`phone`='$phone',`alternate_phone`='$alternate_phone',`user_name`='$user_name',`password`='$password',`sgpa`='$sgpa',`address1`='$address1',`address2`='$address2',`state`='$state',`city`='$city',`zipcode`='$zipcode' WHERE id=" . $_REQUEST['id'];
        $fileName = $fileName.$_REQUEST['id'];
         mysqli_query($connection, $insertQuery);
    } else {
        $insertQuery = "INSERT INTO `students`(`first_name`, `last_name`, `middle_name`, `gender`, `dob`, `enrollement_number`, `backlog`, `email`, `phone`, `alternate_phone`, `user_name`, `password`, `sgpa`, `address1`, `address2`, `state`, `city`, `zipcode`) VALUES ('$first_name', '$last_name', '$middle_name', '$gender', '$dob', '$enrollement_number', '$backlog', '$email', '$phone', '$alternate_phone', '$user_name', '$password', '$sgpa','$address1', '$address2', '$state', '$city', '$zipcode');";
         mysqli_query($connection, $insertQuery);
        $lastRecordId = mysqli_insert_id($connection);
        $fileName = $fileName.$lastRecordId;
    }
    if(isset($_FILES['studentProfile'])){

        $uploadFileDir = '../uploads/';
        
        $dest_path = $uploadFileDir . $fileName.'.jpg';

        move_uploaded_file( $_FILES['studentProfile']['tmp_name'], $dest_path);
    }
       
   
    echo "Data inserted successfully";
    header("Location:../index.php");
    mysqli_close($connection);
}else{
   header("Location:../index.php");
}
?>
