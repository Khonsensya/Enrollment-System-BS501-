<!-- PHP INCLUDE / REQUIRE LINKS ARE HERE -->
<?php include '../../../config.php'; ?>
<?php include $_C2_data_php; ?>
<?php include $_C2_session_php; ?>
<?php include $_C2_get_date_php; ?>
<?php include $_C2_mysql_connection_php; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_Head_Title; ?></title>
    <link rel="icon" href="<?php echo $_C2_Head_Icon; ?>"/>
    <!-- CSS STYLESHEETS LINKS ARE HERE -->
    <link rel="stylesheet" href="<?php echo $_C2_style_css; ?>">
    <link rel="stylesheet" href="<?php echo $_C2_module_css; ?>">
    <link rel="stylesheet" href="<?php echo $_C2_button_css; ?>">
    <link rel="stylesheet" href="<?php echo $_C2_icon_css; ?>">
    <link rel="stylesheet" href="<?php echo $_C2_navbar_css; ?>">
    <link rel="stylesheet" href="<?php echo $_C2_forms_css; ?>">

</head>

<body>
    <?php if(isset($user)): ?>
        <?php include $_C2_dashboard_navbar_php; ?>

        <?php if($user['User_Type'] == 'Student'): ?>
            <main class="dashboard1 container">
                <section class="content1">
                    <h3>Welcome <?= htmlspecialchars($user['First_Name']) ?>,</h3>
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
                </section>
	        </main>
        <?php elseif ($user['User_Type'] == 'Administrator'): ?>
            <main class="dashboard1 container">
                <section class="content1">
                    <h3>Welcome <?= htmlspecialchars($user['First_Name']) ?>,</h3>
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
                                    $Total_Users = $mysqli->query("SELECT COUNT(User_ID) as Total_Users FROM users") or die("Connection failed:");
                                    $display_Total_Users = $Total_Users->fetch_assoc();
                                    echo $display_Total_Users['Total_Users'];
                                ?>
                            </h2>
                        </section>
                        <section class="summary-item">
                            <h4>Number of Enrolled</h4>
                            <h2>
                                <?php
                                    $Total_Enrolled = $mysqli->query("SELECT COUNT(Student_ID) as Total_Enrolled FROM student_info WHERE Enrolled = '1'") or die("Connection failed:");
                                    $display_Total_Enrolled = $Total_Enrolled->fetch_assoc();
                                    echo $display_Total_Enrolled['Total_Enrolled'];
                                ?>
                            </h2>
                        </section>
                        <?php $mysqli -> close(); ?>
                    </section>

                    <section>
                    <video width="100%" style="padding: 1rem 0;" controls loop autoplay>
                    <source src="../../assets/videos/ducks.mp4" type="video/mp4">
                        Your browser does not support HTML video.
                    </video>

                    <p>
                    Video courtesy of 
                    <a href="https://www.youtube.com/watch?v=oumjTrzd-Nc" target="_blank">Ducks</a>.
                    </p>
                    </section>
                </section>
            </main>
        <?php endif; ?>
    <?php else: ?>
        <div class="container">
            <h2>Please Login</h2>
            <a href="<?php echo $_C2_login ?>">Login</a>
        </div>
    <?php endif; ?>

    <script defer src="<?php echo $_C2_clock_js; ?>"></script>
</body>
</html>