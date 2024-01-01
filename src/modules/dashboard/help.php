<!-- PHP INCLUDE / REQUIRE LINKS ARE HERE -->
<?php include '../../../config.php'; ?>
<?php include $_C2_data_php; ?>
<?php include $_C2_session_php; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_Head_Title; ?></title>
    <link rel="icon" href="<?php echo $_C2_Head_Icon; ?>"/>
    <!-- CSS STYLESHEETS LINKS ARE HERE -->
    <link rel="stylesheet" href="<?php echo $_C2_style_css; ?>">
    <link rel="stylesheet" href="<?php echo $_C2_module_css; ?>">
    <link rel="stylesheet" href="<?php echo $_C2_navbar_css; ?>">
    <link rel="stylesheet" href="<?php echo $_C2_footer_css; ?>">
</head>
<body>
    <?php include $_C2_dashboard_navbar_php; ?>

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
    
    <?php include $_C2_footer_php; ?>
</body>
</html>

         