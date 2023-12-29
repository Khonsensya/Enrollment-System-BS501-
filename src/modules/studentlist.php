<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duck Cover En Roll</title>
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../css/module.css">
    <link rel="stylesheet" href="../css/button.css">
    <link rel="stylesheet" href="../css/icon.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/alert.css">
</head>
<body>
    <?php require_once '../process/action.php'; ?>
    <nav class="navbar2">
        <?php include '../data/navbar-data.php';?>
        <input type="checkbox" id="toggle">
        <label for="toggle" class="toggler">
            <i class="pwd-snd-button">=</i>
        </label>
        <div class="logo">
            <h1>Dashboard</h1>
        </div>
        <ul class="navlist">
            <?php foreach ($_navbar2 as $navbar2_item) : ?>
                <li><a href="<?php echo $navbar2_item['link']; ?>">
                <?php echo $navbar2_item['title']; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </nav>
    <br>
    <section class="studentlist1 container">
        <h1>Student List</h1>
        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>User_ID</td>
                    <td>Name</td>
                    <td>Gender</td>
                    <td>Birthdate</td>
                    <td>Place_of_Birth</td>
                    <td>Citizenship</td>
                    <td>Status</td>
                    <td>Number</td>
                    <td>Email</td>
                    <td>Address</td>
                    <td>Enrolled</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    include '../data/mysql-connection.php';
                    //read all row from database table
                    $sql = "SELECT * FROM student_info";
                    $result = $mysqli->query($sql);
                        if (!$result) {
                            die("Invalid query: ". $mysqli->error);
                    }
                ?>
                        
                <?php
                    while ($row = $result->fetch_assoc()):?>

                            <tr>
                                <td><?php echo $row['Student_ID'] ?></td>
                                <td><?php echo $row['User_ID'] ?></td>
                                <td><?php echo $row['Last_Name'], ', ', $row['First_Name'], ' ', $row['Middle_Initial'] ?></td>
                                <td><?php echo $row['Gender'] ?></td>
                                <td><?php echo $row['Birthdate'] ?></td>
                                <td><?php echo $row['Place_of_Birth'] ?></td>
                                <td><?php echo $row['Citizenship'] ?></td>
                                <td><?php echo $row['Civil_Status'] ?></td>
                                <td><?php echo $row['Mobile_Number'] ?></td>
                                <td><?php echo $row['Email'] ?></td>
                                <td><?php echo $row['Address'] ?></td>
                                <td><?php echo $row['Enrolled'] ?></td>
                                <td class="list-actions">
                                    <div>
                                        <a href="dashboard.php?edit=<?php echo $row['Student_ID']; ?>" class="btn1">Edit</a>
                                        <a href="?delete=<?php echo $row['Student_ID']; ?>" class="btn1">Delete</a>
                                    </div>
                                </td>
                            </tr>

                    <?php endwhile ?>
            </tbody>
        </table>
    </section>
</body>
</html>

