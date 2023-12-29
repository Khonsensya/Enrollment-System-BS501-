<?php include $_SERVER['DOCUMENT_ROOT'] . '\config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duck Cover En Roll</title>
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../css/animation.css">
    <link rel="stylesheet" href="../css/banner.css">
    <link rel="stylesheet" href="../css/button.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/navbar.css">

</head>

<body>
    <nav class="navbar1">
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/src/data/navbar-data.php'; ?>
        <input type="checkbox" id="toggle">
        <label for="toggle" class="toggler">
            <i class="pwd-snd-button">=</i>
        </label>
        <div class="logo">
            <a href="/index.php">
                <h1>DCERU</h1>
            </a>
        </div>
        <ul class="navlist">
            <?php foreach ($_navbar1 as $navbar1_item) : ?>
                <li><a href="<?php echo $navbar1_item['link']; ?>">
                        <?php echo $navbar1_item['title']; ?></a></li>
            <?php endforeach; ?>
            <a href="login.php" class="btn1">Login</a>
        </ul>
    </nav>
    <div>
        Admission
    </div>
</body>

</html>