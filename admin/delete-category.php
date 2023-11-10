<?php include("./config/constants.php") ?>

<?php
$id = $_GET['id'];

$query = "DELETE FROM tbl_category WHERE id=$id";

$result = mysqli_query($connection, $query);

if ($result == true) {
    $_SESSION['delete'] = "Category Deleted successfully";
    header("location:" . SITEURL . "admin/manage-category.php");
} else {
    $_SESSION['delete'] = "Something went wrong when trying to delete category";
    header("location:" . SITEURL . "admin/delete.php");
}

?>