<!-- PHP INCLUDE / REQUIRE LINKS ARE HERE -->
<?php include '../../../config.php'; ?>
<?php include $_C2_data_php; ?>
<?php include $_C2_dashboard_data_php; ?>
<?php include $_C2_session_php; ?>
<?php include $_C2_get_date_php; ?>
<?php include $_C2_mysql_connection_php; ?>

<?php

// Query to get courses from the database
$courseSql = "SELECT Course_ID, Course_Name, Course_Category FROM school_courses";
$courseResults = $mysqli->query($courseSql);

// Query to get the count of users
$userQuery = "SELECT COUNT(*) AS userCount FROM student_info";
$userResult = $mysqli->query($userQuery);
$userCount = $userResult->fetch_assoc()['userCount'];

// Query to get the count of courses
$courseQuery = "SELECT COUNT(*) AS courseCount FROM school_courses";
$courseResult = $mysqli->query($courseQuery);
$courseCount = $courseResult->fetch_assoc()['courseCount'];

// Query to get the count of sections
$sectionQuery = "SELECT COUNT(*) AS sectionCount FROM school_sections";
$sectionResult = $mysqli->query($sectionQuery);
$sectionCount = $sectionResult->fetch_assoc()['sectionCount'];

// Query to get the count of enrolled users
$enrolledQuery = "SELECT COUNT(*) AS enrolledCount FROM student_info WHERE ENROLLED = '1' ";
$enrolledResult = $mysqli->query($enrolledQuery);
$enrolledCount = $enrolledResult->fetch_assoc()['enrolledCount'];

// Query to get the count of students who have applied
$appliedQuery = "SELECT COUNT(*) AS appliedCount FROM student_profile";
$appliedResult = $mysqli->query($appliedQuery);
$appliedCount = ($appliedResult->num_rows > 0) ? $appliedResult->fetch_assoc()["appliedCount"] : 0;

// Query to get bar graph data
$barGraphQuery = "
    SELECT sc.Course_Category, COUNT(sp.Section_ID) AS StudentCount
    FROM student_profile sp
    JOIN school_sections ss ON sp.Section_ID = ss.Section_ID
    JOIN school_courses sc ON ss.Course_ID = sc.Course_ID
    GROUP BY sc.Course_Category";

$barGraphResults = $mysqli->query($barGraphQuery);
$barChartData = array();

while ($row = $barGraphResults->fetch_assoc()) {
    $barChartData[] = $row;
}

// Close the database mysqlconnection
$mysqli->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_Head_Title; ?></title> <!-- title -->
    <link rel="icon" href="<?php echo $_C2_Head_Icon; ?>" /> <!-- icon -->
    <!-- CSS STYLESHEETS LINKS ARE HERE -->
    <link rel="stylesheet" href="<?php echo $_C2_style_css; ?>">
    <link rel="stylesheet" href="<?php echo $_C2_module_css; ?>">
    <link rel="stylesheet" href="<?php echo $_C2_button_css; ?>">
    <link rel="stylesheet" href="<?php echo $_C2_icon_css; ?>">
    <link rel="stylesheet" href="<?php echo $_C2_navbar_css; ?>">
    <link rel="stylesheet" href="<?php echo $_C2_forms_css; ?>">
    <!-- JS CDN REQUESTS ARE HERE -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0"></script> 

</head>

<body>
    <?php if (isset($user)) : ?>
        <?php include $_C2_dashboard_navbar_php; ?>
        <main class="dashboard1 container">
            <section class="content1">
                <h3>
                    Welcome
                    <?= htmlspecialchars($user['First_Name']) ?>,
                    <span class="<?php echo $greet_usertype = ($user['User_Type'] == 'Administrator') ? 'tag admin' : 'tag student'; ?>">
                        <?php echo $greet_usertype = ($user['User_Type'] == 'Administrator') ? '( Admin )' : '( Student )'; ?>
                    </span>
                </h3>
                <ul class="datetime">
                    <li><?php echo $currentDateTime; ?></li>
                    <li>
                        <p>:</p>
                    </li>
                    <li>
                        <p id="clock"></p>
                    </li>
                </ul>
                <hr class="title_line">

                <?php if ($user['User_Type'] == 'Administrator') : ?>
                    <section class="summary">
                        <?php foreach ($_summary_item_1 as $summaryitem1_item) : ?>
                            <section class="summary-item">
                                <h4><?php echo $summaryitem1_item['title']; ?></h4>
                                <h2><?php echo $summaryitem1_item['output']; ?></h2>
                            </section>
                        <?php endforeach; ?>
                    </section>
                    <!-- <section>
                        <video width="100%" style="padding: 1rem 0;" controls loop autoplay>
                            <source src="../../assets/videos/ducks.mp4" type="video/mp4">
                            Your browser does not support HTML video.
                        </video>

                        <p>
                            Video courtesy of
                            <a href="https://www.youtube.com/watch?v=oumjTrzd-Nc" target="_blank">Ducks</a>.
                        </p>
                    </section> -->

                    <div class="content1">
                        <nav class="category-nav">
                            <ul>
                                Statistics Overview
                            </ul>
                        </nav>
                        <!-- <div class="dashboard_1">

                            <div class="statistic">
                                <h2 class="card-text">Students</h2>
                                <p id="usersCount"><?php //echo $userCount; 
                                                    ?></p>
                            </div>
                            <div class="statistic">
                                <h2 class="card-text">Courses Available</h2>
                                <p id="courseCount"><?php //echo $courseCount; 
                                                    ?></p>
                            </div>
                            <div class="statistic">
                                <h2 class="card-text">Sections</h2>
                                <p id="sectionCount"><?php //echo $sectionCount; 
                                                        ?></p>
                            </div>
                        </div> -->
                        <div class="container2">
                            <div class="dashboard_2">

                                <div class="statistic">
                                    <h2 class="card-text">Enrollment Statistic</h2>
                                    <canvas id="enrollmentChart" width="180" height="300"></canvas>
                                </div>
                                <div class="statistic">
                                    <h2 class="card-text">Application</h2>
                                    <canvas id="applicationChart" width="180" height="300"></canvas>
                                </div>

                            </div>

                            <div class="dashboard_3">
                                <div class="statistic2">
                                    <h2 class="card-text">Number of Students by Department</h2>
                                    <canvas id="courseChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <nav class="category-nav">
                        <ul>
                            Courses
                        </ul>
                    </nav>

                    <table class="course-table">
                        <thead>
                            <tr>
                                <th>Course ID</th>
                                <th>Course Name</th>
                                <th>Course Category</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = $courseResults->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['Course_ID'] . "</td>";
                                echo "<td>" . $row['Course_Name'] . "</td>";
                                echo "<td>" . $row['Course_Category'] . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <section class="summary">
                        <?php foreach ($_summary_item_2 as $summaryitem2_item) : ?>
                            <section class="summary-item">
                                <h4><?php echo $summaryitem2_item['title']; ?></h4>
                                <h2><?php echo $summaryitem2_item['output']; ?></h2>
                            </section>
                        <?php endforeach; ?>
                    </section>
                <?php endif; ?>
            </section>
        </main>

    <?php else : ?>
        <div class="container">
            <h2>Please Login</h2>
            <a href="<?php echo $_C2_login ?>">Login</a>
        </div>
    <?php endif; ?>

    <script defer src="<?php echo $_C2_clock_js; ?>"></script>
    <script defer>
        // Get data from PHP variables
        var enrolledCount = <?php echo $enrolledCount; ?>;
        var notEnrolledCount = <?php echo ($userCount - $enrolledCount); ?>;

        // Get canvas element
        var enrollmentCanvas = document.getElementById('enrollmentChart').getContext('2d');

        // Create pie chart
        var enrollmentChart = new Chart(enrollmentCanvas, {
            type: 'pie',
            data: {
                labels: ['Enrolled', 'Not Enrolled'],
                datasets: [{
                    data: [enrolledCount, notEnrolledCount],
                    backgroundColor: ['#36A2EB', '#FF6384']
                }]
            }
        });

        document.addEventListener("DOMContentLoaded", function() {
            var appliedData = {
                labels: ["Applied", "Not Applied"],
                datasets: [{
                    data: [<?php echo $appliedCount; ?>, <?php echo $userCount - $appliedCount; ?>],
                    backgroundColor: ["#2ecc71", "#e74c3c"],
                }],
            };

            var appliedCanvas = document.getElementById("applicationChart").getContext("2d");

            var appliedChart = new Chart(appliedCanvas, {
                type: "pie",
                data: appliedData,
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            var courseData = {
                labels: <?php echo json_encode(array_column($barChartData, 'Course_Category')); ?>,
                datasets: [{
                    label: "Number of Students",
                    data: <?php echo json_encode(array_column($barChartData, 'StudentCount')); ?>,
                    backgroundColor: "#3498db", // Customize as needed
                    borderColor: "#2980b9", // Customize as needed
                    borderWidth: 1
                }]
            };

            var courseCanvas = document.getElementById("courseChart").getContext("2d");

            var courseChart = new Chart(courseCanvas, {
                type: "bar",
                data: courseData,
                options: {
                    scales: {
                        y: {

                            ticks: {
                                beginAtZero: false,
                                precision: 0
                            }

                        }
                    }
                }
            });
        });
    </script>
</body>

</html>