<?php
    include 'conexion.php';
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $talle = $_POST['talle'];
        $categoria = $_POST['categoria'];
        $img = null;
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
    <div style="width: 100%; height:25%;" >
        <h3 class="font-monospace">Agregar producto</h3>
        <form action="panel.php" method="POST" style="width: 100%; ">
            <input type="text" name="nombre" class="mb-2" style="height: 38px;" placeholder="Ingresa el nombre">
            <input type="text" name="precio" class="mb-2" style="height: 38px;" placeholder="Ingresa el precio">
            <label for="talle" class="mb-2">Seleccionar talle</label>
            <select name="talle" class="mb-2" style="height: 38px;">
                <?php 
                $sql_select = "SELECT * FROM talle";
                $resultado = mysqli_query($conexion, $sql_select);
                while ($row = $resultado->fetch_assoc()): ?>
                   <option value="<?$row['id']?>"><?$row['talle']?></option>
                <?php endwhile; ?>
            </select>
            <label for="categoria" class="mb-2">Seleccionar categoría</label>
            <select name="categoria" class="mb-2" style="height: 38px;"> 
                <option value="pantalon">Pantalon</option>
                <option value="remera">Remera</option>
                <option value="top">Top</option>
                <option value="campera">Campera</option>
                <option value="zapatos">Zapatos</option>
                <option value="joyas">Joyas</option>
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