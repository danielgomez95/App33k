<?php
include '../../init.php';
$Outline->header('Register');
include 'registerHTML.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentID = date('YmdHms');
    $password = rand(1000, 9999);
    $data = [
        'students_id' => $studentID,
        'first_name' => Util::getParam('firstName'),
        'middle_name' => Util::getParam('middleName'),
        'last_name' => Util::getParam('lastName'),
        'address' => Util::getParam('address'),
        'contact_number' => Util::getParam('contactNumber'),
        'age' => Util::getParam('age'),
        'birthday' => Util::getParam('birthday'),
        'email_address' => Util::getParam('emailAddress'),
        'password' => $password
    ];
    Dbcon::query_insert('students', $data);
}
//EOF