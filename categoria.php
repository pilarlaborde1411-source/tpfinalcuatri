<?php
include ('conexion.php');
//$categoria= $_GET['id_categoria'];
$categoria=1;
$sql="SELECT *  FROM producto WHERE id_categoria ='" . $categoria."'";
$resultado = mysqli_query($conexion,$sql);
if(mysqli_num_rows($resultado)>0){
    print_r(mysqli_num_rows($resultado));
    while ($productos=mysqli_fetch_assoc($resultado)) {
        echo "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Document</title>
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'>
            <link rel='stylesheet' href='pantalon.css'>
            <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js' integrity='sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q' crossorigin='anonymous'></script>
        </head>
        <body>
           <h1>".$categoria."</h1>
            <div class='col-md-4 mb-4'>
            <div class='card' style='width: 25rem;'>
                <img src='".$productos['imagen']."' class='card-img-top' alt=''>
                <div class='card-body'>
                <h5 class='card-title'>".$productos['nombre']."</h5>
                <p class='card-text'>Jean Ancho Azul</p>
                <h3>".$productos['precio']."</h3>
                <button class='btnSumar btn btn-primary' onclick='comprar()'>Comprar</button>
                </div>
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
