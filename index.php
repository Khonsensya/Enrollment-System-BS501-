<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duck Cover En Roll</title>
    <!-- CSS STYLESHEETS LINKS ARE HERE -->
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./src/css/alert.css">
    <link rel="stylesheet" href="./src/css/animation.css">
    <link rel="stylesheet" href="./src/css/banner.css">
    <link rel="stylesheet" href="./src/css/button.css">
    <link rel="stylesheet" href="./src/css/footer.css">
    <link rel="stylesheet" href="./src/css/icon.css">
    <link rel="stylesheet" href="./src/css/navbar.css">
</head>

<body>
    <nav class="navbar1">
        <?php include './src/data/data.php'; ?>
        <!-- PHP INCLUDE / REQUIRE LINKS ARE HERE -->
        <?php include './src/data/data.php'; ?>

        <nav class="navbar1"> <!-- NAVIGATION BAR -->
            <input type="checkbox" id="toggle">
            <label for="toggle" class="toggler">
                <i class="pwd-snd-button">=</i>
            </label>
            <div class="logo">
                <a href="index.php">
                    <h1>DCERU</h1>
                </a>
            </div>
            <ul class="navlist">
                <?php foreach ($_navbar_1 as $navbar_1_item) : ?>
                    <li><a href="<?php echo $navbar_1_item['link']; ?>">
                            <?php echo $navbar_1_item['title']; ?></a></li>
                <?php endforeach; ?>
                <a href="./src/modules/login.php" class="btn1">Login</a>
            </ul>
        </nav>

        <header class="banner1"> <!-- BANNER -->
            <?php foreach ($_banner_1 as $banner_1_item) : ?>
                <div class="banner-item fade">
                    <img src="<?php echo $banner_1_item['bg']; ?>" alt="">
                    <div class="banner-overlay">
                        <h1><?php echo $banner_1_item['title']; ?></h1>
                        <p><?php echo $banner_1_item['descline1']; ?><br><?php echo $banner_1_item['descline2']; ?><br><?php echo $banner_1_item['descline3']; ?></p>
                        <div class="banner-btn">
                            <a href="./src/modules/signup.php" class="btn1"><?php echo $banner_1_item['btn1']; ?></a>
                            <a href="./src/modules/login.php" class="btn4"><?php echo $banner_1_item['btn2']; ?></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </header>

        <footer class="copyright1"> <!-- FOOTER -->
            <?php foreach ($_copyright1 as $copyright1_item) : ?>
                <p><?php echo $copyright1_item['copyright']; ?></p>
                <p><?php echo $copyright1_item['signature']; ?></p>
            <?php endforeach; ?>
        </footer>

        <!-- JAVASCRIPT SCRIPTS LINKS ARE HERE -->
        <script defer src="./src/js/banner.js"></script>
</body>

</html>