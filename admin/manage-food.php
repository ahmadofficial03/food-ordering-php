<?php include("../admin/partials/menu.php") ?>
<?php include("./config/constants.php") ?>

<!-- Main Section -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Food</h1>
        <br />
        <br />
        <p style="color: green;">
            <?php
            if (isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if (isset($_SESSION['updated'])) {
                echo $_SESSION['updated'];
                unset($_SESSION['updated']);
            }
            ?>
        </p>
        <p style="color: red;">
            <?php
            if (isset($_SESSION['delete'])) {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
            ?>
        </p>
        <br><br>
        <a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn-primary">Add Food</a>
        <br />
        <br />
        <br />

        <table class="full-width">
            <tr>
                <th>S.N.</th>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>

            </tr>

            <?php
            // QUERY:
            $query = "SELECT * FROM tbl_food";

            // EXECUTE QUERY:
            $result = mysqli_query($connection, $query);
            if ($result) {
                // GETTING NUMBER OF ROWS:
                $count = mysqli_num_rows($result);

                $sn = 1;

                // ITERATE AND FETCH ALL THE RECORDS FROM DB
                while ($rows = mysqli_fetch_assoc($result)) {
                    $id = $rows['id'];
                    $title = $rows['title'];
                    $description = $rows['description'];
                    $price = $rows['price'];
                    $image_name = $rows['image_name'];
                    $featured = $rows['featured'];
                    $active = $rows['active'];

                    // Display admins in table:
            ?>
                    <tr>
                        <td><?php echo $sn++ ?></td>
                        <td><?php echo $title ?></td>
                        <td><?php echo $description ?></td>
                        <td><?php echo $price ?></td>
                        <td><?php echo $image_name ?></td>
                        <td><?php echo $featured ?></td>
                        <td><?php echo $active ?></td>

                        <td>
                            <a href="<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $id ?>" class="btn-secondary">Update</a>
                            <a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id ?>" class="btn-danger">Delete</a>
                        </td>
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