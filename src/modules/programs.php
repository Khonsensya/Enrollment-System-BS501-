<?php include $_SERVER['DOCUMENT_ROOT'] . '/Enrollment-System-BS501-/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duck Cover En Roll</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/style.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/src/css/animation.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/src/css/banner.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/src/css/button.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/src/css/footer.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/src/css/navbar.css">

</head>
<body>
	<nav class="navbar1">
        <?php include $_SERVER['DOCUMENT_ROOT'] . BASE_URL . 'src/data/navbar-data.php'; ?>
        <input type="checkbox" id="toggle">
        <label for="toggle" class="toggler">
            <i class="pwd-snd-button">=</i>
        </label>
        <div class="logo">
			<a href="/Enrollment-System-BS501-/">
				<h1>DCERU</h1>
			</a>
		</div>
        <ul class="navlist">
            <?php foreach ($_navbar1 as $navbar1_item) : ?>
                <li><a href="<?php echo $navbar1_item['link']; ?>">
                <?php echo $navbar1_item['title']; ?></a></li>
            <?php endforeach; ?>
            <a href="login.php" class="btn1">Login</a>
        </ul>
    </nav>
	<div>
        <h1>Academic Programs</h1>
		<br>

        <?php
			// Placeholders
            $program_categories = [
                'Computer Studies' => [
                    ['course_name' => 'Computer Science', 'course_description' => 'Explore the world of programming and algorithms.'],
                    ['course_name' => 'Information Technology (IT)', 'course_description' => 'Focus on the application of technology to solve business problems.'],
                ],
                'Business & Administration' => [
                    ['course_name' => 'Business Administration', 'course_description' => 'Learn about business strategies and management.'],
                    ['course_name' => 'Economics', 'course_description' => 'Understand economic systems and principles.'],
                ],
                'Engineering' => [
                    ['course_name' => 'Computer Engineering', 'course_description' => 'Design and develop computer systems and networks.'],
                    ['course_name' => 'Civil Engineering', 'course_description' => 'Plan, design, and oversee construction projects.'],
                    ['course_name' => 'Mechanical Engineering', 'course_description' => 'Explore the design and manufacturing of mechanical systems.'],
                ],
            ];
			
            foreach ($program_categories as $category => $categoryPrograms) {
                echo "
                    <div class='category'>
                        <h2>$category</h2>
						<br>
                        <ul>";
                foreach ($categoryPrograms as $program) {
                    $course_name = $program['course_name'];
                    echo "
                            <li>
                                <h3>$course_name</h3>
                                <p>{$program['course_description']}</p>
								<br>
                            </li>";
                }
                echo "
                        </ul>
                    </div>";
            }
        ?>
    </div>
</body>
</html>