<?php
require_once "model/Model.php";
class Estadisticas extends Model
{

    private $id;
    private $nombre;
    private $equipo;
    private $posicion;
    private $partidosJugados;
    private $minuntosPorPartido;
    private $puntosPorPartido;
    private $rebotesPorPartido;
    private $asistenciasPorPartido;
    private $robosPorPartido;
    private $bloqueosPorPartido;
    private $perdidasPorPartido;

    public static function consultarTodos()
    {
        $nba = null;


        try {
            $conexion = Estadisticas::db();

            $sql1 = "SELECT * from Estadisticas ORDER BY id ASC";

            $resultado = $conexion->query($sql1);

            $nba = $resultado->fetchAll(PDO::FETCH_CLASS, Estadisticas::class);
        } catch (PDOException $e) {
            echo "Problema en la conexión";
        } finally {
            return $nba;
        }
        return $conexion;
    }

    public static function paginate($page = 1, $size = 10)
    {

        $db = Estadisticas::db();
        $sql = "SELECT count(id) FROM Estadisticas";

        $statement = $db->query($sql);

        $n = (int) $statement->fetch()[0];
        $n = ceil($n / $size);

        $offset = ($page - 1) * $size;
        $sql1 = "SELECT * FROM Estadisticas LIMIT $offset, $size";

        $antes = microtime();
        $statement = $db->query($sql1);
        $despues = microtime();
        echo $despues - $antes;

        $nba = $statement->fetchAll(PDO::FETCH_CLASS, Estadisticas::class);
        $pages = new stdClass;

        $pages->nba = $nba;
        $pages->n = $n;

        return $pages;
    }

    public static function insertar()
    {
        $nba = null;
        try {
            $conexion = Estadisticas::db();

            $sql1 = "INSERT INTO `Estadisticas` (`nombre`,`equipo`,`posicion`,`partidosJugados`,`minuntosPorPartido`,`puntosPorPartido`,`rebotesPorPartido`,`asistenciasPorPartido`,`robosPorPartido`,`bloqueosPorPartido`,`perdidasPorPartido`)
            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";




            $resultado = $conexion->prepare($sql1);
            $resultado->bindValue(1, $_POST['nombre']);
            $resultado->bindValue(2, $_POST['equipo']);
            $resultado->bindValue(3, $_POST['posicion']);
            $resultado->bindValue(4, $_POST['partidosJugados']);
            $resultado->bindValue(5, $_POST['minuntosPorPartido']);
            $resultado->bindValue(6, $_POST['puntosPorPartido']);
            $resultado->bindValue(7, $_POST['rebotesPorPartido']);
            $resultado->bindValue(8, $_POST['asistenciasPorPartido']);
            $resultado->bindValue(9, $_POST['robosPorPartido']);
            $resultado->bindValue(10, $_POST['bloqueosPorPartido']);
            $resultado->bindValue(11, $_POST['perdidasPorPartido']);

            $resultado->execute();



            $nba = $resultado->fetch();
        } catch (PDOException $e) {
            echo "Problema en la conexión";
        } finally {
            return $nba;
        }
        return $conexion;
    }

    public static function borrar()
    {
        $nba = null;
        try {
            $conexion = Estadisticas::db();

            $sql1 = "DELETE  FROM Estadisticas WHERE id=?";



            $resultado = $conexion->prepare($sql1);
            $resultado->bindValue(1, $_POST['id']);

            $resultado->execute();



            $nba = $resultado->fetch();
        } catch (PDOException $e) {
            echo "Problema en la conexión";
        } finally {
            return $nba;
        }
        return $conexion;
    }

    public static function actualizar()
    {
        $nba = null;
        try {
            $conexion = Estadisticas::db();

            $sql1 = "UPDATE `Estadisticas` SET `nombre`=?,`equipo`=?,`posicion`=?,`partidosJugados`=?,`minuntosPorPartido`=?,`puntosPorPartido`=?,`rebotesPorPartido`=?,`asistenciasPorPartido`=?,`robosPorPartido`=?,`bloqueosPorPartido`=?,`perdidasPorPartido`=? WHERE `id`=?";


            $resultado = $conexion->prepare($sql1);
            $resultado->bindValue(1, $_POST['nombre']);
            $resultado->bindValue(2, $_POST['equipo']);
            $resultado->bindValue(3, $_POST['posicion']);
            $resultado->bindValue(4, $_POST['partidosJugados']);
            $resultado->bindValue(5, $_POST['minuntosPorPartido']);
            $resultado->bindValue(6, $_POST['puntosPorPartido']);
            $resultado->bindValue(7, $_POST['rebotesPorPartido']);
            $resultado->bindValue(8, $_POST['asistenciasPorPartido']);
            $resultado->bindValue(9, $_POST['robosPorPartido']);
            $resultado->bindValue(10, $_POST['bloqueosPorPartido']);
            $resultado->bindValue(11, $_POST['perdidasPorPartido']);
            $resultado->bindValue(12, $_POST['id']);

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
     * Get the value of equipo
     */
    public function getEquipo()
    {
        return $this->equipo;
    }

    /**
     * Set the value of equipo
     *
     * @return  self
     */
    public function setEquipo($equipo)
    {
        $this->equipo = $equipo;

        return $this;
    }

    /**
     * Get the value of posicion
     */
    public function getPosicion()
    {
        return $this->posicion;
    }

    /**
     * Set the value of posicion
     *
     * @return  self
     */
    public function setPosicion($posicion)
    {
        $this->posicion = $posicion;

        return $this;
    }

    /**
     * Get the value of partidosJugados
     */
    public function getPartidosJugados()
    {
        return $this->partidosJugados;
    }

    /**
     * Set the value of partidosJugados
     *
     * @return  self
     */
    public function setPartidosJugados($partidosJugados)
    {
        $this->partidosJugados = $partidosJugados;

        return $this;
    }

    /**
     * Get the value of minuntosPorPartido
     */
    public function getMinuntosPorPartido()
    {
        return $this->minuntosPorPartido;
    }

    /**
     * Set the value of minuntosPorPartido
     *
     * @return  self
     */
    public function setMinuntosPorPartido($minuntosPorPartido)
    {
        $this->minuntosPorPartido = $minuntosPorPartido;

        return $this;
    }

    /**
     * Get the value of PuntosPorPartido
     */
    public function getPuntosPorPartido()
    {
        return $this->puntosPorPartido;
    }

    /**
     * Set the value of PuntosPorPartido
     *
     * @return  self
     */
    public function setPuntosPorPartido($PuntosPorPartido)
    {
        $this->puntosPorPartido = $PuntosPorPartido;

        return $this;
    }

    /**
     * Get the value of RebotesPorPartido
     */
    public function getRebotesPorPartido()
    {
        return $this->rebotesPorPartido;
    }

    /**
     * Set the value of RebotesPorPartido
     *
     * @return  self
     */
    public function setRebotesPorPartido($RebotesPorPartido)
    {
        $this->rebotesPorPartido = $RebotesPorPartido;

        return $this;
    }

    /**
     * Get the value of AsistenciasPorPartido
     */
    public function getAsistenciasPorPartido()
    {
        return $this->asistenciasPorPartido;
    }

    /**
     * Set the value of AsistenciasPorPartido
     *
     * @return  self
     */
    public function setAsistenciasPorPartido($AsistenciasPorPartido)
    {
        $this->asistenciasPorPartido = $AsistenciasPorPartido;

        return $this;
    }

    /**
     * Get the value of RobosPorPartido
     */
    public function getRobosPorPartido()
    {
        return $this->robosPorPartido;
    }

    /**
     * Set the value of RobosPorPartido
     *
     * @return  self
     */
    public function setRobosPorPartido($RobosPorPartido)
    {
        $this->robosPorPartido = $RobosPorPartido;

        return $this;
    }

    /**
     * Get the value of BloqueosPorPartido
     */
    public function getBloqueosPorPartido()
    {
        return $this->bloqueosPorPartido;
    }

    /**
     * Set the value of BloqueosPorPartido
     *
     * @return  self
     */
    public function setBloqueosPorPartido($BloqueosPorPartido)
    {
        $this->bloqueosPorPartido = $BloqueosPorPartido;

        return $this;
    }

    /**
     * Get the value of PerdidasPorPartido
     */
    public function getPerdidasPorPartido()
    {
        return $this->perdidasPorPartido;
    }

    /**
     * Set the value of PerdidasPorPartido
     *
     * @return  self
     */
    public function setPerdidasPorPartido($PerdidasPorPartido)
    {
        $this->perdidasPorPartido = $PerdidasPorPartido;

        return $this;
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
}
