<?php include("../db.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>LOGINPOLLIN</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link href="assets/css/styles.css" rel="stylesheet" />
</head>
<body>
<div class="vid-container">
  <video id="Video1" class="bgvid back" autoplay="true" muted="muted" preload="auto" loop>
      <source src="assets/imagenes/Y2meta.app-Gallinas de granja Animales 4K HD-(1080p).mp4" type="video/mp4">
  </video>
  <div class="inner-container">
    <div class="box">
      <h1>Login</h1>
      <!-- Agrega un formulario con method="post" y action="tuscript.php" -->
      <form method="post" action="Login.php">
        <input type="text" name="Usuario" placeholder="Usuario"/>
        <input type="password" name="Clave" placeholder="Clave"/>
        <button type="submit" name="pasar">Login</button>
      </form>
    </div>
  </div>
</div>
<script src="assets/js/main.js"></script>

<script>
if (window.location.href === "index.php") {
  window.location.replace("MenuActualizado/index.php"); 
}
</script>-

</body>
</html>
