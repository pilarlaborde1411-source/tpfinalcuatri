<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bubba";

$db = new mysqli($servername, $username, $password, $dbname);

if($db->connect_error) {
    die("Conexión fallida: " . $db->connect_error);
}
?>