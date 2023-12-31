<!-- PHP INCLUDE / REQUIRE LINKS ARE HERE -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/config.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . DATA . 'data.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_Head_Title; ?></title>
    <link rel="icon" href="<?php echo $_Head_Icon2; ?>"/>
    <!-- CSS STYLESHEETS LINKS ARE HERE -->
    <link rel="stylesheet" href="<?php echo $link_3; ?>style.css">
    <link rel="stylesheet" href="<?php echo $link_2; ?>css/banner.css">
    <link rel="stylesheet" href="<?php echo $link_2; ?>css/button.css">
    <link rel="stylesheet" href="<?php echo $link_2; ?>css/footer.css">
    <link rel="stylesheet" href="<?php echo $link_2; ?>css/navbar.css">
    <link rel="stylesheet" href="<?php echo $link_2; ?>css/animation.css">
    <link rel="stylesheet" href="<?php echo $link_2; ?>css/module.css">

</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . COMPONENTS . 'index-navbar.php'; ?>

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
    
    <?php include $_SERVER['DOCUMENT_ROOT'] . COMPONENTS . 'footer.php'; ?>
</body>

</html>