<?php
include ('conexion.php');
//Verifica los campos vacios
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST["nombre"]);
    $email = trim($_POST["email"]);
    $contrasena = trim($_POST["contrasena"]);
    print_r($_POST);
    if (empty($nombre) || empty($email) || empty($contrasena)) {
        die("Todos los campos son obligatorios");
    }
    //Verifica el correo
    $consulta = "SELECT * FROM usuario WHERE email='".$email."'";
    $resultado = mysqli_query($conexion, $consulta);
    if (mysqli_num_rows($resultado)>0) {
        echo "el correo ya esta registrado";
    } else {   // Encripta la contraseña e inserta usuarios
        $contraEncriptada = password_hash($contrasena, PASSWORD_DEFAULT);
        $insertar= "INSERT INTO usuario(nombre, email, contra) VALUES ('".$nombre."','".$email."','".$contraEncriptada."')";
        if(mysqli_query($conexion, $insertar)){
            header("Location: index.php");
        } else{
            echo "Error: ".mysqli_error($conexion);
        }
    } 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="registrarse.css">
    <title>Registrarse</title>
</head>
<body>
    <div class="container">
        <div class="usuario"></div>
        <form method="POST" action="registrarse.php" class="form">
            <input type="text" name="nombre" placeholder="Usuario" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="contrasena" placeholder="Contraseña" required>
            <button type="submit" class="btn btn-outline-dark">Crear cuenta</button>
        </form>
        <p>¿Ya tienes una cuenta?<a href="sesion.php">¡Inicia sesión!</a></p>
    </div>
</body>
</html>