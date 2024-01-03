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
    <link rel="stylesheet" href="<?php echo $_C2_table_css; ?>">
</head>
<body>
    <?php if(isset($user)): ?>
    <?php include $_C2_dashboard_navbar_php; ?>
    
    <section class="studentlist1 container">
        <h1>Student List</h1>
        <table>
            <thead>
                <tr>
                    <td><p>ID</p></td>
                    <td><p>User_ID</p></td>
                    <td class="table_name"><p>Name</p></td>
                    <td><p>Enrolled</p></td>
                    <td><p>Actions</p></td>
                </tr>
            </thead>
            <tbody>
                <?php $result = $mysqli->query("SELECT * FROM student_info") or die("Invalid query: ". $mysqli->error); ?>
                <?php while ($row = $result->fetch_assoc()):?>
                            <tr>
                                <td><?php echo $row['Student_ID'] ?></td>
                                <td><?php echo $row['User_ID'] ?></td>
                                <td class="table_name"><?php echo $row['Last_Name'], ', ', $row['First_Name'], ' ', $row['Middle_Initial'] ?></td>
                                <td><?php echo ($row['Enrolled'] == 1 ? 'Enrolled' : 'Pending'); ?></td>
                                <td class="list-actions">
                                    <div>
                                        <a href="dashboard.php?view=<?php echo $row['Student_ID']; ?>" class="btn1 safe">View</a>
                                        <a href="dashboard.php?edit=<?php echo $row['Student_ID']; ?>" class="btn2 warning">Edit</a>
                                        <a onclick="javascript: return confirm('Please confirm deletion');" href="studentlist.php?delete=<?php echo $row['Student_ID']; ?>" class="btn2 danger">Delete</a>
                                    </div>
                                </td>
                            </tr>
                    <?php endwhile ?>
            </tbody>
        </table>
    </section>
    <?php else: ?>
        <div class="container">
            <h2>Please Login</h2>
            <a href="<?php echo $_C2_login ?>">Login</a>
        </div>
    <?php endif; ?>
</body>
</html>

