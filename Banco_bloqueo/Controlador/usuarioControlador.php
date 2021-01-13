<?php

require_once './Model/Conexion.php';
require_once './Model/Usuario.php';


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuarioControlador
 *
 * @author anton
 */
class usuarioControlador {

    public static function getUsuarioDNIandClave($DNI, $clave) {
        try {
            $conex = new Conexion();
            $result = $conex->prepare("select * from usuarios WHERE DNI=? and clave=?");
            $pass = md5($clave);
            $result->execute([$DNI, $pass]);

            if ($result->rowCount()) {
                $registro = $result->fetchObject();
                $u = new Usuario($registro->Nombre, $registro->Direccion, $registro->Telefono, $registro->DNI, $registro->clave, $registro->intentos, $registro->bloqueado);

                return $u;
            }
            unset($result);
            unset($conex);
        } catch (PDOException $exc) {
            $errores[] = $exc->getMessage();
            die('Error en bbdd');
        }
    }

    public static function getUsuarioDNI($DNI) {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from usuarios WHERE DNI='$DNI'");

            if ($result->rowCount()) {
                $registro = $result->fetchObject();
                $u = new Usuario($registro->Nombre, $registro->Direccion, $registro->Telefono, $registro->DNI, $registro->clave, $registro->intentos, $registro->bloqueado);

                return $u;
            }
            unset($result);
            unset($conex);
        } catch (PDOException $exc) {
            $errores[] = $exc->getMessage();
            die('Error en bbdd');
        }
    }
    
    public static function bloquearUsuario($u) {
        try {
                        
       
            $conex = new Conexion();
            $result = $conex->query("update usuarios set bloqueado=true where DNI='$u->DNI'");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        }
    
    public static function updateIntentosUsuario($u) {
        
        try {
            
            
            $intentosRestantes = $u->intentos - 1;
            $conex = new Conexion();
            $result = $conex->query("update usuarios set intentos=$intentosRestantes where DNI='$u->DNI'");
            if($intentosRestantes <= 0){
                usuarioControlador::bloquearUsuario($u);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
            
    }
    
        public static function restablecerIntentosUsuario($u) {
        
        try {
            
            
            
            $conex = new Conexion();
            $result = $conex->query("update usuarios set intentos=3 where DNI='$u->DNI'");

        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
            
    }
    
    

}
