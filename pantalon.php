<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="pantalon.css">
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
          <a class="nav-link active" aria-current="page" href="inicio.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Nosotros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="oferta.php">Ofertas</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Colecciones
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="remeras.php">Tops y Remeras</a></li>
      
            <li><a class="dropdown-item" href="zapatos.php">Zapatos</a></li>
            <li><a class="dropdown-item" href="camperas.php">Camperas</a></li>
            <li><a class="dropdown-item" href="joyas.php">Joyas</a></li>
          </ul>
        </li>
    </ul>
</div>
  </div>
</nav>
<h1>Pantalones</h1>
<div class="container mt-4">
  <div class="row justify-content-center">

    <!-- CARD 1 -->
    <div class="col-md-4 mb-4">
      <div class="card" style="width: 25rem;">
        <img src="im/pantalon1.jpg" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">Jean </h5>
          <p class="card-text">Jean Ancho Azul</p>
          <h3>$40.000</h3>
          <button class="btnSumar btn btn-primary" onclick="comprar()">Comprar</button>
        </div>
      </div>
    </div>

    <!-- CARD 2 -->
      <div class="col-md-4 mb-4">
        <div class="card" style="width: 25rem;">
          <img src="im/pantalon2.jpg" class="card-img-top" alt="">
          <div class="card-body">
             <h5 class="card-title">Flare Jean</h5>
              <p class="card-text">Jean celeste</p>
              <h3>$25.000</h3>
            <button class="btnSumar btn btn-primary" onclick="comprar()">Comprar</button>
          </div>
        </div>
      </div>

    <!-- CARD 3 -->
    <div class="col-md-4 mb-4">
      <div class="card" style="width: 25rem;">
        <img src="im/pantalon3.jpg" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">Cargo Verde</h5>
          <p class="card-text">Pantalon Verde Cargo</p>
          <h3>$20.000</h3>
          <button class="btnSumar btn btn-primary" onclick="comprar()">Comprar</button>
        </div>
      </div>
    </div>

     <!-- CARD 4 -->
    <div class="col-md-4 mb-4">
      <div class="card" style="width: 25rem;">
        <img src="im/panta4.jpg" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">Calsa Flare</h5>
          <p class="card-text">Calsa flare negra</p>
          <h3></h3>
          <button class="btnSumar btn btn-primary" onclick="comprar()">Comprar</button>
        </div>
      </div>
    </div>

     <!-- CARD 5 -->
    <div class="col-md-4 mb-4">
      <div class="card" style="width: 25rem;">
        <img src="im/pantalonn5.jpg" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">Pantalon Jogging</h5>
          <p class="card-text">Pantalon de jogging azul</p>
          <h3>$20.000</h3>
          <button class="btnSumar btn btn-primary" onclick="comprar()">Comprar</button>
        </div>
      </div>
    </div>

     <!-- CARD 6 -->
    <div class="col-md-4 mb-4">
      <div class="card" style="width: 25rem;">
        <img src="im/panta6.jpg" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">Pantalon de Cuero</h5>
          <p class="card-text">Pantalon de cuero recto bordo</p>
          <h3>$25.000</h3>
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
<script src="java.js"></script>
</body>
</html>