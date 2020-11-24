<?php

setcookie("nombre", "deLaRosa");

if(isset($_COOKIE['nombre'])){
    echo $_COOKIE['nombre'];
}
?>
<a href="cookiesClase.php">Pedir cookie</a>
