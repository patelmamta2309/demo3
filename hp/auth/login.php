<!DOCTYPE html>
<html lang="en">

<!-- auth-login.html  Tue, 07 Jan 2020 03:39:47 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; CodiePie</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="../assets/modules/bootstrap-social/bootstrap-social.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="../assets/css/style.min.css">
    <link rel="stylesheet" href="../assets/css/components.min.css">
</head>

<body class="layout-4">
    <?php
    $loginError = "";
    require_once '../db_config.php';
    if (isset($_POST['loginBtn'])) {
        $userType = $_POST['user_type'];
        $tableName = "";
        if ($userType == "Faculty") {   
            $tableName = "faculty";
        } else if ($userType == "Student") {
            $tableName = "students";
        } else if ($userType == "Company") {
            $tableName = "company";
        }
    session_reset();
    session_abort();
        session_start();
        $loginQuery = "SELECT * FROM $tableName WHERE user_name = '$_POST[email]' AND password = '$_POST[password]'";
        $loginResult = mysqli_query($connection, $loginQuery);
        if (mysqli_num_rows($loginResult) > 0) {
            $record = mysqli_fetch_assoc($loginResult);
            $_SESSION['user'] = $record;
            $_SESSION['type'] = $userType; 
            if($userType == "Faculty") {
                header("Location: /hp/facultys/Dashboard.php");
            } else if($userType == "Company") {
                header("Location: /hp/company/Dashboard.php");
            } else if($userType == "Student") {
                header("Location:/hp/student/Dashboard.php");
            }
        } else {
            // Login failed
            $loginError = "Invalid email or password.";
        }
    }
    ?>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="/HP/hp.jpg" alt="logo" width="150" class=" rounded-circle" height="120">
                        </div>
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Login</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="/hp/auth/login.php" class="needs-validation"
                                    novalidate="">
                                    <div class="form-group">
                                        <label for="user_type">User Type</label>
                                        <select class="form-control" name="user_type" tabindex="1"
                                            required autofocus>
                                            <option>Faculty</option>
                                            <option>Student</option>
                                            <option>Company</option>
                                        </select>
                                      
                                        <div class="invalid-feedback">
                                            Please fill in your User type
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">User name</label>
                                        <input id="email" type="text" class="form-control" name="email" tabindex="3"
                                            required autofocus>
                                        <div class="invalid-feedback">
                                            Please fill in your email
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>

                                        </div>
                                        <input id="password" type="password" class="form-control" name="password"
                                            tabindex="4" required>
                                        <div class="invalid-feedback">
                                            please fill in your password
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" class="custom-control-input"
                                                tabindex="4" id="remember-me">
                                            <label class="custom-control-label" for="remember-me">Remember Me</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="loginBtn" class="btn btn-primary btn-lg btn-block"
                                            tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                    <?php
                                    if ($loginError != "") {
                                        echo '<div class="alert alert-danger" role="alert">' . $loginError . '</div>';
                                    }
                                    ?>
                                </form>

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

<!-- auth-login.html  Tue, 07 Jan 2020 03:39:47 GMT -->

</html>