<?php include $_SERVER['DOCUMENT_ROOT'] . '\config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duck Cover En Roll</title>
    <link rel="stylesheet" href="../../../style.css">
    <link rel="stylesheet" href="../../css/animation.css">
    <link rel="stylesheet" href="../../css/banner.css">
    <link rel="stylesheet" href="../../css/button.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/module.css">

</head>

<body>
    <?php include '../../data/data.php'; ?>

    <nav class="navbar1">
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
            <?php foreach ($_navbar_1 as $navbar1_item) : ?>
                <li><a href="<?php echo $navbar1_item['link']; ?>">
                        <?php echo $navbar1_item['title']; ?></a></li>
            <?php endforeach; ?>
            <a href="../login.php" class="btn1">Login</a>
        </ul>
    </nav>
    <main class="program1 container">
        <h1>Academic Programs</h1>
        <div>
            <?php foreach ($_program_1 as $category => $categoryPrograms) : ?>
                <h2><?php echo $category; ?></h2>
                <ul>
                    <?php foreach ($categoryPrograms as $program) : ?>
                        <h3><?php echo $program['course_name']; ?></h3>
                        <p><?php echo $program['course_description']; ?></p>
                    <?php endforeach; ?>
                </ul>
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