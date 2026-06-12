<?php
    include 'conexion.php';
    session_start();

    $idProducto = $_GET['id'];  //toma la id del producto
    $idUsuario = $_SESSION['id_usuario']; //toma la id del usuario

    $sql = "INSERT INTO carrito(`id-usuario`, `id-producto`, cantidad) VALUES ('$idUsuario', '$idProducto', 1)"; //guarda el producto en la tabla carrito

    $conexion->query($sql);
    header("Location: index.php");
    exit;
?>