<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Animal
 *
 * @author anton
 */
class Animal {
    protected $nombre;
    protected $color;
    protected $habilidad;
    
    function __construct($nombre, $color, $habilidad) {
        $this->nombre = $nombre;
        $this->color = $color;
        $this->habilidad = $habilidad;
    }
    
    function __get($name) {
        return $this->$name;
    }
    
    function __set($name, $value) {
        $this->$name = $value;
    }

    public function __toString() {
        return "nombre: ".$this->nombre. ", color: ".$this->color.", habilidad: ".$this->habilidad;
    }
    
    

}
