<?php
require_once './Controlador/cuentaControlador.php';

session_start();

if (isset($_POST['cerrarSesion'])) {
    session_unset();
    session_destroy();
}

if (!isset($_SESSION['DNI'])) {
    header("location: index.php");
}

if (isset($_POST['iban'])) {
    $_SESSION['ibanCuentaOrigen'] = $_POST['iban'];
}
?>

<html>
    <head>
        <title>Transferencias</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </head>
    <body>
        <?php
        if (isset($_SESSION['nombre'])) {
            echo "<h1>Hola " . $_SESSION['nombre'] . "<h1><br>";
            ?>
            <form action="" method="post">
                <button type="submit" class="btn btn-dark"name="cerrarSesion">Cerrar sesión</button>
            </form>    
            <?php
        }

        $cuenta = cuentaControlador::getCuentaByIban($_SESSION['ibanCuentaOrigen']);
        $allCuentas = cuentaControlador::getAllCuentasMenosBancoyCliente($_SESSION['ibanCuentaOrigen']);
        ?>

        <h2>Tramitar transferencia</h2>
        <form class="formcontrol" action="validar_transferencia.php" method="post">
            <h2>Origen: <?php echo $_SESSION['ibanCuentaOrigen'] ?></h2>

            <h2>Saldo: <?php echo $cuenta->saldo ?></h2>
            <input name="saldo" type="hidden" value="<?php echo $cuenta->saldo ?>">
            <label for="cuentaDestino">Cuenta destino</label><br>
            <select name="cuentaDestino" required="true">
                <?php
                foreach ($allCuentas as $value) {
                    echo '<option value="' . $value->iban . '">' . $value->iban . '</option>';
                }
                ?>
            </select>
            <br>
            <label for="cantidad">Cantidad</label><br>
            <input type="number" name="cantidad" min="0" required="true">
            <br>
            <br>
            <input type="submit" class="btn btn-danger" value="Transferir">

        </form>
       
        <form action="inicio_cliente.php" method="post">
            <input type="submit" class="btn btn-primary" value="Volver">
        </form>



    </body>

</html>

