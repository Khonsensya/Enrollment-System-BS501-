<?php
	$db_config = [
		'host' => 'localhost',
		'dbname' => 'enrollment_system',
		'username' => 'root',
		'password' => '',
	];

	// called when dashboard.php is triggered
	if (basename($_SERVER['SCRIPT_FILENAME']) === 'dashboard.php') {
		try {
			$dsn = "mysql:host={$db_config['host']};dbname={$db_config['dbname']};charset=utf8";
			$pdo = new PDO($dsn, $db_config['username'], $db_config['password']);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$query = "SELECT COUNT(*) as total FROM users";
			$totalStudents = $pdo->query($query)->fetchColumn();
		} 
		catch (PDOException $e) {
			die("Error: " . $e->getMessage());
		}
	}
?>
