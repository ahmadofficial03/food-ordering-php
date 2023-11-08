<?php include("../admin/partials/menu.php") ?>
<?php include("./config/constants.php") ?>


<div class="main-content">
    <div class="wrapper">


        <form action="" method="POST">
            <h1>Add Admin</h1>
            <br />
            <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="full_name" placeholder="Enter Name" /></td>
                </tr>
                <tr>
                    <td>User Name</td>
                    <td><input type="text" name="username" placeholder="Enter User Name" /></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" placeholder="Enter password" /></td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit" value="Add Admin" class="btn btn-secondary input-submit" /></td>
                </tr>
                <tr>
                    <?php
                    if (isset($_SESSION['add'])) {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }

                    if (isset($_SESSION['fill-form'])) {
                        echo $_SESSION['fill-form'];
                        unset($_SESSION['fill-form']);
                    }
                    ?>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php include("../admin/partials/footer.php") ?>

<?php


if (!isset($_POST['submit'])) {
    echo $response = ["success" => false, "message" => "Something went wrong"];
} else {

    if ($_POST['full_name'] == "" && $_POST['username'] == "" && $_POST['password'] == "") {
        $_SESSION['fill-form'] = "Please filling form details";
        return;
    }

    // GETTING FORM VALUES:
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);





    // TAKING VALUES AND CONNECTION, PERFORM QUERY AND STORE ADMIN INTO DATABASE
    function addAdmin($full_name, $username, $password, $connection)
    {
        $query = "INSERT INTO tbl_admin(full_name, username, password) VALUES('$full_name', '$username', '$password')";
        // SAVE DATA INTO DB:
        $result = mysqli_query($connection, $query);

        if ($result == true) {
            $_SESSION['add'] = "Admin added successfully";
            header("location:" . SITEURL . "admin/manage-admin.php");
        } else {
            $_SESSION['add'] = "<h1>Something went wrong when trying to add admin</h1>";
            header("location:" . SITEURL . "admin/add-admin.php");
        }
    }


    // MAKE INSERT QUERY AND STORE INTO DATABASE:
    addAdmin($full_name, $username, $password, $connection);
}
