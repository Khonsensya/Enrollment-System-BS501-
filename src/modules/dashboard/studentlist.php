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
    <?php include $_C2_dashboard_navbar_php; ?>
    
    <section class="studentlist1 container">
        <h1>Student List</h1>
        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>User_ID</td>
                    <td  style="width: 45rem; text-align: left; padding-left: 5rem;">Name</td>
                    <td>Enrolled</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                <?php $result = $mysqli->query("SELECT * FROM student_info") or die("Invalid query: ". $mysqli->error); ?>
                <?php while ($row = $result->fetch_assoc()):?>
                            <tr>
                                <td><?php echo $row['Student_ID'] ?></td>
                                <td><?php echo $row['User_ID'] ?></td>
                                <td style="width: 45rem; text-align: left; padding-left: 5rem;"><?php echo $row['Last_Name'], ', ', $row['First_Name'], ' ', $row['Middle_Initial'] ?></td>
                                <td><?php echo ($row['Enrolled'] == 1 ? 'Enrolled' : 'Pending'); ?></td>
                                <td class="list-actions">
                                    <div>
                                        <a href="dashboard.php?view=<?php echo $row['Student_ID']; ?>" class="btn1">View</a>
                                        <a href="dashboard.php?edit=<?php echo $row['Student_ID']; ?>" class="btn2">Edit</a>
                                        <a href="studentlist.php?delete=<?php echo $row['Student_ID']; ?>" class="btn5">Delete</a>
                                    </div>
                                </td>
                            </tr>
                    <?php endwhile ?>
            </tbody>
        </table>
    </section>
</body>
</html>

