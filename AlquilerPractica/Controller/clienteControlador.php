<?php

require_once './Modelo/Conexion.php';
require_once './Modelo/Cliente.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class clienteControlador {

    public static function insertar(Cliente $c) {

        try {
            $conex = new Conexion();
            $pass = md5($c->clave);
            $conex->exec("INSER INTO cliente (DNI, Nombre, Apellidos, Direccion, Localidad, Clave, Tipo) values ('$c->dni','$c->nombre','$c->apellidos','$c->direccion','$c->localidad','$pass','$c->tipo')");
        } catch (PDOException $exc) {
            die('Error en bbdd');
        }
        unset($conex);
    }

    public static function buscarCliente($DNI, $clave, &$error) {
        try {
            $conex = new Conexion();
            $result = $conex->prepare("select * from cliente WHERE DNI=? and Clave=?");
            $pass = md5($clave);
            $result->execute([$DNI, $pass]);

            if ($result->rowCount()) {
                $registro = $result->fetchObject();
                $c = new Cliente($registro->DNI, $registro->Nombre, $registro->Apellidos, $registro->Direccion, $registro->Localidad, $registro->Clave, $registro->Tipo);

                return $c;
            }
            unset($result);
            unset($conex);
        } catch (PDOException $exc) {
            die('Error en bbdd');
        }
    }

    public static function buscarTodosClientes() {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from cliente");

            if ($result->rowCount()) {
                while ($registro = $result->fetchObject()){
                
                    $c = new Cliente($registro->DNI, $registro->Nombre, $registro->Apellidos, $registro->Direccion, $registro->Localidad, $registro->Clave, $registro->Tipo);

                    $clientesArray[] = clone($c);
                }
                        
                
                return $clientesArray;
            }else{
                return false;
            }
            unset($result);
            unset($conex);
        } catch (PDOException $exc) {
            die('Error en bbdd');
        }
    }

}


