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

// Query to get gender distribution from the database
$genderQuery = "SELECT gender, COUNT(*) AS genderCount FROM student_info GROUP BY gender";
$genderResult = $conn->query($genderQuery);

// Query to get the count of students who have applied
$appliedQuery = "SELECT COUNT(*) AS appliedCount FROM student_profile";
$appliedResult = $conn->query($appliedQuery);
$appliedCount = ($appliedResult->num_rows > 0) ? $appliedResult->fetch_assoc()["appliedCount"] : 0;


// Query to get student information
$studentInfoQuery = "SELECT Student_ID, CONCAT(First_Name, ' ', Middle_Initial, ' ', Last_Name) AS full_name, Email FROM student_info";
$studentInfoResult = $conn->query($studentInfoQuery);


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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            <div class="dashboard1">

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

            <div class="dashboard2">

                <div class="statistic">
                    <h2 class="card-text">Enrollment Statistic</h2>
                    <canvas id="enrollmentChart" width="180" height="300"></canvas>
                </div>
                <div class="statistic">
                    <h2 class="card-text">Gender</h2>
                    <canvas id="genderChart" width="180" height="300"></canvas>
                </div>
                <div class="statistic">
                    <h2 class="card-text">Applied</h2>
                    <canvas id="applicationChart" width="180" height="300"></canvas>
                </div>
    
            </div>

            <div class="dashboard3">
                <div class="statistic2">
                    <h2 class="card-text">Students in Courses</h2>
                    <canvas id="courseChart" width="600" height="300"></canvas>
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

        <nav class="category-nav">
            <ul>
                List of Students
            </ul>
        </nav>

        <table class="student-table">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $studentInfoResult->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['Student_ID'] . "</td>";
                    echo "<td>" . $row['full_name'] . "</td>";
                    echo "<td>" . $row['Email'] . "</td>";
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

    // Get data from PHP variables
    var genderData = <?php echo json_encode($genderResult->fetch_all(MYSQLI_ASSOC)); ?>;

    // Get canvas element
    var genderCanvas = document.getElementById('genderChart').getContext('2d');

    // Extract labels and data for the chart
    var genderLabels = genderData.map(item => item.gender);
    var genderCounts = genderData.map(item => item.genderCount);

    // Create pie chart
    var genderChart = new Chart(genderCanvas, {
        type: 'pie',
        data: {
            labels: genderLabels,
            datasets: [{
                data: genderCounts,
                backgroundColor: ['#FF6384', '#36A2EB'] // Customize as needed
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
            labels: ["IT", "BM", "HM", "TM", "Engineering", "Arts & Sciences", "Maritime"],
            datasets: [{
                label: "Number of Students",
                data: [/* Add your data here */],
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
                        beginAtZero: true,
                        precision: 0, // Display integers only
                    }
                }
            }
        });
    });
    </script>
    

</body>
</html>