<?php
    include 'conexion.php';
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

        $sql_insert = "INSERT INTO productos (nombre, precio, id_talle, imagen, id_categoria) VALUES ('$nombre', '$precio', '$talle', '$categoria', '$img')";
        if ($db->query($sql_insert) === TRUE) {
            header('Location: agregar.php');
            exit;
        } 
        else {
            echo "Error al agregar el producto." . $db->error;
        }
        $db->close();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <title>Agregar producto</title>
</head>
<body>
    <div style="width: 100%; height:25%;">
        <h3 class="font-monospace">Agregar producto</h3>
        <form action="agregar.php" method="POST" style="width: 100%;">
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
            <label for="img" class="mb-2">Insertar imágen</label>
            <input type="file" accept="im/*" name="img" class="mb-2" style="height: 38px;"> <br>
            <button type="submit" class="btn btn-outline-dark">Enviar</button>
        </form>
    </div>
</body>
</html>
<?php 
    $conexion->close();
?>