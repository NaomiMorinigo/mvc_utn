<?php
$host = 'localhost';
$dbname = 'pizzeria';
$username = 'root';
$password = '';

$db = new mysqli($host, $username, $password, $dbname);

if ($db->connect_error) {
    die("La conexión a la base de datos falló: " . $db->connect_error);
}
?>
