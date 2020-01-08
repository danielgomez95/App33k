<?php
$Outline->addCSS('styles/css/main.css');
$Outline->header('Login');
include 'loginHTML.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $validate = User::authenticateUser(Util::getParam('username'), Util::getParam('password'));
    if (isset($validate)) {
        Util::redirect('segments/admin/dashboard/dashboard.php');
    } else {
        echo 'invalid';
    }
}
//EOF