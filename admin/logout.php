<?php
include("../admin/config/constants.php");



// Destroy the session
session_destroy();

// Redirect to the login page
header("location:" . SITEURL . "admin/login.php");
