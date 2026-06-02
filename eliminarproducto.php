<?php
include 'conexion.php';
$id = $_GET['id_producto']; 
$sql = "DELETE FROM producto WHERE id = '$id'"; 
mysqli_query($conexion, $sql);
?>
