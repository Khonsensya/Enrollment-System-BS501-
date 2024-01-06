<?php
// Replace these values with your actual database credentials
$servername = "localhost";
$username = "root";
$password = "";
$database = "enrollment_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get courses from the database
$courseSql = "SELECT Course_ID, Course_Name, Course_Category FROM school_courses";
$courseResults = $conn->query($courseSql);

// Query to get the count of users
$userQuery = "SELECT COUNT(*) AS userCount FROM student_info";
$userResult = $conn->query($userQuery);
$userCount = $userResult->fetch_assoc()['userCount'];

// Query to get the count of courses
$courseQuery = "SELECT COUNT(*) AS courseCount FROM school_courses";
$courseResult = $conn->query($courseQuery);
$courseCount = $courseResult->fetch_assoc()['courseCount'];

// Query to get the count of sections
$sectionQuery = "SELECT COUNT(*) AS sectionCount FROM school_sections";
$sectionResult = $conn->query($sectionQuery);
$sectionCount = $sectionResult->fetch_assoc()['sectionCount'];

// Query to get the count of enrolled users
$enrolledQuery = "SELECT COUNT(*) AS enrolledCount FROM student_info WHERE ENROLLED = '1' ";
$enrolledResult = $conn->query($enrolledQuery);
$enrolledCount = $enrolledResult->fetch_assoc()['enrolledCount'];

// Query to get the count of students who have applied
$appliedQuery = "SELECT COUNT(*) AS appliedCount FROM student_profile";
$appliedResult = $conn->query($appliedQuery);
$appliedCount = ($appliedResult->num_rows > 0) ? $appliedResult->fetch_assoc()["appliedCount"] : 0;

// Query to get bar graph data
$barGraphQuery = "
    SELECT sc.Course_Category, COUNT(sp.Section_ID) AS StudentCount
    FROM student_profile sp
    JOIN school_sections ss ON sp.Section_ID = ss.Section_ID
    JOIN school_courses sc ON ss.Course_ID = sc.Course_ID
    GROUP BY sc.Course_Category";

$barGraphResults = $conn->query($barGraphQuery);
$barChartData = array();

while ($row = $barGraphResults->fetch_assoc()) {
    $barChartData[] = $row;
}

// Close the database connection
$conn->close();

?>

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
    <link rel="stylesheet" href="../css/new_dashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0"></script>
<body>
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
    <div class="container">
        <div class="content1">
        <nav class="category-nav">
            <ul>
                Statistics Overview
            </ul>
        </nav>
            <div class="dashboard_1">

                <div class="statistic">
                    <h2 class="card-text">Students</h2>
                    <p id="usersCount"><?php echo $userCount; ?></p>
                </div>
                <div class="statistic">
                    <h2 class="card-text">Courses Available</h2>
                    <p id="courseCount"><?php echo $courseCount; ?></p>
                </div>
                <div class="statistic">
                    <h2 class="card-text">Sections</h2>
                    <p id="sectionCount"><?php echo $sectionCount; ?></p>
                </div>
            </div>
            <div class ="container2">
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
                        <canvas id="courseChart" ></canvas>
                    </div>
                </div>
            </div>
        </div>
        <hr>
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

    </div>


    <script>
    
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

    document.addEventListener("DOMContentLoaded", function () {
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

    document.addEventListener("DOMContentLoaded", function () {
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