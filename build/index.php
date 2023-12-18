<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luv U University</title>
    <link rel="stylesheet" href="./pwd-css/style.css">
    <link rel="stylesheet" href="./pwd-css/components.css">
    <link rel="stylesheet" href="./pwd-css/responsive.css">
    <link rel="stylesheet" href="./pwd-css/animation.css">
</head>
<body>
    <section>
        <nav class="navbar">
            <input type="checkbox" id="toggle">
            <label for="toggle" class="toggler">
                <i class="pwd-snd-button">=</i>
            </label>
            <div class="logo">
                <h1>Luv U</h1>
            </div>
            <ul class="navlist">
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Location</a></li>
                <li><a href="#">Application</a></li>
                <div class="pwd-button"><a href="#">Apply</a></div>
            </ul>
        </nav>
    </section>

    <section>
        <header class="banner">
            <div class="banner-item fade">
                <img src="./imgs/walkman_background/bg1.jpeg" alt="">
                <div class="banner-overlay">
                    <h1><span class="tag">Enrollment</span>On-Going</h1>
                </div>
            </div>
            <div class="banner-item fade">
                <img src="./imgs/walkman_background/bg2.jpg" alt="">
                <div class="banner-overlay">
                    <h1><span class="tag">Luv U</span>University</h1>
                </div>
            </div>
            <div class="banner-item fade">
                <img src="./imgs/walkman_background/bg3.jpg" alt="">
                <div class="banner-overlay">
                    <h1><span class="tag">Luv U</span>University</h1>
                </div>
            </div>
        </header>
    </section>

    <section>
        <div class="advert">
            <h1><span>Enrollment On-going</span>2nd Semester | Academic Year 2023-2024</h1>
            <div class="pwd-button"><a href="./pwd-php/registration.php">Enroll</a></div>
        </div>
    </section>

    <section>
        <main>
            <?php 
                include './pwd-php/data.php';
            ?>
            <section class="benefits">
                <div class="benefit-title">
                    <h1>Luv U ( lit. 'Love You')</h1>
                    <hr>
                </div>
                <ul class="benefits-list">
                    <?php foreach ($_benefits as $item) : ?>
                        <li class="benefit-item">
                            <figure>
                                <img src="<?php echo $item['icon']; ?>" alt="">
                            </figure>
                            <div>
                                <h2><?php echo $item['title']; ?></h2>
                                <p><?php echo $item['description']; ?></p>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </section>
        </main>
    </section>

    <section>
        <footer class="footer">
            <p>© copyright. BS501. 2023</p>
            <p>Hotdog.</p>
        </footer>
    </section>

    <script defer src="./pwd-js/banner.js"></script>
</body>
</html>