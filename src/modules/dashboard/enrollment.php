<!-- PHP INCLUDE / REQUIRE LINKS ARE HERE -->
<?php include '../../../config.php'; ?>
<?php include $_C2_data_php; ?>
<?php include $_C2_session_php; ?>
<?php include $_C2_action_php; ?>
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

        <section class="enrollment1 container">
            <h2 class="page_title">Enrollment</h2>
            <hr class="title_line">
            <section class="sheet">
                <form method="POST">
                    <table>
                        <tr>
                            <td>
                                <label for="studentid">Student ID</label>
                                <input type="text" id="studentid" name="studentid">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="paymenttype">Payment Type</label>
                                <select name="paymenttype" id="paymenttype">
                                    <?php foreach ($_payment_type as $paymenttype_item) : ?>
                                        <option value="<?php echo $paymenttype_item['code']; ?>">
                                            <?php echo $paymenttype_item['paymenttype']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td td>
                                <label for="amount">Amount</label>
                                <input type="text" id="amount" name="amount">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <button onclick="javascript: return confirm('Please confirm enrollment');" type="submit" name="enroll" id="submit" class="btn1">Submit</button>
                            </td>
                        </tr>
                    </table>
                </form>
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