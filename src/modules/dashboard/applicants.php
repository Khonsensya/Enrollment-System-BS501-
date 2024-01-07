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
    <title><?php echo $_Head_Title; ?></title> <!-- title -->
    <link rel="icon" href="<?php echo $_C2_Head_Icon; ?>" /> <!-- icon -->
    <!-- CSS STYLESHEETS LINKS ARE HERE -->
    <link rel="stylesheet" href="<?php echo $_C2_style_css; ?>">
    <link rel="stylesheet" href="<?php echo $_C2_module_css; ?>">
    <link rel="stylesheet" href="<?php echo $_C2_button_css; ?>">
    <link rel="stylesheet" href="<?php echo $_C2_icon_css; ?>">
    <link rel="stylesheet" href="<?php echo $_C2_navbar_css; ?>">
    <link rel="stylesheet" href="<?php echo $_C2_forms_css; ?>">
    <link rel="stylesheet" href="<?php echo $_C2_table_css; ?>">
</head>

<body>
    <?php if (isset($user)) : ?>
        <?php include $_C2_dashboard_navbar_php; ?>

        <section class="applicants1 container">
            <h2 class="page_title ">Applicant List</h2>
            <hr class="title_line">
            <form method="post">
                <table>
                    <td class="dropdown_container">
                        <select name="applicant_type_1" id="applicant_type_1" class="dropdown_content">
                            <option value="default">Default</option>
                            <option value="rejected">Rejected</option>
                        </select>
                        <input type="submit" name="submit-option" class="btn1">
                    </td>
                </table>
            </form>
            <table>
                <thead>
                    <tr>
                        <td>
                            <p>ID</p>
                        </td>
                        <td>
                            <p>User_ID</p>
                        </td>
                        <td class="table_name">
                            <p>Name</p>
                        </td>
                        <td>
                            <p>Actions</p>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <?php $_Status = '0';
                    $_Btn1 = 'Approve';
                    $_Btn2 = 'Reject';
                    $_BtnOption = 'reject'; ?>
                    <?php if (isset($_POST['submit-option'])) : ?>
                        <?php
                        if ($_POST['applicant_type_1'] == 'rejected') {
                            $_Status = '2';
                            $_Btn1 = 'Reconsider';
                            $_Btn2 = 'Delete';
                            $_BtnOption = 'delete';
                        } else {
                            $_Status = '0';
                            $_Btn1 = 'Approve';
                            $_Btn2 = 'Reject';
                            $_BtnOption = 'reject';
                        }
                        ?>
                    <?php endif; ?>
                    <?php $result = $mysqli->query("SELECT * FROM student_info WHERE Status='$_Status'") or die("Invalid query: " . $mysqli->error); ?>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td><?php echo $row['Student_ID'] ?></td>
                            <td><?php echo $row['User_ID'] ?></td>
                            <td class="table_name"><?php echo $row['Last_Name'], ', ', $row['First_Name'], ' ', $row['Middle_Initial'] ?></td>
                            <td class="list-actions">
                                <div>
                                    <a onclick="javascript: return confirm('Please confirm deletion');" href="?approve=<?php echo $row['Student_ID']; ?>" class="btn1 safe"><?php echo $_Btn1 ?></a>
                                    <a onclick="javascript: return confirm('Please confirm deletion');" href="?<?php echo $_BtnOption ?>=<?php echo $row['Student_ID']; ?>" class="btn1 danger"><?php echo $_Btn2 ?></a>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile ?>
                </tbody>
            </table>
        </section>
    <?php else : ?>
        <div class="container">
            <h2>Please Login</h2>
            <a href="<?php echo $_C2_login ?>">Login</a>
        </div>
    <?php endif; ?>
</body>

</html>