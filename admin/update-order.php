<?php include("../admin/partials/menu.php") ?>
<?php include("../admin/config/constants.php") ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Update Order</h1>
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $query = "SELECT * FROM tbl_order WHERE id=$id";
            $result = mysqli_query($connection, $query);
            $count = mysqli_num_rows($result);

            if ($count == 1) {
                // Order Avalible
                while ($row = mysqli_fetch_assoc($result)) {
                    $food = $row['food'];
                    $price = $row['price'];
                    $qty = $row['qty'];
                    $status = $row['status'];
                    $customer_name = $row['customer_name'];
                    $customer_contact = $row['customer_contact'];
                    $customer_email = $row['customer_email'];
                    $customer_address = $row['customer_address'];
                }
            } else {
                echo "order is not avalible";
            }
        } else {
            header('location.' . SITEURL . "manager-order.php");
        }

        ?>

        <form action="" method="POST">
            <table style="width: 45%; min-width: 45%; text-align: left;margin: 1rem 0;">
                <tr>
                    <td>Food Name</td>
                    <td><?php echo $food ?></td>
                </tr>

                <tr>
                    <td>Price</td>
                    <td>
                        <?php echo $price ?>
                    </td>
                </tr>

                <tr>
                    <td>Quantity</td>
                    <td>
                        <input type="text" name="qty" value="<?php echo $qty ?>">
                    </td>
                </tr>

                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status">
                            <option <?php if ($status == "Ordered") {
                                        echo "selected";
                                    } ?> value="Ordered">Ordered</option>
                            <option <?php if ($status == "On Delivery") {
                                        echo "selected";
                                    } ?> value="On Delivery">On Delivery</option>
                            <option <?php if ($status == "Delivered") {
                                        echo "selected";
                                    } ?> value="Delivered">Delivered</option>
                            <option <?php if ($status == "Cancelled") {
                                        echo "selected";
                                    } ?> value="Cancelled">Cancelled</option>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Customer Name</td>
                    <td>
                        <input type="text" name="customer-name" value="<?php echo $customer_name ?>">
                    </td>
                </tr>

                <tr>
                    <td>Customer Contact</td>
                    <td>
                        <input type="text" name="customer-contact" value="<?php echo $customer_contact ?>">
                    </td>
                </tr>

                <tr>
                    <td>Customer Email</td>
                    <td>
                        <input type="email" name="customer-email" value="<?php echo $customer_email ?>">
                    </td>
                </tr>

                <tr>
                    <td>Customer Address</td>
                    <td>
                        <textarea name="customer-address" cols="30" rows="10"><?php echo $customer_address ?></textarea>
                    </td>


                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <input type="hidden" name="price" value="<?php echo $price ?>">
                        <input type="submit" name="submit" value="Submit Order" class="btn btn-secondary">
                    </td>
                </tr>


            </table>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $food = $_POST['food'];
            $price = $_POST['price'];
            $qty = $_POST['qty'];
            $total = $price * $qty;
            $status = "ordered";          //ordered, on_delivery, delievered, cancelled
            $customer_name = $_POST['customer-name'];
            $customer_contact = $_POST['customer-contact'];
            $customer_email = $_POST['customer-email'];
            $customer_address = $_POST['customer-address'];

            $query2 = "UPDATE tbl_order SET
            qty = $qty,
            total = $total,
            status = '$status',
            customer_name = '$customer_name',
            customer_contact = '$customer_contact',
            customer_email = '$customer_email',
            customer_address = '$customer_address'
            WHERE id=$id";


            $result2 = mysqli_query($connection, $query2);
            if ($result2 == true) {
                $_SESSION['update'] = "updated successfully";
                header("location:" . SITEURL . "admin/manage-order.php");
            } else {
                echo "not updated";
            }
        }


        ?>
    </div>
</div>


<?php include("../admin/partials/footer.php") ?>
</body>

</html>