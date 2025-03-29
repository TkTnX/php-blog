<?php
// DB SETTINGS

define('DB_HOST', 'database');
define("DB_NAME", "microblog");
define("DB_USER", "admin");
define("DB_PASS", "admin");



// Путь к корню сайта
define("ROOT", dirname(__FILE__) . "/");
// Домен сайта
define("HOST", "http://" . $_SERVER['HTTP_HOST'] . '/');


$allowed_file_types = [
    "image/jpeg",
    "image/png",
    "image/gif"
];

$allowed_extention = [
    'jpg',
    'jpeg',
    'png',
    'gif',
];

$MAX_UPLOAD_COVER_SIZE = 10 * 1024 * 1024;