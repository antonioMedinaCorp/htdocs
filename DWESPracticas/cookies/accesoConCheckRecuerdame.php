<?php
if (isset($_POST['enviar'])) {


    try {
        $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_SERVER_VERSION);
        $usuarios = new PDO('mysql:host=localhost; dbname=usuarios; charset=UTF8mb4', 'dwes', 'abc123.', $opciones);
        $usuarioActual = hash($_POST[]);
        $registro = $dwes->exec("SELECT * FROM registros where usuario='".$usuarioActual."'");
        echo $registro;
        // echo $dwes->errorCode();
        $error = $dwes->errorInfo();
        echo $error[2];
    } catch (PDOException $exc) {
        echo $exc->getTraceAsString(); // error de php
        echo 'Error:' . $exc->getMessage(); // error del servidor de bd
    }
} else {
    ?>

    <html>
        <head>

        </head>
        <body>
            <?php
            ?>

            <form name="datosAcceso" action="" method="POST">
                Nombre:
                <input type="text" name="usuario" placeholder="Introduzca usuario"><br>
                Contraseña:
                <input type="text" name="password" placeholder="Introduzca contraseña"><br>
                Recuérdame: 
                <input type="checkbox" name="recordar"><br>
                <input type="submit" name="enviar" value="Entrar">


            </form>
            <?php
        }
        ?> 
    </body>
</html>