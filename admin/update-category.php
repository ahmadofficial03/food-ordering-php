<?php include("../admin/partials/menu.php") ?>
<?php include("./config/constants.php") ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>

        <br />
        <?php
        $id = $_GET['id'];
        $query = "SELECT * FROM tbl_category WHERE id=$id";

        $result = mysqli_query($connection, $query);
        if ($result) {
            $count = mysqli_num_rows($result);
            if ($count == 1) {
                $rows = mysqli_fetch_assoc($result);
                echo $title = $rows['title'];
                echo $featured = $rows['featured'];
                echo $image_name = $rows['image_name'];
            } else {
                echo "Category not Avaliable";
            }
        }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <br />
            <table class="tbl-30">
                <tr>
                    <td>Title</td>
                    <td><input type="text" name="title" placeholder="Enter Title" value=<?php echo $title; ?> /></td>
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
                        <input type="radio" name="featured" value="yes"> Yes
                        <input type="radio" name="featured" value="no"> No
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="yes" ?> Yes
                        <input type="radio" name="active" value="no" ?> No
                    </td>
                </tr>

                <tr>
                    <input type="hidden" name="id" value=<?php echo $id ?> />

                    <td><input type="submit" name="submit" value="Update Category" class="btn btn-secondary input-submit" /></td>
                </tr>

            </table>
        </form>


    </div>
</div>

<?php


if (isset($_POST['submit'])) {
    echo $title = $_POST['title'];

    if (isset($_POST['featured'])) {
        echo $featured = $_POST['featured'];
    } else {
        echo "no";
    }

    if (isset($_POST['active'])) {
        echo $active = $_POST['active'];
    } else {
        echo "no";
    }

    // print_r($_FILES['image']);
    // die();

    if (isset($_FILES['image']['name'])) {
        echo $image_name = $_FILES['image']['name'];

        // Rename Image:
        $ext = end(explode('.', $image_name));
        $image_name = 'food_category_' . rand(000, 999) . "." . $ext;

        // $source_path = $_FILES['image']['tmp_name'];
        // $destination_path = "../images/category/" . $image_name;

        // $upload = move_uploaded_file($source_path, $destination_path);

        // if ($upload == true) {
        //     // File uploaded successfully
        //     echo "upload";
        // } else {
        //     echo "failed to upload";
        // }
    } else {
        $image_name = "";
    }


    $query = "UPDATE tbl_category SET
    title = '$title',
    featured = '$featured',
    active = '$active',
    image_name = '$image_name'
    WHERE id = $id
";

    $result = mysqli_query($connection, $query);
    if ($result == true) {
        $_SESSION['update'] = "Category updated successfully";
        header("location:" . SITEURL . "admin/manage-category.php");
    } else {
        $_SESSION['update'] = "<h1>Something went wrong when trying to add admin</h1>";
        header("location:" . SITEURL . "admin/add-category.php");
    }
}



?>




<?php include("../admin/partials/footer.php") ?>