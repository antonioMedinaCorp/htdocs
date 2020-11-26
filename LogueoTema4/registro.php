<?php

$colores = ['red','blue','green','yellow','pink','orange','grey','white'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>

<body>
    <h1>FORMULARIO DE REGISTRO</h1>

    <form action="" method="post">

        <!-- Nombre -->
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre"><br>

        <!-- Apellido -->
        <label for="apellido">Apellido</label>
        <input type="text" name="apellido"><br>

        <!-- Direccion -->
        <label for="direccion">Direccion</label>
        <input type="text" name="direccion"><br>

        <!-- Localidad -->
        <label for="localidad">Localidad</label>
        <input type="text" name="localidad"><br>

        <!-- User -->
        <label for="user">User</label>
        <input type="text" name="user"><br>

        <!-- Pass -->
        <label for="pass">Pass</label>
        <input type="text" name="pass"><br>

        <label for="color_letra">Color letra</label>
        <select name="color_letra">
            <?php
            foreach ($colores as $key => $value) {
            

            echo '<option value="'.$value.'">'.$value.'</option>';
                
            }
            ?>
        </select>

        <label for="color_fondo">Color fondo</label>
        <select name="color_fondo">
            <?php
            foreach ($colores as $key => $value) {
            

            echo '<option value="'.$value.'">'.$value.'</option>';
                
            }
            ?>
    </form>
</body>

</html>