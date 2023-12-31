<!-- PHP INCLUDE / REQUIRE LINKS ARE HERE -->
<?php include '../../../config.php'; ?>
<?php include $_C2_data_php; ?>
<?php include $_C2_dashboard_data_php; ?>
<?php include $_C2_session_php; ?>
<?php include $_C2_get_date_php; ?>
<?php include $_C2_mysql_connection_php; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_Head_Title; ?></title> <!-- title -->
    <link rel="icon" href="<?php echo $_C2_Head_Icon; ?>" /> <!-- icon -->
    <!-- CSS STYLESHEETS LINKS ARE HERE -->
    <link rel="stylesheet" href="<?php echo $_C2_style_css; ?>">
    <link rel="stylesheet" href="<?php echo $_C2_module_css; ?>">
    <link rel="stylesheet" href="<?php echo $_C2_button_css; ?>">
    <link rel="stylesheet" href="<?php echo $_C2_icon_css; ?>">
    <link rel="stylesheet" href="<?php echo $_C2_navbar_css; ?>">
    <link rel="stylesheet" href="<?php echo $_C2_forms_css; ?>">

</head>

<body>
    <?php if (isset($user)) : ?>
        <?php include $_C2_dashboard_navbar_php; ?>
        <main class="dashboard1 container">
            <section class="content1">
                <h3>
                    Welcome
                    <?= htmlspecialchars($user['First_Name']) ?>,
                    <span class="<?php echo $greet_usertype = ($user['User_Type'] == 'Administrator') ? 'tag admin' : 'tag student'; ?>">
                        <?php echo $greet_usertype = ($user['User_Type'] == 'Administrator') ? '( Admin )' : '( Student )'; ?>
                    </span>
                </h3>
                <ul class="datetime">
                    <li><?php echo $currentDateTime; ?></li>
                    <li>
                        <p>:</p>
                    </li>
                    <li>
                        <p id="clock"></p>
                    </li>
                </ul>
                <hr class="title_line">

                <?php if ($user['User_Type'] == 'Administrator') : ?>
                    <section class="summary">
                        <?php foreach ($_summary_item_1 as $summaryitem1_item) : ?>
                            <section class="summary-item">
                                <h4><?php echo $summaryitem1_item['title']; ?></h4>
                                <h2><?php echo $summaryitem1_item['output']; ?></h2>
                            </section>
                        <?php endforeach; ?>
                    </section>
                    <section>
                        <video width="100%" style="padding: 1rem 0;" controls loop autoplay>
                            <source src="../../assets/videos/ducks.mp4" type="video/mp4">
                            Your browser does not support HTML video.
                        </video>

                        <p>
                            Video courtesy of
                            <a href="https://www.youtube.com/watch?v=oumjTrzd-Nc" target="_blank">Ducks</a>.
                        </p>
                    </section>
                <?php else : ?>
                    <section class="summary">
                        <?php foreach ($_summary_item_2 as $summaryitem2_item) : ?>
                            <section class="summary-item">
                                <h4><?php echo $summaryitem2_item['title']; ?></h4>
                                <h2><?php echo $summaryitem2_item['output']; ?></h2>
                            </section>
                        <?php endforeach; ?>
                    </section>
                <?php endif; ?>
            </section>
        </main>

    <?php else : ?>
        <div class="container">
            <h2>Please Login</h2>
            <a href="<?php echo $_C2_login ?>">Login</a>
        </div>
    <?php endif; ?>

    <script defer src="<?php echo $_C2_clock_js; ?>"></script>
</body>

</html>