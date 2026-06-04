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
    p.id, p.nombre, p.precio, p.id_talle, p.imagen, p.id_categoria, p.color, t.talle AS talle FROM producto p INNER JOIN talle t ON p.id_talle = t.id WHERE p.id = " . $_GET['id_producto'];
    $resultado = mysqli_query($conexion,$sql);
    if (mysqli_num_rows ($resultado) > 0){
      while($datos = mysqli_fetch_assoc($resultado)){
        ?>
        <div style='width: 550px; height: 550px; float:right; margin:5%; font-size: 25px; padding-top: 5%; font-family: Simple Dreams; margin-left: 10px;'>
          <h1 style='font-size: 80px;'><?php echo $datos['nombre']; ?></h1> 
          <p style='font-size: 30px;'>$ <?php echo $datos['precio']; ?></p>
          <hr class='linea'>
          <select name='talle' class='mb-2' style='height: 38px;'>
            <?php
              $sql_select = "SELECT * FROM talle";
              $resultado_talle = mysqli_query($conexion, $sql_select);
              while ($row = mysqli_fetch_assoc($resultado_talle)) {
                echo "<option value='" . $row['id'] . "'>" . $row['talle'] . "</option>";
              }
            ?>
          </select>
          <br>
          Color: <?php echo $datos['color']; ?>
          
          <br>
          <div style='margin-top: 20%; margin-left: 10%;'>
            <button style='width: 150px; height: 50px;' class='btn btn-outline-dark' onclick='comprar()'>Agregar al Carrito</button>
          </div>
        </div>
        <div style='display: flex; margin-top: 3%; justify-content: center; margin-right: 2px;'>
          <img style='width: 450px; height: 580px; margin-top: 5%; float:left; border: 2px solid #000; margin: 5%; margin-left: 1px;' src='<?php echo $datos['imagen']; ?>'>
        </div>
        <a href='categoria.php?id_categoria=<?php echo $datos['id_categoria']; ?>'><button style='margin-left: 5%; margin-top: 2%;'>←</button></a>
        <?php
      }
    }

    
    ?>
    <footer class="pie"> 
  <footer>
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