<?php
require_once "model/configDB.php";
    class Model{

        protected static function db(){
            $conexion = null;
            try {
                $conexion = new PDO(CADENA_CONEXION, USUARIO_BDD, CONTRA_BDD);
            } catch (PDOException $e) {
                echo "Problema en la conexión";
            }finally {
            return $conexion;
            }
        }
        
    };
?>