<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="sesion.css">
</head>
<body>
    <div class="conteiner">
        <div class="fotito"></div>
        <form method="POST" action="registrarse.php">
            <input type="text" name="nombre" placeholder="Usuario" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="contraseña" placeholder="Contraseña" required>
            <button type="submit">Crear cuenta</button>
            <p>¿Ya tienes una cuenta?<a href="sesion.php">¡Inicia sesión!</a></p> <br> 
        </form>
    </div>
</body>
</html>