<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once './Mamifero.php';

/**
 * Description of Gato
 *
 * @author anton
 */
class Gato extends Mamifero {
    private $sonido;
    
    public function __construct($nombre, $color, $habilidad, $sonido = "miau") {
        parent::__construct($nombre, $color, $habilidad);
        $this->sonido = $sonido;
        
    }

        public function __toString() {
        parent::__toString()." y soy un gato";
    }

}
