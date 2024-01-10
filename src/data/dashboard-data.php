<?php
require $_C2_mysql_connection_php;

// total users
$query_total_users = $mysqli->query("SELECT COUNT(User_ID) as Total_Users FROM student_info") or die("Connection failed:");
$assoc_total_users = $query_total_users->fetch_assoc();
$display_total_users = $assoc_total_users['Total_Users'];

// total enrolled
$query_total_enrolled = $mysqli->query("SELECT COUNT(Student_ID) as Total_Enrolled FROM student_info WHERE Enrolled = '1'") or die("Connection failed:");
$assoc_total_enrolled = $query_total_enrolled->fetch_assoc();
$display_total_enrolled = $assoc_total_enrolled['Total_Enrolled'];

/*
        This file will contain all the arrays of data that are used althroughout the enrollment system, editing the values within this file will change the output of the system, the following are the list of arrays places in this file:
            1. SUMMARY ITEM
    */

/*
        1. SUMMARY ITEM
            a. Title
            b. Output
    */
$_summary_item_1 = [
    [
        /* a */
        'title' => 'Academic Year',
        /* b */ 'output' => '2023-2024'
    ],
    [
        /* a */
        'title' => 'Semester',
        /* b */ 'output' =>  '1st Semester'
    ],
    [
        /* a */
        'title' => 'Number of Students',
        /* b */ 'output' =>  $display_total_users
    ],
    [
        /* a */
        'title' => 'Number of Enrollees',
        /* b */ 'output' =>  $display_total_enrolled
    ],
];

$_summary_item_2 = [
    [
        /* a */
        'title' => 'Academic Year',
        /* b */ 'output' => '2023-2024'
    ],
    [
        /* a */
        'title' => 'Semester',
        /* b */ 'output' =>  '1st Semester'
    ],
    [
        /* a */
        'title' => 'Branch',
        /* b */ 'output' =>  'Muñoz-EDSA'
    ],
    [
        /* a */
        'title' => 'Enrolled',
        /* b */ 'output' =>  'Yes'
    ],
];
