<!-- PHP INCLUDE / REQUIRE LINKS ARE HERE -->
<?php include '../../../config.php'; ?>
<?php include $_C2_data_php; ?>
<?php include $_C2_session_php; ?>
<?php include $_C2_mysql_connection_php; ?>
<?php require_once $_C2_action_php; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_Head_Title; ?></title>
    <link rel="icon" href="<?php echo $_C2_Head_Icon; ?>" />
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
        <section class="adminprofile1 container">
            <h2 class="page_title ">My Profile</h2>
            <hr class="title_line">

            <section class="profile_details">
                <ul class="profile_list">
                    <li>
                        <span class="tag safe"><?php echo $user['User_Type'] ?></span> | <span class="tag warning"><?php echo $user['Date_Created'] ?></span>
                    </li>
                    <li>
                        <h1><?php echo $user['First_Name'], " ", $user['Last_Name']; ?></h1>
                    </li>
                    <li>
                        <p><?php echo "Email: ", $user['Email']; ?></p>
                    </li>
                </ul>
            </section>
        </section>
    <?php else : ?>
        <div class="container">
            <h2>Please Login</h2>
            <a href="<?php echo $_C2_login ?>">Login</a>
        </div>
    <?php endif; ?>
</body>

</html>