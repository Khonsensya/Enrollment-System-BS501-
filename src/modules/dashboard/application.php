
<!-- PHP INCLUDE / REQUIRE LINKS ARE HERE -->
<?php include '../../../config.php'; ?>
<?php include $_C2_data_php; ?>
<?php include $_C2_session_php; ?>
<?php include $_C2_action_php; ?>
<?php include $_C2_dashboard_data_php; ?>



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
        <section class="application1 container">
            <h1>Application</h1>
            <form action="" method="POST">
                <table>
                    <tr>
                        <td colspan="3">
                            <label for="program">Program</label>
                            <select name="program" id="program">
                                <?php foreach ($_program as $program_item) : ?>
                                    <option value="<?php echo $program_item['program']; ?>">
                                        <?php echo $program_item['program']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label for="firstName">First Name</label>
                            <input type="text" id="firstName" name="firstName" value=<?= $user['First_Name']; ?>>
                        </td>
                        <td>
                            <label for="dateOfBirth">Date of Birth</label>
                            <input type="date" id="dateOfBirth" name="dateOfBirth">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="middleInitial">Middle Initial</label>
                            <input type="text" id="middleInitial" name="middleInitial">
                        </td>
                        <td>
                            <label for="birthPlace">Birthplace</label>
                            <input type="text" id="birthPlace" name="birthPlace">
                        </td>
                        <td>
                            <label for="citizenship">Citizenship</label>
                            <select name="citizenship" id="citizenship">
                                <?php foreach ($_citizenship as $citizenship_item) : ?>
                                    <option value="<?php echo $citizenship_item['citizenship']; ?>">
                                        <?php echo $citizenship_item['citizenship']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td td>
                            <label for="lastName">Last Name</label>
                            <input type="text" id="lastName" name="lastName" value = <?= $user['Last_Name']; ?>>
                        </td>
                        <td>
                            <label for="civilStatus">Civil Status</label>
                            <select name="civilStatus" id="civilStatus">
                                <option value=""></option>
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                                <option value="complicated">It's Complicated</option>
                            </select>
                        </td>
                        <td>
                            <label for="sex">Sex</label>
                            <select name="sex" id="sex">
                                <option value=""></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <label for="myaddress">Address</label>
                            <input type="text" id="myaddress" name="myaddress">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="mobileNumber">Mobile Number:</label>
                            <input type="number" id="mobileNumber" name="mobileNumber">
                        </td>
                        <td colspan="2">

                            <label for="eMail">Email:</label>
                            <input type="email" id="eMail" name="eMail" value= <?= $user['Email']; ?>>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                        <button onclick="javascript: return confirm('Please confirm deletion');" type="submit" name="save" id="submit" class="btn1">Submit</button>
                        </td>
                    </tr>
                </table>
            </form>
        </section>
    <?php else: ?>
        <div class="container">
            <h2>Please Login</h2>
            <a href="<?php echo $_C2_login ?>">Login</a>
        </div>
    <?php endif; ?>
</body>
</html>