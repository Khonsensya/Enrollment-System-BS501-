<?php 
	include $_SERVER['DOCUMENT_ROOT'] . '/Enrollment-System-BS501-/config.php';
    $_navbar1 = [
        ['title' => 'About', 
         'link' => BASE_URL . 'src/modules/about.php',],
        ['title' => 'Programs', 
         'link' => BASE_URL . 'src/modules/programs.php',],
        ['title' => 'Admission', 
         'link' => BASE_URL . 'src/modules/admission.php'],
        ['title' => 'Contact Us', 
         'link' => BASE_URL . 'src/modules/contact_us.php',],
        ];
		
    $_navbar2 = [
        ['title' => 'Dashboard', 
         'link' => BASE_URL . 'src/modules/dashboard.php',],
        ['title' => 'Application', 
         'link' => BASE_URL . 'src/modules/application.php',],
        ['title' => 'Student List', 
         'link' => BASE_URL . 'src/modules/studentlist.php',],
        ['title' => 'Policy', 
         'link' => '#',],
         ['title' => 'Help', 
          'link' => '#',],
        ];
?>