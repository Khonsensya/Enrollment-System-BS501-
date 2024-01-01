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
</head>
<body>
    <?php include $_C2_index_navbar_php; ?>

    <?php
    //BAKIT MAY NALILIGAW NA ARRAY DITO, MERON NAMANG DEDICATED FILE PARA RITO
    $about = [
        'title' => 'About Us',
        'paragraphs' => [
            'first par',
            'second par',
            'third par'
        ]
    ];
    ?>
    
    <section class="about-section container">
        <br>
        <h2><?php echo $about['title']; ?></h2>
        <?php foreach ($about['paragraphs'] as $paragraph) : ?>
            <p><?php echo $paragraph; ?></p>
        <?php endforeach; ?>
    </section>
    
    <?php include $_C2_footer_php; ?>
</body>
</html>