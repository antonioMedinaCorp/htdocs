<?php

require_once './Model/Conexion.php';
require_once './Model/Cuenta.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cuentaControlador
 *
 * @author anton
 */
class cuentaControlador {

    public static function getCuentasDNI($DNI) {
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

    public static function getCuentaByIban($iban) {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from cuentas WHERE iban='$iban'");


            if ($result->rowCount()) {
                $registro = $result->fetchObject();
                $c = new Cuenta($registro->iban, $registro->saldo, $registro->dni_cuenta);

                return $c;
            }
            unset($result);
            unset($conex);
        } catch (PDOException $exc) {
            $errores[] = $exc->getMessage();
            die('Error en bbdd');
        }
    }

    public static function getAllCuentasMenosBancoyCliente($ibanCliente) {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from cuentas where not (iban='ES2099999999999999999999' or iban='$ibanCliente') ");

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

    public static function updateSaldoCuenta($iban, $saldo) {
        try {
            $conex = new Conexion();
            $result = $conex->query("UPDATE cuentas SET saldo=$saldo WHERE iban='$iban'");

            unset($conex);
        } catch (PDOException $exc) {
            $errores[] = $exc->getMessage();
            die('Error en bbdd');
        }
    }

    public static function movimientoEntreCuentas($ibanOrigen, $ibanDestino, $cantidad) {
        $cuentaOrigen = cuentaControlador::getCuentaByIban($ibanOrigen);
        $nuevoSaldo = $cuentaOrigen->saldo;
        echo $nuevoSaldo;
        $nuevoSaldo -= $cantidad;
        echo $nuevoSaldo;
        cuentaControlador::updateSaldoCuenta($cuentaOrigen->iban, $nuevoSaldo);

        $cuentaDestino = cuentaControlador::getCuentaByIban($ibanDestino);

        $nuevoSaldo = $cuentaDestino->saldo;
        $nuevoSaldo += $cantidad;
        cuentaControlador::updateSaldoCuenta($cuentaDestino->iban, $nuevoSaldo);
    }

}
