<nav class="navbar1">
    <input type="checkbox" id="toggle">
    <label for="toggle" class="toggler">
        <i class="pwd-snd-button">=</i>
    </label>
    <div class="logo">
        <a href="/Enrollment-System-BS501-/index.php">
            <h1>DCERU</h1>
        </a>
    </div>
    <ul class="navlist">
        <?php foreach ($_navbar_1 as $navbar1_item) : ?>
            <li><a href="<?php echo $navbar1_item['link']; ?>"> <?php echo $navbar1_item['title']; ?></a></li>
        <?php endforeach; ?>
        <a href="../login.php" class="btn1">Login</a>
    </ul>
</nav>