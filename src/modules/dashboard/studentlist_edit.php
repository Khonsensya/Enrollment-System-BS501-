
<?php include '../../../config.php'; ?>
<?php include $_C2_data_php; ?>
<?php include './session.php'; ?>
<?php include $_C2_mysql_connection_php; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student Information</title>
</head>
<body>
    <h2>Edit Student Information</h2>
    <form method="post" action="update.php">

        <input type="text" name="fname" value="<?php echo $row['First_Name']; ?>"><br><br>
        <input type="text" name="lname" value="<?php echo $row['Last_Name']; ?>"><br><br>
        <input type="text" name="mname" value="<?php echo $row['Middle_Initial']; ?>"><br><br>
        <input type="text" name="sex" value="<?php echo $row['Gender']; ?>"><br><br>
        <input type="text" name="bdate" value="<?php echo $row['Birthdate']; ?>"><br><br> 
        <input type="text" name="birthplace" value="<?php echo $row['Place_of_Birth']; ?>"><br><br> 
        <input type="text" name="citizenship" value="<?php echo $row['Citizenship']; ?>"><br><br> 
        <input type="text" name="civilstatus" value="<?php echo $row['Civil_Status']; ?>"><br><br> 
        <input type="number" name="mobilenum" value="<?php echo $row['Mobile_Number']; ?>"><br><br> 
        <input type="text" name="email" value="<?php echo $row['Email']; ?>"><br><br> 
        <input type="text" name="address" value="<?php echo $row['Address']; ?>"><br><br> 

        <input type="submit" name="submit" value="Update">
    </form>
</body>

    <?php

        if (isset($_GET['User_ID'])) {
        $id = $_GET['User_ID'];
    
        $sql = "SELECT First_Name, Last_Name, Middle_Initial, Gender, Birthdate, Place_of_Birth, Citizenship, Civil_Status, Mobile_Number, Email, Address FROM student_info WHERE User_ID = $id";
        $result = $mysqli->query($sql);

        if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        }    
    }
    ?>
    
</html>