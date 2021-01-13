<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require_once __DIR__ . '/vendor/autoload.php';
require_once './Conexion.php';

$server = new nusoap_server();
$namespace = "http://localhost/tarea6/Server.php";
//Se especifica cual será el nombre del servicio web
$server->configureWSDL("Tarea 6 database", $namespace);
$server->wsdl->schemaTargenNamespace = $namespace;

//Registrar las funciones
$server->register('getPVP', array('codProducto' => "xsd:string"), array("return" => "xsd:string"), FALSE, FALSE, FALSE, FALSE, "getPVP");

$server->register('getStock', array('codProducto' => "xsd:string", 'codTienda' => "xsd:string"), array("return" => "xsd:string"), FALSE, FALSE, FALSE, FALSE, "getStock");

$server->register('getFamilias', array(), array("return" => "xsd:Array"), FALSE, FALSE, FALSE, FALSE, "getFamilias");

//Declarar las funciones

function getPVP($codProducto) {

    try {
        $conex = new Conexion();
        $result = $conex->query("SELECT PVP FROM producto WHERE cod='$codProducto'");

        if ($result->rowCount()) {

            $registro = $result->fetchObject();

            $pvp = $registro->PVP;
            return $pvp;
        }
        unset($result);
        unset($conex);
    } catch (PDOException $exc) {
        $errores[] = $exc->getMessage();
        die('Error en bbdd');
    }
}

function getStock($codProducto, $codTienda) {

    try {
        $conex = new Conexion();
        $result = $conex->query("SELECT unidades FROM stock WHERE producto='$codProducto' AND tienda='$codTienda'");

        if ($result->rowCount()) {

            $registro = $result->fetchObject();

            $stock = $registro->unidades;
            return $stock;
        }
        unset($result);
        unset($conex);
    } catch (PDOException $exc) {
        $errores[] = $exc->getMessage();
        die('Error en bbdd');
    }
}

function getFamilias() {

    try {
        $conex = new Conexion();
        $result = $conex->query("SELECT cod FROM familia");

        if ($result->rowCount()) {

            $familias=[];
            while($registro = $result->fetchObject()){
                
                $familias = clone($registro);
                
            }
            return $familias;
        }
        unset($result);
        unset($conex);
    } catch (PDOException $exc) {
        $errores[] = $exc->getMessage();
        die('Error en bbdd');
    }
}

//Desplegar el servicio del servlet
$server->service(file_get_contents("php://input"));
