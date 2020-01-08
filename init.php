<?php
// auto load all classes inside the class folder
spl_autoload_register(function ($class) {
    require_once "class/{$class}.php";
});

session_start();
$Outline = new Layout();
$css = [
    '../../styles/css/main.css',
    'https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'
];
$js = [
    'https://code.jquery.com/jquery-3.4.1.min.js',
    'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js',
    'https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js'
];

$Outline->addCSS($css);
$Outline->addJS($js);
//EOF