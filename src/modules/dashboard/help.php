<!-- PHP INCLUDE / REQUIRE LINKS ARE HERE -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/config.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . PROCESS . 'session.php'; ?>
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
    <link rel="stylesheet" href="<?php echo $link_2; ?>css/module.css">
    <link rel="stylesheet" href="<?php echo $link_2; ?>css/navbar.css">
    <link rel="stylesheet" href="<?php echo $link_2; ?>css/footer.css">
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . COMPONENTS . 'dashboard-navbar.php'; ?>

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
    
    <?php include $_SERVER['DOCUMENT_ROOT'] . COMPONENTS . 'footer.php'; ?>
</body>
</html>

         