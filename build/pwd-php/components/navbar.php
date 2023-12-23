<nav class="navbar">
    <input type="checkbox" id="toggle">
    <label for="toggle" class="toggler">
        <i class="pwd-snd-button">=</i>
    </label>
    <div class="logo">
        <h1>Luv U</h1>
    </div>
    <ul class="navlist">
        <?php foreach ($_navbar as $navbar_item) : ?>
            <li><a href="<?php echo $navbar_item['link']; ?>">
            <?php echo $navbar_item['title']; ?></a></li>
        <?php endforeach; ?>
        <div class="btn-1"><a href="./pwd-php/modules/login.php">Login</a></div>

        
    </ul>
</nav>