<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
}

//Añadir elemento a la cesta
if (isset($_POST['add'])) {

    if (isset($_SESSION['cesta'][$_POST['add']])) {
        $cantidad = $_SESSION['cesta'][$_POST['add']]['cantidad'];
        $cantidad++;
    } else {
        $cantidad = 1;
    }

    $data = array('nombre_corto' => $_POST['nombre_corto'], 'PVP' => $_POST['PVP'], 'cantidad' => $cantidad);

    $_SESSION['cesta'][$_POST['add']] = $data;
}

//Borrar variable cesta si se pulsa el botón vaciar
if (isset($_POST['vaciar'])) {
    unset($_SESSION['cesta']);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Productos</title>
</head>

<body class="pagproductos">
    <div id="contenedor">
        <div id="encabezado">
            <h1>Listado de productos</h1>
        </div>
        <div id="cesta">
            <h3><img src="cesta.jpg" alt="Cesta" width="24" height="21">Cesta</h3>

            <?php
            if (isset($_SESSION['cesta'])) {
                foreach ($_SESSION['cesta'] as $key => $value) {
                    echo $value['nombre_corto'] . " X " . $value['cantidad'] . "<br>";
                }
            }

            ?>

            <hr />


            <form action="" method="POST">
                <input type="submit" name="vaciar" value="Vaciar Cesta">
            </form>
            <form action="cesta.php" method="POST">
                <input type="submit" name="comprar" value="Comprar">
            </form>

        </div>
        <div id="productos">
            <?php

            try {
                $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
                $conex = new PDO('mysql:host=localhost; dbname=dwes; charset=UTF8mb4', 'dwes', 'abc123.', $opciones);
                $error = $conex->errorInfo();
            } catch (PDOException $exc) {
                echo $exc->getTraceAsString(); // error de php
                echo 'Error:' . $exc->getMessage(); // error del servidor de bd
            }

            $result = $conex->query("SELECT * from producto");

            while ($obj = $result->fetch(PDO::FETCH_OBJ)) {
            ?>
                <form action="" method="POST">

                    <?php
                    echo '<button type="submit" name="add" value="' . $obj->cod . '">Añadir</button>';
                    echo ' Producto: ';
                    echo '<input type="hidden" name="cod" value="' . $obj->cod . '">';
                    echo '<input type="text" name="nombre_corto" value="' . $obj->nombre_corto . '" readonly>';
                    echo ' Precio: <input type="text" name="PVP" value="' . $obj->PVP . '" readonly>€';
                    ?>
                </form>
            <?php
            }


            ?>
        </div>
        <br class="divisor" />
        <div id="pie">
            <form action="logoff.php" method="POST">
                <input type="submit" name="salir" value="Salir ">
            </form>

            <p class='error'> </p>

        </div>



    </div>
    </div>
</body>

</html>