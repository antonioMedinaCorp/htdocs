<?php
require_once './Controlador/usuarioControlador.php';
require_once './Model/Usuario.php';
?>

<!doctype html>
<html lang="en">

    <head>
        <title>Login</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </head>


    <body>

        <div id="login">
            <fieldset >
                <?php
                if (isset($_POST['enviar']) && !empty($_POST['DNI']) && !empty($_POST['clave'])) {
                    //conexión con bbdd    

                    $result = usuarioControlador::getUsuarioDNIandClave($_POST['DNI'], $_POST['clave']);

                    if (isset($result) && !$result->bloqueado) {


                        session_start();
                        $_SESSION['DNI'] = $result->DNI;
                        $_SESSION['nombre'] = $result->Nombre;
                        $_SESSION['clave'] = $result->clave;
                        usuarioControlador::restablecerIntentosUsuario($result);
                        header('Location: inicio_cliente.php');
                    } else {
                        $usuarioMal = usuarioControlador::getUsuarioDNI($_POST['DNI']);

                        if (isset($usuarioMal) && !$usuarioMal->bloqueado) {

                            usuarioControlador::updateIntentosUsuario($usuarioMal);
                            echo 'INTENTOS RESTANTES: ' . $usuarioMal->intentos;
                        } else {
                            echo"<h3>USUARIO BLOQUEADO</h3>";
                        }
                    }
                }
                ?>
                <legend >Login</legend>
                <div><span class='error'>	</span></div>
                <form class="formcontrol" action="" method="POST">

                    <label for="DNI">DNI</label><br>
                    <input type="text" class="campo" name="DNI"><br>

                    <label for="clave">Clave</label><br>
                    <input type="password" class="campo" name="clave"><br>

                    <input class="btn btn-primary" type="submit" name="enviar" value="Enviar">

                </form>
            </fieldset>

        </div>


    </body>

</html>