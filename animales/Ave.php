<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once './Animal.php';
/**
 * Description of Ave
 *
 * @author anton
 */
class Ave extends Animal {
    
    public function __construct($nombre, $color, $habilidad) {
        parent::__construct($nombre, $color, $habilidad);
    }

}
