<?php

class Persona {

    private $nombre;
    private $apellidos;
    private $edad;

    function __construct($nombre="", $apellidos="", $edad=20) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->edad = $edad;
    }

    
    function __get($name) {
        return $this->$name;
    }
    
    function __set($name, $value) {
        $this->$name = $value;
    }
    
    function __toString() {
        return "con esto escribes cosas como el nombre:". $this->nombre;
    }


    function getNombre() {
        return $this->nombre;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getEdad() {
        return $this->edad;
    }

    function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    function setApellidos($apellidos): void {
        $this->apellidos = $apellidos;
    }

    function setEdad($edad): void {
        $this->edad = $edad;
    }

}
