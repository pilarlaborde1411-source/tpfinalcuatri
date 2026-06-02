<?php
  include 'conexion.php';
  session_start();
  if(!isset($_SESSION['usuario'])){
    header('Location: sesion.php');
    exit;
  }
  $usuario = $_SESSION['usuario'];
  $resultadoCarrusel = $conexion->query("SELECT * FROM carrusel");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="index.css">
</head>
<body>
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
                      
                      <a href="borrar.php?id=<?php echo $datos['id_carrito']; ?>" 
                      class="btn btn-outline-danger btn-sm">🗑️</a> <!-- envia id del producto al archivo -->
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
<div id="carouselExampleCaptions" class="carousel slide position-relative">
  <?php
    if(isset($_SESSION['usuario'])){
      if($_SESSION['admin'] == 1){
        echo "<form action='carrusel.php'> <button type='submit' class='btn position-absolute top-0 end-0 m-3'style='z-index: 10; background: rgba(255,255,255,0.7);'>
          <img src='im/editar.png' width='40' height='40'>
        </button></form>";
      }
    }
  ?>
  <div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    </div>
    <div class="carousel-inner">
      <?php 
        $active = true;
        while($row = $resultadoCarrusel->fetch_assoc()):
        if($row['imagen']){
      ?>
      <div class="carousel-item <?php if($active){ echo 'active'; $active = false; }?>">
        <img src="data:image/webp;base64,<?php echo base64_encode($row['imagen']) ?>" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block"></div>
      </div>
      <?php } ?>
      <?php endwhile;?>
      <button class="carousel-control-prev" style="width: 2%" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" style="width: 2%" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</div>
  <!-- CARD --> 
  <?php
    $sql = "SELECT * FROM producto";
    $resultado = mysqli_query($conexion, $sql);
    while ($datos = mysqli_fetch_assoc($resultado)) {
      echo "<div class='col-md-4 mb-4'>
          <div class='card' style='width: 25rem;'>
            <img src='im/".$datos['imagen']."' class='card-img-top' alt=''>
            <div class='card-body'>
              <h5 class='card-title'>".$datos['nombre']."</h5>
                <p class='card-text'>".$datos['precio']."</p>
                <h3></h3>
                <a href='agregarCarrito.php?id=".$datos['id']."' 
                class='btn btn-primary'>Comprar</a>
              </div>
            </div>
          </div>";
    }
  ?>
  <footer>
    <div class="foot" id="redes">
      <a href=""><img src="im/white-pinterest-logo-png--30.png" alt="" class="logo"></a>
      <a href=""><img src="im/twitter.png" alt="" class="logo"></a>
      <a href=""><img src="im/Instagram_logo.png" alt="" class="logo"></a>
      <a href=""><img src="im/youtube-play.png" alt="" class="logo"></a>
      <a href=""><img src="im/facebook-new.png" alt="" class="logo"></a>
    </div>
  </footer>
</body>
</html>
<?php 
  $conexion->close();
?>