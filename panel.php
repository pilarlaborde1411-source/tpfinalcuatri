<?php
    include 'conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <title>Agregar producto</title>
</head>
<body>
    <div class="d-flex flex-column text-black justify-content-center align-items-center mx-auto" style="width:27%; height:25%; margin-top:13%;">
        <h1>Agregar producto</h1>
        <form action="agregar.php" method="POST" style="width: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center; margin: auto;">
            <input type="text" name="nombre" class="mb-2" style="width: 100%; height: 38px;" placeholder="Insertar nombre">
            <input type="text" name="precio" class="mb-2" style="width: 100%; height: 38px;" placeholder="Insertar precio">
            <input type="text" name="talle" class="mb-2" style="width: 100%; height: 38px;" placeholder="Insertar Talle(XS, S, M, L, XL, XXL)">
            <label for="img" class="mb-2" style="width: 100%;">Insertar imágen</label>
            <input type="file" accept="im/*" name="img" class="mb-2" style="width: 100%; height: 38px;">
            <button type="submit" class="btn btn-outline-dark" style="width: 50%;">Enviar</button>
        </form>
        <h1>Editar carrusel</h1>
        <h1></h1>
    </div>
</body>
</html>