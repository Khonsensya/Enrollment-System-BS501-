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
    <section class="studentlist1">
        <h1>Student List</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Program</th>
                    <th>Sex</th>

                    <th>Citizenship</th>
                    <th>Civil Status</th>
                    <th>Date of Birth</th>
                    <th>Birth Place</th>
                    <th>Mobile Number</th>
                    <th>Email</th>
                    <th>Address</th>

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
                            die("Invalid query: ". $mysqli->error);
                    }
                ?>
                        
                <?php
                    while ($row = $result->fetch_assoc()):?>

                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['lastname'], ', ', $row['firstname'], ' ', $row['middleinitial'] ?></td>
                                <td><?php echo $row['program'] ?></td>
                                <td><?php echo $row['sex'] ?></td>
                                <td><?php echo $row['citizenship'] ?></td>
                                <td><?php echo $row['civilstatus'] ?></td>
                                <td><?php echo $row['dateofbirth'] ?></td>
                                <td><?php echo $row['placeofbirth'] ?></td>
                                <td><?php echo $row['mobilenumber'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['myaddress'] ?></td>
                                <td class="list-actions">
                                    <div>
                                        <a href="?delete=<?php echo $row['id']; ?>" class="btn1">Edit</a>
                                        <a href="?delete=<?php echo $row['id']; ?>" class="btn1">Delete</a>
                                    </div>
                                </td>
                            </tr>

                    <?php endwhile ?>
            </tbody>
        </table>
    </section>
</body>
</html>

