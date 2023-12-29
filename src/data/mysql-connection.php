<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "enrollment_system";
//$port = 4306;

//create connection
$mysqli = new mysqli($servername, $username, $password, $database) or die("Connection failed: " . $mysqli->connect_error);
