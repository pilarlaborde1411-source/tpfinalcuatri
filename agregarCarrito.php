<?php
    include 'conexion.php';
    session_start();

    $idProducto = $_GET['id'];  //toma la id del producto
    $idUsuario = $_GET['id_usuario']; //toma la id del usuario

    $sql = "INSERT INTO carrito(id_usuario, id_producto, cantidad) VALUES ('$idProducto', '$idUsuario')"; //guarda el producto en la tabla carrito

    $conexion->query($sql);
    header("Location: index.php");
?>