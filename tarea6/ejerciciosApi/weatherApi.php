<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$jsonWeather = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=Madrid,es&APPID=034f4f4025183f64e8f147012a02bbaa&lang=es&units=metric");
//var_dump($jsonWeather);

$wheather = json_decode($jsonWeather);

print_r($jsonWeather);