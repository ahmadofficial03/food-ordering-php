<?php include("../admin/partials/menu.php") ?>
<?php include("./config/constants.php") ?>

<!-- Main Section -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>
        <br />
        <br />
        <br />

        <a href="add-category.php" class="btn-primary">Add Category</a>
        <br />
        <br />
        <br />
        <p style="color: green;">
            <?php
            if (isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            ?>
        </p>
        <br><br>

        <table class="full-width">
            <tr>
                <th>S.N.</th>
                <th>Category Title</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Image Name</th>
                <th>Actions</th>

            </tr>
            <?php
            $query = "SELECT * FROM tbl_category";
            $result = mysqli_query($connection, $query);

            if ($result) {
                // GETTING NUMBER OF ROWS:
                $count = mysqli_num_rows($result);

                $sn = 1;

                // ITERATE AND FETCH ALL THE RECORDS FROM DB
                while ($rows = mysqli_fetch_assoc($result)) {
                    $id = $rows['id'];
                    $title = $rows['title'];
                    $featured = $rows['featured'];
                    $active = $rows['active'];
                    $image_name = $rows['image_name'];
                    // Display admins in table:
            ?>
                    <tr>
                        <td><?php echo $sn++ ?></td>
                        <td><?php echo $title ?></td>
                        <td><?php echo $featured ?></td>
                        <td><?php echo $active ?></td>
                        <td><?php echo $image_name ?></td>

                        <td><a href="#" class="btn-secondary">Update Admin</a><a href="#" class="btn-danger">Delete Admin</a></td>
                    </tr>
            <?php
                }
            }

            ?>
        </table>
    </div>
</div>

<?php include("../admin/partials/footer.php") ?>
</body>

</html>