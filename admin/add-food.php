<?php include('../admin/partials/menu.php') ?>
<?php include('../admin/config/constants.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>
        <br><br>
        <?php
        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }

        ?>
        <form action="" method="POST" enctype="multipart/form-data" style="padding: 0 0 1rem 1rem; box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px; background-color: #EEEDED; margin-top: 1rem;">
            <br />
            <table class="tbl-30">
                <tr>
                    <td>Title</td>
                    <td><input type="text" name="title" placeholder="Enter Title" /></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><textarea rows="4" cols="22" name="description" placeholder="Enter Description"></textarea></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><input type="number" name="price"></td>
                </tr>

                <tr>
                    <td>Image</td>
                    <td><input type="file" name="image"></td>
                </tr>
                <tr>
                    <td>Category</td>
                    <td>
                        <select name="category">
                            <?php
                            $query = "SELECT * FROM tbl_category WHERE active='yes'";
                            $result = mysqli_query($connection, $query);

                            $count = mysqli_num_rows($result);
                            if ($count > 0) {
                                while ($rows = mysqli_fetch_assoc($result)) { // Add $rows =
                                    $id = $rows['id'];
                                    $title = $rows['title'];
                            ?>
                                    <option value="<?php echo $id ?>"><?php echo $title ?></option>
                                <?php
                                }
                            } else {
                                ?>
                                <option value="0">No found category</option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="yes" />Yes
                        <input type="radio" name="featured" value="no" />No
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="yes" />Yes
                        <input type="radio" name="active" value="no" />No
                    </td>
                </tr>

                <tr>
                    <td><input type="submit" name="submit" value="Add Food" class="btn btn-secondary input-submit" /></td>
                </tr>

            </table>
        </form>
        <?php
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category = $_POST['category'];

            if (isset($_POST['featured'])) {
                $featured = $_POST['featured'];
            } else {
                echo "no";
            }

            if (isset($_POST['active'])) {
                $active = $_POST['active'];
            } else {
                echo "no";
            }

            if (isset($_FILES['image']['name'])) {
                $image_name = $_FILES['image']['name'];

                if ($image_name != "") {
                    $ext = end(explode('.', $image_name));
                    $image_name = 'food_category_' . rand(000, 999) . "." . $ext;

                    $source_path = $_FILES['image']['tmp_name'];
                    $destination_path = "../images/food/" . $image_name;

                    // $upload = move_uploaded_file($source_path, $destination_path);

                    // if ($upload == false) {
                    //     $_SESSION['upload'] = "Failed to upload image";
                    //     header('location:' . SITEURL . "admin/add-food.php");

                    //     die();
                    // }
                }
            } else {
                $image_name = "";
            }

            $query2 = "INSERT INTO tbl_food(title, description, price, image_name, category_id, featured, active) VALUES('$title', '$description', $price, '$image_name', '$category', '$featured', '$active')";

            $result = mysqli_query($connection, $query2);
            if ($result == true) {
                $_SESSION['add'] = 'Added successfully!';
                header('location:' . SITEURL . "admin/manage-food.php");
            } else {
                $_SESSION['add'] = 'Not added!';
                header('location:' . SITEURL . "admin/manage-food.php");
            }
        }



        ?>

    </div>
</div>

<?php include('../admin/partials/footer.php') ?>