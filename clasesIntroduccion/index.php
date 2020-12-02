<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once './Persona.php';
        
        $persona = new Persona("Ana", "LaAna", 25);
        
        echo $persona->edad;
        
        echo $persona
        ?>
    </body>
</html>
