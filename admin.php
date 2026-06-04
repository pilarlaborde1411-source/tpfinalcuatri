<?php
    include 'conexion.php';
    $resultado = $conexion -> query("SELECT * FROM carrusel");
    if($_SERVER["REQUEST_METHOD"] === "POST" ){
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
        if(isset($_POST['agregarProducto'])) {
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $categoria = $_POST['categoria'];
            $img = null;

            if(isset($_FILES['agregar']) && $_FILES['agregar']['error'] == 0) {
                $carpeta = "im/c";
                if(!is_dir($carpeta)) {
                    mkdir($carpeta,0777,true);
                }
                $img = time() . "_" . $_FILES['img']['name'];
                $imgf = $carpeta . $img;
                move_uploaded_file($_FILES['img']['tmp_name'], $imgf);
            }

            $sql_insert = "INSERT INTO productos (nombre, precio, imagen, id_categoria) VALUES ('$nombre', '$precio', '$categoria', '$img')";
            if ($db->query($sql_insert) === TRUE) {
                header('Location: agregar.php');
                exit;
            } 
            else {
                echo "Error al agregar el producto." . $db->error;
            }
            $db->close();
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
    <style>
        .formulario {
            display: none;
        }

        .activo {
            display: block;
        }

        .sideBar {
            min-height: 100vh;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 col-lg-2 bg-dark text-white sideBar p-3">
            <div class="d-grid gap-2 mt-4">
                <button class="btn btn-outline-dark" onclick="mostrar('carrusel')">Editar carrusel</button>
                <button class="btn btn-outline-dark" onclick="mostrar('agregarProducto')">Agregar producto</button>
                <button class="btn btn-outline-dark" onclick="mostrar('verProductos')">Ver productos</button>
                <button class="btn btn-outline-dark" onclick="mostrar('nosotros')">Editar nosotros</button>
            </div>
        </div>
        <!-- Contenido -->
        <div class="col-md-9 col-lg-10 p-4">
            <!-- Editar carrusel -->
            <div id="carrusel" class="formulario activo card p-4 mt-3">
                <h3 class="font-monospace">Editar carrusel</h3>
                <?php while($row = $resultado->fetch_assoc()):?>
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
            <div id="agregarProductos" class="formulario card p-4 mt-3">
                <div style="width: 100%; height:25%;">
                    <h3 class="font-monospace">Agregar producto</h3>
                    <form action="" method="POST" style="width: 100%;">
                        <input type="text" name="nombre" class="form-control mb-2 mb-2" style="height: 38px;" placeholder="Ingresa el nombre">
                        <input type="text" name="precio" class="form-control mb-2 mb-2" style="height: 38px;" placeholder="Ingresa el precio">
                        <label for="categoria" class="mb-2">Seleccionar categoría</label>
                        <select name="categoria" class="mb-2" style="height: 38px;"> 
                            <?php 
                                $sql_select = "SELECT * FROM categoria";
                                $resultado = mysqli_query($conexion, $sql_select);
                                while ($row = $resultado->fetch_assoc()): ?>
                                    <option value="<?= $row['id']?>"><?= $row['nombre']?></option>
                                <?php endwhile; ?>
                        </select>
                        <label for="agregar" class="mb-2">Insertar imágen</label>
                        <input type="file" accept="image/*" name="agregar" class="form-control mb-2 mb-2" style="height: 38px;"> <br>
                        <button type="submit" name="agregarProducto" class="btn btn-outline-dark">Enviar</button>
                    </form>
                </div>
            </div>
            <!-- Ver prodcutos -->
            <div id="verProductos" class="formulario card p-4 mt-3">
                <?php 
            </div>

            <!-- Contacto -->
            <div id="contacto" class="formulario card p-4 mt-3">
                <h3>Información de Contacto</h3>

                <form>
                    <input type="text"
                           class="form-control mb-3"
                           placeholder="Teléfono">

                    <button class="btn btn-info">
                        Guardar
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
<script src="script.js"></script>
</body>
</html>
<?php 
    $conexion->close();
?>