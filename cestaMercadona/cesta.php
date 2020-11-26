<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cesta</title>
</head>
<body class="pagcesta">
        <div id="contenedor">
            <div id="encabezado">
                <h1>Cesta de la compra</h1>
            </div>
            <div id="productos">
                <?php
                $precioTotal = 0;
                foreach ($_SESSION['cesta'] as $key => $value) {
                    echo $key."\t".$value['nombre_corto'] . "\t".$value['PVP']."€ X " . $value['cantidad']. "<br>";

                    $precioTotal += $value['PVP'] * $value['cantidad'];
                }

                ?>
                <hr />
                <p><span class="pagar">Precio total: <?php echo $precioTotal ?>	€</span></p>
                <form action="pagar.php" method="POST">
                    <p><span class="pagar"><input type="submit" name="pagar" value="Pagar"</span></p>
                </form>
            </div>
            <br class="divisor" />
            <div id="pie">
                <form action="logoff.php" method="POST">
                    <input type="submit" name="salir" value="Salir">
                </form>

		<p class='error'>   </p>
                
            </div>
        </div>
        
        
        
    </body>
</html>