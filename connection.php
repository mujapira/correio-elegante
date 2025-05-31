<?php
date_default_timezone_set('America/Sao_Paulo');

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'usbw');
define('DB_NAME', 'correio');

$connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($connection->connect_error) {
    die("connection error: " . $connection->connect_error);
}

$connection->set_charset("utf8mb4");
?>