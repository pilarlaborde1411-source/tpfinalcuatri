<?php
    include 'conexion.php';
    if($_SERVER["REQUEST_METHOD"] === "POST" ) {
        /*$idCarrito = $_POST['id_carrito'];
        $sql = "DELETE FROM carrito WHERE id = '$idCarrito'";
        if ($conexion->query($sql) === TRUE) {
            echo "OK";
        } else {
            echo "Error al " . $conexion->error;
        }
        $conexion->close();*/
        $idProducto = $_POST['eliminarProducto'];
        $sql_deleteProducto = "DELETE FROM producto WHERE id = '$idProducto'";
        if ($conexion->query($sql_deleteProducto) === TRUE) {
            header('Location: admin.php');
        } else {
            echo "Error al borrar el producto: " . $conexion->error;
        }
        $conexion->close();
    }   
?>