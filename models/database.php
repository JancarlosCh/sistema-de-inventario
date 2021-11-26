<?php
define('HOST', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DATABASE', 'tienda_online');

$connection = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);

if ($connection->connect_errno) {
    printf("Falló la conexión: %s\n", $connection->connect_error);
    exit();
}
?>

