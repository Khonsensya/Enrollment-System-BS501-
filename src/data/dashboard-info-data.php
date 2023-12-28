<?php include $_SERVER['DOCUMENT_ROOT'] . BASE_URL . 'src/database/db_connection.php'; ?>

<?php
	date_default_timezone_set('Asia/Manila');
	$currentDateTime = date('Y-m-d H:i:s');
    $currentUser = 'User Name'; // Placeholder Name
	function getCurrentSemester() {
		$currentYear = date('Y');
		$nextYear = $currentYear + 1;
		$currentMonth = date('n');

		if ($currentMonth >= 9 || $currentMonth <= 1) { // September - December, January
			return 'SY' . $currentYear . $nextYear . '-1T';
		} 
		elseif ($currentMonth >= 2 && $currentMonth <= 7) { // February - July
			return 'SY' . $currentYear . '-2T';
		} 
		else {
			return 'Semestral Break';
		}
	}
	$dashboard_info = [
		['code' => 'total_students', 'info_heading' => 'Total Students' . '<br>' . $totalStudents],
		['code' => 'semester_info', 'info_heading' => 'Current Semester' . '<br>' . getCurrentSemester()],
		['code' => 'welcome_user', 'info_heading' => 'Welcome, ' . $currentUser . '<br>' . $currentDateTime],
	];
?>