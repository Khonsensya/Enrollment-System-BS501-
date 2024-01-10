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
    <link rel="icon" href="<?php echo $_C2_Head_Icon; ?>"/>
    <!-- CSS STYLESHEETS LINKS ARE HERE -->
    <link rel="stylesheet" href="<?php echo $_C2_style_css; ?>">
    <link rel="stylesheet" href="<?php echo $_C2_module_css; ?>">
    <link rel="stylesheet" href="<?php echo $_C2_button_css; ?>">
    <link rel="stylesheet" href="<?php echo $_C2_icon_css; ?>">
    <link rel="stylesheet" href="<?php echo $_C2_navbar_css; ?>">
    <link rel="stylesheet" href="<?php echo $_C2_forms_css; ?>">
</head>
<body>
    <?php if(isset($user)): ?>
    <?php include $_C2_dashboard_navbar_php; ?>

    <section class="adminprofile1 container">
        <h1>Admin Profile</h1>
        <table>
            <tbody>
                <th>User Type</th>
                <th>Email</th>
                <th>Name</th>
                <th>Date Created</th>
                    <tr>
                        <td><?php echo $user['User_Type']?></td>
                        <td><?php echo $user['Email']?></td>
                        <td><?php echo $user['Last_Name'], ', ', $user['First_Name']?></td>
                        <td><?php echo $user['Date_Created']?></td>
            </tbody>
        </table>
    </section>
    <?php $mysqli -> close(); ?>
    </section>
    <?php else: ?>
    <?php endif; ?>
</body>
</html>

