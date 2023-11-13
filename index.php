<?php include("./partials-front/menu.php") ?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <form action="<?php SITEURL ?>food-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for Food.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->

<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Foods</h2>

        <?php
        $query = "SELECT * FROM tbl_category WHERE active='yes' AND featured='yes' LIMIT 3";
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
                            echo "Image is not Avaliable";
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
        } else {
            echo "<p>categories are not added</p>";
        }

        ?>


        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->

<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>

        <?php
        $query = "SELECT * FROM tbl_food WHERE active='yes' LIMIT 2";
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
                $price = $rows['price'];
                $description = $rows['description'];
        ?>
                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <img src="images/food/food_category_624.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                    </div>

                    <div class="food-menu-desc">
                        <h4><?php echo $title; ?></h4>
                        <?php echo $price ?>
                        <p class="food-price"></p>
                        <p class="food-detail">
                            <?php echo $description ?>
                        </p>
                        <br>

                        <a href="#" class="btn btn-primary">Order Now</a>
                    </div>
                </div>

        <?php
            }
        }
        ?>


        <div class="clearfix"></div>



    </div>

    <p class="text-center">
        <a href="#">See All Foods</a>
    </p>
</section>
<!-- fOOD Menu Section Ends Here -->



<?php include("./partials-front/footer.php") ?>