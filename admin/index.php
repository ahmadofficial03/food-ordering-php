<?php include("../admin/partials/menu.php") ?>
<?php include("../admin/config/constants.php") ?>

<!-- Main Section -->
<div class="main-content">
    <div class="wrapper">
        <strong>DASHBOARD</strong>
        <br><br>
        <p style="color: green;">
            <?php
            if (isset($_SESSION['login'])) {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            ?>
        </p>

        <div class="boxes flex-row">
            <div class="col-4 text-center">
                <?php
                $query = "SELECT * FROM tbl_category";
                $result = mysqli_query($connection, $query);

                $count = mysqli_num_rows($result);


                ?>
                <h1><?php echo $count ?></h1>
                <br />
                Categories
            </div>
            <div class="col-4 text-center">
                <?php
                $query2 = "SELECT * FROM tbl_food";
                $result2 = mysqli_query($connection, $query2);

                $count2 = mysqli_num_rows($result2);


                ?>
                <h1><?php echo $count2 ?></h1>
                <br />
                Foods
            </div>
            <div class="col-4 text-center">
                <?php
                $query3 = "SELECT * FROM tbl_order";
                $result3 = mysqli_query($connection, $query3);

                $count3 = mysqli_num_rows($result3);


                ?>
                <h1><?php echo $count3 ?></h1>
                <br />
                Total Orders
            </div>
            <div class="col-4 text-center">
                <?php
                $query4 = "SELECT SUM(total) AS Total FROM tbl_order";
                $result4 = mysqli_query($connection, $query4);

                $row4 = mysqli_fetch_assoc($result4);
                $total_revenue = $row4['Total'];


                ?>
                <h1><?php echo $total_revenue ?></h1>
                <br />
                Total Revenue
            </div>

        </div>
    </div>
</div>

<?php include("../admin/partials/footer.php") ?>