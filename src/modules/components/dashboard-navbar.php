<nav class="navbar2">
    <input type="checkbox" id="toggle">
    <label for="toggle" class="toggler">
        <i class="pwd-snd-button">=</i>
    </label>
    <div class="logo">
        <a href="./dashboard.php">
            <h1>Dashboard</h1>
        </a>
    </div>
    <ul class="navlist">
        <?php
        if ($user['User_Type'] == 'Student') {
            $_navbar_2_list = $_navbar_2_student;
        } elseif ($user['User_Type'] == 'Administrator') {
            $_navbar_2_list = $_navbar_2_admin;
        }
        ?>
        <?php foreach ($_navbar_2_list as $navbar_2_item) : ?>
            <li><a href="<?php echo $navbar_2_item['link']; ?>">
                    <?php echo $navbar_2_item['title']; ?></a></li>
        <?php endforeach; ?>
    </ul>
</nav>