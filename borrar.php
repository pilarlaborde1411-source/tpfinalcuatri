<?php
include 'conexion.php';
if($_SERVER["REQUEST_METHOD"] === "POST" ) {
    if(isset($_GET['idCarrito'])) {
        $idCarrito = $_GET['idCarrito'];
        $conexion->query("DELETE FROM carrito WHERE id = '$id'");
        if ($conexion->query($sql_update) === TRUE) {
            //algo
        } else {
            echo "Error al editar el carrusel: " . $conexion->error;
        }
        $conexion->close();
    }   
}
?>