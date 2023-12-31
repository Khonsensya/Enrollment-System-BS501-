<!-- PHP INCLUDE / REQUIRE LINKS ARE HERE -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/config.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . PROCESS . 'session.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . DATA . 'data.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . DATA . 'mysql-connection.php'; ?>
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
    <?php include $_SERVER['DOCUMENT_ROOT'] . COMPONENTS . 'dashboard-navbar.php'; ?><br>

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

