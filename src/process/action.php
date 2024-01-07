<?php 
    include '../../data/mysql-connection.php';
    
    if(isset($_POST['save'])) { 
        
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
        $session_id = $_SESSION['user_id'];

        //read all row from database table
            $mysqli->query("UPDATE student_info SET First_Name = '$FirstName', Middle_Initial = '$MiddleName', Last_Name = '$LastName', Gender = '$Sex' WHERE User_ID = '$session_id'") or die("Connection failed:");
            $mysqli -> close();

        header("Refresh:0; url=../modules/dashboard/dashboard.php");
                

    }
    if(isset($_GET['delete'])) {
        $id = $_GET['delete'];

            $mysqli->query("DELETE FROM student_info WHERE Student_ID='$id'") or die("Connection failed:");
                $mysqli -> close();
            
        header("Refresh:0; url=../dashboard/studentlist.php");
    }

    //edit profile.php for getting row id
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
            
            $mysqli->query("SELECT First_Name, Last_Name, Middle_Initial, Gender, Birthdate, Place_of_Birth, Citizenship, Civil_Status, Mobile_Number, Email, Address FROM student_info WHERE Student_ID = '$id'");

        header("Refresh:0; url=../dashboard/edit_profile.php");
        
    }

    //edit profile.php
    if (isset($_POST['update'])) {

        $fname_edit = $_POST['fname'];
        $mname_edit = $_POST['lname'];
        $lname_edit = $_POST['mname'];
        $sex_edit = $_POST['sex'];
        $bdate_edit = $_POST['birthdate'];
        $pob_edit = $_POST['birthplace'];
        $citizenship_edit = $_POST['citizenship'];
        $civilstat_edit = $_POST['civilstatus'];
        $mobilenum_edit = $_POST['mobilenum'];
        $email_edit = $_POST['email'];
        $address_edit = $_POST['address'];
        $enrolled_edit = $_POST['enrolled'];

        $sql = "SELECT * FROM student_info WHERE Student_ID = $row_ID";
        $result = $mysqli->query($sql);
        
        $mysqli->query("UPDATE student_info SET First_Name = $fname_edit, Middle_Initial = $mname_edit, Last_Name = $lname_edit, Gender = $sex_edit, Birthdate = $bdate_edit, Place_of_Birth = $pob_edit, Citizenship = $citizenship_edit, Civil_Status = $civilstat_edit, Mobile_Number = $mobilenum_edit, Email = $email_edit, Address = $address_edit, Enrolled = $enrolled_edit WHERE Student_ID = $row_ID") or die("Connection failed:");

        $mysqli -> close();
    }

