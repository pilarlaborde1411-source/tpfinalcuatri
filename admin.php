<?php
    include 'conexion.php';
    $resultadoCarrusel = $conexion -> query("SELECT * FROM carrusel");
    if($_SERVER["REQUEST_METHOD"] === "POST" ){
        // Editar carrusel
        if(isset($_POST['editarImagen'])){
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
            }   
            $conexion->close();
        }
        // Agregar producto
        if(isset($_POST['agregarProducto'])) {
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $categoria = $_POST['categoria'];
            $color = $_POST['color'];
            $img = null;
            $carpeta = $_POST['carpeta'];

            if(isset($_FILES['agregar']) && $_FILES['agregar']['error'] == 0) {
                if(!is_dir($carpeta)) {
                    mkdir($carpeta,0777,true);
                }
                $img = time() . "_" . $_FILES['agregar']['name'];
                $imgf = $carpeta . "/" . $img;
                move_uploaded_file($_FILES['agregar']['tmp_name'], $imgf);
            }

            $sql_insert = "INSERT INTO producto (nombre, precio, imagen, id_categoria, color) VALUES ('$nombre', '$precio', '$img', '$categoria', '$color')";
            if ($conexion->query($sql_insert) === TRUE) {
                header('Location: index.php');
                exit;
            } 
            else {
                echo "Error al agregar el producto." . $conexion->error;
            }
            $conexion->close();
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 col-lg-2 bg-dark text-white sideBar p-3">
            <div class="d-grid gap-2 mt-4">
                <button class="btn btn-outline-light" onclick="mostrar('carrusel')">Editar carrusel</button>
                <button class="btn btn-outline-light" onclick="mostrar('agregarProducto')">Agregar producto</button>
                <button class="btn btn-outline-light" onclick="mostrar('verProductos')">Ver productos</button>
            </div>
        </div>
        <!-- Contenido -->
        <div class="col-md-9 col-lg-10 p-4">
            <!-- Editar carrusel -->
            <div id="carrusel" class="formulario card p-4 mt-3">
                <h3 class="font-monospace">Editar carrusel</h3>
                <?php while($row = $resultadoCarrusel->fetch_assoc()):?>
                <div>
                    <?php if($row['imagen']){?>
                        <img style='width: 30%; height: 20%;' src='data:image/webp;base64,<?php echo base64_encode($row['imagen'])?>' alt='imagen'>
                        <form action='' method='POST' style='width: 30%;' enctype="multipart/form-data">
                            <input hidden type='number' name='id' class='form-control mb-2' value='<?php echo ($row['id'])?>'>
                            <label for="editar">Insertar nueva imágen</label> <br>
                            <input type="file" accept="image/*" name="editar" required class="form-control mb-2" style="height: 38px;"> <br>
                            <button type='submit' name="editarImagen" class="btn btn-outline-dark">Enviar</button>
                        </form>
                    <?php } ?>
                </div>
                <?php endwhile; ?>
            </div>
            <!-- Agregar productos -->
            <div id="agregarProducto" class="formulario card p-4 mt-3">
                <div style="width: 100%; height:25%;">
                    <h3 class="font-monospace">Agregar producto</h3>
                    <form action="" method="POST" enctype="multipart/form-data" style="width: 100%;">
                        <input type="text" name="nombre" class="form-control mb-2 mb-2" style="height: 38px;" placeholder="Ingresa el nombre">
                        <input type="text" name="precio" class="form-control mb-2 mb-2" style="height: 38px;" placeholder="Ingresa el precio">
                        <label for="agregar" class="mb-2">Insertar imágen</label>
                        <input type="file" accept="image/*" name="agregar" class="form-control mb-2 mb-2" style="height: 38px;"> <br>
                        <select name="carpeta" class="mb-2" style="height: 38px;"> 
                            <option value="im/pantalones/">Pantalón</option>
                            <option value="im/remeras/">Remeras</option>
                            <option value="im/calzados/">Calzados</option>
                            <option value="im/camperas/">Camperas</option>
                        </select>
                        <label for="categoria" class="mb-2">Seleccionar categoría</label>
                        <select name="categoria" class="mb-2" style="height: 38px;"> 
                            <?php 
                                $sql_select = "SELECT * FROM categoria";
                                $resultadoCategoria = mysqli_query($conexion, $sql_select);
                                while ($row = $resultadoCategoria->fetch_assoc()): ?>
                                    <option value="<?= $row['id']?>"><?= $row['nombre']?></option>
                                <?php endwhile; ?>
                        </select>
                        <input type="text" name="color" class="form-control mb-2 mb-2" style="height: 38px;" placeholder="Ingresa el color">
                        <button type="submit" name="agregarProducto" class="btn btn-outline-dark">Enviar</button>
                    </form>
                </div>
            </div>
            <!-- Ver prodcutos -->
            <div id="verProductos" class="formulario card p-4 mt-3">
                <h3>Ver productos</h3>
                <?php $resultadoProducto = $conexion -> query("SELECT * FROM producto"); while($row = $resultadoProducto->fetch_assoc()):?>
                <div>
                    <?php if($row['imagen']) { ?>
                       <img style='width: 30%; height: 20%;' src='im/<?php echo $row['imagen']?>' alt='imagen'>
                        <p>nombre: <?=htmlspecialchars($row['nombre'])?></p>
                        <p> precio: <?=htmlspecialchars($row['precio'])?></p>
                        <p> categoria: <?=htmlspecialchars($row['id_categoria'])?></p>
                        <p> color: <?=htmlspecialchars($row['color'])?></p>
                        <form method="POST" action="editar.php" style='width: 30%;' enctype="multipart/form-data">
                            <button class="btn btn-outline-dark" name="id" type="submit" value="<?=$row['id']?>"><img src="im/iconos/gmail.png"></button>
                        </form>
                        <form method="POST" action="borrar.php" style='width: 30%;' enctype="multipart/form-data">
                            <button class="btn btn-outline-dark" name="delete" type="submit" value="<?=$row['id']?>"><img src="im/iconos/gmail.png"></button>
                        </form>
                    <?php } ?>
                </div>
                <?php endwhile; ?>
            <div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
<?php 
    $conexion->close();
?>