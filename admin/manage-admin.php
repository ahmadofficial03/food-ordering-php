<?php include("../admin/partials/menu.php") ?>
<?php include("./config/constants.php") ?>


<!-- Main Section -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Admin</h1>
        <br />
        <a href="add-admin.php" class="btn-primary">Add Admin</a>
        <br />
        <br />
        <br />
        <p style="color: green;">
            <?php
            if (isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            ?></p>
        <br />

        <table class="full-width">
            <tr>
                <th>S.N.</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>

            <?php
            // QUERY:
            $query = "SELECT * FROM tbl_admin";

            // EXECUTE QUERY:
            $result = mysqli_query($connection, $query);


            if ($result) {
                // GETTING NUMBER OF ROWS:
                $count = mysqli_num_rows($result);

                $sn = 1;

                // ITERATE AND FETCH ALL THE RECORDS FROM DB
                while ($rows = mysqli_fetch_assoc($result)) {
                    $id = $rows['id'];
                    $full_name = $rows['full_name'];
                    $username = $rows['username'];

                    // Display admins in table:
            ?>
                    <tr>
                        <td><?php echo $sn++ ?></td>
                        <td><?php echo $full_name ?></td>
                        <td><?php echo $username ?></td>
                        <td><a href="#" class="btn-secondary">Update Admin</a><a href="#" class="btn-danger">Delete Admin</a></td>
                    </tr>
            <?php
                }
            }


            ?>
            <br />
        </table>

    </div>
</div>

<?php include("../admin/partials/footer.php") ?>
</body>

</html>