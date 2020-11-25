<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
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
            <hr />
            <?php

            try {
                $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
                $conex = new PDO('mysql:host=localhost; dbname=dwes; charset=UTF8mb4', 'dwes', 'abc123.', $opciones);
                $error = $conex->errorInfo();
            } catch (PDOException $exc) {
                echo $exc->getTraceAsString(); // error de php
                echo 'Error:' . $exc->getMessage(); // error del servidor de bd
            }

            $result = $conex->query("SELECT * from usuario where usuario='$_POST[usuario]' and password='" . md5($_POST["password"]) . "'");



            ?>
            <form action="" method="POST">
                <input type="submit" name="vaciar" value="Vaciar Cesta">
            </form>
            <form action="cesta.php" method="POST">
                <input type="submit" name="comprar" value="Comprar">
            </form>

        </div>
        <div id="productos">
            <?php


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