<!DOCTYPE html>
<html lang="en">

<!-- auth-reset-password.html  Tue, 07 Jan 2020 03:39:48 GMT -->
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title>reset-password</title>

<!-- General CSS Files -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous">
<link rel="stylesheet" href="../assets/modules/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/modules/fontawesome/css/all.min.css">

<!-- CSS Libraries -->

<!-- Template CSS -->
<link rel="stylesheet" href="../assets/css/style.min.css">
<link rel="stylesheet" href="../assets/css/components.min.css">
</head>

<body class="layout-4">

<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                          <img src="/HP/hp.jpg" alt="logo" width="150" class=" rounded-circle" height="120">
                    </div>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Change Password</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="submit.php">
                                <div class="form-group">
                                    <label for="old-password">Old Password</label>
                                    <input id="old-password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="old-password" tabindex="1" required>
                                    <div class="invalid-feedback">
                                        Please fill in your old password
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password">New Password</label>
                                    <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" tabindex="2" required>
                                    <div id="pwindicator" class="pwindicator">
                                        <div class="bar"></div>
                                        <div class="label"></div>
                                    </div>
                                    <div class="invalid-feedback">
                                        Please fill in your New password
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password-confirm">Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control" name="confirm-password" tabindex="3" required>
                                </div>
                                <div class="invalid-feedback">
                                    Please fill in your confirm password
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="loginBtn" class="btn btn-primary btn-lg btn-block" tabindex="4">Change Password</button>
                                </div>
                            </form>
                            <?php
                            if (isset($_GET['error'])) {
                                if ($_GET['error'] == 'notmatch') {
                                    echo '<div class="alert alert-danger" role="alert">Password and Confirm Password do not match.</div>';
                                } else if ($_GET['error'] == 'old') {
                                    echo '<div class="alert alert-danger" role="alert">Old password is incorrect.</div>';
                                }
                            }?>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </section>
</div>

<!-- General JS Scripts -->
<script src="../assets/bundles/lib.vendor.bundle.js"></script>
<script src="../js/CodiePie.js"></script>

<!-- JS Libraies -->

<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="../js/scripts.js"></script>
<script src="../js/custom.js"></script>
</body>

<!-- auth-reset-password.html  Tue, 07 Jan 2020 03:39:48 GMT -->
</html>