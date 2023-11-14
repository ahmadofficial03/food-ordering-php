<?php include("../admin/partials/menu.php") ?>
<?php include("./config/constants.php") ?>

<!-- Main Section -->
<div class="main-content">
    <div style="width: 95%; margin: auto;">
        <br><br><br>
        <h1>Manage Order</h1>
        <br />
        <br />
        <p style="color: green;">
            <?php
            if (isset($_SESSION['delete'])) {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
            ?>
        </p>
        <p style="color: green;">
            <?php
            if (isset($_SESSION['update'])) {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
            ?>
        </p>
        <br />

        <table class="full-width" style="width: 100%;">
            <tr>
                <th>S.N.</th>
                <th>Food</th>
                <th>Price</th>
                <th>Qty</th>
                <th>total</th>
                <th>Date</th>
                <th>Status</th>
                <th>Customer Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>

            <?php
            // QUERY:
            $query = "SELECT * FROM tbl_order";

            // EXECUTE QUERY:
            $result = mysqli_query($connection, $query);
            if ($result) {
                // GETTING NUMBER OF ROWS:
                $count = mysqli_num_rows($result);

                $sn = 1;

                // ITERATE AND FETCH ALL THE RECORDS FROM DB
                while ($rows = mysqli_fetch_assoc($result)) {
                    $id = $rows['id'];
                    $food = $rows['food'];
                    $price = $rows['price'];
                    $qty = $rows['qty'];
                    $total = $rows['total'];
                    $order_date = $rows['order_date'];
                    echo $status = $rows['status'];
                    $customer_name = $rows['customer_name'];
                    $customer_contact = $rows['customer_contact'];
                    $customer_email = $rows['customer_email'];
                    $customer_address = $rows['customer_address'];
                    // Display admins in table:
            ?>
                    <tr>
                        <td><?php echo $sn++ ?></td>
                        <td><?php echo $food ?></td>
                        <td><?php echo $price ?></td>
                        <td><?php echo $qty ?></td>
                        <td><?php echo $total ?></td>
                        <td><?php echo $order_date ?></td>
                        <td><?php echo $status ?></td>
                        <td><?php echo $customer_name ?></td>
                        <td><?php echo $customer_contact ?></td>
                        <td><?php echo $customer_email ?></td>
                        <td><?php echo $customer_address ?></td>
                        <td>
                            <a style="margin: 1rem;" href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id ?>" class="btn-secondary">Update</a>
                            <a href="<?php echo SITEURL; ?>admin/delete-order.php?id=<?php echo $id ?>" class="btn-danger">Delete</a>
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