<?php
setcookie("lang", $_GET["lang"], time()-1);
header("Location: index.php");
?>
