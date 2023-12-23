
<header class="banner">
    <?php foreach ($_banner as $banner_item) : ?>
        <div class="banner-item fade">
            <img src="./walkman-imgs/background/bg1.jpeg" alt="">
            <div class="banner-overlay">
                <h1><?php echo $banner_item['title']; ?></h1>
                <p><?php echo $banner_item['descline1']; ?><br><?php echo $banner_item['descline2']; ?><br><?php echo $banner_item['descline3']; ?></p>
                <div class="banner-btn">
                    <div class="btn-1"><a href="./pwd-php/modules/dashboard.php"><?php echo $banner_item['btn1']; ?></a></div>
                    <div class="btn-2"><a href="./pwd-php/modules/enroll.php"><?php echo $banner_item['btn2']; ?></a></div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</header>