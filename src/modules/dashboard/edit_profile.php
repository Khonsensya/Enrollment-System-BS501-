<?php include '../../../config.php'; ?>
<?php include $_C2_data_php; ?>
<?php include $_C2_session_php; ?>
<?php include $_C2_mysql_connection_php; ?>
<?php include $_C2_update_php; ?>
<?php include $_C2_dashboard_data_php; ?>

<!DOCTYPE html>
<html>
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
         <main class = "editprofile1 container">
            
            <h2>Edit Student Information</h2>
            <label for="firstName">First Name</label>

                <?php echo $row['First_Name'] ?><br><br>
                <?php echo $row['Email'] ?><br><br>
            <form method="post" action="update.php">
                    <label for="firstName">First Name</label>
                <input type="text" id="fname" name="firstName" value=<?= $name ?>><br><br>

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
                
                    <label for="address">Enrolled:</label>
                <input type="radio" name="enrolled" id= "enrolled"value="<?= $row['Enrolled']; ?>">
                    <label for = "enrolled">Enrolled</label>
                <input type="radio" name="enrolled" id= "pending" value="<?= $row['Pending']; ?>">
                    <label for = "pending">Pending</label><br>
                    
                    <label for="civil_status">Civil Status:</label><br>
                <input type="radio" id="single" name="civil_status" value="single">
                    <label for = "single">Single</label><br>
                <input type="radio" id="married" name="civil_status" value="married"> 
                    <label for = "married">Married</label><br>
                <input type="radio" id="complicated" name="civil_status" value="complicated">  
                    <label for = "complicated">Complicated</label><br>

                <input type="submit" name="update" value="update">
            </form>
            <?php endif; ?>
    </main>
</body>
</html>