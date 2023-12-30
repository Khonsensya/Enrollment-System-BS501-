<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "enrollment_system";
//$port = 4306; If MySQL port is different

//create connection
$mysqli = new mysqli($servername, $username, $password, $database) or die("Connection failed: " . $mysqli->connect_error);
