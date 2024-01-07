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

    <?php if($user['User_Type'] == 'Student'): ?>
    <section class="studentlist1 container">
        <h1>Student Profile</h1>
        <table>
            <tbody>
                <?php 
                echo "<table>";
                echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Student ID</th><th>Section ID</th><th>Enrolled</th><th>Gender</th><th>Birthdate</th><th>Place of Birth</th><th>Date created</th></tr>";
            
                    echo "<tr>";
                    echo "<td>" . $studentuser["Student_ID"] . "</td>";
                    echo "<td>" . $studentuser['Last_Name'], ', ', $studentuser['First_Name'], ' ', $studentuser['Middle_Initial'] . "</td>";
                    echo "<td>" . $studentuser["Email"] . "</td>";
                    echo "<td>" . $studentuser["Student_Number"] . "</td>";
                    echo "<td>" . $studentuser["Section_ID"] . "</td>";
                    echo "<td>" . $studentuser["Enrolled"] . "</td>";
                    echo "<td>" . $studentuser["Gender"] . "</td>";
                    echo "<td>" . $studentuser["Birthdate"] . "</td>";
                    echo "<td>" . $studentuser["Place_of_Birth"] . "</td>";
                    echo "<td>" . $studentuser["Date_Created"] . "</td>";
                    echo "</tr>";
            ?>
            </tbody>
        </table>
    </section>
    <?php elseif ($user['User_Type']== 'Administrator'):?>
        <section class="adminlist1 container">
        <h1>Student Information</h1>
        <table>
            <tbody>
                <?php 

                    echo "<table>";
                    echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Section ID</th><th>Enrolled</th><th>Gender</th><th>Birthdate</th><th>Place of Birth</th></tr>";
                
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['User_ID'] . "</td>";
                        echo "<td>" . $row['Last_Name'], ', ', $row['First_Name'], ' ', $row['Middle_Initial'] . "</td>";
                        echo "<td>" . $row['Email'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
            ?>
            <?php endif; ?>
            </tbody>
        </table>
    </section>
    <?php $mysqli -> close(); ?>
    </section>
    <?php else: ?>
    <?php endif; ?>
</body>
</html>