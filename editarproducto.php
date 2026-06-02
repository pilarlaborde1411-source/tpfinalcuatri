<?php
include('conexion.php');
if($_SERVER['REQUEST_METHOD'] == "POST"){
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $talle = $_POST['talle'];
        $categoria = $_POST['categoria'];
        $img = null;
        if(isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
            $carpeta = "im/";
            if(!is_dir($carpeta)) {
                mkdir($carpeta,0777,true);
            }
            $img = time() . "_" . $_FILES['img']['name'];
            $imgf = $carpeta . $img;
            move_uploaded_file($_FILES['img']['tmp_name'], $imgf);
        }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="editarproducto.php" method="POST" style="width: 100%;">
            <input type="text" name="nombre" class="mb-2" style="height: 38px;" placeholder="Ingresa el nombre">
            <input type="text" name="precio" class="mb-2" style="height: 38px;" placeholder="Ingresa el precio">
            <label for="talle" class="mb-2">Seleccionar talle</label>
            <select name="talle" class="mb-2" style="height: 38px;">
                <?php 
                    $sql_select = "SELECT * FROM talle";
                    $resultado = mysqli_query($conexion, $sql_select);
                    while ($row = $resultado->fetch_assoc()): ?>
                        <option value="<?= $row['id']?>"><?= $row['talle']?></option>
                    <?php endwhile; ?>
            </select>
            <label for="categoria" class="mb-2">Seleccionar categoría</label>
            <select name="categoria" class="mb-2" style="height: 38px;"> 
                <?php 
                    $sql_select = "SELECT * FROM categoria";
                    $resultado = mysqli_query($conexion, $sql_select);
                    while ($row = $resultado->fetch_assoc()): ?>
                        <option value="<?= $row['id']?>"><?= $row['nombre']?></option>
                    <?php endwhile; ?>
            </select>
            <label for="img" class="mb-2">Seleccionar imagen</label>
            <input type="file" name="img" class="mb-2" style="height: 38px;">
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </form>
    </body>
</html>