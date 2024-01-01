<!-- PHP INCLUDE / REQUIRE LINKS ARE HERE -->
<?php include '../../../config.php'; ?>
<?php include $_C2_data_php; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_Head_Title; ?></title>
    <link rel="icon" href="<?php echo $_C2_Head_Icon; ?>"/>
    <!-- CSS STYLESHEETS LINKS ARE HERE -->
    <link rel="stylesheet" href="<?php echo $_C2_style_css; ?>">
    <link rel="stylesheet" href="<?php echo $_C2_button_css; ?>">
    <link rel="stylesheet" href="<?php echo $_C2_footer_css; ?>">
    <link rel="stylesheet" href="<?php echo $_C2_navbar_css; ?>">
    <link rel="stylesheet" href="<?php echo $_C2_module_css; ?>">

</head>

<body>
    <?php include $_C2_index_navbar_php; ?>

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
    
    <?php include $_C2_footer_php; ?>
</body>

</html>