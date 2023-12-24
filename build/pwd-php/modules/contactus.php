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
<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] . BASE_URL . 'pwd-php/data.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . BASE_URL . 'pwd-php/components/navbar.php'; ?>
	
    <?php
		$contact_us = [
			'title' => 'Luv U University',
			'paragraphs' => [
				'Location: ',
				'Phone: ',
			]
		];
	?> 
	<section class="contact-section">
		<br>
        <h2><?php echo $contact_us['title']; ?></h2>
        <?php foreach ($contact_us['paragraphs'] as $paragraph) : ?>
            <p><?php echo $paragraph; ?></p>
        <?php endforeach; ?>
    </section>
</body>
</html>