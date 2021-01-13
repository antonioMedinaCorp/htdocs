<?php
require_once './Modelo/Alquiler.php';
require_once './Modelo/Conexion.php';


class alquilerControlador {

    public static function insertar(Alquiler $a) {

        try {
            $conex = new Conexion();
            $conex->exec("INSERT INTO alquiler (Cod_juego, DNI_cliente, Fecha_alquiler, Fecha_devol) values ('$a->Cod_juego','$a->DNI_cliente','$a->Fecha_alquiler','$a->Fecha_devol')");
            $conex->exec("UPDATE juegos SET Alguilado='SI' WHERE Codigo ='$a->Cod_juego'");
       
        } catch (PDOException $exc) {
            
            echo $exc->getMessage();
            die('error con la base de datos');
        }
        unset($conex);

        
    }

    public static function buscarAlquiler($id) {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from alquiler WHERE id='$id");

            if ($result->rowCount()) {
                $registro = $result->fetchObject();
                $a = new Alquiler($registro->id, $registro->Cod_juego, $registro->DNI_cliente, $registro->Fecha_alquiler, $registro->Fecha_devol);
                
                return $j;
            }
            unset($result);
            unset($conex);
        } catch (PDOException $exc) {
            die('Error en bbdd');
        }
    }

    public static function buscarTodosAlquiler() {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from alquiler");

            if ($result->rowCount()) {
                while ($registro = $result->fetchObject()){
                
                $a = new Alquiler($registro->id, $registro->Cod_juego, $registro->DNI_cliente, $registro->Fecha_alquiler, $registro->Fecha_devol);

                    $alquilerArray[] = clone($a);
                }
                        
                
                return $alquilerArray;
            }else{
                return false;
            }
            unset($result);
            unset($conex);
        } catch (PDOException $exc) {
            die('Error en bbdd');
        }
    }
    
    public static function getAlquileresDeCliente($dni) {
                try {
            $conex = new Conexion();
            $result = $conex->query("select * from alquiler where DNI_cliente='$dni'");

            if ($result->rowCount()) {
                while ($registro = $result->fetchObject()){
                
                $a = new Alquiler($registro->id, $registro->Cod_juego, $registro->DNI_cliente, $registro->Fecha_alquiler, $registro->Fecha_devol);

                    $alquilerArray[] = clone($a);
                }
                        
                
                return $alquilerArray;
            }else{
                return false;
            }
            unset($result);
            unset($conex);
        } catch (PDOException $exc) {
            $exc->getMessage();
            die('Error en bbdd');
        }
    }

}
