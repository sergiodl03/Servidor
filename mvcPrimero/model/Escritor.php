<?php
require_once "model/Model.php";
class Escritor extends Model{

    private $nombre;
    private $codigo;
    private $nacionalidad;
    private $fecha_nacimiento;
    private $fecha_fallecimiento;


    public static function consultarTodos(){
        $todosEscritores = null;
        

        try {
            $conexion = Escritor::db();

            $sql1 = "SELECT * from escritor ORDER BY nombre ASC";

            $resultado = $conexion->query($sql1);

            $todosEscritores = $resultado->fetchAll(PDO::FETCH_CLASS, Escritor::class);
        } catch (PDOException $e) {
            echo "Problema en la conexión";
        } finally {
            return $todosEscritores;
        }
        return $conexion;
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
     * Get the value of codigo
     */ 
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set the value of codigo
     *
     * @return  self
     */ 
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get the value of nacionalidad
     */ 
    public function getNacionalidad()
    {
        return $this->nacionalidad;
    }

    /**
     * Set the value of nacionalidad
     *
     * @return  self
     */ 
    public function setNacionalidad($nacionalidad)
    {
        $this->nacionalidad = $nacionalidad;

        return $this;
    }

    /**
     * Get the value of fecha_nacimiento
     */ 
    public function getFecha_nacimiento()
    {
        return $this->fecha_nacimiento;
    }

    /**
     * Set the value of fecha_nacimiento
     *
     * @return  self
     */ 
    public function setFecha_nacimiento($fecha_nacimiento)
    {
        $this->fecha_nacimiento = $fecha_nacimiento;

        return $this;
    }

    /**
     * Get the value of fecha_fallecimiento
     */ 
    public function getFecha_fallecimiento()
    {
        return $this->fecha_fallecimiento;
    }

    /**
     * Set the value of fecha_fallecimiento
     *
     * @return  self
     */ 
    public function setFecha_fallecimiento($fecha_fallecimiento)
    {
        $this->fecha_fallecimiento = $fecha_fallecimiento;

        return $this;
    }
}
?>