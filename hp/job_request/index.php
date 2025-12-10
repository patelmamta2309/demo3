<!DOCTYPE html>
<html lang="en">

<!-- blank.html  Tue, 07 Jan 2020 03:35:42 GMT -->
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title><?php session_start(); echo $_SESSION['type']?> - job_request index</title>

<!-- General CSS Files -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous">
<link rel="stylesheet" href="../assets/modules/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/modules/fontawesome/css/all.min.css">

<!-- CSS Libraries -->
<link rel="stylesheet" href="../assets/modules/datatables/datatables.min.css">
<link rel="stylesheet" href="../assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">

<!-- Template CSS -->
<link rel="stylesheet" href="../assets/css/style.min.css">
<link rel="stylesheet" href="../assets/css/components.min.css">
</head>

<body class="layout-4">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <span class="loader"><span class="loader-inner"></span></span>
</div>

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

<?php
   require_once '../db_config.php';
   if (!(isset($_SESSION["user"]["id"]))) {
    header("Location: /hp/auth/login.php");
}

               if(!(isset($_SESSION["user"]["id"]))) {
                header("Location: /hp/auth/login.php");
               }
               $whereQuery = "";
               if($_SESSION["type"] === 'Company'){
                $whereQuery .= 'where job_request.company_id = '.$_SESSION['user']['id'].' and job_request.`is_hire` IS NULL';
               }
               if($_SESSION["type"] === 'Student'){
                $whereQuery .= 'where job_request.student_id = '.$_SESSION['user']['id'];
               }
                   // User is logged in as student
                $selectQuery = "SELECT `job_request`.*, `students`.`first_name`,`students`.`middle_name`,`students`.`last_name`,`company`.`company_name`,`job_post`.`job_title` FROM `job_request` INNER JOIN `students` on `students`.`id` = `job_request`.`student_id` INNER JOIN `company` on `company`.`id` = `job_request`.`company_id` INNER JOIN `job_post` on `job_post`.`id` = `job_request`.`job_post_id` ".$whereQuery;
                $result =  mysqli_query($connection, $selectQuery);

                //while ($row = mysqli_fetch_assoc($result)) {
                //	echo "ID: " . $row['id'] . " Name: " . $row['name'] . " age: " . $row['age'] . " phone_no: " . $row['phone_no'] . " email: " . $row['email'] . "<br>";
                //}
                mysqli_close($connection);

?>


 <!-- Start app top navbar -->
     
    <?php include '../header.php' ?> 
        <!-- Start main left sidebar menu -->
    <?php include '../sidebar.php' ?> 
        <!-- Start app main Content -->
         <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Job Request</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                        <div class="breadcrumb-item">Job Rrequest</div>
                    </div>
                </div>

                <div class="section-body">

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                <h4>All applyer</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped v_center" id="jobRequestTable">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>student_name</th>
                                                    <th>company_name</th>
                                                    <th>job_title</th>
                                                    <th>percentage_of_10th</th>
                                                    <th>percentage_of_12th</th>
                                                    <th></th>
                                   
                                                    
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                 while ($row = mysqli_fetch_assoc($result)) {
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $row["id"]; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row["first_name"]; ?>
                                                                <?php echo $row["middle_name"]; ?>
                                                                <?php echo $row["last_name"]; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row["company_name"]; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row["job_title"]; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row["percentage_of_10th"]; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row["percentage_of_12th"]; ?>
                                                            </td> 
                                                            <td>
                                                                <a  class="btn btn-primary"  href="form.php?id=<?php echo $row['id']?>">view</a> 
                                                            </td>
                                                         
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                    </tbody>
                                            </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>
            </section>
        </div>
    </div>
</div>








<!-- General JS Scripts -->
<script src="../assets/bundles/lib.vendor.bundle.js"></script>
<script src="../js/CodiePie.js"></script>

<!-- JS Libraies -->
<script src="../assets/modules/datatables/datatables.min.js"></script>
<script src="../assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
<script src="../assets/modules/jquery-ui/jquery-ui.min.js"></script>

<!-- Page Specific JS File -->
<script src="../js/page/modules-datatables.js"></script>

<!-- Template JS File -->
<script src="../js/scripts.js"></script>
<script src="../js/custom.js"></script>
<script>
        function deleteRecord(id) {
            if (confirm("Are you sure you want to delete this record?")) {
                window.location.href = "data/delete.php?id=" + id;
            }
        }
        $("#jobRequestTable").DataTable({
            lengthMenu: [5, 10, 25, 50, -1]
        });
</script>
</body>

<!-- blank.html  Tue, 07 Jan 2020 03:35:42 GMT -->
</html>