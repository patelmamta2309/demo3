<!DOCTYPE html>
<html lang="en">

<!-- blank.html  Tue, 07 Jan 2020 03:35:42 GMT -->
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title>Blank Page &mdash; CodiePie</title>

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
   
if (isset($_REQUEST['id'])) {
    $queryString = '?id=' . $_REQUEST['id'];
 
 
    $id = $_REQUEST['id'];
    $selectQuery = "SELECT * FROM `job_post` where `id`=" . $id;

    $result =  mysqli_query($connection, $selectQuery);
    $record = mysqli_fetch_assoc($result);
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
     <form name="userform" id="userform" action="data/submit.php<?php echo $queryString; ?>" method="post" class="needs-validation" novalidate="">
        
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <div class="section-header-back">
                        <a href="index.php" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                    </div>
                    <h1>Job Post</h1>
                    
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                       
                        <div class="breadcrumb-item">Creat New Post</div>
                    </div>
                </div>

                <div class="section-body">
                    <h2 class="section-title">Job Post</h2>
                    <p class="section-lead">On this page you can create a new post and fill in all fields.</p>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Write Your Post</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Job Title</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="job_title" id="job_title" class="form-control" value="<?php echo isset($record) ? $record['job_title'] : '' ?>" placeholder="please enter job_title" required>
                                             <div class="invalid-feedback">
                                                Please fill in your Job_Title
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Job Description</label>
                                        <div class="col-sm-12 col-md-7">
                                            <textarea class="summernote-simple form-control" name="job_description" id="job_description"  placeholder="please enter job_description"><?php echo isset($record) ?  $record['job_description']: '' ?></textarea>
                                             <div class="invalid-feedback">
                                                Please fill in your job_description
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Minimum Percentage</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="number" name="min_percentage" id="min_percentage" class="form-control" value="<?php echo isset($record) ?  $record['minimum_percentage']: ''?>" placeholder="please enter minimum percentage">
                                             <div class="invalid-feedback">
                                                Please fill in your minimum_percentage
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Backlog</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="backlogYes" name="backlog" value="1" class="custom-control-input" <?php echo isset($record) ? ($record['backlog'] ? 'checked' : '') : '' ?> required>
                                                        <label class="custom-control-label" for="backlogYes">Yes</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="backlogNo" name="backlog" value="0" class="custom-control-input" <?php echo isset($record) ? ($record['backlog'] ? "" : 'checked') : '' ?> required>
                                                        <label class="custom-control-label" for="backlogNo">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Subject Name</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="subject_name" id="subject_name" class="form-control" value="<?php echo isset($record) ? $record['subject_name'] : '' ?>" placeholder="please enter subject_name" required>
                                             <div class="invalid-feedback">
                                                Please fill in your subject_name
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Branch City</label>
                                        <div class="col-sm-12 col-md-7">
		                                        <select name="city" id="city_select" class="form-control">
			                                        <option value="surat">Surat</option>
			                                        <option value="vapi">Vapi</option>
			                                        <option value="valsad">Valsad</option>
			                                        <option value="baroda">Baroda</option>
		                                        </select>
                                        </div>
                                    </div>
                                   
                                     <div class="form-group row mb-4">
	                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Is Local Candidate Only</label>
	                                    <div class="col-sm-12 col-md-7">
		                                    <div class="form-check form-check-inline">
			                                    
			                                    <input type="checkbox"  name="is_local_candidate_only" class="form-control" id="is_local_candidate_only" value="1" <?php echo isset($record) ? ($record['is_local_candidate_only'] ? 'checked' : '') : '' ?>>
			                                    <label class="form-check-label" for="inlinecheckbox1">Yes</label>
		                                    </div>
		                                </div>
		                            </div>
		                            
                                           <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Job Post Date</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="date" name="job_post_date" id="job_post_date" class="form-control" value="<?php echo isset($record) ?  date('Y-m-d',strtotime($record['job_post_date'])) : '' ?>" placeholder="please enter job_post_date"required>
                                             <div class="invalid-feedback">
                                                Please fill in your job  post date
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Last Date For Apply</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="date" name="last_date_for_apply" id="last_date_for_apply" class="form-control" value="<?php echo isset($record) ?  date('Y-m-d',strtotime($record['last_date_for_apply'])): '' ?>" placeholder="please enter last_date_for_apply"required>
                                             <div class="invalid-feedback">
                                                Please fill in your last date for apply
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Percentage Of 10th</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="number" name="percentage_of_10th" id="percentage_of_10th" class="form-control" value="<?php echo isset($record) ?  $record['percentage_of_10th']: '' ?>" placeholder="please enter percentage_of_10th"required>
                                             <div class="invalid-feedback">
                                                Please fill in your percentage_of_10th
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Percentage Of 12th</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="number" name="percentage_of_12th" id="percentage_of_12th" class="form-control" value="<?php echo isset($record) ?  $record['percentage_of_12th']: '' ?>" placeholder="please enter percentage_of_12th"required>
                                             <div class="invalid-feedback">
                                                Please fill in your percentage_of_12th
                                            </div>
                                        </div>
                                    </div>                   
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button class="btn btn-primary" name="userSubmitButton" href="index.php">Submit</button>
                                            <button  class ="btn btn-primary" name="userSubmitButton"  type="reset">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
     </form>

        <!-- Start app Footer part -->
        <footer class="main-footer">
            <div class="footer-left">
                 <div class="bullet"></div>  <a href="templateshub.net">Templates Hub</a>
            </div>
            <div class="footer-right">
            
            </div>
        </footer>
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
    $.uploadPreview({
  input_field: "#image-upload",   // Default: .image-upload
  preview_box: "#image-preview",  // Default: .image-preview
  label_field: "#image-label",    // Default: .image-label
  label_default: "Choose File",   // Default: Choose File
  label_selected: "Change File",  // Default: Change File
  no_label: false,                // Default: false
  success_callback: null          // Default: null
});
</script>

</body>

<!-- blank.html  Tue, 07 Jan 2020 03:35:42 GMT -->
</html>