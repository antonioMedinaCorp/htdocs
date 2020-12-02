<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once './Mamifero.php';
/**
 * Description of Perro
 *
 * @author anton
 */
class Perro extends Mamifero {
    private $sonido;
    
    public function __construct($nombre, $color, $habilidad, $sonido="guau") {
        parent::__construct($nombre, $color, $habilidad);
        $this->sonido = $sonido;
        
    }
    
    public function buscaElPalo(){
        return "*CORRE POR EL PALO*";
    }

    public function __toString() {
        parent::__toString()." y soy un perro";
    }

    
}
