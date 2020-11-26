<?php
session_start();
?>


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
        $conex = new PDO('mysql:host=localhost; dbname=tema4_logueo; charset=UTF8mb4', 'dwes', 'abc123.', $opciones);
        $error = $conex->errorInfo();
    } catch (PDOException $exc) {
        echo $exc->getTraceAsString(); // error de php
        echo 'Error:' . $exc->getMessage(); // error del servidor de bd
    }

    $result = $conex->query("SELECT * from perfil_usuario where user='$_POST[usuario]' and pass='" . md5($_POST["password"]) . "'");


    if(!isset($_COOKIE['intentos'])){
        $try = 3;
        setcookie('intentos', $try, time() + 3600);
    }


    if ($result->rowCount()) {
        session_start();
        $_SESSION['usuario'] = $_POST['usuario'];
        $_SESSION['password'] = $_POST['password'];
        header('Location: productos.php');
    }
    else{
        $_COOKIE['intentos']--;
        echo '<h3>Usuario y/o contraseña incorrectos</h3>';
        echo 'Intentos Restantes: '. $_COOKIE['intentos'];
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
        <form action="registro.php" method="post">
            <input type="submit" name="registrar" value="Registrar">
        </form>
    </fieldset>

</div>
    

</body>

</html>