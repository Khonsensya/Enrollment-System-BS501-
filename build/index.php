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
        #    This PHP code serves as the DATABASE portion of the Finals Project: School Enrollment System.
        #
        #    Code Collaborators:
        #    1. CONGGAS, Emman Isaac D.
        #    2. GEREÑA, James Bernard O.

        //Setting parameters for MySQL connection (Placeholder, may be modified).
        function sqlConnect()
            {
                $db_host = "localhost";
                $db_user = "root";
                $db_password = "";
                $db_name = "mydbsample_conggas";

                $toConnect = mysqli_connect($db_host, $db_user, $db_password, $db_name);

                if(!$toConnect)
                {
                    die("Connection failed. ^(>A<)^". mysqli_connect_error());
                }

                echo "Connected successfully! >(^o^)>";
            }

        function sqlClose()
            {
                mysqli_close($GLOBALS['toConnect']);
            }
    ?>
</body>

</html>
