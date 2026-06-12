<?php
    include 'conexion.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosotros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<?php include 'navegacion.php'?>

<h1 style="margin: 2% auto 0; text-align: center; font-family: bricolage grotesque;">Sobre Nosotros</h1>
<div style="display: flex; justify-content: space-between; align-items: flex-start; margin: 2% 10%;">
    <div>
        <h2 style="margin-top:8%; font-family: bricolage grotesque;">
          <img src="im/iconos/whatsap.png" alt="" style="width: 10%;">
          +54 001 234567</h2>

        <h2 style="margin-top: 10%; font-family: bricolage grotesque;">
          <img src="im/iconos/gmail.png" alt="" style="width: 10%;">
          bubba.store@gmail.com</h2>

        <h2 style="margin-top: 12%; font-family: bricolage grotesque;">
          Te espeamos<img src="im/iconos/coraozn.png" alt="" style="width: 6%;"></h2>
    </div>
    
    <div class="col-lg-7">
      <div class="card shadow border-0 rounded-4 overflow-hidden">
          <h5>📍 Calle 85 entre 4 y 2</h5>
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63942.185115268985!2d-58.80060212668899!3d-38.57424133908916!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x958f998e83b23fab%3A0xc4aad8746ef3c272!2sBubba%20storee!5e0!3m2!1ses-419!2sar!4v1779235898376!5m2!1ses-419!2sar"
          width="100%" height="450" style="border:0;" loading="lazy">
        </iframe>
      </div>
    </div>
</div>

<?php include 'footer.php'?>
</body>
</html>