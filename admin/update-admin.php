<?php include("../admin/partials/menu.php") ?>
<?php include("./config/constants.php") ?>



<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>

        <br />
        <?php
        $id = $_GET['id'];
        $query = "SELECT * FROM tbl_admin WHERE id=$id";

        $result = mysqli_query($connection, $query);
        if ($result) {
            $count = mysqli_num_rows($result);
            if ($count == 1) {
                echo "Admin Avaliable";
                $rows = mysqli_fetch_assoc($result);
                echo $full_name = $rows['full_name'];
                echo $username = $rows['username'];
            } else {
                echo "Admin not Avaliable";
            }
        }


        ?>

        <form action="" method="POST">
            <br />
            <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="full_name" placeholder="Enter Name" value=<?php echo $full_name ?> /></td>
                </tr>
                <tr>
                    <td>User Name</td>
                    <td><input type="text" name="username" placeholder="Enter User Name" value=<?php echo $username ?> /></td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="id" value=<?php echo $id ?> />
                        <input type="submit" name="submit" value="Add Admin" class="btn btn-secondary input-submit" />
                    </td>
                </tr>

            </table>
        </form>
    </div>
</div>

<?php


if (isset($_POST['submit'])) {
    echo "clicked";
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];

    $query = "UPDATE tbl_admin SET
    full_name = '$full_name',
    username = '$username'
    WHERE id = $id
";

    $result = mysqli_query($connection, $query);
    if ($result == true) {
        $_SESSION['update'] = "Admin updated successfully";
        header("location:" . SITEURL . "admin/manage-admin.php");
    } else {
        $_SESSION['update'] = "<h1>Something went wrong when trying to add admin</h1>";
        header("location:" . SITEURL . "admin/add-admin.php");
    }
}



?>




<?php include("../admin/partials/footer.php") ?>