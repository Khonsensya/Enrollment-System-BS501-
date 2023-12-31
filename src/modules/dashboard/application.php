
<!-- PHP INCLUDE / REQUIRE LINKS ARE HERE -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/config.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . PROCESS . 'session.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . DATA . 'data.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . PROCESS . 'action.php'; ?>


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
    <link rel="stylesheet" href="<?php echo $link_2; ?>css/button.css">
    <link rel="stylesheet" href="<?php echo $link_2; ?>css/icon.css">
    <link rel="stylesheet" href="<?php echo $link_2; ?>css/navbar.css">
    <link rel="stylesheet" href="<?php echo $link_2; ?>css/dashboard.css">
    <link rel="stylesheet" href="<?php echo $link_2; ?>css/forms.css">
    <link rel="stylesheet" href="<?php echo $link_2; ?>css/alert.css">
</head>
<body>

    <?php include $_SERVER['DOCUMENT_ROOT'] . COMPONENTS . 'dashboard-navbar.php'; ?>
    
    <section class="application1 container">
        <h1>Application</h1>
        <form method="POST">
            <table>
                <tr>
                    <td colspan="3">
                        <label for="program">Program</label>
                        <select name="program" id="program">
                            <?php foreach ($_program as $program_item) : ?>
                                <option value="<?php echo $program_item['code']; ?>">
                                    <?php echo $program_item['program']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                        <?php
                            if($user['First_Name'])
                        ?>
                <tr>
                    <td colspan="2">
                        <label for="firstName">First Name</label>
                        <input type="text" id="firstName" name="firstName" value="<?= ($user['First_Name'])?>">
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
                                <option value="<?php echo $citizenship_item['code']; ?>">
                                    <?php echo $citizenship_item['citizenship']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td td>
                        <label for="lastName">Last Name</label>
                        <input type="text" id="lastName" name="lastName" value="<?= ($user['Last_Name'])?>">
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
                            <option value="male">Male</option>
                            <option value="female">Female</option>
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
                        <input type="email" id="eMail" name="eMail" value="<?= ($user['Email'])?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <button type="submit" name="save" id="submit" class="btn1">Submit</button>
                    </td>
                </tr>
            </table>
        </form>
    </section>
</body>
</html>