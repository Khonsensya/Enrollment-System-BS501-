<?php
if(empty($_POST['fname'])) {
    die("Name is required");
}
if(empty($_POST['lname'])) {
    die("Name is required");
}
if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}
if(strlen($_POST['password']) < 8) {
    die("Password must be at least 8 Characters");
}
if(!preg_match("/[a-z]/i", $_POST['password'])) {
    die("Password must contain atleast one letter");
}
if(!preg_match("/[0-9]/i", $_POST['password'])) {
    die("Password must contain atleast one number");
}
if($_POST['password'] != $_POST['confirmpassword']) {
    die("Password and Confirm Password is not the same");
}

$password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

require '../data/mysql-connection.php';
$sql = "INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)";

$stmt = $mysqli->stmt_init();
if (!$stmt->prepare($sql)) {
    die("SQL error" . $mysqli->error);
}

$stmt->bind_param("ssss",
                  $_POST['fname'],
                  $_POST['lname'],
                  $_POST['email'],
                  $password_hash);
if($stmt->execute()) {
    header("Location: ../modules/login.php");
    exit();
} else {
    if($mysqli->errno === 1062) {
        die("email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}