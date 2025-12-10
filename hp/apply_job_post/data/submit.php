<?php
    require_once '../../db_config.php';
    if (isset($_POST['submitBtn'])) {
    
    $company_id = $_POST['company_id'];
    $job_post_id = $_POST['job_post_id'];
    $student_id = $_POST['student_id'];
    $apply_date_time = date('Y-m-d h:i:s');
    $percentage_of_10th  = $_POST['percentage_of_10th'];
    $number_of_trial_10th = $_POST['number_of_trial_10th'];
    $percentage_of_12th = $_POST['percentage_of_12th'];
    $number_of_trial_12th = $_POST['number_of_trial_12th'];
    $comapany_name = $_POST['company_name'];


    $insertQuery = '';
    if (isset($_REQUEST['id'])) {
       // $insertQuery = UPDATE `job_request` SET `id`='[value-1]',`student_id`='[value-2]',`company_id`='[value-3]',`job_post_id`='[value-4]',`apply_date_time`='[value-5]',`percentage_of_10th`='[value-6]',`number_of_trial_10th`='[value-7]',`percentage_of_12th`='[value-8]',`number_of_trial_12th`='[value-9]' WHERE 1;
    } else {
        $insertQuery = "INSERT INTO `job_request`( `student_id`, `company_id`, `job_post_id`, `apply_date_time`, `percentage_of_10th`, `number_of_trial_10th`, `percentage_of_12th`, `number_of_trial_12th`) VALUES ('$student_id','$company_id','$job_post_id','$apply_date_time','$percentage_of_10th','$number_of_trial_10th','$percentage_of_12th','$number_of_trial_12th')";
    }
    mysqli_query($connection, $insertQuery);
    echo "Data inserted successfully";
    header("Location:../index.php");
    mysqli_close($connection);
}else{
   header("Location:../index.php");
}
?>
