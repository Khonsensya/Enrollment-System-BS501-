<?php
session_start();
if (isset($_SESSION['user_id'])) {
    require $_C2_mysql_connection_php;

    $sql = "SELECT * FROM users WHERE User_ID = {$_SESSION['user_id']}";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
}
if (isset($_SESSION['Firstname'])) {
    require '../../data/mysql-connection.php';

    $sql = "SELECT First_Name FROM users 
        WHERE User_ID = {$_SESSION['Firstname']}";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
}
if (isset($_SESSION['user_id'])) {

    $sql = "SELECT Student_info.*, users.* FROM student_info 
        RIGHT JOIN users ON student_info.User_ID = users.User_ID
        WHERE student_info.USER_ID = {$_SESSION['user_id']}";

    $result = $mysqli->query($sql);
    $studentuser = $result->fetch_assoc();
}

if (isset($_GET['student_id'])) {
    $row_id = $_GET['student_id'];

    $sql = "SELECT Student_info.*, users.* From Student_info 
         RIGHT JOIN users ON Student_info.User_ID = users.User_ID
         WHERE Student_info.Student_ID = '$row_id'";

    $result = $mysqli->query($sql);
}
if (isset($_GET['student_edit'])) {
    $row_id = $_GET['student_edit'];

    $sql = "SELECT Student_info.*, users.* From Student_info 
         RIGHT JOIN users ON Student_info.User_ID = users.User_ID
         WHERE Student_info.Student_ID = '$row_id'";

    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
}
