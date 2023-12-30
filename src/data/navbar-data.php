<<<<<<< Updated upstream
<?php 
    $_navbar1 = [
        ['title' => 'About', 
         'link' => '#',],
        ['title' => 'Programs', 
         'link' => '#',],
        ['title' => 'Admission', 
         'link' => '#',],
        ['title' => 'Contact Us', 
         'link' => '#',],
        ];
?>
=======
<?php
include $_SERVER['DOCUMENT_ROOT'] . '\Files\Enrollment-System-BS501-\config.php';
$_navbar1 = [
    [
        'title' => 'About',
        'link' => '/src/modules/about.php',
    ],
    [
        'title' => 'Programs',
        'link' =>  '/src/modules/programs.php',
    ],
    [
        'title' => 'Admission',
        'link' =>  '/src/modules/admission.php'
    ],
    [
        'title' => 'Contact Us',
        'link' =>  '/src/modules/contact_us.php',
    ],
];
>>>>>>> Stashed changes

<?php 
    $_navbar2 = [
        ['title' => 'Dashboard', 
         'link' => './dashboard.php',],
        ['title' => 'Application', 
         'link' => './application.php',],
        ['title' => 'Student List', 
         'link' => './studentlist.php',],
        ['title' => 'Viewlist', 
         'link' => './viewlist.php',],
        ['title' => 'Policy', 
         'link' => '#',],
         ['title' => 'Help', 
          'link' => '#',],
        ];
?>