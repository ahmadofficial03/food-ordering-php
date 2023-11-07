<?php include("../admin/partials/menu.php") ?>




<div class="main-content">
    <div class="wrapper">

        <form action="" method="POST">
            <h1>Add Admin</h1>

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
            </table>
        </form>
    </div>
</div>
<?php include("../admin/partials/footer.php") ?>

<?php

header('Access-Control-Allow-Origin:*');

$host = 'localhost';
$user = 'root';
$password = '';
$db = "food-order";


function connection($host, $user, $password, $db)
{
    $connect = mysqli_connect($host, $user, $password, $db);
    return $connect;
}

$connection = connection($host, $user, $password, $db);


if (!isset($_POST['submit'])) {
    echo "Not submit!";
} else {
    // GETTING FORM VALUES:
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // QUERY:
    // $query = "INSERT INTO tbl_admin SET 
    // full_name='$full_name', 
    // username='$username', 
    // password='$password'
    // ";


    $query = "INSERT INTO tbl_admin(full_name, username, password) VALUES('$full_name', '$username', '$password')";
    // SAVE DATA INTO DB:
    $result = mysqli_query($connection, $query);
    echo $result;

    if ($result) {
        echo "inserted";
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}
