<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="ofertas.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>
<body>
   <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><h1 >BUBBA STORE</h1></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Nosotros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="ofertas.php">Ofertas</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Colecciones
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="remera.php">Tops y Remeras</a></li>
            <li><a class="dropdown-item" href="pantalon.php">Pantalones</a></li>
            <li><a class="dropdown-item" href="zapatos.php">Zapatos</a></li>
            <li><a class="dropdown-item" href="camperas.php">Camperas</a></li>
            <li><a class="dropdown-item" href="#">Joyas</a></li>
          </ul>
        </li>
    </ul>
</div>
  </div>
</nav>
<h1>✨Ofertas</h1>
<div class="container mt-4">
  <div class="row justify-content-center">

    <!-- CARD 1 -->
    <div class="col-md-4 mb-4">
      <div class="card" style="width: 25rem;">
        <img src="im/oferta 1.jpg" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">Top Asímetrico</h5>
          <p class="card-text">Top marrón de un hombro</p>
          <h3>$15.000</h3>
          <button class="btnSumar btn btn-primary" onclick="comprar()">Comprar</button>
        </div>
      </div>
    </div>

    <!-- CARD 2 -->
      <div class="col-md-4 mb-4">
        <div class="card" style="width: 25rem;">
          <img src="im/ofer2.jpg" class="card-img-top" alt="">
          <div class="card-body">
             <h5 class="card-title">Conjunto Deportivo</h5>
              <p class="card-text">Conjunto de jogging gris</p>
              <h3>$30.000</h3>
            <button class="btnSumar btn btn-primary" onclick="comprar()">Comprar</button>
          </div>
        </div>
      </div>

    <!-- CARD 3 -->
    <div class="col-md-4 mb-4">
      <div class="card" style="width: 25rem;">
        <img src="im/oferta3.jpg" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">Shorts de Sastre</h5>
          <p class="card-text">Shorts casuales beige</p>
          <h3>$12.500</h3>
          <button class="btnSumar btn btn-primary" onclick="comprar()">Comprar</button>
        </div>
      </div>
    </div>

     <!-- CARD 4 -->
    <div class="col-md-4 mb-4">
      <div class="card" style="width: 25rem;">
        <img src="im/oferta4.jpg" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">Botas Negras</h5>
          <p class="card-text">Botas con tacon negras</p>
          <h3>$15.500</h3>
          <button class="btnSumar btn btn-primary" onclick="comprar()">Comprar</button>
        </div>
      </div>
    </div>

     <!-- CARD 5 -->
    <div class="col-md-4 mb-4">
      <div class="card" style="width: 25rem;">
        <img src="im/oferta5.jpg" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">Suertes Rosa</h5>
          <p class="card-text">Suerter corto abierto</p>
          <h3>$10.500</h3>
          <button class="btnSumar btn btn-primary" onclick="comprar()">Comprar</button>
        </div>
      </div>
    </div>

     <!-- CARD 6 -->
    <div class="col-md-4 mb-4">
      <div class="card" style="width: 25rem;">
        <img src="im/oferta6.jpg" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">Campera Básica</h5>
          <p class="card-text">Campera de algodon beige</p>
          <h3>$15.000</h3>
          <button class="btnSumar btn btn-primary" onclick="comprar()">Comprar</button>
        </div>
      </div>
    </div>
  </div>
</div>
<footer class="pie"> 
  <footer>
        <a href="#navbarNavDropdown"><p class="Volver">Volver arriba</P></a>
        <hr>
        <div class="foot" id="redes">
            <a href="https://ar.pinterest.com/"><div id="pinterest" class="logo"></div></a>
            <a href="https://x.com/?lang=es"><div id="twitter"  class="logo"></div></a>
            <a href="https://www.instagram.com/"><div id="instagram" class="logo"></div>
            <a href=""><div id="youtube" class="logo"></div></a>
            <a href="https://www.facebook.com/?locale=es_LA"><div id="facebook" class="logo"></div></a>
        </div>
    </footer>
</footer>
</body>
</html>