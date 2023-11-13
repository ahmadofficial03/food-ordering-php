<?php include("./partials-front/menu.php") ?>

<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Foods</h2>
        <?php
        $query = "SELECT * FROM tbl_category WHERE active='yes'";
        $result = mysqli_query($connection, $query);

        if ($result) {
            // GETTING NUMBER OF ROWS:
            $count = mysqli_num_rows($result);
            $sn = 1;
            // ITERATE AND FETCH ALL THE RECORDS FROM DB
            while ($rows = mysqli_fetch_assoc($result)) {
                $id = $rows['id'];
                $title = $rows['title'];
                $image_name = $rows['image_name'];
        ?>
                <a href="category-foods.html">
                    <div class="box-3 float-container">
                        <?php
                        if ($image_name == "") {
                            echo "image name is not avaliable";
                        } else {
                        ?>
                            <img src="./images/category/<?php echo $image_name ?>" alt="Pizza" class="img-responsive img-curve">
                        <?php
                        }
                        ?>


                        <h3 class="float-text text-white"><?php echo $title ?></h3>
                    </div>
                </a>
        <?php
            }
        }
        ?>


        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->


<?php include("./partials-front/footer.php") ?>