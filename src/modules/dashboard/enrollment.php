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
                    <?php
                    $result = $mysqli->query("SELECT * FROM student_info WHERE User_ID='$id'") or die("Invalid query: " . $mysqli->error);
                    $row = $result->fetch_assoc();
                    ?>

                    <table>
                        <tr>
                            <td>

                                <label for="studentid">Student ID</label>
                                <input type="text" id="studentid" name="studentid" value=<?php echo $row['Student_ID']; ?>>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="academicYear">Academic Year</label>
                                <input type="text" id="academicYear" name="academicYear">
                            </td>
                            <td>
                                <label for="semester">Semester</label>
                                <select name="semester" id="semester" required>
                                    <option value=""></option>
                                    <option value="1st">First Sem</option>
                                    <option value="2nd">Second Sem</option>
                                </select>
                            </td>
                            <td>
                                <label for="yearLevel">Year Level</label>
                                <select name="yearLevel" id="yearLevel" required>
                                    <option value=""></option>
                                    <option value="1">First Year</option>
                                    <option value="2">Second Year</option>
                                    <option value="3">Third Year</option>
                                    <option value="4">Fourth Year</option>
                                </select>
                            </td>
                            <td>
                                <label for="section">Section</label>
                                <input type="text" id="section" name="section">
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
                            <td>
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