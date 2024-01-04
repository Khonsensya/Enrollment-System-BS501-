<?php include '../../config.php'; ?>
<?php include $_C2_session_php; ?>
<?php include $_C2_mysql_connection_php; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student Information</title>
</head>
<body>
<h1>Student List</h1>
        <table>
            <thead>
                <tr>
                    <td>ID Number</td>
                    <td>Name</td>
                    <td>Student Number</td>
                    <td>Program</td>
                    <td>Gender</td>
                    <td>Birthdate</td>
                    <td>Birthplace</td>
                    <td>Citizenship</td>
                    <td>CivilStatus</td>
                    <td>Mobile Number</td>
                    <td>Email</td>
                    <td>Address</td>
                </tr>
            </thead>
            <tbody>
                <?php $result = $mysqli->query("SELECT * FROM student_info, student_profile") or die("Invalid query: ". $mysqli->error); ?>
                <?php while ($row = $result->fetch_assoc()):?>
                            <tr>
                                <td><?php echo $row['Student_ID'] ?></td>
                                <td><?php echo $row['Last_Name'], ', ', $row['First_Name'], ' ', $row['Middle_Initial'] ?></td>
                                <td><?php echo $row ['Student_Number']?></td>
                                <td><?php //echo $row ['']//?></td>
                                <td><?php echo $row ['Gender']?></td>
                                <td><?php echo $row ['Birthdate']?></td>
                                <td><?php echo $row ['Place_of_Birth']?></td>
                                <td><?php echo $row ['Citizenship']?></td>
                                <td><?php echo $row ['Civil_Status']?></td>
                                <td><?php echo $row ['Mobile_Number']?></td>
                                <td><?php echo $row ['Email']?></td>
                                <td><?php echo $row ['Address']?></td>

                            </tr>
                    <?php endwhile ?>
            </tbody>
        </table>
    </body>
</html>