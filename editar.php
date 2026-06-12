<?php
include 'conexion.php';
$id = $_POST['id'];

$sql = "SELECT * FROM producto WHERE id ='".$id."'";
$resultado = mysqli_query($conexion,$sql);
$row = mysqli_fetch_assoc($resultado);
if ($resultado) {
    echo "<div style='width: 100%; height:25%;'>
        <form action='' method='POST' enctype='multipart/form-data' style='width: 100%;'>
            <input type='text' name='nombre' class='form-control mb-2 mb-2' style='height: 38px;' value=".htmlspecialchars($row['nombre']).">
            <input type='text' name='precio' class='form-control mb-2 mb-2' style='height: 38px;' value=".htmlspecialchars($row['precio']).">
            <label for='editar' class='mb-2'>Insertar imágen</label>
            <input type='file' accept=".htmlspecialchars($row['imagen'])." name='editar' class='form-control mb-2 mb-2' style='height: 38px;'> <br>
            <select name='carpeta' class='mb-2' style='height: 38px;'> 
                <option value=".htmlspecialchars($row['id_categoria'])."></option>
            </select>
            <input type='text' name='color' class='form-control mb-2 mb-2' style='height: 38px;' value=".htmlspecialchars($row['imagen']).">
            <button type='submit' name='editar' class='btn btn-outline-dark'>Enviar</button>
        </form>
    </div>";
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar producto</title>
</head>
<body>
    
</html>