<?php

require_once './Model/Conexion.php';
require_once './Model/Transferencia.php';
require_once './Controlador/cuentaControlador.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of transferenciaControlador
 *
 * @author anton
 */
class transferenciaControlador {

    public static function getTransferencia($DNI) {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from cuentas WHERE dni_cuenta='$DNI'");

            if ($result->rowCount()) {

                while ($registro = $result->fetchObject()) {

                    $c = new Cuenta($registro->iban, $registro->saldo, $registro->dni_cuenta);

                    $cuentasArray[] = clone($c);
                }

                return $cuentasArray;
            }
            unset($result);
            unset($conex);
        } catch (PDOException $exc) {
            $errores[] = $exc->getMessage();
            die('Error en bbdd');
        }
    }

    public static function getAllTransferenciasConIban($iban) {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from transferencias WHERE iban_origen='$iban' or iban_destino='$iban'");

            if ($result->rowCount()) {

                while ($registro = $result->fetchObject()) {

                    $t = new Transferencia($registro->iban_origen, $registro->iban_destino, $registro->fecha, $registro->cantidad);

                    $transfArray[] = clone($t);
                }

                return $transfArray;
            }
            else{
                return null;
            }
            
            unset($result);
            unset($conex);
        } catch (PDOException $exc) {
           echo $exc->getMessage();
            die('Error en bbdd');
        }
    }
    
    public static function setNewTransferencia($iban_origen, $iban_destino, $fecha, $cantidad){

        
        try{
            $conex = new Conexion();
            $conex->query("insert into transferencias (iban_origen, iban_destino, fecha, cantidad) values ('$iban_origen','$iban_destino','$fecha',$cantidad)");
            
            cuentaControlador::movimientoEntreCuentas($iban_origen, $iban_destino, $cantidad);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
        
        
    }

}
