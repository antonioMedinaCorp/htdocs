<?php

$colores = ['red', 'blue', 'green', 'yellow', 'pink', 'orange', 'grey', 'white'];
$tipoLetra = ['Calibri', 'Times New Roman', 'Comic Sans'];
$letraSize = [11,12,13,15,18,22];

if (isset($_POST['enviar'])) {
    
    try {
        $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $conex = new PDO('mysql:host=localhost; dbname=tema4_logueo; charset=UTF8mb4', 'dwes', 'abc123.', $opciones);
        $error = $conex->errorInfo();
    } catch (PDOException $exc) {
        echo $exc->getTraceAsString(); // error de php
        echo 'Error:' . $exc->getMessage(); // error del servidor de bd
    }

    $pass = md5($_POST['pass']);
    $result = $conex->query("INSERT INTO perfil_usuario (nombre, apellidos, direccion, localidad, user, pass, color_letra, color_fondo, tipo_letra, tam_letra) VALUES ('$_POST[nombre]', '$_POST[apellidos]', '$_POST[direccion]', '$_POST[localidad]', '$_POST[user]', '$pass', '$_POST[color_letra]', '$_POST[color_fondo]', '$_POST[tipo_letra]', '$_POST[tam_letra]')");

    if ($result->rowCount()) {
        header("Location: index.php");
    }
    else{
        echo 'xd manco';
    }

}

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
        <label for="apellidos">Apellido</label>
        <input type="text" name="apellidos"><br>

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


                echo '<option value="' . $value . '">' . $value . '</option>';
            }
            ?>
        </select>

        <label for="color_fondo">Color fondo</label>
        <select name="color_fondo">
            <?php
            foreach ($colores as $key => $value) {


                echo '<option value="' . $value . '">' . $value . '</option>';
            }
            ?>

        </select>

        <label for="tipo_letra">Tipo de Letra</label>
        <select name="tipo_letra">
            <?php
            foreach ($tipoLetra as $key => $value) {


                echo '<option value="' . $value . '">' . $value . '</option>';
            }
            ?>

        </select>
        
        <label for="tam_letra">Tamaño letra</label>
        <select name="tam_letra">
            <?php
            foreach ($letraSize as $key => $value) {


                echo '<option value="' . $value . '">' . $value . '</option>';
            }
            ?>

        </select>
        <br>

        <input type="submit" name="enviar" value="aceptar">

    </form>
</body>

</html>