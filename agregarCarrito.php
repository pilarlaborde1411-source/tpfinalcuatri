<?php
    include 'conexion.php';
    session_start();

    $idProducto = $_GET['id'];  //toma la id del producto
    $idUsuario = $_SESSION['id_usuario']; //toma la id del usuario

    $contenidoCarrito = "SELECT * FROM carrito WHERE `id-usuario` = '$idUsuario' AND `id-producto` = '$idProducto'";
    $resultado = $conexion->query($contenidoCarrito);

    if($resultado->num_rows > 0){ //history.back vuelve a la pagina de donde vino el usuario
        echo " <script> alert('El producto ya se agrego al carrito'); 
        history.back();
        </script>";
    } else {
        $sql = "INSERT INTO carrito(`id-usuario`, `id-producto`, cantidad) VALUES ('$idUsuario', '$idProducto', 1)"; //guarda el producto en la tabla carrito 
    $conexion->query($sql);
    header("Location: index.php");
    exit;
    }
?>