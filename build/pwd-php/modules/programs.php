<?php include $_SERVER['DOCUMENT_ROOT'] . '/Enrollment-System-BS501-/build/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luv U University</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>pwd-css/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>pwd-css/modules.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>pwd-css/components.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>pwd-css/responsive.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>pwd-css/animation.css">
</head>
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . BASE_URL . 'pwd-php/data.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . BASE_URL . 'pwd-php/components/navbar.php'; ?>
	<div>
        <h1>Academic Programs</h1>
		<br>

        <?php
			// Placeholders?
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
			
			// Wala pang php files
            $link_programs = [
                'Computer Science' => 'cs.php',
                'Information Technology (IT)' => 'it.php',
                'Business Administration' => 'ba.php',
                'Economics' => 'econ.php',
                'Computer Engineering' => 'comp_eng.php',
                'Civil Engineering' => 'civ_eng.php',
                'Mechanical Engineering' => 'me.php',
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
								<br>
                                <h3><a href='{$link_programs[$course_name]}'>$course_name</a></h3>
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