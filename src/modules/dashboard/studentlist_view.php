<?php include '../../../config.php'; ?>
<?php include $_C2_session_php; ?>
<?php include $_C2_mysql_connection_php; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student Information</title>
</head>
<body>
<h1>View Student</h1>
        <table>
            <thead>
                <tr>

                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
            <?php $sql = "SELECT Student_info.*, Student_profile.* From Student_info RIGHT JOIN Student_profile ON Student_info.Student_ID = Student_profile.Student_ID";
            $result = $mysqli->query($sql);

            //Pag Kasama Non-Enrolled viewlist kaso di gagana sa edit kasi di sila enrolled
            /*<?php $sql = "SELECT Student_info.*, Student_profile.* From Student_info LEFT JOIN Student_profile ON Student_info.Student_ID = Student_profile.Student_ID";
                $result = $mysqli->query($sql);
            */
            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>ID</th><th>Name</th><th>Student_Number</th><th>Email</th><th>Section_ID</th><th>Enrolled</th><th>Gender</th><th>Birthdate</th><th>Place_of_Birth</th><th>Action</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["Student_ID"] . "</td>";
                    echo "<td>" . $row['Last_Name'], ', ', $row['First_Name'], ' ', $row['Middle_Initial'] . "</td>";
                    echo "<td>" . $row["Student_Number"] . "</td>";
                    echo "<td>" . $row["Email"] . "</td>";
                    echo "<td>" . $row["Section_ID"] . "</td>";
                    echo "<td>" . $row["Enrolled"] . "</td>";
                    echo "<td>" . $row["Gender"] . "</td>";
                    echo "<td>" . $row["Birthdate"] . "</td>";
                    echo "<td>" . $row["Place_of_Birth"] . "</td>";
                    echo "<td><a href='studentlist_edit.php?id=" . $row["Student_ID"] . "'>Edit</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "No students?????";
            }

            $mysqli->close();
            ?>
    </body>
</html>