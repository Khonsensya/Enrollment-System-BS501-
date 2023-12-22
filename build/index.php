<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luv U University</title>
    <link rel="stylesheet" href="./pwd-css/style.css">
    <link rel="stylesheet" href="./pwd-css/components.css">
    <link rel="stylesheet" href="./pwd-css/responsive.css">
    <link rel="stylesheet" href="./pwd-css/animation.css">
    <!-- sarap sana ng buhay kung naka react no? -->
</head>
<body>
    <!-- DATA from PHP FILE -->
    <?php include './pwd-php/data.php'; ?>

    <!-- COMPONENTS from PHP FILE -->
    <section class="">
        <?php include './pwd-php/components/navbar.php'; ?>
    </section>

    <section class="">
        <?php include './pwd-php/components/banner.php'; ?>
    </section>

    <section class="space">
        <?php include './pwd-php/components/benefits.php'; ?>
    </section>

    <section class="space">
        <?php include './pwd-php/components/contribution.php'; ?>
    </section>

    <section>
        <?php include './pwd-php/components/footer.php'; ?>
    </section>

    <script defer src="./pwd-js/banner.js"></script>
</body>
</html>