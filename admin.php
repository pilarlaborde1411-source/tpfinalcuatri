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

            $sql_insert = "INSERT INTO producto (nombre, precio, imagen, id_categoria, color) VALUES ('$nombre', '$precio', '$imgf', '$categoria', '$color')";
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
    <style>
        .formulario{
            display: none;
        }

        .tablaActiva{
            display: block;
        }

        .formulario.activo{
            display: block;
        }

        .sideBar {
            min-height: 100vh;
        }

        .foto{
            max-width: 8%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-lg-3 bg-dark text-white sideBar p-3">
                <a href="index.php" class="text-decoration-none text-white"><h1>BUBBA STORE</h1></a><br>
                <div class="d-grid gap-2 mt-4">
                    <button class="btn text-white text-start" onclick="mostrar('tablaInicio')"><img src="im/iconos/inicio.png" alt="inicio" class="foto"> Inicio</button>
                    <button class="btn text-white text-start" onclick="mostrar('carrusel')"><img src="im/iconos/editar.png" alt="editar" class="foto"> Editar carrusel</button>
                    <button class="btn text-white text-start" onclick="mostrar('agregarProducto')"><img src="im/iconos/agregar.png" alt="agregar" class="foto"> Agregar producto</button>
                    <button class="btn text-white text-start" onclick="mostrar('verProductos')"><img src="im/iconos/ver.png" alt="ver" class="foto"> Ver productos</button>
                </div>
            </div>
            <!-- Contenido -->
            <div class="col-md-9 col-lg-9 p-4">
                <!-- Tabla Inicio -->
                <div id="tablaInicio" class="formulario activo card p-4 mt-3">
                    <table class="table table-striped table-hover align-middle">
                        <tbody>
                            <thead>
                                <tr>
                                    <th>Imágen</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Categoría</th>
                                    <th>Color</th>
                                    <th>Acciones</th>
                                    <th><button class="btn btn-primary-dark fw-bold" onclick="mostrar('verProductos')">Ver todos</button></th>
                                </tr>
                            </thead>
                            <?php
                                $resultadoProducto = $conexion->query("SELECT * FROM producto");
                                if(mysqli_num_rows($resultadoProducto) == 0){ ?>
                            <tr>
                                <td colspan="6" class="text-center"> No hay productos en la base de datos.</td>
                                <?php }elseif(mysqli_num_rows($resultadoProducto) <=5) {
                                        while($row = $resultadoProducto->fetch_assoc()):
                                ?>
                                <td>
                                    <img src="<?= htmlspecialchars($row['imagen']) ?>" style="width:80px;height:80px;object-fit:cover;">
                                </td>
                                <td><?= htmlspecialchars($row['nombre']) ?></td>
                                <td>$<?= htmlspecialchars($row['precio']) ?></td>
                                <td><?= htmlspecialchars($row['id_categoria']) ?></td>
                                <td><?= htmlspecialchars($row['color']) ?></td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <form method="POST" action="editar.php">
                                            <button class="btn btn-sm btn-outline-primary" name="editar" type="submit" value="<?= $row['id'] ?>">
                                                <img src="im/iconos/editar.png" width="16">
                                            </button>
                                        </form>
                                        <form method="POST" action="borrar.php">
                                            <button class="btn btn-sm btn-outline-danger" name="eliminarProducto" type="submit" value="<?= $row['id'] ?>">
                                                <img src="im/iconos/eliminar.png" width="16">
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <?php endwhile; };?>
                        </tbody>
                    </table>
                </div>
                <!-- Editar carrusel -->
                <div id="carrusel" class="formulario card p-4 mt-3">
                    <h3 class="font-monospace">Editar carrusel</h3>
                    <div class="d-flex flex-wrap gap-4">
                        <?php while($row = $resultadoCarrusel->fetch_assoc()): ?>
                            <?php if($row['imagen']){ ?>
                                <div class="card p-3" style="width: 300px;">
                                    <img class="img-fluid mb-3" src="data:image/webp;base64,<?php echo base64_encode($row['imagen'])?>" alt="imagen">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <input hidden type="number" name="id" value="<?php echo $row['id'] ?>">
                                        <label for="editar">Insertar nueva imagen</label>
                                        <input type="file" accept="image/*" name="editar" required class="form-control mb-2">
                                        <button type="submit" name="editarImagen" class="btn btn-outline-dark">Enviar</button>
                                    </form>
                                </div>
                            <?php } ?>
                        <?php endwhile; ?>
                    </div>
                </div>
                <!-- Agregar productos -->
                <div id="agregarProducto" class="formulario card p-4 mt-3">
                    <div style="width: 100%; height:25%;">
                        <h3 class="font-monospace">Agregar producto</h3>
                        <form action="" method="POST" enctype="multipart/form-data" style="width: 100%;">
                            <input type="text" name="nombre" class="form-control mb-2 mb-2" style="height: 38px;" placeholder="Ingresa el nombre">
                            <input type="text" name="precio" class="form-control mb-2 mb-2" style="height: 38px;" placeholder="Ingresa el precio">
                            <label for="agregar" class="mb-2">Insertar imágen</label>
                            <input type="file" accept="image/*" name="agregar" class="form-control mb-2 mb-2" style="height: 38px;">
                            <label for="carpeta" class="mb-2">Seleccionar la carpeta</label>
                            <select name="carpeta" class="mb-2" style="height: 38px;"> 
                                <option value="im/pantalones/">Pantalón</option>
                                <option value="im/remeras/">Remeras</option>
                                <option value="im/calzados/">Calzados</option>
                                <option value="im/camperas/">Camperas</option>
                            </select> <br>
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
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle">
                            <tbody>
                                <?php
                                    $resultadoProducto = $conexion->query("SELECT * FROM producto");
                                    if(mysqli_num_rows($resultadoProducto) == 0){ ?>
                                <tr>
                                    <td colspan="6" class="text-center">No hay productos en la base de datos.</td>
                                    <?php }else{
                                        while($row = $resultadoProducto->fetch_assoc()):
                                    ?>
                                    <td>
                                        <img src="<?= htmlspecialchars($row['imagen']) ?>" style="width:80px;height:80px;object-fit:cover;">
                                    </td>
                                    <td><?= htmlspecialchars($row['nombre']) ?></td>
                                    <td>$<?= htmlspecialchars($row['precio']) ?></td>
                                    <td><?= htmlspecialchars($row['id_categoria']) ?></td>
                                    <td><?= htmlspecialchars($row['color']) ?></td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <form method="POST" action="editar.php">
                                                <button class="btn btn-sm btn-outline-primary" name="editar" type="submit" value="<?= $row['id'] ?>">
                                                    <img src="im/iconos/editar.png" width="16">
                                                </button>
                                            </form>
                                            <form method="POST" action="borrar.php">
                                                <button class="btn btn-sm btn-outline-danger" name="eliminarProducto" type="submit" value="<?= $row['id'] ?>">
                                                    <img src="im/iconos/eliminar.png" width="16">
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <?php endwhile; };?>
                            </tbody>
                        </table>
                    </div>
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