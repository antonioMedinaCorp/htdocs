<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dado
 *
 * @author anton
 */
class Dado {
    private $caras;
    private static $NTiradas ;
    
    public function __construct() {
        $this->caras  = ['A', 'K','Q','J',7,8];
    }

    public function tirar() {
        self::$NTiradas++;
        return $this->caras[rand(0,5)];
        
    }
    
    public function getNombreFigura($cara) {
        return 'Ha salido la cara con figura '.$cara;
    }
    
    public static function getTiradasTotales() {
        return self::$NTiradas;
    }
    
    
}
