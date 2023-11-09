<?php include('../admin/partials/menu.php') ?>
<?php include('../admin/config/constants.php') ?>



<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>

        <br><br>
        <form action="" method="POST" enctype="multipart/form-data">
            <br />
            <table class="tbl-30">
                <tr>
                    <td>Title</td>
                    <td><input type="text" name="title" placeholder="Enter Title" /></td>
                </tr>
                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image" />

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
                    <td><input type="submit" name="submit" value="Add Category" class="btn btn-secondary input-submit" /></td>
                </tr>

            </table>
        </form>
    </div>
</div>

<?php


if (isset($_POST['submit'])) {
    $title = $_POST['title'];

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

    // print_r($_FILES['image']);
    // die();

    if (isset($_FILES['image']['name'])) {
        $image_name = $_FILES['image']['name'];

        // Rename Image:
        $ext = end(explode('.', $image_name));
        $image_name = 'food_category_' . rand(000, 999) . "." . $ext;

        $source_path = $_FILES['image']['tmp_name'];
        $destination_path = "../images/category/" . $image_name;

        $upload = move_uploaded_file($source_path, $destination_path);
        if ($upload) {
            // File uploaded successfully
        } else {
            echo "failed to upload";
        }
    } else {
        $image_name = "";
    }




    $query = "INSERT INTO tbl_category(title, featured, active, image_name) VALUES('$title', '$featured', '$active', '$image_name')";
    // SAVE DATA INTO DB:
    $result = mysqli_query($connection, $query);

    if ($result == true) {
        $_SESSION['add'] = "Category added successfully";
        header("location:" . SITEURL . "admin/manage-category.php");
    } else {
        $_SESSION['add'] = "Some thing went wrong while adding category";
        header("location:" . SITEURL . "admin/manage-category.php");
    }
}

?>



<?php include('../admin/partials/footer.php') ?>