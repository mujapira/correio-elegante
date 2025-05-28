<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'seu_usuario');
define('DB_PASSWORD', 'sua_senha');
define('DB_NAME', 'seu_banco_de_dados');

$connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($connection->connect_error) {
    die("connection error: " . $connection->connect_error);
}

$connection->set_charset("utf8mb4");
?>