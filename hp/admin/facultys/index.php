<!DOCTYPE html>
<html lang="en">

<!-- blank.html  Tue, 07 Jan 2020 03:35:42 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Facultys_Tabel</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="/hp/assets/modules/bootstrap/css/bootstrap.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="/hp/assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet" href="/hp/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/hp/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="/hp/assets/css/style.min.css">
    <link rel="stylesheet" href="/hp/assets/css/components.min.css">
</head>


<body class="layout-4">
    <?php
    require_once '../db_config.php';
    $selectQuery = "SELECT * FROM `faculty`";

    $result = mysqli_query($connection, $selectQuery);

    //while ($row = mysqli_fetch_assoc($result)) {
    //	echo "ID: " . $row['id'] . " Name: " . $row['name'] . " age: " . $row['age'] . " phone_no: " . $row['phone_no'] . " email: " . $row['email'] . "<br>";
    //}
    mysqli_close($connection);

    ?>



    <!-- Page Loader -->
    <form>
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
                            <h1>Facultys</h1>
                            <div class="section-header-button">
                                <a class="btn btn-primary" href="form.php">Add New</a>
                            </div>
                            <div class="section-header-breadcrumb">
                                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                                <div class="breadcrumb-item"><a href="/hp/reset-password.php">Reset password</a></div>
                                <div class="breadcrumb-item">All Faculty</div>
                            </div>
                        </div>

                        <div class="section-body">

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>All Faculty</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped v_center" id="table-1">
                                                    <thead>
                                                        <tr>
                                                            <th>Id</th>
                                                            <th>Full Name</th>
                                                            <th>Email</th>
                                                            <th>Phone</th>
                                                            <th>Delete</th>
                                                            <th>Edit</th>
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
                                                                    <?php echo $row["email"]; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row["phone"]; ?>
                                                                </td>
                                                                <td>
                                                                    <button onClick='deleteRecord(<?php echo $row['id'] ?>)'
                                                                        class="btn btn-primary">Delete</button>
                                                                </td>
                                                                <td>
                                                                    <a class="btn btn-primary"
                                                                        href="form.php?id=<?php echo $row['id'] ?>"
                                                                        class="btn btn-primary">Edit</a>
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

                <!-- Start app Footer part -->
                <footer class="main-footer">
                    <div class="footer-left">
                        <div class="bullet"></div> <a href="templateshub.net">Templates Hub</a>
                    </div>
                    <div class="footer-right">

                    </div>
                </footer>
            </div>
        </div>
    </form>

    <!-- General JS Scripts -->
    <script src="/hp/assets/bundles/lib.vendor.bundle.js"></script>
    <script src="/hp/js/CodiePie.js"></script>

    <!-- JS Libraies -->
    <script src="/hp/assets/modules/datatables/datatables.min.js"></script>
    <script src="/hp/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="/hp/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
    <script src="/hp/assets/modules/jquery-ui/jquery-ui.min.js"></script>
    <script>
        function deleteRecord(id) {
            if (confirm("Are you sure you want to delete this record?")) {
                window.location.href = "data/delete.php?id=" + id;
            }
        }
        $("#facultyTable").DataTable({
            lengthMenu: [5, 10, 25, 50, -1]
        });
    </script>

    <!-- Page Specific JS File -->
    <script src="/hp/js/page/modules-datatables.js"></script>

    <!-- Template JS File -->
    <script src="hp/js/scripts.js"></script>
    <script src="hp/js/custom.js"></script>
</body>

<!-- blank.html  Tue, 07 Jan 2020 03:35:42 GMT -->

</html>