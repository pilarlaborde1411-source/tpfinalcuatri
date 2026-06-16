<?php
session_start();
include 'conexion.php';
if($_SERVER["REQUEST_METHOD"] === "POST" ) {
    $idCarrito = $_POST['idCarrito'];
    $sql = "DELETE FROM carrito WHERE id = '$idCarrito'";
    if ($conexion->query($sql_update) === TRUE) {
        echo "OK";
    } else {
        echo "Error al editar el carrusel: " . $conexion->error;
    }
    $conexion->close();
}   
?>