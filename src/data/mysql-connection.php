<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "enrollment_system";
        
        //create connection
        $mysqli = new mysqli($servername, $username, $password, $database) or die("Connection failed: ". $connection->connect_error);