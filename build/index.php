<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment System</title>
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="/build/css/walkman_css/pwd-layout.css">
    <link rel="stylesheet" href="/build/css/walkman_css/pwd-style.css">
    <script defer src="/build/js/walkman_js/pwd-banner.js"></script>
</head>
<body>
    <main class="mn-cont">
        <nav class="top-navigation">
            <input type="checkbox" id="toggle-navigation">
            <label for="toggle-navigation" class="toggle-navigation-btn">
                <i>=</i>
            </label>
            <div class="navigation-logo">
                <h3>Logo</h3>
            </div>
            <ul class="navigation-list">
                <li><a class="active" href="#">Home</a></li>
                <li><a href="#">Home</a></li>
                <li><a href="#">Home</a></li>
                <li><a href="#">Home</a></li>
                <button>Apply Now</button>
            </ul>
        </nav>

        <section class="banner">
            <div class="banner-item fade">
                <div class="banner-overlay">
                    <h1><span class="tag">Enrollment</span>On-Going</h1>
                </div>
            </div>
            <div class="banner-item fade">
                <img src="/build/imgs/walkman_background/bannerbg.jpg" alt="">
                <div class="banner-overlay">
                    <h1><span class="tag">STI College</span>Munoz-EDSA</h1>
                </div>
            </div>
            <div class="banner-item fade">
                <img src="/build/imgs/walkman_background/bannerbg.jpg" alt="">
                <div class="banner-overlay"></div>
            </div>
        </section>


        <?php 
            $_benefits = [
                ['icon' => '/build/imgs/walkman_icon/studentbg.png', 
                 'title' => '21st Century', 
                 'description' => 'Not Tuna But Learning Module', ],
                 
                ['icon' => '/build/imgs/walkman_icon/studentbg.png', 
                 'title' => '21st Century', 
                 'description' => 'Not Tuna But Learning Module', ],
                 
                ['icon' => '/build/imgs/walkman_icon/studentbg.png', 
                'title' => '21st Century', 
                'description' => 'Not Tuna But Learning Module', ],
                
                ['icon' => '/build/imgs/walkman_icon/studentbg.png', 
                 'title' => '21st Century', 
                 'description' => 'Not Tuna But Learning Module', ],
                 
                ['icon' => '/build/imgs/walkman_icon/studentbg.png', 
                'title' => '21st Century', 
                'description' => 'Not Tuna But Learning Module', ],
            ];
        ?>

        <section class="benefits">
            <div class="benefit-title">
                <h1>Be Future Ready, Be STI</h1>
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
        
        <footer class="copyrights">
            <p>Munoz-EDSA Quezon City Philippines | lapemark11@gmail.com</p>
            <p>Sample Copyright 2023 BS501 Intermediate Web Programming</p>
        </footer>
    </main>
</body>
</html>