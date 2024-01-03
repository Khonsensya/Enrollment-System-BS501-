<?php
    #Starting template
    #Current branch has no database

    session_start();
    error_reporting(E_ALL & ~ E_NOTICE);
    
    class Controller
    {
        function __construct()
        {
            $this -> processDataVerification();
        }

        function processDataVerification()
        {
            switch($_POST["action"])
            {
                case "save_into_db":
                    $person_id = $_POST['person_id'];
                    $lastName = $_POST['lastName'];
                    $firstName = $_POST['firstName'];
                    $lmiddleName = $_POST['middleName'];
                    $email = $_POST['email'];
                    $phoneNum = $_POST['phoneNum'];

                    $db_temp = mysqli_connect('localhost', 'root', '', 'sample_db');

                    $sql_query = "
                        SELECT * FROM persons_list
                    ";
                    $res1 = mysqli_query($db_temp, $sql_query);

                    $row = mysqli_fetch_array($res1, MYSQLI_ASSOC);
                    if($row)
                    {
                        echo json_encode(array("type" => "error", "message" => "Person ID already exists."));
                    }

                    else
                    {
                        $query = "
                            INSERT INTO persons_list_temp
                            VALUES
                                (
                                    '$person_id',
                                    '$lastName',
                                    '$firstName',
                                    '$email',
                                    '$phoneNum',
                                )
                        ";
                    }

                    break;
            }
        }
    }
?>
