<?php

class Usuario {

    private $Nombre;
    private $Direccion;
    private $Telefono;
    private $DNI;
    private $clave;
    private $intentos;
    private $bloqueado;

    function __construct($Nombre, $Direccion, $Telefono, $DNI, $clave, $intentos, $bloqueado) {
        $this->Nombre = $Nombre;
        $this->Direccion = $Direccion;
        $this->Telefono = $Telefono;
        $this->DNI = $DNI;
        $this->clave = $clave;
        $this->intentos = $intentos;
        $this->bloqueado = $bloqueado;
    }

    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }

    public function __toString() {
        return "Nombre:" . $this->Nombre . "DNI:" . $this->DNI;
    }

}
