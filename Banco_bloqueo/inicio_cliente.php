<?php
require_once './Controlador/cuentaControlador.php';
require_once './Controlador/transferenciaControlador.php';

session_start();

if (isset($_POST['cerrarSesion'])) {
    session_unset();
    session_destroy();
}

if (!isset($_SESSION['DNI'])) {
    header("location: index.php");
}
?>

<html>
    <head>
        <title>Inicio cliente</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <style>
            table, tr, td{
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <?php
        if (isset($_SESSION['nombre'])) {
            echo "<h1>Hola " . $_SESSION['nombre'] . "<h1><br>";
            ?>
            <form action="" method="post">
                <button class="btn btn-dark" type="submit" name="cerrarSesion">Cerrar sesión</button>
            </form>    
            <?php
        }
        ?>

        <table class="table">
            <thead class="thead-dark">
                <tr >
                    <th >Cuentas</td>
                    <th >Saldo</td>
                    <th >Historial</td>
                    <th >Transferencia</td>
                </tr>
            </thead>
            <tbody>


                <?php
                $cuentasArray = cuentaControlador::getCuentasDNI($_SESSION['DNI']);

                foreach ($cuentasArray as $value) {
                    echo "<tr>";
                    echo "<td>" . $value->iban . "</td>";
                    echo "<td>" . $value->saldo . "</td>";

                    echo "<td>";
                    echo '<form action="" method="post"><input type="hidden" name="iban" value="' . $value->iban . '"> <input type="submit" class="btn btn-warning" name="historial" value="Historial"></form>';
                    echo "</td>";

                    echo "<td>";
                    echo '<form action="transferencias.php" method="post"><input type="hidden" name="iban" value="' . $value->iban . '"><input type="submit" class="btn btn-warning" name="transferencias" value="transferencias"></form>';
                    echo "</td>";

                    echo "</tr>";
                }
                ?>

            </tbody>
        </table>

        <?php
        if (isset($_POST['historial'])) {
            echo "<h2>Historial</h2>";
            ?>

        <table class="table">
            <thead class="thead-dark">
                                <tr>
                        <th >Origen</td>
                        <th >Destino</td>
                        <th >Fecha</td>
                        <th >Cantidad</td>
                    </tr>
            </thead>
                <tbody>
    

                    <?php
                    $transferenciasArray = transferenciaControlador::getAllTransferenciasConIban($_POST['iban']);

                    if ($transferenciasArray != null) {
                        foreach ($transferenciasArray as $value) {
                            echo "<tr>";
                            echo "<td>" . $value->iban_origen . "</td>";
                            echo "<td>" . $value->iban_destino . "</td>";


                            echo "<td>";
                            echo date("Y-m-d H:i:s", $value->fecha);
                            echo "</td>";

                            echo "<td>";
                            echo $value->cantidad;
                            echo "</td>";

                            echo "</tr>";
                        }
                    } else {
                        echo "<h3>No hay transferencias en esta cuenta</h3>";
                    }
                    ?>

                </tbody>
            </table>

            <?php
        }
        ?>

    </body>
</html>

