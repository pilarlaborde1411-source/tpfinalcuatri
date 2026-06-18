<?php
include 'conexion.php';
session_start();

    if($_SERVER["REQUEST_METHOD"] === "POST" ) {
        //borrar del carrito
        $idProducto = $_POST['eliminarProducto'];
        $sql_deleteProducto = "DELETE FROM producto WHERE id = '$idProducto'";
        if ($conexion->query($sql_deleteProducto) === TRUE) {
            header('Location: admin.php');
        } else {
            echo "Error al borrar el producto: " . $conexion->error;
        }
        $conexion->close();
    } 
    
    if($_SERVER["REQUEST_METHOD"] === "GET" ){
        $idCarrito = $_GET['idCarrito'];
        $idUsuario = $_SESSION['id_usuario'];
        
        $sql = "DELETE FROM carrito WHERE id = '$idCarrito' AND `id-usuario` = '$idUsuario'";
        if ($conexion->query($sql) === TRUE) {
            echo "producto";
        } else {
            echo "Error: " . $conexion->error;
        }
    }

?>
<script src="script.js"></script> 