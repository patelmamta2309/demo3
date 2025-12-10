<?php
require_once '../db_config.php';
    //$id = $_POST['id'];
    //$company_logo_url = "";
    
    session_start();
    if (isset($_POST['loginBtn'])) {
        $userType = $_SESSION['type'];
        $tableName = "";
        if ($userType == "Faculty") {
            $tableName = "faculty";
        } else if ($userType == "Student") {
            $tableName = "students";
        } else if ($userType == "Company") {
            $tableName = "company";
        }

        $password = $_POST['password'];
        if($_POST['password'] != $_POST['confirm-password']){
            // Passwords do not match
            echo "Passwords do not match.";
            header("Location: /hp/reset-password?error=notmatch");

            exit();
        }
        if($_POST['old-password'] !== $_SESSION['user']['password']){
            // Old password is incorrect
            echo "Old password is incorrect.";
            header("Location: /hp/reset-password?error=old");
            exit();
        }
        echo $tableName;
        $fileName = '';
        $insertQuery = '';
            $insertQuery = "UPDATE $tableName SET `password`='$password' WHERE id=" . $_SESSION['user']['id'];
        echo $insertQuery;
        mysqli_query($connection, $insertQuery);
        header("Location: /hp/auth/login.php");
        mysqli_close($connection);
    }
