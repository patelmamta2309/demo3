<!DOCTYPE html>
<html lang="en">

<!-- blank.html  -->
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title><?php session_start(); echo $_SESSION['type']?> - apply_job_post list</title>

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

       // $selectQuery = "SELECT * FROM `job_post`";
        
        $selectQuery = "SELECT `job_post`.*,`job_request`.id as 'job_request_id', company.company_name FROM `job_post` join company on `company`.id = `job_post`.company_id  left JOIN `job_request` on `job_request`.`job_post_id`  = `job_post`.id and `job_request`.`student_id`=". $_SESSION['user']['id'] . ' where `job_post`.`last_date_for_apply` >= CURDATE()';


        $result =  mysqli_query($connection, $selectQuery);

        // while ($row = mysqli_fetch_assoc($result)) {
        //	echo "ID: " . $row['id'] . " job_title: " . $row['job_title'] . " job_description: " . $row['job_description'] . " minimum_percentage: " . $row['minimum_percentage'] . " backlog: " . $row['backlog']  . " subject_name: " . $row['subject_name']  . " branch_city: " . $row['city']  . " is_local_candidate_only: " . $row['is_local_candidate_only']  . " job_post_date: " . $row['job_post_date'] . " last_date_for_apply: " . $row['last_date_for_apply'] . " percentage_of_10th: " . $row['percentage_of_10th'] .  " percentage_of_12th: " . $row['percentage_of_12th'] . "<br>";
        // }
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
                    <h1>Apply Job Post</h1>
                    
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="/hp/student/dashboard.php">Dashboard</a></div>
                        <div class="breadcrumb-item"> job Post</div>
                    </div>
                </div>

                <div class="section-body">

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                <h4>All Post
                                </h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped v_center" id="table-1">
                                            <thead>
                                                <tr>
                                                <th>ID</th>
                                                <th>Job Title</th>
                                                <th>Company Name</th>
                                                <th>Subject Name</th>
                                                <th>Percentage of 10th</th>
                                                <th>Percentage of 12th</th>
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
                                                            <?php echo $row["job_title"]; ?>
                                                           </td><td>
                                                            <?php echo $row["company_name"]; ?>
                                                           </td>

                                                           
                                                            <td>
                                                                <?php echo $row["subject_name"]; ?>
                                                            </td>
                                                        
                                                          
                                                            <td>
                                                                <?php echo $row["percentage_of_10th"]; ?>
                                                            </td>
                                                           
                                                            <td>
                                                                <?php echo $row["percentage_of_12th"]; ?>
                                                            </td>  
                                                            <td>
                                                                <?php if(!$row['job_request_id']) {?>
                                                                <a href="form.php?id=<?php echo $row['id']?>" class="btn btn-primary">Apply</a>
                                                                <?php }?>
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
    
</script>
</body>

<!-- blank.html  Tue, 07 Jan 2020 03:35:42 GMT -->
</html>