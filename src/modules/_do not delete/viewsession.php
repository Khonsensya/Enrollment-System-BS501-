<head>
    <link rel="stylesheet" href="../css/dashboard">
</head>
<body>
    <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>School Year</th>
                    <th>Semester</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include '../data/mysql-connection.php';
                    //read all row from database table
                    $sql = "SELECT * FROM student_profile";
                    $result = $mysqli->query($sql);
                        if (!$result) {
                            die("Invalid query: ". $connection->error);
                    }
                ?>
                        
                <?php
                    include '../process/create-student.php';
                    while ($row = $result->fetch_assoc()):?>

                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td class="list-actions">
                                    <div>
                                        <a href="?deletestudent=<?php echo $row['id']; ?>" class="btn1">Delete</a>
                                    </div>
                                </td>
                            </tr>

                    <?php endwhile ?>
            </tbody>
        </table>
</body>