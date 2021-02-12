<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_POST['enviar'])) {
    $tiempo = json_decode(file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=" . $_POST['ciudades'] . ",es&APPID=034f4f4025183f64e8f147012a02bbaa&lang=es&units=metric"));

    echo 'TIEMPO EN '. $tiempo->name;
    echo "<br>Temperatura: " . $tiempo->main->temp . "ºC<br>"; 
    echo "Humedad: " . $tiempo->main->humidity . "%<br>";
    echo "Presión: " . $tiempo->main->pressure . "mb<br>";
}
?>

<form action="" method="post">
    <label for="ciudades">El tiempo en:</label>
    <select name="ciudades" id="ciudades">
        <option value="Lucena">Lucena</option>
        <option value="Madrid">Madrid</option>
        <option value="Zaragoza">Zaragoza</option>
        <option value="Barcelona">Barcelona</option>
    </select>
    <br><br>
    <input type="submit" name="enviar" value="Submit">
</form>

