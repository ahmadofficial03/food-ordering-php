<?php include("../admin/partials/menu.php") ?>
<?php include("./config/constants.php") ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Password</h1>

        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }

        ?>

        <form action="" method="POST">
            <br />
            <table class="tbl-30" style="width: 40%;">
                <tr>
                    <td>Current Password</td>
                    <td><input type="password" name="current_password" placeholder="Enter Current Password" /></td>
                </tr>
                <tr>
                    <td>New Password</td>
                    <td><input type="password" name="new_password" placeholder="Enter New Password" /></td>
                </tr>
                <tr>
                    <td>Confirm Password</td>
                    <td><input type="password" name="confirm_password" placeholder="Enter Confirm Password" /></td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="id" value=<?php echo $id ?> />
                        <input type="submit" name="submit" value="Change Password" class="btn btn-secondary input-submit" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php

if (isset($_POST['submit'])) {
    // GET THE DATA:
    $id = $_POST['id'];
    $current_password = md5($_POST['current_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);


    // check whether the user with cur_id and cur_pass exist or not:
    $query = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

    $result = mysqli_query($connection, $query);

    if ($result) {
        // extract record
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            // match new and current password:
            if ($new_password == $confirm_password) {
                // if match then update it's detail:
                $query2 = "UPDATE tbl_admin SET
                password='$new_password'
                WHERE id=$id";

                $result = mysqli_query($connection, $query);
                if ($result) {
                    $_SESSION['pswd-update'] = "Password Updated Successfully";
                    header("location:" . SITEURL . "admin/manage-admin.php");
                } else {
                    $_SESSION['pswd-update'] = "Password is not updated";
                    header("location:" . SITEURL . "admin/manage-admin.php");
                }
            } else {
                $_SESSION['pswd-update'] = "new password and confirm password is not match";
                header("location:" . SITEURL . "admin/manage-admin.php");
            }
        }
    } else {
        $_SESSION['user-not-found'] = "User Not Found";
        header("location:" . SITEURL . "admin/manage-admin.php");
    }
}

?>


<?php include("../admin/partials/footer.php") ?>
</body>

</html>