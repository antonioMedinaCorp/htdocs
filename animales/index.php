<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
include_once './Animal.php';
include_once './Ave.php';
include_once './Canario.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $canario = new Canario("el Canario", "amarillo", "filigranas con la voz", false);
        
        
        echo $canario."<br>";
        echo $canario->seHaMuerto();
        ?>
    </body>
</html>
