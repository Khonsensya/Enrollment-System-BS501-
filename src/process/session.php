<?php
session_start();
if (isset($_SESSION['user_id'])) {
    require $_C2_mysql_connection_php;

    $result = $mysqli->query("SELECT * FROM users WHERE User_ID = {$_SESSION['user_id']}");
    $user = $result->fetch_assoc();
}
if (isset($_SESSION['Firstname'])) {
    require $_C2_mysql_connection_php;

    $result = $mysqli->query("SELECT First_Name FROM users WHERE User_ID = {$_SESSION['Firstname']}");
    $user = $result->fetch_assoc();
}
