<?php
include 'conexion.php';
if($_SERVER["REQUEST_METHOD"] === "POST" ) {
    $id = $_POST['borrar'];
    $conexion->query("DELETE FROM carrusel WHERE id = $id");
    header('Location: index.php');
    exit;
    $conexion->close();
}
?>