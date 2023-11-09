<?php include("./config/constants.php") ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .login {
            background-color: #F2FFE9;
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        h1 {
            margin-bottom: 2rem;
        }

        form {
            box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
            background-color: white;
            padding: 2rem;
        }

        form div {
            margin: 1rem 0;
        }

        form input {
            padding: 1rem;
            border: none;
            outline: none;
            background: #F2FFE9;
        }

        form .submit-btn {
            padding: .7rem 2rem;
            background-color: #39A7FF;
            color: white;
            font-size: 1.3rem;
            border-radius: 5px;
        }
    </style>
    <title>Login</title>
</head>

<body>

    <div class="login">
        <h1>Login</h1>

        <form action="" method="POST">
            <br>
            <p style="color: red;">
                <?php
                if (isset($_SESSION['login'])) {
                    if (isset($_SESSION['login'])) {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                }

                if (isset($_SESSION['login'])) {
                    if (isset($_SESSION['login'])) {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                }
                ?>
            </p>
            <br>
            <div>
                <label>Username</label>
                <input type="text" name="username" placeholder="Enter username">
                <div>
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter Password">
                </div>
                <div>
                    <input type="submit" value="submit" name="submit" class="submit-btn" />
                </div>
        </form>
    </div>
</body>

</html>

<?php

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    if ($username == "") {
        $_SESSION['login'] = "Enter Username";
    }

    $query = "SELECT * FROM tbl_admin WHERE username='$username'";

    $result = mysqli_query($connection, $query);
    if ($result) {
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            $_SESSION['login'] = "Admin Login successfully";
            header("location:" . SITEURL . "admin/index.php");
        }
    } else {
        $_SESSION['login'] = "Bad Credentials";
    }
}


?>