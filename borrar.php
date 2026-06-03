<?php
include 'conexion.php';
if($_SERVER["REQUEST_METHOD"] === "POST" ) {
    if(isset($_POST['borrarCarrusel'])) {
        $idCarrusel = $_POST['borrar'];
        $conexion->query("DELETE FROM carrusel WHERE id = $idCarrusel");
        header('Location: index.php');
        exit;
        $conexion->close();
    }
    if(isset($_GET['idCarrito'])) {
        $idCarrito = $_GET['idCarrito'];
        $sql = ;
        $conexion->query("DELETE FROM carrito WHERE id = '$id'");
        $conexion->close();
    }
}
?>