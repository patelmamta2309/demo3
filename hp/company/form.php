<!DOCTYPE html>
<html lang="en">

<!-- blank.html  Tue, 07 Jan 2020 03:35:42 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?php session_start(); echo $_SESSION['type']?> - company form</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/modules/bootstrap/css/bootstrap.min.css">

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
if (!(isset($_SESSION["user"]["id"]))) {
    header("Location: /hp/auth/login.php");
}
$queryString = "";
$record = null;
if (isset($_REQUEST['id'])) {
    $queryString = '?id=' . $_REQUEST['id'];

    $id = $_REQUEST['id'];
    $selectQuery = "SELECT * FROM `company` where `id`=" . $id;

    $result = mysqli_query($connection, $selectQuery);
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
            <form name="userform" id="userform" enctype="multipart/form-data" action="data/submit.php<?php echo $queryString; ?>" method="post" class="needs-validation" novalidate="">
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <div class="section-header-back">
                            <a href="index.php" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                        </div>
                        <h1>Manage Company</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="/hp/company/dashboard.php">Dashboard</a></div>
                            <div class="breadcrumb-item">Manage Company</div>
                        </div>
                    </div>

                    <div class="section-body">
                        <h2 class="section-title">Manage Company</h2>
                        <p class="section-lead"> On this page you can create a new post and fill in all fields.</p>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Manage Your Company</h4>
                                    </div>


                                    <div class="card-body">
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                                Company Logo URL
                                            </label>
                                            <div class="col-sm-12 col-md-7">
                                                <div id="image-preview" class="image-preview">
                                                    <label for="image-upload" id="image-label">Choose File</label>
                                                    <input type="file" name="companyLogo" id="image-upload" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Company
                                                Name</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" name="company_name" id="company_name"
                                                    class="form-control"
                                                    value="<?php echo isset($record) ? $record['company_name'] : '' ?>"
                                                    placeholder="please enter company name" required>
                                                <div class="invalid-feedback">
                                                    Please fill in your company name
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Company
                                                Description</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input class="summernote-simple form-control" name="company_description"
                                                    id="company_description"
                                                    value="<?php echo isset($record) ? $record['company_description'] : '' ?>"
                                                    placeholder="please enter company_description" required>
                                                <div class="invalid-feedback">
                                                    Please fill in your company description
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="email" name="email" id="email" class="form-control"
                                                    value="<?php echo isset($record) ? $record['email'] : '' ?>"
                                                    placeholder="please enter email"required>
                                                <div class="invalid-feedback">
                                                    Please fill in your email
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Phone
                                            </label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="number" name="phone" id="phone" class="form-control"
                                                    value="<?php echo isset($record) ? $record['phone'] : '' ?>"
                                                    placeholder="please enter phone" required>
                                                <div class="invalid-feedback">
                                                    Please fill in your phone
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alternate
                                                Phone </label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="number" name=" alternate_phone" id=" alternate_phone"
                                                    class="form-control"
                                                    value="<?php echo isset($record) ? $record['alternate_phone'] : '' ?>"
                                                    placeholder="please enter alternate_phone" required>
                                                <div class="invalid-feedback">
                                                    Please fill in your alternate phone
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3">UserName</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" name="user_name" id="user_name" class="form-control"
                                                    value="<?php echo isset($record) ? $record['user_name'] : '' ?>"
                                                    placeholder="please enter user_name"required>
                                                <div class="invalid-feedback">
                                                    Please fill in your company user_name
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3">password</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" name="password" id="password" class="form-control"
                                                    value="<?php echo isset($record) ? $record['password'] : '' ?>"
                                                    placeholder="please enter password"required>
                                                <div class="invalid-feedback">
                                                    Please fill in your company password
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Address1</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" name="address1" class="form-control mb-2"
                                                    placeholder="Street address" value="<?php echo isset($record) ? $record['address1'] : '' ?>"required>
                                                <div class="form-row">
                                                    <div class="col-12 col-md-4 md-2 mb-mb-0">
                                                        <input type="text" name="state" id="state" class="form-control"
                                                            placeholder=" Enter your State"
                                                            value="<?php echo isset($record) ? $record['state'] : '' ?>"required>
                                                    </div>
                                                    <div class="col-12 col-md-4 md-2 mb-mb-0">
                                                        <input type="text" name="city" id="city" class="form-control"
                                                            placeholder="Enter your City"
                                                            value="<?php echo isset($record) ? $record['city'] : '' ?>"required>
                                                    </div>
                                                    <div class="col-12 col-md-4 md-2 mb-mb-0">
                                                        <input type="text" name="zipcode" id="zip" class="form-control"
                                                            placeholder="Enter your Zipcode"
                                                            value="<?php echo isset($record) ? $record['zipcode'] : '' ?>"required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Address2</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" name="address2" class="form-control mb-2"
                                                    value="<?php echo isset($record) ? $record['address2'] : '' ?>"
                                                    placeholder="Street address"required>

                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Coordinator
                                                Name</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" name="coordinator_name" id="coordinator_name"
                                                    class="form-control"
                                                    value="<?php echo isset($record) ? $record['coordinator_name'] : '' ?>"
                                                    placeholder="please enter coordinator name"required>
                                                <div class="invalid-feedback">
                                                    Please fill in your coordinator name
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Coordinator
                                                Number</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="number" name="coordinator_phone" id="coordinator_phone"
                                                    class="form-control"
                                                    value="<?php echo isset($record) ? $record['coordinator_phone'] : '' ?>"
                                                    placeholder="please enter coordinator phone"required>
                                                <div class="invalid-feedback">
                                                    Please fill in your coordinator phone
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Coordinator
                                                Email</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="email" name="coordinator_email" id="coordinator_email"
                                                    class="form-control"
                                                    value="<?php echo isset($record) ? $record['coordinator_email'] : '' ?>"
                                                    placeholder="please enter coordinator-email" required>
                                                <div class="invalid-feedback">
                                                    Please fill in your coordinator email
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                            <div class="col-sm-12 col-md-7">
                                                <button class="btn btn-primary" name="userSubmitButton"
                                                    type="submit">Submit</button>
                                                <button type="reset" class="btn btn-primary">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

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