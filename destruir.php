<?php
//Se inicia sesion
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <?php

$_SESSION['LoggedIn']==false;

  session_unset();
  
// Tancar la sessió
  session_destroy();
// Redirigeix a la pàgina d'inici de sessió
  header("Location: login.html");
?>
</body>
</html>

