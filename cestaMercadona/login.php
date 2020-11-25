<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <link rel="stylesheet" href="style.css">
</head>

<?php
if (isset($_POST['enviar']) && !empty($_POST['usuario']) && !empty($_POST['password']) ) {
    //conexión con bbdd
    try {
        $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $conex = new PDO('mysql:host=localhost; dbname=dwes; charset=UTF8mb4', 'dwes', 'abc123.', $opciones);
        $error = $conex->errorInfo();
    } catch (PDOException $exc) {
        echo $exc->getTraceAsString(); // error de php
        echo 'Error:' . $exc->getMessage(); // error del servidor de bd
    }

    $result = $conex->query("SELECT * from usuario where usuario='$_POST[usuario]' and password='" . md5($_POST["password"]) . "'");

    if ($result->rowCount()) {
        session_start();
        $_SESSION['usuario'] = $_POST['usuario'];
        $_SESSION['password'] = $_POST['password'];
        header('Location: productos.php');
    }
    else{
        
        echo '<h3>Usuario y/o contraseña incorrectos</h3>';
    }

}
?>
<body>

<div id="login">
<fieldset >
        <legend >Login</legend>
        <div><span class='error'>	</span></div>
        <form action="" method="POST">

            <label for="usuario">Usuario</label><br>
            <input type="text" class="campo" name="usuario"><br>

            <label for="password">Contraseña</label><br>
            <input type="password" class="campo" name="password"><br>

            <input type="submit" name="enviar" value="Enviar">

        </form>
    </fieldset>

</div>
    

</body>

</html>