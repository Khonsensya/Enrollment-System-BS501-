<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment System</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php 
        function OpenCon() {
            $dbhost = "localhost";
            $dbuser = "root";
            $dbpass = "1234";
            $db = "example";
            $conn = new mysqli($dbhost, $dbuser, $dbpass,$dbname) or die("Connect failed: %s\n". $conn -> error);
                return $conn;
        }
        function CloseCon($conn) {
            $conn -> close();
        }
    ?>
</body>
</html>