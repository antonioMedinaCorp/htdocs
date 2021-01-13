<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cuenta
 *
 * @author anton
 */
class Cuenta {

    private $iban;
    private $saldo;
    private $dni_cuenta;

    function __construct($iban, $saldo, $dni_cuenta) {
        $this->iban = $iban;
        $this->saldo = $saldo;
        $this->dni_cuenta = $dni_cuenta;
    }

    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }

    public function __toString() {
        return "IBAN:" . $this->iban . "Saldo:" . $this->saldo;
    }

}
