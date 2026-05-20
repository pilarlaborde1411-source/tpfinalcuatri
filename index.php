<?php
include 'conexion.php';
session_start();
if(!isset($_SESSION['usuario'])){
  header('Location: sesion.php');
  exit;
}
$usuario = $_SESSION['usuario'];
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
            <a class="nav-link" href="#">Nosotros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ofertas.php">Ofertas</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button"
              data-bs-toggle="dropdown">
              Colecciones
            </a>
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
                  echo "<a class='nav-link' href='panel.php'>Panel de administración</a>";
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
            <div class>

            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<div id="carouselExampleCaptions" class="carousel slide position-relative">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
  </div>

  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="im/hhh.webp" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>

    <div class="carousel-item">
      <img src="im/tt.webp" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block"></div>
    </div>
  </div>

  <button class="carousel-control-prev" style="width: 2%" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>

  <button class="carousel-control-next" style="width: 2%" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<div class="container mt-2">
  <div class="row justify-content-center">
    <!-- CARD 1 -->
    <div class="col-md-4 mb-4">
      <div class="card" style="width: 25rem;">
        <img src="im/pantalonbei.jpg" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">PANTALON CLASSIC</h5>
          <p class="card-text">Pantalon clasico color beige.</p>
          <h3>$20.000</h3>
          <button class="btnSumar btn btn-primary">Comprar</button>
        </div>
      </div>
    </div>

    <!-- CARD 2 -->
      <div class="col-md-4 mb-4">
        <div class="card" style="width: 25rem;">
          <img src="im/plaid-midi1-baja-6614256490bcf0b4b217152084470784-1024-1024.jpg" class="card-img-top" alt="">
          <div class="card-body">
             <h5 class="card-title">POLLERA ISABELLE</h5>
              <p class="card-text">Pollera elegante con triangulos.</p>
              <h3>$15.000</h3>
            <button class="btnSumar btn btn-primary">Comprar</button>
          </div>
        </div>
      </div>

    <!-- CARD 3 -->
    <div class="col-md-4 mb-4">
      <div class="card" style="width: 25rem;">
        <img src="im/sporty-jacket1-f82ee07b98265947e917152087871024-1024-1024.jpg" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">CAMPERA SPORTY</h5>
          <p class="card-text">Campera deportiva liviana.</p>
          <h3>$20.000</h3>
          <button class="btnSumar btn btn-primary">Comprar</button>
        </div>
      </div>
    </div>

     <!-- CARD 4 -->
    <div class="col-md-4 mb-4">
      <div class="card" style="width: 25rem;">
        <img src="im/Falda bora.png" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">FALDA BORA</h5>
          <p class="card-text">Falda blanca y larga.</p>
          <h3>$15.000</h3>
          <button class="btnSumar btn btn-primary">Comprar</button>
        </div>
      </div>
    </div>

     <!-- CARD 5 -->
    <div class="col-md-4 mb-4">
      <div class="card" style="width: 25rem;">
        <img src="im/Jean struck.png" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">JEAN STRUCK</h5>
          <p class="card-text">Jean color azul.</p>
          <h3>$40.000</h3>
          <button class="btnSumar btn btn-primary">Comprar</button>
        </div>
      </div>
    </div>

     <!-- CARD 6 -->
    <div class="col-md-4 mb-4">
      <div class="card" style="width: 25rem;">
        <img src="im/lusa nema.png" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">BLUSA NEMA</h5>
          <p class="card-text">Blusa amarilla liviana.</p>
          <h3>$25.000</h3>
          <button class="btnSumar btn btn-primary">Comprar</button>
        </div>
      </div>
    </div>
  </div>
</div>
<footer class="pie"> 
  <a href="#navbarNavDropdown"><p class="Volver">Volver arriba</p></a>
  <div class="foot" id="redes">
    <a href=""><div id="pinterest" class="logo"></div></a>
    <a href=""><div id="twitter" class="logo"></div></a>
    <a href=""><div id="instagram" class="logo"></div>
    <a href=""><div id="youtube" class="logo"></div></a>
    <a href=""><div id="facebook" class="logo"></div></a>
  </div>
</footer>
</body>
</html>
<?php 
  $conexion->close();
?>