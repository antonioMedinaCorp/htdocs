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

        <div class="container">
            <h1>Juegos Comares</h1>
            <?php
            if (isset($_SESSION['nombre'])) {

                echo 'Hola:' . $_SESSION['nombre'];
            ?>
                <form action="" method="post">
                    <button type="submit" name="cerrarSesion" class="btn btn-dark">Cerrar sesión</button>
                </form>
            <?php
                if ($_SESSION['nombre'] == "Admin") {
                    ?>
                    <a href="vistaAdministrador.php" >Listado de Juegos</a> -- <a href="vistaJuegosAlquilados.php" >Listado de Juegos Alquilados</a> -- <a href="juegosNoAlquilados.php" >Listado de Juegos NO Alquilados</a> -- <a href="misJuegosAlquilados.php" >Mis Juegos Alquilados</a>
                    -- <a href="nuevoJuego.php">Añadir juego</a> -- <a href="administrarJuegos.php">Administrar juegos</a>

                    <?php
                } else {
                    ?>

                    <a href="vistaCliente.php" >Listado de Juegos</a> -- <a href="vistaJuegosAlquilados.php" >Listado de Juegos Alquilados</a> -- <a href="juegosNoAlquilados.php" >Listado de Juegos NO Alquilados</a> -- <a href="misJuegosAlquilados.php" >Mis Juegos Alquilados</a>

                    <?php
                }
            } else {
                header('location: index.php');
            }
            ?>

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
                            $juegos = juegoControlador::buscarTodosJuegos();
                            foreach ($juegos as $value) {
                                echo '<tr>';
                                ?>
                            <td><img src="<?php echo $value->imagen; ?>" width="50px" height="70px"/></td>
                            <td><?php echo $value->nombre_juego; ?></td>
                            <td><?php echo $value->nombre_consola; ?></td>
                            <td><?php echo $value->anno; ?></td><!-- comment -->
                            <td><?php echo $value->precio; ?></td>
                            <?php
                            if(isset($_SESSION['nombre'])){
                            ?>
                            <form action="" method="post">
                                <td>
                                    <button name="alquilar"  class="btn btn-info" value="<?php echo $value->codigo?>" <?php if($value->alquilado == "SI") echo 'disabled';?>>Alquilar</button>
                                </td>  
                            </form>
                            <?php
                            }
                            
                            echo '</tr>';
                        }
                        ?>


                        </tbody>
                    </table>
                </div>

            </div>
    </body>

</html>
