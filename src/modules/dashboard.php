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
</head>
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
	
	<?php include '../process/get_date.php';?>
	<div class="dashboard1">
		<main class="content1">
			<h3>Hello User,</h3>
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
                    <h2>0</h2>
                </section>
                <section class="summary-item">
                    <h4>Students Enrolled</h4>
                    <h2>0</h2>
                </section>
            </section>
		</main>
	</div>
	
    <script defer src="../js/clock.js"></script>
</body>
</html>
