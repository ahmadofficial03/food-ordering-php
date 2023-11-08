<?php include("../admin/partials/menu.php") ?>
<?php include("./config/constants.php") ?>


<!-- Main Section -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Admin</h1>
        <br />
        <a href="add-admin.php" class="btn-primary">Add Admin</a>
        <br />
        <br />
        <br />
        <p style="color: green;">
            <?php
            if (isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            ?></p>
        <br />

        <table class="full-width">
            <tr>
                <th>S.N.</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>
            <tr>
                <td>1. </td>
                <td>Ahmad Fraz</td>
                <td>ahmad</td>
                <td><a href="#" class="btn-secondary">Update Admin</a><a href="#" class="btn-danger">Delete Admin</a></td>
            </tr>
            <tr>
                <td>2. </td>
                <td>Ahmad Fraz</td>
                <td>ahmad</td>
                <td><a href="#" class="btn-secondary">Update Admin</a><a href="#" class="btn-danger">Delete Admin</a></td>
            </tr>
            <tr>
                <td>3. </td>
                <td>Ahmad Fraz</td>
                <td>ahmad</td>
                <td><a href="#" class="btn-secondary">Update Admin</a><a href="#" class="btn-danger">Delete Admin</a></td>
            </tr>
            <br />
        </table>

    </div>
</div>

<?php include("../admin/partials/footer.php") ?>
</body>

</html>