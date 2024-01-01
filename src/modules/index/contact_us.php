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

    <main class="contact1 container">
        <h2><?php echo $contact_1['title']; ?></h2>
        <?php foreach ($contact_1['paragraphs'] as $paragraph) : ?>
            <p><?php echo $paragraph; ?></p>
        <?php endforeach; ?>
    </main>
    
    <?php include $_C2_footer_php; ?>
</body>

</html>