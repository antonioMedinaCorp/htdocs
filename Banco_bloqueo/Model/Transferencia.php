<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Transferencia
 *
 * @author anton
 */
class Transferencia {

    private $iban_origen;
    private $iban_destino;
    private $fecha;
    private $cantidad;

    function __construct($iban_origen, $iban_destino, $fecha, $cantidad) {
        $this->iban_origen = $iban_origen;
        $this->iban_destino = $iban_destino;
        $this->fecha = $fecha;
        $this->cantidad = $cantidad;
    }

    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }



}
