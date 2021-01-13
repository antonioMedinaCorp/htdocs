<?php

require_once './Modelo/Conexion.php';
require_once './Modelo/Juego.php';

class juegoControlador {

    public static function insertar(Juego $j) {

        try {
            $conex = new Conexion();
            $conex->exec("INSER INTO juegos (Codigo, Nombre_juego, Nombre_consola, Anno, Precio, Alguilado, Imagen, Descripcion) values ('$j->codigo','$j->nombre_juego','$j->nombre_consola','$j->anno','$j->precio', '$j->alquilado', '$j->imagen','$j->descripcion')");
        } catch (PDOException $exc) {
            header('Location:index.php');
            die('error con la base de datos');
        }
        unset($conex);
    }

    public static function buscarJuego($codigo) {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from juegos WHERE Codigo='$codigo");

            if ($result->rowCount()) {
                $registro = $result->fetchObject();
                $j = new Juego($registro->Codigo, $registro->Nombre_juego, $registro->Nombre_consola, $registro->Anno, $registro->Precio, $registro->Alquilado, $registro->Imagen, $registro->Descripcion);
                
                return $j;
            }
            unset($result);
            unset($conex);
        } catch (PDOException $exc) {
            die('Error en bbdd');
        }
    }

    public static function buscarTodosJuegos() {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from juegos");

            if ($result->rowCount()) {
                while ($registro = $result->fetchObject()){
                
                    $j = new Juego($registro->Codigo, $registro->Nombre_juego, $registro->Nombre_consola, $registro->Anno, $registro->Precio, $registro->Alguilado, $registro->Imagen, $registro->descripcion);

                    $juegosArray[] = clone($j);
                }
                        
                
                return $juegosArray;
            }else{
                return false;
            }
            unset($result);
            unset($conex);
        } catch (PDOException $exc) {
            die('Error en bbdd');
        }
    }

}
