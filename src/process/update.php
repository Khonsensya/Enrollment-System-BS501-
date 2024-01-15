<?php include '../../../config.php'; ?>
<?php include '../../data/mysql-connection.php'; ?>

<?php

//edit profile.php
if (isset($_POST['update'])) {
    $id = $_GET['update'];

    $fname_edit = $_POST['firstName'];
    $mname_edit = $_POST['lastName'];
    $lname_edit = $_POST['middleInitial'];
    $sex_edit = $_POST['sex'];
    $bdate_edit = $_POST['birthdate'];
    $pob_edit = $_POST['birthplace'];
    $citizenship_edit = $_POST['citizenship'];
    $civilstat_edit = $_POST['civilStatus'];
    $mobilenum_edit = $_POST['mobileNumber'];
    $email_edit = $_POST['email'];
    $address_edit = $_POST['address'];
    $enrolled_edit = $_POST['enrollmentStatus'];

    $mysqli->query("UPDATE student_info SET First_Name = $fname_edit, Middle_Initial = $mname_edit, Last_Name = $lname_edit, Gender = $sex_edit, Birthdate = $bdate_edit, Place_of_Birth = $pob_edit, Citizenship = $citizenship_edit, Civil_Status = $civilstat_edit, Mobile_Number = $mobilenum_edit, Email = $email_edit, Address = $address_edit, Enrolled = $enrolled_edit WHERE Student_ID = '$id'") or die("Connection failed:");
    $mysqli->close();
}
