<?php
    include 'conexion.php';
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><h1>BUBBA STORE</h1></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"> 
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <!-- Menú principal -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="nosotros.php">Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ofertas.php">Ofertas</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Colecciones</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="remeras.php">Remeras</a></li>
                        <li><a class="dropdown-item" href="pantalon.php">Pantalones</a></li>
                        <li><a class="dropdown-item" href="zapatos.php">Zapatos</a></li>
                        <li><a class="dropdown-item" href="camperas.php">Camperas</a></li>
                        <li><a class="dropdown-item" href="joyas.php">Joyas</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <?php
                        if(isset($_SESSION['usuario'])){
                            if($_SESSION['admin'] == 1){
                                echo "<a class='nav-link' href='agregar.php'>Panel de administración</a>";
                            }
                        }
                    ?>
                </li>
            </ul>
            <!-- Usuario -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown">
                        <img src="im/usuario.png" alt="Usuario"class="rounded-circle" width="40" height="40"></img>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="config.php">Configuración</a></li>
                        <li><a class="dropdown-item" href="logout.php">Cerrar sesión</a></li>
                    </ul>
                </li>
            </ul>
            <!-- Carrito -->
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown">
                        <img src="im/carrito.png" alt="carrito" width="40" height="40"></img>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end cart-menu" style="width: 500px; eight:500px; padding: 15px;border-radius: 15px;"> 
                    
                        <?php 
                            $idUsuario = $_SESSION['id_usuario'];
                            $sql = "SELECT carrito.id AS id_carrito, producto.* FROM carrito INNER JOIN producto ON carrito. `id-producto` = producto.id WHERE carrito.`id-usuario` = '$idUsuario'";
                            //busca los registros del carrito, los une con producto y obtiene la info del producto
                            $resultadoCarrito = $conexion->query($sql);
                        ?>

                        <li class="dropdown-header text-center fs-5">Carrito de Compras</li>
                        <li><hr class="dropdown-divider"></li>

                        <?php
                            if ($resultadoCarrito->num_rows > 0) {
                            while($datos = $resultadoCarrito->fetch_assoc()) { //recorre los productos encontrados
                        ?>

                        <li class="px-3 py-2">
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <img src="im/<?php echo $datos['imagen']; ?>"
                                    class="img-fluid rounded" style="max-height: 140px; object-fit: cover;">
                                </div>

                                <div class="col-7">
                                    <p style="font-size: 1.1rem; font-weight: bold; margin-bottom: 5px;">
                                    <?php echo $datos['nombre'] ?></p>

                                    <p style="color: gray; margin-bottom: 10px;"> 
                                    <?php echo $datos['precio']; ?></p>
                                    
                                    <div style= "display:flex; align-items:center; gap:10px;">
                                        <select style="width:70px; padding:5px; border-radius:8px; border:1px solid #ccc;">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                        
                                        <a class="nav-link" name="borrarCarrito" href="borrar.php?idCarrito=<?php echo $datos['id_carrito'];?>">
                                            <img src="im/eliminar.png" alt="carrito" width="10" height="10"></img>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <?php
                            }
                            } else {
                                echo "<li class='text-center py-3' text-muted>El carrito está vacío </li>";
                            }
                        ?>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>