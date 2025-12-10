<!DOCTYPE html>
<html lang="en">

<!-- blank.html  -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
   <title><?php session_start(); echo $_SESSION['type']?> - profile</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"crossorigin="anonymous">
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
require_once '../db_config.php';
$queryString = "?id=" . $_SESSION["user"]["id"];
$record = $_SESSION["user"];
if (!(isset($_SESSION["user"]["id"]))) {
    header("Location: /hp/auth/login.php");
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
            <form method="POST" enctype="multipart/form-data" name="userform" id="userform" action="data/profile.php
                <?php echo $queryString; ?>" class="needs-validation" novalidate="">
                <div class="main-content">

                    <section class="section">
                        <div class="section-header">

                            <h1> Faculty Profile</h1>
                            <div class="section-header-breadcrumb">
                                <div class="breadcrumb-item active"><a href="/hp/Facultys/Dashboard.php">Dashboard</a>
                                </div>
                                <div class="breadcrumb-item">Faculty</div>
                            </div>
                        </div>
                        <div class="section-body">

                            <h2 class="section-title">Faculty</h2>
                            <p class="section-lead">On this page you can update all fields.</p>

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Update Faculty profile</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Profile
                                                    photo</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <div id="image-preview" class="image-preview">
                                                        <label for="image-upload" id="image-label">Choose File</label>
                                                        <input type="file" name="facultyProfile" class="image"
                                                            id="image-upload" />
                                                        <div class="invalid-feedback">
                                                            Please fill in your image
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">First
                                                    name</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" name="first_name" id="first_name"
                                                        class="form-control" placeholder="Enter your first_name"
                                                        value="<?php echo isset($record) ? $record['first_name'] : '' ?>"
                                                        required>
                                                    <div class="invalid-feedback">
                                                        Please fill in your first name
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Middle
                                                    name</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" name="middle_name" id="middle_name"
                                                        class="form-control" placeholder="Enter your middle_name"
                                                        value="<?php echo isset($record) ? $record['middle_name'] : '' ?>"
                                                        required>
                                                    <div class="invalid-feedback">
                                                        Please fill in your middle name
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Last
                                                    name</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" name="last_name" id="last_name"
                                                        class="form-control" placeholder="Enter your last_name"
                                                        value="<?php echo isset($record) ? $record['last_name'] : '' ?>"
                                                        required>
                                                    <div class="invalid-feedback">
                                                        Please fill in your last name
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">date
                                                    of joininig</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="date" name="date_of_joining" id="date_of_joining"
                                                        class="form-control"
                                                        value="<?php echo isset($record) ? $record['date_of_joining'] : '' ?>"
                                                        required>
                                                    <div class="invalid-feedback">
                                                        Please fill in your date of joininig
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="email" name="email" id="email" class="form-control"
                                                        placeholder="Enter your Email"
                                                        value="<?php echo isset($record) ? $record['email'] : '' ?>"
                                                        required>
                                                    <div class="invalid-feedback">
                                                        Please fill in your email
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Phone
                                                    number</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" name="phone" id="phone" class="form-control"
                                                        placeholder="primary"
                                                        value="<?php echo isset($record) ? $record['phone'] : '' ?>"
                                                        required>
                                                    <div class="invalid-feedback">
                                                        Please fill in your phone number
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alternate
                                                    number</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" name="alternate_phone" id="alternate_phone"
                                                        class="form-control" placeholder="Alternate"
                                                        value="<?php echo isset($record) ? $record['alternate_phone'] : '' ?>"
                                                        required>
                                                    <div class="invalid-feedback">
                                                        Please fill in alternate number
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gender</label>

                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="genderMale" name="gender"
                                                        class="custom-control-input" value="Male" <?php echo isset($record) ? ($record['gender'] === 'Male' ? 'checked' : '') : '' ?>>
                                                    <label class="custom-control-label" for="genderMale">Male</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="genderFemale" name="gender"
                                                        class="custom-control-input" value="Female" <?php echo isset($record) ? ($record['gender'] === 'Female' ? 'checked' : '') : '' ?>>
                                                    <label class="custom-control-label"
                                                        for="genderFemale">Female</label>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" name="role" id="role" class="form-control"
                                                        placeholder="Enter your Role"
                                                        value="<?php echo isset($record) ? $record['role'] : '' ?>"
                                                        required>
                                                    <div class="invalid-feedback">
                                                        Please fill in your role
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Username</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" name="user_name" id="user_name"
                                                        class="form-control" placeholder="Enter your username"
                                                        value="<?php echo isset($record) ? $record['user_name'] : '' ?>"
                                                        required>
                                                    <div class="invalid-feedback">
                                                        Please fill in your username
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="password" name="password" id="password"
                                                        class="form-control" placeholder="Enter your password"
                                                        value="<?php echo isset($record) ? $record['password'] : '' ?>"
                                                        required>
                                                    <div class="invalid-feedback">
                                                        Please fill in your password
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label class="col-12 col-md-3 col-lg-3"></label>
                                                <div class="col-sm-12 col-md-7">
                                                    <button type="submit" class="btn btn-primary"
                                                        name="userSubmitButton">Submit</button>
                                                    <button type="reset" class="btn btn-primary">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
            </form>
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
    <script src="../assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="../js/page/modules-datatables.js"></script>

    <!-- Template JS File -->

    <script src="../js/scripts.js"></script>
    <script src="../js/custom.js"></script>
    <script>

        $.uploadPreview({
            input_field: "#image-upload", // Default: .image-upload
            preview_box: "#image-preview", // Default: .image-preview
            label_field: "#image-label", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });
        var imageUrl = 'uploads/<?php echo isset($record) ? $record['id'] : '' ?>.jpg?id=' + new Date().getTime();
        $("#image-preview").css("background-image", "url(" + imageUrl + ")");
        $("#image-preview").css("background-size", "cover");
    </script>
</body>

<!-- blank.html  Tue, 07 Jan 2020 03:35:42 GMT -->

</html>