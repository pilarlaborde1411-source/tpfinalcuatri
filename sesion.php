<?php
    session_start();
    include('conexion.php');
    if(isset($_POST['nombre'])){
        header('Location: index.php');
    } 
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];
    $contraseñaEncriptada = md5($contraseña);
    $sql = "SELECT * FROM usuarios WHERE email ='" . $email . " ' ";
    $resultado = mysqli_query($conexion, $sql);
    $datos = mysqli_fetch_assoc($resultado);
    if(mysqli_num_rows($resultado) > 0) {
        if($datos['contra'] == $contraseñaEncriptada){
            header('Location: index.php');
        }else{
            echo"La contraseña es inválida.";
        }
    }else{
        echo"No hay email asociado a la cuenta.";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="sesion.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="usuario"></div>
        <form method="post" action="sesion.php" class="form">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="contraseña" required placeholder="Contraseña"> <br>
            <button type="submit" class="btn btn-outline-dark">Iniciar sesion</button>
        </form>
        <p>¿No tienes una cuenta?  <a href="registrarse.php">Registrate!</a></p>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</html>