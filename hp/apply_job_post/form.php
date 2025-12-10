<!DOCTYPE html>
<html lang="en">

<!-- blank.html  -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?php session_start(); echo $_SESSION['type']?> - aaply_job_post form</title>
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
<?php

$queryString = "";
$record = null;
 require_once '../db_config.php';
if (!(isset($_SESSION["user"]["id"]))) {
    header("Location: /hp/auth/login.php");
}
if (isset($_REQUEST['id'])) {
    $queryString = '?id=' . $_REQUEST['id'];
   
    $id = $_REQUEST['id'];
    $selectQuery = "SELECT * FROM `job_post` where `id`=" . $id;

    $result =  mysqli_query($connection, $selectQuery);
    $record = mysqli_fetch_assoc($result);
    $jobRequestQuery = "SELECT * FROM `job_request` where `student_id`=" . $_SESSION['user']['id'] . " and job_post_id=" . $record["id"];
    $jobReuestResult =  mysqli_query($connection, $jobRequestQuery);
    $jobRequestRecord = mysqli_fetch_assoc($jobReuestResult);
    mysqli_close($connection);
}
?>

<body class="layout-4">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <span class="loader"><span class="loader-inner"></span></span>
    </div>

    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            <!-- Start app top navbar -->

            <?php include '../header.php' ?>
            <!-- Start main left sidebar menu -->
            <?php include '../sidebar.php' ?>
            <!-- Start app main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <div class="section-header-back">
                            <a href="index.php" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                        </div>
                        <h1> Apply Job Post</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="/hp/apply_job_post">Dashboard</a></div>
                            <div class="breadcrumb-item">Apply Job Post</div>
                        </div>
                    </div>

                    <div class="section-body">
                        <form method="POST" action="data/submit.php" class="needs-validation" novalidate="">
                            <h2 class="section-title">Job Post</h2>
                            <p class="section-lead">On this page you can update all fields.</p>
                            <input type="hidden" name="company_id" value="<?php echo isset($record) ? $record['company_id'] : '' ?>" />
                            <input type="hidden" name="job_post_id" value="<?php echo isset($record) ? $record['id'] : '' ?>" />
                            <input type="hidden" name="student_id" value="<?php echo $_SESSION['user']['id'] ?>" />
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Apply job post</h4>
                                        </div>
                                        <div class="card-body">

                                            <div class="form-group row mb-4">
                                                <label class="text-md-right col-12 col-md-3 col-lg-3">Job Title</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <?php echo isset($record) ? $record['job_title'] : '' ?>
                                                    <!-- <input type="text" name="job_title" id="job_title" class="form-control"  placeholder="please enter job_title"  value="<?php echo isset($record) ? $record['job_title'] : '' ?>" required> -->
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label class="text-md-right col-12 col-md-3 col-lg-3">Job Description</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <?php echo isset($record) ? $record['job_description'] : '' ?>
                                                    <!--<input type="text" name="job_description" id="job_description" class="form-control"  placeholder="please enter job_description"  value="<?php echo isset($record) ? $record['job_description'] : '' ?>" required> -->
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Minimum Percentage</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <?php echo isset($record) ? $record['minimum_percentage'] : '' ?>
                                                    <!-- <input type="number" name="minimum_percentage" id="minimum_percentage" class="form-control"  placeholder="please enter minimum percentage" value="<?php echo isset($record) ? $record['minimum_percentage'] : '' ?>" required> -->
                                                    <div class="invalid-feedback">
                                                        Please fill in your minimum_percentage
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Backlog</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <?php echo isset($record) && $record['backlog'] ? 'Yes' : 'No' ?>

                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Subject Name</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <?php echo isset($record) ? $record['subject_name'] : '' ?>
                                                    <!--<input type="text" name="subject_name" id="subject_name" class="form-control"  placeholder="please enter job_title" value="<?php echo isset($record) ? $record['subject_name'] : '' ?>" required> -->
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Branch City</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <?php echo isset($record) ? $record['branch_city'] : '' ?>

                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Is Local Candidate Only</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <?php echo isset($record) && $record['is_local_candidate_only'] ? 'Yes' : 'No' ?>

                                                </div>
                                            </div>
                                            <?php if (isset($jobRequestRecord) && $jobRequestRecord['id']) {

                                                echo "Already applied on same job";
                                            } else { ?>

                                                <div class="form-group row mb-4">
                                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Job Post Date</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <?php echo isset($record) ? $record['job_post_date'] : '' ?>
                                                        <!--<input type="date" name="job_post_date" id="job_post_date" class="form-control" placeholder="please enter job_post_date" value="<?php echo isset($record) ? $record['job_post_date'] : '' ?>" required>-->
                                                        <div class="invalid-feedback">
                                                            Please fill in your job post date
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-4">
                                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Last Date For Apply</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <?php echo isset($record) ? $record['last_date_for_apply'] : '' ?>
                                                        <!-- <input type="date" name="last_date_for_apply" id="last_date_for_apply" class="form-control"  placeholder="please enter last_date_for_apply" value="<?php echo isset($record) ? $record['last_date_for_apply'] : '' ?>" required> -->
                                                        <div class="invalid-feedback">
                                                            Please fill in your last date for apply
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-4">
                                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Percentage Of 10th</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <input type="number" name="percentage_of_10th" id="percentage_of_10th" class="form-control" placeholder="please enter percentage_of_10th" required>
                                                        <div class="invalid-feedback">
                                                            Please fill in your percentage_of_10th
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-4">
                                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">number of trial 10th</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <input type="number" name="number_of_trial_10th" id="number_of_trial_10th" class="form-control" placeholder="please enter number_of_trial_10th" required>
                                                        <div class="invalid-feedback">
                                                            Please fill in your 10th_number_of_trial

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-4">
                                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Percentage Of 12th</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <input type="number" name="percentage_of_12th" id="percentage_of_12th" class="form-control" placeholder="please enter percentage_of_12th" required>
                                                        <div class="invalid-feedback">
                                                            Please fill in your percentage_of_12th
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-4">
                                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">number of trial 12th</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <input type="number" name="number_of_trial_12th" id="number_of_trial_12th" class="form-control" placeholder="please enter number_of_trial_12th" required>
                                                        <div class="invalid-feedback">
                                                            Please fill in your 12th_number_of_trial

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-4">
                                                    <label class="col-12 col-md-3 col-lg-3"></label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <button name="submitBtn" type="submit" class="btn btn-primary">Submit</button>
                                                        <button type="reset" class="btn btn-primary">Reset</button>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
</body>

<!-- blank.html  -->

</html>