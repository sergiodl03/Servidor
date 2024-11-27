<?php
require_once "model/Model.php";
class Usuario extends Model
{
    private $id;
    private $nombre;
    private $contrasenya;

    public static function verificarContrasenya($nombreUsuario)
    {
        $conexion = null;

        $conexion = Usuario::db();

        $sql1 = "SELECT * FROM `Usuario` WHERE nombre = ?";
        $resultado = $conexion->prepare($sql1);
        $resultado->bindValue(1, $nombreUsuario);
        $resultado->execute();
        $resultado->setFetchMode(PDO::FETCH_CLASS, Usuario::class);
        $usuario = $resultado->fetch();
        return $usuario;
    }

    public static function insertarUsuario($nombreUsuario, $contrasenya)
    {
        $conexion = null;
        try {
            
            $conexion = Usuario::db();
            
            $sql1 = "INSERT INTO `Usuario` (`nombre`,`contrasenya`)
            VALUES(?, ?)";
            
            $resultado = $conexion->prepare($sql1);
            $resultado->bindValue(1, $nombreUsuario);
            $resultado->bindValue(2, $contrasenya);
            
            $resultado->execute();
            
            $nba = $resultado->fetch();
            
        } catch (PDOException $e) {
            echo "Problema en la conexión";
        } finally {
            return $nba;
        }
        return $conexion;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of contraseña
     */
    public function getContrasenya()
    {
        return $this->contrasenya;
    }

    /**
     * Set the value of contraseña
     *
     * @return  self
     */
    public function setContrasenya($contrasenya)
    {
        $this->contrasenya = $contrasenya;

        return $this;
    }
}
