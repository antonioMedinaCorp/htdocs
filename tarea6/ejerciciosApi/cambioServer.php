<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require_once __DIR__ . '/../vendor/autoload.php';

$server = new nusoap_server();
$namespace = "http://localhost/tarea6/ejerciciosApi/cambioServer.php";
//Se especifica cual será el nombre del servicio web
$server->configureWSDL("Tarea 6 database", $namespace);
$server->wsdl->schemaTargenNamespace = $namespace;

$server->register('getExchange', array('codProducto' => "xsd:string"), array("return" => "xsd:string"), FALSE, FALSE, FALSE, FALSE, "getPVP");


