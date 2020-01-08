<?php
require 'init.php';
$data = [
    'first_name' => 'Daniel',
    'middle_name' => 'Sigalat',
    'last_name' => 'Gomez'
];
$studentID = '20200108090117';
$where = [
    'students_id' => $studentID
];
Dbcon::query_update('students', $data, $where);
//EOF