
<?php include '../../process/session.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duck Cover En Roll</title>
    <link rel="stylesheet" href="../../../style.css">
    <link rel="stylesheet" href="../../css/module.css">
    <link rel="stylesheet" href="../../css/button.css">
    <link rel="stylesheet" href="../../css/icon.css">
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/dashboard.css">

</head>

<body>
    <?php include '../../data/data.php'; ?>
    <?php include '../../data/mysql-connection.php'; ?>

    <?php if(isset($user)): ?>
    <nav class="navbar2">
        <input type="checkbox" id="toggle">
        <label for="toggle" class="toggler">
            <i class="pwd-snd-button">=</i>
        </label>
        <div class="logo">
            <h1>Dashboard</h1>
        </div>
        <ul class="navlist">
            <?php
                if($user['User_Type'] == 'Student') {
                    $_navbar_2_list = $_navbar_2_student;
                } elseif ($user['User_Type'] == 'Administrator') {
                    $_navbar_2_list = $_navbar_2_admin;
                }
            ?>
            <?php foreach ($_navbar_2_list as $navbar_2_item) : ?>
                <li><a href="<?php echo $navbar_2_item['link']; ?>">
                        <?php echo $navbar_2_item['title']; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </nav>
        <?php include '../../process/get_date.php';?>
        <?php if($user['User_Type'] == 'Student'): ?>
            <div class="dashboard1 container">
                <main class="content1">
                    <h3>Hello <?= htmlspecialchars($user['First_Name']) ?>,</h3>
                    <ul class="datetime">
                        <li><?php echo $currentDateTime; ?></li>
                        <li><p> : </p></li>
                        <li><p id="clock"></p></li>
                    </ul>
                    <hr>
                    <section class="summary">
                        <section class="summary-item">
                            <h4>Academic Year</h4>
                            <h2>2023-2024</h2>
                        </section>
                        <section class="summary-item">
                            <h4>Semester</h4>
                            <h2>1st Semester</h2>
                        </section>
                        <section class="summary-item">
                            <h4>Branch</h4>
                            <h2>Muñoz-EDSA</h2>
                        </section>
                        <section class="summary-item">
                            <h4>Enrolled</h4>
                            <h2>Yes</h2>
                        </section>
                    </section>
                </main>
	        </div>
        <?php elseif ($user['User_Type'] == 'Administrator'): ?>
            <div class="dashboard1 container">
            <main class="content1">
                <h3>Hello <?= htmlspecialchars($user['First_Name']) ?>,</h3>
                <ul class="datetime">
                    <li><?php echo $currentDateTime; ?></li>
                    <li><p> : </p></li>
                    <li><p id="clock"></p></li>
                </ul>
                <hr>
                <section class="summary">
                    <section class="summary-item">
                        <h4>Academic Year</h4>
                        <h2>2023-2024</h2>
                    </section>
                    <section class="summary-item">
                        <h4>Semester</h4>
                        <h2>1st Semester</h2>
                    </section>
                    <section class="summary-item">
                        <h4>Number of Students</h4>
                        <h2>
                            <?php
                                echo $mysqli->query("SELECT COUNT(User_ID) FROM users") or die("Connection failed:");
                            ?>
                        </h2>
                    </section>
                    <section class="summary-item">
                        <h4>Number of Enrolled</h4>
                        <h2>
                            <?php
                                echo $mysqli->query("SELECT COUNT(Student_ID) FROM student_info WHERE Enrolled = '1'") or die("Connection failed:");
                            ?>
                        </h2>
                    </section>
                    <?php $mysqli -> close(); ?>
                </section>
            </main>
        </div>
        <?php endif; ?>
    <?php else: ?>
        <div class="container">
            <a href="./login.php">Login</a>
        </div>
    <?php endif; ?>

    <script defer src="../../js/clock.js"></script>
</body>
</html>