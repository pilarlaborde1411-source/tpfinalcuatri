<?php
include 'conexion.php';
session_start();

    if($_SERVER["REQUEST_METHOD"] === "POST" ) {
        //borrar del carrito
            if(isset($_POST['idCarrito'])){
                $idCarrito = $_POST['idCarrito'];
                $sql = "DELETE FROM carrito WHERE id = '$idCarrito'";
                if ($conexion->query($sql) === TRUE) {
                    echo "productp";
                } else {
                    echo "Error: " . $conexion->error;
                }
            }
        
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