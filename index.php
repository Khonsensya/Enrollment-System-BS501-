<!-- PHP INCLUDE / REQUIRE LINKS ARE HERE -->
<?php include './config.php'; ?>
<?php include $_P_data_php; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_Head_Title; ?></title>
    <link rel="icon" href="<?php echo $_P_Head_Icon; ?>"/>
    <link rel="stylesheet" href="<?php echo $_P_style_css; ?>">
    <link rel="stylesheet" href="<?php echo $_P_animation_css; ?>">
    <link rel="stylesheet" href="<?php echo $_P_banner_css; ?>">
    <link rel="stylesheet" href="<?php echo $_P_button_css; ?>">
    <link rel="stylesheet" href="<?php echo $_P_footer_css; ?>">
    <link rel="stylesheet" href="<?php echo $_P_navbar_css; ?>">
</head>
<body>
    <nav class="navbar1">
        <input type="checkbox" id="toggle">
        <label for="toggle" class="toggler">
            <i class="pwd-snd-button">=</i>
        </label>
        <div class="logo">
            <a href="<?php echo $_P_index; ?>">
                <h1>DCERU</h1>
            </a>
        </div>
        <ul class="navlist">
            <?php foreach ($_navbar_1 as $navbar_1_item) : ?>
                <li><a href="<?php echo $navbar_1_item['link']; ?>">
                        <?php echo $navbar_1_item['title']; ?></a></li>
            <?php endforeach; ?>
            <a href="<?php echo $_P_login; ?>" class="btn1">Login</a>
        </ul>
    </nav>

    <header class="banner1">
        <?php foreach ($_banner_1 as $banner_1_item) : ?>
            <div class="banner-item fade">
                <img src="<?php echo $banner_1_item['bg']; ?>" alt="">
                <div class="banner-overlay">
                    <h1><?php echo $banner_1_item['title']; ?></h1>
                    <p><?php echo $banner_1_item['descline1']; ?><br>
                       <?php echo $banner_1_item['descline2']; ?><br>
                       <?php echo $banner_1_item['descline3']; ?></p>
                    <div class="banner-btn">
                        <?php echo $banner_1_item['btn1']; ?>
                        <?php echo $banner_1_item['btn2']; ?>
                    </div>
                </div>

            </div>
        <?php endforeach; ?>
    </header>

    <footer class="copyright1">
        <?php foreach ($_copyright_1 as $copyright1_item) : ?>
            <p><?php echo $copyright1_item['copyright']; ?></p>
            <p><?php echo $copyright1_item['signature']; ?></p>
        <?php endforeach; ?>
    </footer>
    
    <script defer src="<?php echo $_P_banner_js; ?>"></script>
</body>
</html>