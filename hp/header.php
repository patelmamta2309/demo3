<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                        class="fas fa-search"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <?php
                $fileName = "";
                $profileUrl ="";
                if ($_SESSION['type'] === 'Company') {
                    $fileName = '/hp/company/uploads/' . $_SESSION["user"]["id"] . '.jpg';
                    $profileUrl = '/hp/company/profile.php';
                }
                if ($_SESSION['type'] === 'Student') {
                    $fileName = '/hp/student/uploads/' . $_SESSION["user"]["id"] . '.jpg';
                    $profileUrl = '/hp/student/profile.php';
                }
                if ($_SESSION['type'] === 'Faculty') {
                    $fileName = '/hp/facultys/uploads/' . $_SESSION["user"]["id"] . '.jpg';
                    $profileUrl = '/hp/facultys/profile.php';
                }
                ?>
                <img height="30" alt="image" src="<?php echo $fileName . '?id=' . time() ?>" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi,
                    <?php echo $_SESSION["type"] == 'Company' ? $_SESSION["user"]["company_name"] : $_SESSION["user"]["first_name"] . " " . $_SESSION["user"]["last_name"] ?>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title"></div>
                <a href="<?php echo $profileUrl?>" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                <a href="/hp/reset-password" class="dropdown-item has-icon">
                    <i class="fas fa-bolt"></i>Change Password
                </a>
                <div class="dropdown-divider"></div>
                <a href="/hp/auth/logout.php" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>