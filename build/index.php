<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
        #  This PHP code serves as the DATABASE portion of the Finals Project: School Enrollment System.
        #
        #  Code Collaborators:
        #  1. CONGGAS, Emman Isaac D.
        #  2. GEREÑA, James Bernard O.

        //Setting parameters for MySQL/SSMS connection (Placeholder, may be modified).
        $server = "localhost";
        $username = "bs501_enroll";
        $password = "admin";
        $database = "enrollmentDB";

        $connect = mysqli_connect($server, $username, $password);

        //Check connection
        if(!$connect)
        {
          die("Connection interrupted or lost! " . mysqli_connect_error());
        }
        
        echo "Connection successful ! >(^ o ^)>";
        mysqli_close();
    ?>
</body>

</html>
