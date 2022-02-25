<!--views/layouts/main.php-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8" />
        <title><?php echo $this->page_title; ?></title>
        <link rel="stylesheet" href="assets/css/style.css" />
    </head>
    <body>
        <div class="header" style="background: yellow">
            <h1>Header</h1>
        </div>

        <div class="main" style="border: 1px solid red;">
            <h3 style="color: red">
                <?php echo $this->error; ?>
            </h3>

            <h3 style="color: green">
                <?php
                if (isset($_SESSION['success'])) {
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                }
                ?>
            </h3>

            <h3 style="color: red">
                <?php
                if (isset($_SESSION['error'])) {
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                }
                ?>
            </h3>

            <?php echo $this->content; ?>
        </div>

        <div class="footer" style="background: pink;">
            <h1>Footer</h1>
        </div>

        <script src="assets/js/script.js"></script>
    </body>
</html>

