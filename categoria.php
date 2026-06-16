<?php
include ('conexion.php');
$categoria= $_GET['id']; 
$nombreCategoria = mysqli_query($conexion, "SELECT nombre FROM categoria WHERE id = $categoria"); 
$nombreCategoria = mysqli_fetch_assoc($nombreCategoria)['nombre'];
$sql="SELECT 
    p.id, p.nombre, p.precio, p.imagen, p.id_categoria, c.nombre AS categoria FROM producto p INNER JOIN categoria c ON p.id_categoria = c.id WHERE p.id_categoria = $categoria";
$resultado = mysqli_query($conexion,$sql);
if(mysqli_num_rows($resultado)>0){
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title></title>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'>
        <link rel='stylesheet' href='index.css'>
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js' integrity='sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q' crossorigin='anonymous'></script>
    </head>
    <body> ";
    include ('navegacion.php'); 
    echo "<h1 style='text-align: center; text-transform: uppercase; text-family: Simple Dreams; text-font: 40px;'>".$nombreCategoria."</h1>";
    while ($productos=mysqli_fetch_assoc($resultado)) {
        echo "
            <div class='card' style='width: 25rem; margin: 20px; display: inline-block;'>
                <img src='".$productos['imagen']."' class='card-img-top' alt='' style='height: 500px; width: 100%;'>
                <div class='card-body'>
                <div class='col-md-4 mb-4'> <a href='detalle.php?id_producto=".$productos['id']."' style='text-decoration: none; color: black;'>
                <h5 class='card-title'>".$productos['nombre']."</h5>
                <br>
                <h3> $ ".$productos['precio']."</h3>
                </div>
                <?php
                <form method='GET' action='agregarCarrito.php'>
                <input hidden name='id' value='".$productos['id']."'>
                    <button class='btn btn-outline-dark' type='submit'> Agregar al carrito</button>
                </form>
                </div>
            </div>
        ";
    }
}

else{
    echo "no hay productos de la categoria" . $categoria;
}
?>
<?php include 'footer.php' ?>
 </body>
 </html>