<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once './Dado.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $dado = new Dado();
        
        echo $dado->getNombreFigura($dado->tirar());

        echo $dado->getNombreFigura($dado->tirar());

        echo $dado->getNombreFigura($dado->tirar());

        echo $dado->getNombreFigura($dado->tirar());
        
        echo "<br> Tiradas totales: ".Dado::getTiradasTotales();
        ?>
    </body>
</html>
