<?php include("./config/constants.php") ?>


<?php
$id = $_GET['id'];

$query = "DELETE FROM tbl_food WHERE id=$id";

$result = mysqli_query($connection, $query);

if ($result == true) {
    $_SESSION['delete'] = "Food Deleted successfully";
    header("location:" . SITEURL . "admin/manage-food.php");
} else {
    $_SESSION['delete'] = "Something went wrong when trying to delete Food";
    header("location:" . SITEURL . "admin/delete-food.php");
}

?>
