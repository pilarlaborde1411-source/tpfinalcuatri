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
  <?php include 'navegacion.php'?>
  <div id="carouselExampleCaptions" class="carousel slide position-relative">
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
          <img src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']) ?>" class="d-block w-100" alt="...">
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
  <?php include 'footer.php'?>
</body>
</html>
<?php $conexion->close(); ?>