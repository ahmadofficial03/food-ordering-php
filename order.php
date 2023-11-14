<?php include("./partials-front/menu.php") ?>

<?php
if (isset($_GET['food_id'])) {
    $food_id = $_GET['food_id'];

    $query = "SELECT * FROM tbl_food WHERE id=$food_id";
    $result = mysqli_query($connection, $query);

    $count = mysqli_num_rows($result);
    if ($count == 1) {
        // Data is avaliable:
        while ($row = mysqli_fetch_assoc($result)) {
            $title = $row['title'];
            $price = $row['price'];
            $image_name = $row['image_name'];
        }
    } else {
        echo "food not avaliable";
        // header('location' . SITEURL);
    }
} else {
    // header("location:" . SITEURL);
    echo "failed to getting id food";
}

?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search">
    <div class="container">

        <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

        <form action="" class="order" method="POST">
            <fieldset>
                <legend>Selected Food</legend>

                <div class="food-menu-img">
                    <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h3><?php echo $title ?></h3>
                    <input type="hidden" name="food" value="<?php echo $title ?>">

                    <p class="food-price"><?php echo $price ?>$</p>
                    <input type="hidden" name="price" value="<?php echo $price ?>">

                    <div class="order-label">Quantity</div>
                    <input type="number" name="qty" class="input-responsive" value="1" required>

                </div>

            </fieldset>

            <fieldset>
                <legend>Delivery Details</legend>
                <div class="order-label">Full Name</div>
                <input type="text" name="full-name" placeholder="E.g. Vijay Thapa" class="input-responsive" required>

                <div class="order-label">Phone Number</div>
                <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                <div class="order-label">Email</div>
                <input type="email" name="email" placeholder="E.g. hi@vijaythapa.com" class="input-responsive" required>

                <div class="order-label">Address</div>
                <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
            </fieldset>

        </form>

        <?php
        if (isset($_POST['submit'])) {
            $food = $_POST['food'];
            $price = $_POST['price'];
            $qty = $_POST['qty'];
            $total = $price * $qty;
            $order_date = date("Y-m-d");
            $status = "ordered";          //ordered, on_delivery, delievered, cancelled

            $customer_name = $_POST['full-name'];
            $customer_contact = $_POST['contact'];
            $customer_email = $_POST['email'];
            $customer_address = $_POST['address'];

            $query2 = "INSERT INTO tbl_order(food, price, qty, total, order_date, status, customer_name, customer_contact, customer_email, customer_address) VALUES('$food', $price, $qty, $total, '$order_date', '$status', '$customer_name', '$customer_contact', '$customer_email', '$customer_address')";
            echo $query2;


            $result2 = mysqli_query($connection, $query2);
            if ($result2 == true) {
                $_SESSION['insert'] = 'Ordered Successfully';
                header("location:" . SITEURL);
            } else {
                $_SESSION['insert'] = 'Failed to insert order';
                header("location:" . SITEURL);
            }
        }

        ?>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->
<?php include("./partials-front/footer.php") ?>