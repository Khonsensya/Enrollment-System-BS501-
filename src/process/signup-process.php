<?php
if (empty($_POST['fname'])) { // fname should be required, no null values
    die("Name is required");
}
if (empty($_POST['lname'])) { // lname should be required, no null values
    die("Name is required");
}
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) { // email must be a valid email
    die("Valid email is required");
}
if (strlen($_POST['password']) < 8) { // password should contain atleast 8 characters and above
    die("Password must be at least 8 Characters");
}
if (!preg_match("/[a-z]/i", $_POST['password'])) { // password should contain atleast one letter
    die("Password must contain atleast one letter");
}
if (!preg_match("/[0-9]/i", $_POST['password'])) { // password should contain atleast one number
    die("Password must contain atleast one number");
}
if ($_POST['password'] != $_POST['confirmpassword']) { // password should be equal to confirmpassword
    die("Password and Confirm Password is not the same");
}

$password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT); // hashing the password

require $_C2_mysql_connection_php; // sql connection
$sql = "INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)";

$stmt = $mysqli->stmt_init();
if (!$stmt->prepare($sql)) {
    die("SQL error" . $mysqli->error);
}

$stmt->bind_param(
    "ssss",
    $_POST['fname'],
    $_POST['lname'],
    $_POST['email'],
    $password_hash
);
if ($stmt->execute()) {
    header("Location: ../modules/login.php"); // after signing up, user will be redirected to login page
    exit();
} else {
    if ($mysqli->errno === 1062) { // no repeating emails, one email per account -- just a specific error code for duplicated email
        die("email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}
