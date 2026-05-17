<?php
    session_start();
    include('conexion.php');

    $msjemail = "";
    $msjcontrasenia = "";

    if($_SERVER["REQUEST_METHOD"] === "POST" ) {
        $email = $_POST['email'];
        $contrasenia = $_POST['contrasenia'];
        $sql = "SELECT * FROM usuario WHERE email ='$email'";
        $resultado = mysqli_query($conexion, $sql);
        $datos = mysqli_fetch_assoc($resultado);
        if(mysqli_num_rows($resultado) > 0) {
            if(password_verify($contrasenia, $datos['contra'])){
                $_SESSION['usuario'] = $datos['usuario'];
                header('location: index.php');
                exit;
            }else{
                $msjcontrasenia = "La contraseña es inválida.";
            }
        }else{
            $msjemail = "No hay email asociado a la cuenta.";
        }
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="usuario"></div>
        <form method="post" action="sesion.php" class="form">
            <input class="mb-2" type="email" name="email" placeholder="Email" required>
            <?php if($msjemail != ""){?> <p class="error"> <?php echo $msjemail ?> </p> <?php }; ?>
            <input  class="mb-2" type="password" name="contrasenia" required placeholder="Contraseña">
            <?php if($msjcontrasenia != ""){?> <p class="error"> <?php echo $msjcontrasenia ?> </p> <?php }; ?>
            <button type="submit" class="btn btn-outline-dark">Iniciar sesion</button>
        </form>
        <p>¿No tienes una cuenta?  <a href="registrarse.php">Registrate!</a></p>
    </div>
</body>
</html>
<?php 
    $db->close();
?>