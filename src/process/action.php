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

        //read all row from database table
            $mysqli->query("INSERT INTO student_info (First_Name, Last_Name, Middle_Initial, Gender, Birthdate, Place_of_Birth, Citizenship, Civil_Status, Mobile_Number, Email, Address) VALUES ( '$FirstName', '$MiddleName', '$LastName', '$Program', '$Sex', '$Citizenship', '$CivilStatus', '$DateofBirth', '$BirthPlace', '$MobileNumber', '$Email', '$MyAddress')") or die("Connection failed:");

        header("Refresh:0; url=../modules/dashboard/dashboard.php");
                

    }
    if(isset($_GET['delete'])) {
        $id = $_GET['delete'];

            $mysqli->query("DELETE FROM student_info WHERE Student_ID='$id'") or die("Connection failed:");


        header("Refresh:0; url=../dashboard/studentlist.php");
    }

    if(isset($_GET['approve'])) {
        $id = $_GET['approve'];

            $mysqli->query("UPDATE student_info SET Status = '1' WHERE Student_ID='$id'") or die("Connection failed:");
            

        header("Refresh:0; url=../dashboard/applicants.php");
    }

    if(isset($_GET['reject'])) {
        $id = $_GET['reject'];

            $mysqli->query("UPDATE student_info SET Status = '2' WHERE Student_ID='$id'") or die("Connection failed:");
            

        header("Refresh:0; url=../dashboard/applicants.php");
    }
