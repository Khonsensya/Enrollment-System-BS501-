<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duck Cover En Roll</title>
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/module.css">
    <link rel="stylesheet" href="../css/footer.css">
</head>
<body>
    <nav class="navbar2">
        <?php include '../data/navbar-data.php';?>
        <input type="checkbox" id="toggle">
        <label for="toggle" class="toggler">
            <i class="pwd-snd-button">=</i>
        </label>
        <div class="logo">
            <h1>Dashboard</h1>
        </div>
        <ul class="navlist">
            <?php foreach ($_navbar2 as $navbar2_item) : ?>
                <li><a href="<?php echo $navbar2_item['link']; ?>">
                <?php echo $navbar2_item['title']; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </nav>

    <main class="help1 container">
        <?php include '../data/help-data.php' ?>
        <h1>Enrollment System User Manual</h1>
            <div>
                <?php foreach ($_help1 as $help1_item) : ?>        
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
        <?php include '../data/data.php';?>
        <?php foreach ($_copyright1 as $copyright1_item) : ?>
            <p><?php echo $copyright1_item['copyright']; ?></p>
            <p><?php echo $copyright1_item['signature']; ?></p>
        <?php endforeach; ?>
    </footer>
</body>
</html>

         