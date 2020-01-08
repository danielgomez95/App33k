<?php
include '../sideNav/sideNav.php';
$Outline->addCSS('../../../styles/css/main.css');
$Outline->header('Admin');
$StudentsProfile = Student::LoadArray();
include 'studentProfileHTML.php';
$inputs = [
    'firstName' => 'text',
    'middleName' => 'text',
    'lastName' => 'text',
    'email' => 'text',
    'age' => 'number',
    'birthday' => 'date',
    'contact' => 'number',
    'address' => 'text'
];
$modal = new Modal($inputs, true, 'Student Details');
$Outline->addJS('../../../scripts/js/studentProfile.js');
$Outline->footer();
//EOF