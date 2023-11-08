<?php

// session start:
session_start();

// CONSTANTS:
define('SITEURL', 'http://localhost/food-ordering/');
define('LOCAL_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_NAME', 'food-order');
define('DB_PASSWORD', '');

$connection = mysqli_connect(LOCAL_HOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error($connection));
$db_select = mysqli_select_db($connection, DB_NAME) or die(mysqli_error($connection));
