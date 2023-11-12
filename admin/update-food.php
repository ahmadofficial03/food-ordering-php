<?php include("../admin/partials/menu.php") ?>
<?php include("./config/constants.php") ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Update Food</h1>

        <br><br>
        <?php
        if (isset($_SESSION['updated'])) {
            $_SESSION['updated'];
            unset($_SESSION['updated']);
        }

        ?>
        <?php
        echo $id = $_GET['id'];
        $query2 = "SELECT * FROM tbl_food WHERE id=$id";

        $result2 = mysqli_query($connection, $query2);
        if ($result2) {
            $count = mysqli_num_rows($result2);
            if ($count == 1) {
                $rows = mysqli_fetch_assoc($result2);
                $title = $rows['title'];
                $description = $rows['description'];
                $price = $rows['price'];
                $image_name = $rows['image_name'];
                $current_category = $rows['category_id'];
                $featured = $rows['featured'];
                $active = $rows['active'];
            } else {
                echo "Food not Avaliable";
            }
        }
        ?>
        <form action="" method="POST" enctype="multipart/form-data" style="padding: 0 0 1rem 1rem; box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px; background-color: #EEEDED; margin-top: 1rem;">
            <br />
            <table class="tbl-30">
                <tr>
                    <td>Title</td>
                    <td><input type="text" name="title" value="<?php echo $title ?>" /></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><textarea rows="4" cols="22" name="description"><?php echo $description ?></textarea></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><input type="number" name="price" value="<?php echo $price ?>"></td>
                </tr>

                <tr>
                    <td>Image</td>
                    <td><input type="file" name="image"><?php echo $image_name ?></td>
                </tr>
                <tr>
                    <td>Category</td>
                    <td>
                        <select name="category">
                            <?php
                            $query1 = "SELECT * FROM tbl_category WHERE active='yes'";
                            $result = mysqli_query($connection, $query1);

                            $count = mysqli_num_rows($result);
                            if ($count > 0) {
                                while ($rows = mysqli_fetch_assoc($result)) { // Add $rows =
                                    $category_id = $rows['id'];
                                    $category_title = $rows['title'];
                            ?>
                                    <option value="<?php echo $category_id ?>" <?php if ($current_category == $category_id) echo "selected" ?>><?php echo $category_title ?></option>
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
                        <input <?php if ($featured == "yes") {
                                    echo "checked";
                                } ?> type="radio" name="featured" value="yes"> Yes
                        <input <?php if ($featured == "no") {
                                    echo "checked";
                                } ?>type="radio" name="featured" value="no"> No
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input <?php if ($active == "yes") {
                                    echo "checked";
                                } ?> type="radio" name="active" value="yes" ?> Yes
                        <input <?php if ($active == "no") {
                                    echo "checked";
                                } ?> type="radio" name="active" value="no" ?> No
                    </td>
                </tr>

                <tr>

                    <td>
                        <input type="hidden" name="id" value=<?php echo $id ?> />
                        <input type="submit" name="submit" value="Add Food" class="btn btn-secondary input-submit" />
                    </td>
                </tr>

            </table>
        </form>
    </div>
</div>

<?php
if (isset($_POST['submit'])) {
    echo $id = $_POST['id'];
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
        echo $active = $_POST['active'];
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

    $query3 = "UPDATE tbl_food SET
    title = '$title',
    description = '$description',
    price = $price,
    image_name = '$image_name',
    category_id = '$category',
    featured = '$featured',
    active = '$active'
    WHERE id = $id
";

    $result3 = mysqli_query($connection, $query3);
    if ($result3 == true) {
        echo "updated";
        $_SESSION['updated'] = "Food updated successfully";
        header("location:" . SITEURL . "admin/manage-food.php");
    } else {
        $_SESSION['updated'] = "Something went wrong when updating food";
        header("location:" . SITEURL . "admin/update-food.php");
    }
}

?>

<?php include("../admin/partials/footer.php") ?>