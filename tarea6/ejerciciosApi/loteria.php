<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_POST['enviar'])) {
    $loteriaPre = file_get_contents("https://api.elpais.com/ws/LoteriaNavidadPremiados?n=".$_POST['numero']);
    $loteriaPre = str_replace("busqueda=", "", $loteriaPre);
    
    $loteria = json_decode($loteriaPre);

    if($loteria->premio > 0){
        echo '<h2>Has ganado '. $loteria->premio . ' euros.</h2>';
    }
 else {
    echo '<h2> EL NÚMERO NO HA SIDO PREMIADO</h2>';    
    }
}
?>
<h2>Compruebe su número de lotería de navidad</h2>

<form action="" method="POST">
    <input type="number" name="numero">
    <input type="submit" name="enviar" value="Enviar">
</form>