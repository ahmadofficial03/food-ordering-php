<?php include("./config/constants.php") ?>


<?php
$id = $_GET['id'];

$query = "DELETE FROM tbl_admin WHERE id=$id";

$result = mysqli_query($connection, $query);

if ($result == true) {
    $_SESSION['delete'] = "Admin Deleted successfully";
    header("location:" . SITEURL . "admin/manage-admin.php");
} else {
    $_SESSION['delete'] = "Something went wrong when trying to add admin";
    header("location:" . SITEURL . "admin/delete.php");
}

?>