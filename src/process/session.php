<?php
    session_start();
    if(isset($_SESSION['user_id'])) {
        require '../../data/mysql-connection.php';

        $sql = "SELECT * FROM users WHERE User_ID = {$_SESSION['user_id']}";
        $result = $mysqli->query($sql);
        $user = $result->fetch_assoc();
    }
    if(isset($_SESSION['Firstname'])) {
        require '../../data/mysql-connection.php';

        $sql = "SELECT First_Name FROM users WHERE User_ID = {$_SESSION['Firstname']}";
        $result = $mysqli->query($sql);
        $user = $result->fetch_assoc();
    }
?>