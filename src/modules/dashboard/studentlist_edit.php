<?php include '../../../config.php'; ?>
<?php include $_C2_data_php; ?>
<?php include $_C2_session_php; ?>
<?php include $_C2_mysql_connection_php; ?>
<?php include $_C2_update_php; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student Information</title>
</head>
<body>
    <?php
        if (isset($_GET['id'])) {
        $row_id = $_GET['id'];
            
        $sql = "SELECT First_Name, Last_Name, Middle_Initial, Gender, Birthdate, Place_of_Birth, Citizenship, Civil_Status, Mobile_Number, Email, Address FROM student_info WHERE Student_ID = '$row_id'";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
            }    
        }
        ?>
            <h2>Edit Student Information</h2>
            <form method="post" action="update.php">
                <label for="firstName">First Name</label>
                <input type="text" id="fname" name="firstName" value=<?= $row['First_Name']; ?>><br><br>
                <label for="lname">Last Name</label>
                <input type="text" name="lname" value="<?= $row['Last_Name']; ?>"><br><br>
                <label for="miniial">Middle Initial</label>
                <input type="text" name="mname" value="<?= $row['Middle_Initial']; ?>"><br><br>
                <label for="gender">Gender</label>
                <input type="text" name="sex" value="<?= $row['Gender']; ?>"><br><br>
                <label for="bdate">Birthdate</label>
                <input type="text" name="bdate" value="<?= $row['Birthdate']; ?>"><br><br>
                <label for="birthplace">Place of Birth</label> 
                <input type="text" name="birthplace" value="<?= $row['Place_of_Birth']; ?>"><br><br> 
                <label for="citizenship">Citizenship</label>
                <input type="text" name="citizenship" value="<?= $row['Citizenship']; ?>"><br><br> 
                <label for="civilstatus">Civil Status</label>
                <input type="text" name="civilstatus" value="<?= $row['Civil_Status']; ?>"><br><br> 
                <label for="mobilenu,">Mobile Number</label>
                <input type="number" name="mobilenum" value="<?= $row['Mobile_Number']; ?>"><br><br> 
                <label for="email">Email Address</label>
                <input type="text" name="email" value="<?= $row['Email']; ?>"><br><br> 
                <label for="address">Address</label>
                <input type="text" name="address" value="<?= $row['Address']; ?>"><br><br>
                <label for="address">Enrolled</label>
                <input type="number" name="enrolled" value="<?= $row['Enrolled']; ?>"><br><br> 
                
                <input type="submit" name="Update" value="Update">
            </form>
</body>
</html>