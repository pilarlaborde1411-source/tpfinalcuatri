<?php
    include 'conexion.php';
    $resultado = $conexion -> query("SELECT * FROM carrusel");
    if($_SERVER["REQUEST_METHOD"] === "POST" ){
        $newid = $_POST['id'];
        if(isset($_FILES['editar']) && $_FILES['editar']['error'] == 0){ //Pregunta si existe un archivo a través de post y se subió correctamente.
            $imagen = addslashes(file_get_contents($_FILES['editar']['tmp_name'])); //Toma la imágen temporal y la guarda en una varibale.
            $sql_update = "UPDATE carrusel SET imagen = '$imagen' WHERE id = '$newid'";
            if ($conexion->query($sql_update) === TRUE) {
                header('Location: index.php');
                exit;
            } else {
                echo "Error al editar el carrusel: " . $conexion->error;
            }
            $conexion->close();
        }   
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <title>Editar Carrusel</title>
</head>
<body>
    <div class="m-1">
        <h3 class="font-monospace">Editar carrusel</h3>
        <?php while($row = $resultado->fetch_assoc()):?>
            <div >
                <?php if($row['imagen']){?>
                    <img style='width: 30%; height: 20%;' src='data:image/webp;base64,<?php echo base64_encode($row['imagen'])?>' alt='imagen'>
                    <form action='' method='POST' style='width: 30%;' enctype="multipart/form-data">
                        <input hidden type='number' name='id' value='<?php echo ($row['id'])?>'>
                        <label for="editar">Insertar nueva imágen</label> <br>
                        <input type="file" accept="image/*" name="editar" required class="mb-2" style="height: 38px;"> <br>
                        <button type='submit' class="btn btn-outline-dark">Enviar</button>
                    </form>
                    <form action=''></form>
                    <form action='borrar.php' method='POST' style='width: 30%;'>
                        <input hidden type='number' name='borrar' value='<?php echo ($row['id'])?>'>
                        <button type='submit' name="borrarCarrusel" class="btn btn-outline-dark">Borrar</button>
                    </form>
                <?php } ?>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
<?php 
    $conexion->close();
?>