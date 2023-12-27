<?php 
    include '../data/mysql-connection.php';
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
            $mysqli->query("INSERT INTO student_profile (id, firstname, middleinitial, lastname, program, sex, citizenship, civilstatus, dateofbirth, placeofbirth, mobilenumber, email, myaddress) VALUES ('0', '$FirstName', '$MiddleName', '$LastName', '$Program', '$Sex', '$Citizenship', '$CivilStatus', '$DateofBirth', '$BirthPlace', '$MobileNumber', '$Email', '$MyAddress')") or die("Connection failed:");
                $mysqli -> close();

        header("Refresh:0; url=../modules/dashboard.php");
                

    }
    if(isset($_GET['delete'])) {
        $id = $_GET['delete'];

            $mysqli->query("DELETE FROM student_profile WHERE id='$id'") or die("Connection failed:");
                $mysqli -> close();
            
        header("Refresh:0; url=../modules/studentlist.php");
    }
