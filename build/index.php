<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment System</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/temp.css">
</head>
<body>
    <div>
        <h1>List of Enrolled Students</h1>
        <br>
        <button>New</button>
        <br><br>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "enrollment_system";

                    //create connection
                    $connection = new \mysqli($servername, $username, $password, $dbname);
                        //check connection 
                        if ($connection->connect_error) {
                            die("Connection failed: ". $connection->connect_error);
                        }
                    //read all row from database table
                    $sql = "SELECT * FROM students";
                    $result = $connection->query($sql);
                        if (!$result) {
                            die("Invalid query: ". $connection->error);
                        }
                        
                    //read data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "
                            <tr>
                                <td>$row[id]</td>
                                <td>$row[name]</td>
                                <td>$row[email]</td>
                                <td>$row[created_at]</td>
                                <td>
                                    <button>Edit</button>
                                    <button>Delete</button>
                                </td>
                            </tr>
                        ";
                    }
                ?>

                
            </tbody>
        </table>
    </div>
</body>
</html>