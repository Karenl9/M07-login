<?php

setcookie("lang", $_GET["lang"], time()+600);
header("Location: index.php");

?>


<!-- // tractar el get
// guardar a la cookie
// redireccionar -->
