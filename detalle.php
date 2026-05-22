<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include ('conexion.php');
    $sql = "SELECT * FROM producto";
    $resultado = mysqli_query($conexion,$sql);
    if (mysqli_num_rows ($resultado) > 0){
        while($datos = mysqli_fetch_assoc($resultado)){
            echo "<div class='col-md-4 mb-4'> <h1> ". $datos['nombre']." </h1>  <br> ". $datos['precio'] ." <br> ". $datos['id_talle'] ." </div> 
             <div class='imagen'><img src='" . $datos['imagen'] . "' ></div>";
        }
    }
    ?>
</body>
</html>