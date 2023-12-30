<?php
    session_start();
    if(isset($_SESSION['user_id'])) {
        require '../../data/mysql-connection.php';

        $sql = "SELECT * FROM users WHERE User_ID = {$_SESSION['user_id']}";
        $result = $mysqli->query($sql);
        $user = $result->fetch_assoc();
    }
?>