<?php
include '../../init.php';
const TABLE_STUDENT = 'students';
$studentID = Util::getParam('studentID');
switch (Util::getParam('case')) {
    case 'DELETE':
        foreach ($studentID as $id) {
            $where = [
                'students_id' => $id
            ];
            Dbcon::query_delete(TABLE_STUDENT, $where);
        }
        break;
    case 'GET_NAMES':
        $Student = Student::Load($studentID);
        $data = [
            'firstName' => $Student->getName(),
            'middleName' => $Student->getMiddleName(),
            'lastName' => $Student->getLastName()
        ];
        echo json_encode($data);
        break;
    case 'UPDATE':
        $data = [
            'first_name' => Util::getParam('firstName'),
            'middle_name' => Util::getParam('middleName'),
            'last_name' => Util::getParam('lastName'),
            'age' => Util::getParam('age'),
            'email_address' => Util::getParam('emailAddress'),
            'birthday' => Util::getParam('birthday'),
            'contact_number' => Util::getParam('contactNumber'),
            'address' => Util::getParam('address'),
        ];
        $where = [
            'students_id' => $studentID
        ];
        Dbcon::query_update(TABLE_STUDENT, $data, $where);
        break;
}
//EOF