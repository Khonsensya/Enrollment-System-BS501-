<?php include '../../process/session.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duck Cover En Roll</title>
    <link rel="stylesheet" href="../../../style.css">
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/module.css">
    <link rel="stylesheet" href="../../css/footer.css">
</head>
<body>
    <?php include '../../data/data.php'; ?>

    <nav class="navbar2">
        <input type="checkbox" id="toggle">
        <label for="toggle" class="toggler">
            <i class="pwd-snd-button">=</i>
        </label>
        <div class="logo">
            <h1>Dashboard</h1>
        </div>
        <ul class="navlist">
            <?php
                if($user['User_Type'] == 'Student') {
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

    <main class="help1 container">
        <h1>Enrollment System User Manual</h1>
            <div>
                <?php foreach ($_help_1 as $help1_item) : ?>        
                    <h2><?php echo $help1_item['title']; ?></h2>
                    <p>
                        <?php echo $help1_item['description']; ?>
                        <ul class="help-list">
                            <?php echo implode("<br>", $help1_item['item']); ?>
                        </ul>
                    </p>
                <?php endforeach; ?>
            </div>
    </main>
    <footer class="copyright1">
        <?php foreach ($_copyright1 as $copyright1_item) : ?>
            <p><?php echo $copyright1_item['copyright']; ?></p>
            <p><?php echo $copyright1_item['signature']; ?></p>
        <?php endforeach; ?>
    </footer>
</body>
</html>

         