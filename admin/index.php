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
                if (isset($_SESSION['login'])) {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
            }
            ?>
        </p>


        <div class="boxes flex-row">
            <div class="col-4 text-center">
                <h1>5</h1>
                <br />
                Categories
            </div>
            <div class="col-4 text-center">
                <h1>5</h1>
                <br />
                Categories
            </div>
            <div class="col-4 text-center">
                <h1>5</h1>
                <br />
                Categories
            </div>
            <div class="col-4 text-center">
                <h1>5</h1>
                <br />
                Categories
            </div>
            <div class="col-4 text-center">
                <h1>5</h1>
                <br />
                Categories
            </div>
        </div>
    </div>
</div>

<?php include("../admin/partials/footer.php") ?>