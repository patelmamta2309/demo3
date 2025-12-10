<div class="main-sidebar sidebar-style-2">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <a href="index-2.html">Hiring Portal</a>
                </div>
                <div class="sidebar-brand sidebar-brand-sm">
                    <a href="index-2.html">HP</a>
                </div>
                <?php 
                    $role = "admin";
                ?>
                <!-- General Admin side -->
            <ul class="sidebar-menu">
                 <!--        <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i><span>Adimn</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="index-0.html">Dashbord</a></li>
                            <li><a class="nav-link" href="/hp/students/index.php">Manage Student</a></li>
                            <li><a class="nav-link" href="index-2.html">Manage Company</a></li>
                            <li><a class="nav-link" href="/hp/facultys/index.php">Manage Faculty</a></li>
                            <li><a class="nav-link" href="index-2.html">Manage Job_post</a></li>
                            <li><a class="nav-link" href="index-2.html">Hiyring Student</a></li>
                            <li><a class="nav-link" href="index-2.html">Update Profile</a></li>
                            <li><a class="nav-link" href="/hp/reset-password.php">Password</a></li>
                        </ul>
                    </li>  -->
                    
                <!-- General Faculty Side-->
                 <?php if(isset($_SESSION['type']) && $_SESSION['type'] == "Faculty") { ?>
                            <li><a class="nav-link" href="/hp/facultys/dashboard.php"><i class="fas fa-chart-bar"></i><span>Dashboard</span></a></li>
                            <li><a class="nav-link" href="/hp/student"><i class="fas fa-user-graduate"></i><span>Manage Student</span></a></li>
                            <li><a class="nav-link" href="/hp/company"><i class="fas fa-building"></i><span>Manage Company</span></a></li>
                            <li><a class="nav-link" href="/hp/job_post"><i class="fas fa-th-large"></i><span>Manage Job Post</span></a></li>
                            <li><a class="nav-link" href="/hp/company/hire.php"><i class="fas fa-user-plus"></i><span>Hire Candidate</span></a></li>
                            <li><a class="nav-link" href="/hp/company/reject.php"><i class="fas fa-user-alt-slash"></i><span>Reject Candidate</span></a></li>
                            <li><a class="nav-link" href="/hp/facultys/profile.php"><i class="fas fa-user"></i><span>Profile</span></a></li>
                            <li><a class="nav-link" href="/hp/reset-password"><i class="fas fa-exchange-alt"></i><span>Change Password</span></a></li>
                            <li><a class="nav-link" href="/hp/auth/logout.php"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a></li>
              

               <?php } ?>

                <!-- General company Side -->
            <?php if(isset($_SESSION['type']) && $_SESSION['type'] == "Company") { ?>
                            <li><a class="nav-link" href="/hp/company/dashboard.php"><i class="fas fa-chart-bar"></i><span>Dashboard</span></a></li>
                            <li><a class="nav-link" href="/hp/job_post"><i class="fas fa-th-large"></i><span>Manage Job Post</span></a></li>
                            <li><a class="nav-link" href="/hp/job_request"><i class="fas fa-location-arrow"></i><span>Manage Job Request</span></a></li>
                            <li><a class="nav-link" href="/hp/company/hire.php"><i class="fas fa-user-plus"></i><span>Hiring Candidate</span></a></li>
                            <li><a class="nav-link" href="/hp/company/reject.php"><i class="fas fa-user-alt-slash"></i><span>Reject Candidate</span></a></li>
                            <li><a class="nav-link" href="/hp/company/profile.php"><i class="fas fa-user"></i><span>Profile</span></a></li>
                            <li><a class="nav-link" href="/hp/reset-password"><i class="fas fa-exchange-alt"></i><span>Change Password</span></a></li>
                            <li><a class="nav-link" href="/hp/auth/logout.php"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a></li>

               <?php } ?>
                   
                    <!-- General Student Side -->
                    <?php if(isset($_SESSION['type']) && $_SESSION['type'] == "Student") { ?>
                            <li><a class="nav-link" href="/hp/student/dashboard.php"><i class="fas fa-chart-bar"></i><span>Dashboard</span></a></li>
                            <li><a class="nav-link" href="/hp/apply_job_post"><i class= "fas fa-th-large"></i><span>Apply Job Post</span></a></li>
                            <li><a class="nav-link" href="/hp/company/hire.php"><i class="fas fa-user-plus"></i><span>Hire Job Post</span></a></li>
                            <li><a class="nav-link" href="/hp/company/reject.php"><i class="fas fa-user-alt-slash"></i><span>Reject Job Post</span></a></li>
                            <li><a class="nav-link" href="/hp/student/profile.php"><i class="fas fa-user"></i><span>Profile</span></a></li>
                            <li><a class="nav-link" href="/hp/reset-password"><i class="fas fa-exchange-alt"></i><span>Change Password</span></a></li>
                            <li><a class="nav-link" href="/hp/auth/logout.php"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a></li>

                    <?php } ?>
                   
            </aside>
</div>
