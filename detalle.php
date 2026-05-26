<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="detalle.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>
<body>
     <nav class='navbar navbar-expand-lg bg-body-tertiary'>
  <div class='container-fluid'>
    <a class='navbar-brand' href='#'><h1 >BUBBA STORE</h1></a>
    <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNavDropdown' aria-controls='navbarNavDropdown' aria-expanded='false' aria-label='Toggle navigation'>
      <span class='navbar-toggler-icon'></span>
    </button>
    <div class='collapse navbar-collapse' id='navbarNavDropdown'>
      <ul class='navbar-nav'>
        <li class='nav-item'>
          <a class='nav-link active' aria-current='page' href='inicio.php'>Inicio</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='#'>Nosotros</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='#'>Ofertas</a>
        </li>
        <li class='nav-item dropdown'>
          <a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
            Colecciones
          </a>
          <ul class='dropdown-menu'>
            <li><a class='dropdown-item' href='top.php'>Tops y Remeras</a></li>
            <li><a class='dropdown-item' href='zapatos.php'>Zapatos</a></li>
            <li><a class='dropdown-item' href='#'>Camperas</a></li>
            <li><a class='dropdown-item' href='#'>Joyas</a></li>
          </ul>
        </li>
    </ul>
</div>
  </div>
</nav>
    <?php
    include ('conexion.php');
    $sql = "SELECT 
    p.id, p.nombre, p.precio, p.id_talle, p.imagen, p.id_categoria, t.talle AS talle FROM producto p INNER JOIN talle t ON p.id_talle = t.id";
    $resultado = mysqli_query($conexion,$sql);
    if (mysqli_num_rows ($resultado) > 0){
        while($datos = mysqli_fetch_assoc($resultado)){
            echo "
            <div style='width: 500px; height: 500px;  float:right; margin:5%; font-size: 25px; padding: 5%; font-family: Simple Dreams; '> <h1 style='font-size: 50px;'> ". $datos['nombre']." </h1>  <br> ". $datos['precio'] ." <br> Talle: ". $datos['talle'] ." <hr class='linea'> <br> <div style='margin-top: 35%; margin-left: 25%;'> <button class='btnSumar btn btn-primary' onclick='comprar()'>Comprar</button> </div> </div> 
             <div> <img style='width: 500px; height: 500px; margin-top: 5%; float:left; border: 2px solid #000; margin: 5%; margin-left: 10%;' src='" . $datos['imagen'] . "'> </div>";
            echo "<a href='categoria.php?id_categoria=" . $datos['id_categoria'] . "'><button style='margin-left: 5%; margin-top: 2%;'>←</button></a>";
        }
    }

    
    ?>
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