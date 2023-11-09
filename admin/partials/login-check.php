<?php include("./menu.php") ?>


<?php
if (!isset($_SESSION['user'])) {
    // if admin user not login
    $_SESSION['no-login-message'] = '<div class="text-center">Please login to access admin panel</div>';
    header("location:" . SITEURL . "admin/login.php");
}
