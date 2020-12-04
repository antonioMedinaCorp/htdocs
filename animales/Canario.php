<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Canario
 *
 * @author anton
 */
class Canario extends Ave {
    private $cantaBien;
    
    public function __construct($nombre, $color, $habilidad, $cantaBien) {
        parent::__construct($nombre, $color, $habilidad);
        $this->cantaBien = $cantaBien;
    }
 
    
    public function seHaMuerto() {
        if($this->cantaBien){
            return "ay que pena me da";
        }
        else{
            return "asdfasd";
        }
    }

    
}
