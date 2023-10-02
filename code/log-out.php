<?php 
setcookie("username", "", time() - 480000, "/");
header("Location: index.php");
echo $usuari
?>