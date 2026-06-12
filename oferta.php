<?php
include ('conexion.php');
$categoria= $_GET['id']; 
$sql="SELECT 
    p.id, p.nombre, p.precio, p.imagen, p.id_categoria, c.nombre AS categoria FROM producto p INNER JOIN categoria c ON p.id_categoria = c.id WHERE p.id_categoria = $categoria";
$resultado = mysqli_query($conexion,$sql);
if(mysqli_num_rows($resultado)>0){
    while ($productos=mysqli_fetch_assoc($resultado)) {
        echo "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title></title>
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'>
            <link rel='stylesheet' href='pantalon.css'>
            <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js' integrity='sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q' crossorigin='anonymous'></script>
        </head>
        <body>";
          include ('navegacion.php');
           echo "<h1 style='text-align: center;'>".$productos['categoria']."</h1>
            
            <div class='card' style='width: 25rem;'>
                <img src='".$productos['imagen']."' class='card-img-top' alt=''>
                <div class='card-body'>
                <div class='col-md-4 mb-4'> <a href='detalle.php?id_producto=".$productos['id']."' style='text-decoration: none; color: black;'>
                <h5 class='card-title'>".$productos['nombre']."</h5>
                <br>
                <h3> $ ".$productos['precio']."</h3>
                <button style= 'margin-left: 85% ; width: 150px; font-family: Simple Dreams; border-radius: 15px;' class='btnSumar btn btn-primary' onclick='comprar()'>Agregar al Carrito</button>
            </div>
            </div>
        </body>
        </html>
            ";
    }
}
else{
    echo "no hay productos de la categoria" . $categoria;
}
?>
