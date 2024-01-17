<?php

$session_id = $_SESSION['user_id'];


// application.php
if (isset($_POST['save'])) {

    $FirstName = $_POST['firstName'];
    $MiddleName = $_POST['middleInitial'];
    $LastName = $_POST['lastName'];
    $Program = filter_input(INPUT_POST, 'program');
    $Sex = $_POST['sex'];
    $Citizenship = filter_input(INPUT_POST, 'citizenship');
    $CivilStatus = $_POST['civilStatus'];
    $DateofBirth = $_POST['dateOfBirth'];
    $BirthPlace = $_POST['birthPlace'];
    $MobileNumber = $_POST['mobileNumber'];
    $Email = $_POST['eMail'];
    $MyAddress = $_POST['myaddress'];

    $_SESSION['message'] = "?";
    $_SESSION['msg_type'] = "createdstudent";

    $mysqli->query("UPDATE student_info SET First_Name = '$FirstName', Last_Name = '$LastName', Middle_Initial = '$MiddleName', Gender = '$Sex', Birthdate = '$DateofBirth', Place_of_Birth = '$BirthPlace', Citizenship = '$Citizenship', Civil_Status = '$CivilStatus', Mobile_Number = '$MobileNumber', Email = '$Email', Address = '$MyAddress' WHERE User_ID='$session_id'") or die("Connection failed:");
    $mysqli->query("UPDATE users SET Applied='applied' WHERE User_ID = '$session_id'") or die("Connection failed:");
    $mysqli->query("INSERT INTO student_apply VALUES ('$session_id', '$Program', 'pending')") or die("Connection failed:");
    $mysqli->close();
    header("Refresh:0; url=./dashboard.php");
}
// enrollment.php
if (isset($_POST['enroll'])) {

    $Student_ID = $_POST['studentid'];
    $program = $mysqli->query("SELECT * FROM student_apply WHERE Apply_ID='$session_id'") or die("Connection failed:");
    $program_details = $program->fetch_assoc();
    $_program = $program_details['Program'];
    $transaction_number = '250' . $session_id . '505';
    $PaymentType = filter_input(INPUT_POST, 'paymenttype');
    if ($PaymentType == 'monthly') {
        $AmountDue = '5000';
    } elseif ($PaymentType == 'semestral') {
        $AmountDue = '25000';
    } else {
        $AmountDue = '30000';
    }
    $Payment = $_POST['amount'];


    if ($AmountDue == $Payment) {
        $mysqli->query("UPDATE student_info SET Enrolled = '1' WHERE User_ID = '$session_id'") or die("Connection failed:");
        $mysqli->query("INSERT INTO enrollment_transaction (Transaction_ID, Student_ID, Course_ID, Payment_Type, Amount_Due, Payment) VALUES ('$transaction_number', '$session_id','$_program', '$PaymentType', '$AmountDue', '$Payment')") or die("Connection failed:");
    }
    $mysqli->close();
    header("Refresh:0; url=./dashboard.php");
}
// studentlist.php
if (isset($_GET['view'])) {
    $id = $_GET['view'];

    $student = $mysqli->query("SELECT * FROM student_info WHERE Student_ID='$id'") or die("Connection failed:");
    $student_details = $student->fetch_assoc();
}
// studentlist.php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $mysqli->query("DELETE FROM student_info WHERE Student_ID='$id'") or die("Connection failed:");
    $mysqli->query("DELETE FROM student_profile WHERE Student_ID='$id'") or die("Connection failed:");
}
// applicants.php
if (isset($_GET['approve'])) {
    $id = $_GET['approve'];

    $program = $mysqli->query("SELECT * FROM student_apply WHERE Apply_ID='$id'") or die("Connection failed:");
    $program_details = $program->fetch_assoc();
    $_program = $program_details['Program'];
    $student_number = '05000' . $id;
    $mysqli->query("UPDATE student_info SET Status = '1' WHERE User_ID='$id'") or die("Connection failed:");
    $mysqli->query("UPDATE student_apply SET Status = 'accepted' WHERE Apply_ID='$id'") or die("Connection failed:");
    $mysqli->query("INSERT INTO student_profile (Student_Number, Student_ID, Course_ID) VALUES ('$student_number', '$id','$_program')") or die("Connection failed:");
    header("Refresh:0; url=../dashboard/applicants.php");
}
// applicants.php
if (isset($_GET['reject'])) {
    $id = $_GET['reject'];

    $mysqli->query("UPDATE student_info SET Status = '2' WHERE User_ID='$id'") or die("Connection failed:");
    $mysqli->query("UPDATE student_apply SET Status = 'rejected' WHERE Apply_ID='$id'") or die("Connection failed:");
    header("Refresh:0; url=../dashboard/applicants.php");
}

//edit profile.php for getting row id
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $profile = $mysqli->query("SELECT * FROM student_info WHERE Student_ID='$id'") or die("Connection failed:");
    $profile_details = $profile->fetch_assoc();
}

if (isset($_POST['update'])) {

    $firstName_edit = $_POST['firstName'];
    $lastName_edit = $_POST['lastName'];
    $middleInitial_edit = $_POST['middleInitial'];
    $sex_edit = $_POST['sex'];
    $birthdate_edit = $_POST['birthdate'];
    $placeofBirth_edit = $_POST['birthplace'];
    $citizenship_edit = $_POST['citizenship'];
    $civilStatus_edit = $_POST['civilStatus'];
    $mobileNumber_edit = $_POST['mobileNumber'];
    $email_edit = $_POST['email'];
    $address_edit = $_POST['address'];
    $enrolled_edit = $_POST['enrollmentStatus'];

    $mysqli->query("UPDATE student_info SET First_Name = '$firstName_edit', Last_Name = '$lastName_edit', Middle_Initial = '$middleInitial_edit', Gender = '$sex_edit', Birthdate = '$birthdate_edit', Place_of_Birth = '$placeofBirth_edit', Citizenship = '$citizenship_edit', Civil_Status = '$civilStatus_edit', Mobile_Number = '$mobileNumber_edit', Email = '$email_edit', Address = '$address_edit', Enrolled = '$enrolled_edit' WHERE Student_ID='$id'") or die("Connection failed:");
    $mysqli->close();

    header("Refresh:0; url=../dashboard/studentlist.php");
}
