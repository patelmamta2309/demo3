<!DOCTYPE html>
<html lang="en">

<!-- index.html  Tue, 07 Jan 2020 03:35:33 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?php session_start(); echo $_SESSION['type']?> - Dashboard</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="../assets/modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="../assets/modules/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="../assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">

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
        <?php
        require_once '../db_config.php';
        if (!(isset($_SESSION["user"]["id"]))) {
            header("Location: /hp/auth/login.php");
        }
        $type = $_SESSION['type'];
        $whereQuery = '';
        
        $selectQuery = "SELECT * FROM `job_post` " . $whereQuery;

        $allJobPostResult =  mysqli_query($connection, $selectQuery);


        $hireStudentQuery = "Select * from job_request where is_hire = 1";
        $hireStudentQueryResult = mysqli_query($connection, $hireStudentQuery);
        $totalHireStudent = mysqli_num_rows($hireStudentQueryResult);

        $rejectStudentQuery = "Select * from job_request where is_hire = 0 ";
        $rejectStudentQueryResult = mysqli_query($connection, $rejectStudentQuery);
        $totalRejectStudent = mysqli_num_rows($rejectStudentQueryResult);

        $jobpostQuery = "Select * from job_Post";
        $jobpostQueryResult = mysqli_query($connection, $jobpostQuery);
        $totaljobpost = mysqli_num_rows($jobpostQueryResult);

        $pieQuery = "
    SELECT
      CASE
        WHEN is_hire = 1 THEN 'Hired'
        WHEN is_hire = 0 THEN 'Rejected'
        ELSE 'Pending'
        END AS application_status,
        COUNT(*) AS total
        FROM job_request
       
         GROUP BY application_status
";

        $pieQueryRequest = mysqli_query($connection, $pieQuery);

        $labels = [];
        $totals = [];

        while ($row = mysqli_fetch_assoc($pieQueryRequest)) {
            $labels[] = $row['application_status'];
            $totals[] = $row['total'];
        }


        $jobPostQuery = "
  SELECT 
    MONTH(job_post_date) AS month,
    MONTHNAME(job_post_date) AS month_name,
    COUNT(*) AS total
  FROM job_post
 
  GROUP BY MONTH(job_post_date)
  ORDER BY MONTH(job_post_date)
";
        $result = mysqli_query($connection, $jobPostQuery);

        $monthLabels = [];
        $jobPostData = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $monthLabels[] = $row['month_name'];
            $jobPostData[] = $row['total'];
        }

        mysqli_close($connection);

        ?>

        <!-- Pass to JS -->
        <script>
            const chartLabels = <?php echo json_encode($labels); ?>;
            const chartData = <?php echo json_encode($totals); ?>;
            const monthLabels = <?php echo json_encode($monthLabels); ?>;
            const jobPostData = <?php echo json_encode($jobPostData); ?>;
        </script>

        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <!-- Start app top navbar -->
            <?php include '../header.php' ?>
            <!-- Start main left sidebar menu -->
            <?php include '../sidebar.php' ?>
            <!-- Start app main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="card card-statistic-2">
                                <div class="card-chart">
                                    <canvas id="total-student-chart" height="80"></canvas>
                                </div>
                                <div class="card-icon shadow-primary bg-primary">
                                    <i class="fas  fa-users"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Total Hire Students</h4>
                                    </div>
                                    <div class="card-body">
                                        <?php echo $totalHireStudent; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="card card-statistic-2">
                                <div class="card-chart">
                                    <canvas id="balance-chart" height="80"></canvas>
                                </div>
                                <div class="card-icon shadow-primary bg-primary">
                                    <i class="fas  fa-users"></i>

                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Total Reject Students</h4>
                                    </div>
                                    <div class="card-body">
                                        <?php echo $totalRejectStudent; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="card card-statistic-2">
                                <div class="card-chart">
                                    <canvas id="sales-chart" height="80"></canvas>
                                </div>
                                <div class="card-icon shadow-primary bg-primary">
                                    <i class="fas  fa-users"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Total job post</h4>
                                    </div>
                                    <div class="card-body">
                                        <?php echo $totaljobpost; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-deck">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Hired Students</h4>
                                </div>
                                <div class="card-body">
                                    <canvas id="pie-chart" height="158"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Month wise job post</h4>
                                </div>
                                <div class="card-body">
                                    <canvas id="jobPostChart" height="158"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-deck">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Job Post</h4>
                                    <div class="card-header-action">
                                        <a class="btn btn-danger" href="/hp/job_post/index.php">View More <i class="fas fa-chevron-right"></i></a>
                                    </div>
                                </div>

                                <div class="card-body p-0">
                                    <div class="table-responsive table-invoice">
                                        <table class="table table-striped">
                                            <tr>
                                                <th>ID</th>
                                                <th>Job Title</th>
                                                <th>Job Description</th>
                                                <th>Job Post Date</th>
                                                <th>Action</th>
                                            </tr>
                                            <?php
                                            while ($row = mysqli_fetch_assoc($allJobPostResult)) {
                                            ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $row["id"]; ?>
                                                    </td>

                                                    <td>
                                                        <?php echo $row["job_title"]; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row["job_description"]; ?>
                                                    </td>

                                                    <td>
                                                        <?php echo $row["job_post_date"]; ?>
                                                    </td>

                                                    <td>
                                                        <a class="btn btn-primary" href="/hp/job_post/form.php?id=<?php echo $row['id'] ?>">Edit</a>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>

                                        </table>
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
    <script src="../assets/modules/jquery.sparkline.min.js"></script>
    <script src="../assets/modules/chart.min.js"></script>
    <script src="../assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
    <script src="../assets/modules/summernote/summernote-bs4.js"></script>
    <script src="../assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="../js/page/index.js"></script>

    <!-- Template JS File -->
    <script src="../js/scripts.js"></script>
    <script src="../js/custom.js"></script>
    <script>
        var pieChartElement = document.getElementById("pie-chart").getContext('2d');
        var pieChart = new Chart(pieChartElement, {
            type: 'pie',
            data: {
                labels: chartLabels, // ["Hired", "Rejected", "Pending"]
                datasets: [{
                    label: 'Application Status',
                    data: chartData, // [12, 8, 5]
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.5)', // Hired
                        'rgba(255, 99, 132, 0.5)', // Rejected
                        'rgba(255, 206, 86, 0.5)' // Pending
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 2,
                    pointRadius: 4,
                    pointBackgroundColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 206, 86, 1)'
                    ]
                }]
            },
            options: {
                legend: {
                    display: true
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            drawBorder: false,
                            color: '#f2f2f2',
                        },
                        ticks: {
                            beginAtZero: true,
                            precision: 0
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }]
                }
            }
        });
     
     
var balance_chart = document.getElementById("total-student-chart").getContext('2d');

var balance_chart_bg_color = balance_chart.createLinearGradient(0, 0, 0, 70);
balance_chart_bg_color.addColorStop(0, 'rgba(63,82,227,.2)');
balance_chart_bg_color.addColorStop(1, 'rgba(63,82,227,0)');

var myChart = new Chart(balance_chart, {
  type: 'line',
  data: {
    labels: ['16-07-2018', '17-07-2018', '18-07-2018', '19-07-2018', '20-07-2018', '21-07-2018', '22-07-2018', '23-07-2018', '24-07-2018', '25-07-2018', '26-07-2018', '27-07-2018', '28-07-2018', '29-07-2018', '30-07-2018', '31-07-2018'],
    datasets: [{
      label: 'Balance',
      data: [50, 61, 80, 50, 72, 52, 60, 41, 30, 45, 70, 40, 93, 63, 50, 62],
      backgroundColor: balance_chart_bg_color,
      borderWidth: 3,
      borderColor: 'rgba(63,82,227,1)',
      pointBorderWidth: 0,
      pointBorderColor: 'transparent',
      pointRadius: 3,
      pointBackgroundColor: 'transparent',
      pointHoverBackgroundColor: 'rgba(63,82,227,1)',
    }]
  },
  options: {
    layout: {
      padding: {
        bottom: -1,
        left: -1
      }
    },
    legend: {
      display: false
    },
    scales: {
      yAxes: [{
        gridLines: {
          display: false,
          drawBorder: false,
        },
        ticks: {
          beginAtZero: true,
          display: false
        }
      }],
      xAxes: [{
        gridLines: {
          drawBorder: false,
          display: false,
        },
        ticks: {
          display: false
        }
      }]
    },
  }
});
     
        const jobPostChartElement = document.getElementById('jobPostChart').getContext('2d');

        const jobPostChart = new Chart(jobPostChartElement, {
            type: 'bar',
            data: {
                labels: monthLabels,
                datasets: [{
                    label: 'Job Posts',
                    data: jobPostData,
                    backgroundColor: '#3fb2e3b3',
                    borderColor: '#3fb2e3b3',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            precision: 0
                        },
                        gridLines: {
                            drawBorder: false,
                            color: '#f2f2f2',
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            display: false
                        }
                    }]
                }
            }
        });
    </script>
</body>

<!-- index.html  Tue, 07 Jan 2020 03:35:33 GMT -->

</html>