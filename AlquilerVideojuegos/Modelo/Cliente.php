<?php


class Cliente {
    private $dni;
    private $nombre;
    private $apelldios;
    private $direccion;
    private $localidad;
    private $clave;
    private $tipo;
    
    public function __construct($dni, $nombre, $apelldios, $direccion, $localidad, $clave, $tipo) {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apelldios = $apelldios;
        $this->direccion = $direccion;
        $this->localidad = $localidad;
        $this->clave = $clave;
        $this->tipo = $tipo;
    }
    
    public function __get($name) {
        return $this->$name;
    }
    
    public function __set($name, $value) {
        $this->$name=$value;
    }
    
    public function __toString() {
        return "Nombre:". $this->nombre."DNI:". $this->dni;
    }

}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

