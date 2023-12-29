<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
        <h1>Viewlist</h1>

        <h3>User_Info</h3>
        <?php
                include '../data/mysql-connection.php';
                //read all row from database table
                $sql = "SELECT student_info.User_ID, student_info.Student_ID, student_info.First_Name, student_info.Last_Name, student_info.Middle_Initial, student_info.Gender, student_info.Birthdate, student_info.Place_of_Birth, student_info.Citizenship, student_info.Civil_Status, student_info.Mobile_Number, student_info.Email, student_info.Address, student_info.Enrolled 
                FROM student_info
                LEFT JOIN users ON student_info.User_ID = users.User_ID
                WHERE student_info.Enrolled = 0
                ORDER BY User_ID";

                $result = $mysqli->query($sql);
                if (!$result) {
                die("Invalid query: ". $mysqli->error);
                }
        ?>

        <?php
        while ($row = $result->fetch_assoc()):?>

                    <tr>
                        <td><?php echo $row['User_ID'] ?></td>
                        <td><?php echo $row['Last_Name'], ', ', $row['First_Name'], ' ', $row['Middle_Initial'] ?></td>
                        <td><?php echo $row['Gender'] ?></td>
                        <td><?php echo $row['Birthdate'] ?></td>
                        <td><?php echo $row['Place_of_Birth'] ?></td>
                        <td><?php echo $row['Citizenship'] ?></td>
                        <td><?php echo $row['Civil_Status'] ?></td>
                        <td><?php echo $row['Mobile_Number'] ?></td>
                        <td><?php echo $row['Email'] ?></td>
                        <td><?php echo $row['Address'] ?></td>
                        <td><?php echo $row['Enrolled'] ?></td><br><br>
                        </td>
                    </tr>

        <?php endwhile ?>
</body>
</html>