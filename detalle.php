<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del producto</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="detalle.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>
<body>
    <?php
    include 'navegacion.php';
    include 'conexion.php';
    $sql = "SELECT 
    p.id, p.nombre, p.precio, p.imagen, p.id_categoria, p.color FROM producto p WHERE p.id = " . $_GET['id_producto'];
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
        <a href='categoria.php?id=<?php echo $datos['id_categoria']; ?>'><button style='margin-left: 5%; margin-top: 2%;'>←</button></a>
        <?php
      }
    }
    include 'footer.php';
    ?>
</body>
</html>