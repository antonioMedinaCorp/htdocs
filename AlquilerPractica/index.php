<?php
require_once './Controller/clienteControlador.php';
//require_once './Controlador/juegoControlador.php';

?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Index</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>


    <body>
<?php ?>
        <div class="container">
            <h1>Juegos Comares</h1>
            <form action="" method="post">
                <input type="text" name="dni" placeholder="Dni">
                <input type="text" name="pass" placeholder="Contraseña">
                <button type="submit" name="enviar" class="btn btn-light">Loguear</button>
<!--                <input type="submit" value="Loguear" name="enviar">-->
            </form>
            <div class="row">
                <div class="col">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>Portada</th>
                                <th>Nombre juego</th>
                                <th>Nombre consola</th>
                                <th>Año</th>
                                <th>Precio</th>
                            </tr>
                        </thead>
                        <tbody>

    <?php

    echo '<tr>';
    ?>

    <?php
    echo '</tr>';

    ?>


                        </tbody>
                    </table>
                </div>

            </div>
    </body>

</html>