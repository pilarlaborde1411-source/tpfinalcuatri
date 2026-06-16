<?php
include 'conexion.php';
if($_SERVER["REQUEST_METHOD"] === "POST" ) { //el carrito usa metofo get, no post (pq usa href)
    if($_SERVER["REQUES_METHOD"]=="POST") {
        $idCarrito = $_POST['idCarrito'];
        $sql = "DELETE FROM carrito WHERE id = '$idCarrito'";
        if ($conexion->query($sql_update) === TRUE) {
            //algo
        } else {
            echo "Error al editar el carrusel: " . $conexion->error;
        }
        $conexion->close();
    }   
}
?>