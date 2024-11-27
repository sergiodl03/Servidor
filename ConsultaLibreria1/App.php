
<?php
require_once "configDB.php";
class App
{

    public function run()
    {
        if (isset($_GET['method'])) {
            $method = $_GET['method'];
        } else {
            $method = 'home';
        }
        $this->$method();
    }


    public function home()
    {
        include("view/home.php");
    }


    public function escritoriosAscendente()
    {
        $conexion = null;

        try {
            $conexion = new PDO(CADENA_CONEXION, USUARIO_BDD, CONTRA_BDD);

            //echo "Conexión establecida con éxito";

            $sql = "SELECT nombre FROM `escritor` ORDER BY nombre ASC";

            $resultadoEscritor = $conexion->query($sql);
        } catch (PDOException $e) {
            echo "Problema en la conexión";
        } finally {
            //$conexion = null;
            include("view/home.php");
        }
    }

    public function librosEscritor()
    {
        $conexion = null;

        try {
            $conexion = new PDO(CADENA_CONEXION, USUARIO_BDD, CONTRA_BDD);



            $sql1 = "SELECT titulo FROM `libro` WHERE codigo_escritor=?";

            $resultadoLibrosEscritor = $conexion->prepare(($sql1));

            $resultadoLibrosEscritor->execute(array((int)$_POST['codigo_escritor']));



            //echo "Conexión establecida con éxito";
        } catch (PDOException $e) {
            echo "Problema en la conexión";
        } finally {
            $conexion = null;
            include("view/home.php");
        }
    }

    public function tienda()
    {
        $conexion = null;

        try {
            $conexion = new PDO(CADENA_CONEXION, USUARIO_BDD, CONTRA_BDD);



            $sql2 = "SELECT * FROM `tienda` WHERE codigo=?";

            $resultadoTienda = $conexion->prepare(($sql2));

            $resultadoTienda->execute(array((int)$_POST['codigo_tienda']));



            //echo "Conexión establecida con éxito";
        } catch (PDOException $e) {
            echo "Problema en la conexión";
        } finally {
            $conexion = null;
            include("view/home.php");
        }
    }

    public function borrarTiedaYDisponibilidad()
    {
        $conexion = null;

        try {
            $conexion = new PDO(CADENA_CONEXION, USUARIO_BDD, CONTRA_BDD);

            $sql2 = "DELETE  FROM `tienda` WHERE codigo=?";
            $sql1 = "DELETE  FROM `disponibilidad` WHERE codigo_tienda=?";

            $resultadoBorradoTienda = $conexion->prepare(($sql1));
            $resultadoBorradoDisponibilidad = $conexion->prepare(($sql2));


            $resultadoBorradoTienda->execute([$_POST['codigo_tienda']]);
            $resultadoBorradoDisponibilidad->execute([$_POST['codigo_tienda']]);


            //echo "Conexión establecida con éxito";
        } catch (PDOException $e) {
            echo "Problema en la conexión";
        } finally {
            $conexion = null;
            include("view/home.php");
        }
    }

    public function insertarTienda()
    {
        $conexion = null;

        try {
            $conexion = new PDO(CADENA_CONEXION, USUARIO_BDD, CONTRA_BDD);

            $sql1 = "INSERT INTO `tienda` (`centro_comercial`,`direccion`,`localidad`,`telefono`)
            VALUES(?, ?, ?, ?)";

            $resultadoBorradoTienda = $conexion->prepare(($sql1));


            $resultadoBorradoTienda->execute([$_POST['codigo_tienda']]);


            //echo "Conexión establecida con éxito";
        } catch (PDOException $e) {
            echo "Problema en la conexión";
        } finally {
            $conexion = null;
            include("view/home.php");
        }
    }

    public function actualizarEscritor()
    {
        $conexion = null;

        try {

            if (
                isset($_POST['codigoEscritor']) && isset($_POST['nombreEscritor']) && isset($_POST['nacionalidadEscritor']) &&
                isset($_POST['nacimientoEscritor']) 
            ) {
                if (
                    $_POST['codigoEscritor'] != "" && $_POST['nombreEscritor'] != "" &&
                    $_POST['nacionalidadEscritor'] != "" && $_POST['nacimientoEscritor'] != ""
                ) {

                    $conexion = new PDO(CADENA_CONEXION, USUARIO_BDD, CONTRA_BDD);
                   

                    $sql1 = "UPDATE `escritor` SET 
                    `nombre`= ?,`nacionalidad`= ?,`fecha_nacimiento`= ?,`fecha_fallecimiento`= ? WHERE 'codigo' = ? ";

                    $resultadoActualizarEscritor = $conexion->prepare(($sql1));
                    $resultadoActualizarEscritor->bindValue(1, $_POST['nombreEscritor']);
                    $resultadoActualizarEscritor->bindValue(2, $_POST['nacionalidadEscritor']);
                    $resultadoActualizarEscritor->bindValue(3, $_POST['nacimientoEscritor']);
                    $resultadoActualizarEscritor->bindValue(4, $_POST['fallecimientoEscritor']);
                    $resultadoActualizarEscritor->bindValue(5, $_POST['codigoEscritor']);
                    print_r($conexion);
                    $resultadoActualizarEscritor->execute();
                    

                    echo "Conexión establecida con éxito";
                }
            };
        } catch (PDOException $e) {
            echo "Problema en la conexión";
        } finally {
            $conexion = null;
            include("view/home.php");
        }
    }

    public function actualizarPrecioLibroEntre2Años()
    {
        $conexion = null;

        try {

            if (
                isset($_POST['descuentoLibro']) && isset($_POST['añoInferior']) && isset($_POST['añoSuperior'])
            ) {
                if (
                    $_POST['descuentoLibro'] != "" && $_POST['añoInferior'] != "" &&
                    $_POST['añoSuperior'] != "") 
                    {

                    $conexion = new PDO(CADENA_CONEXION, USUARIO_BDD, CONTRA_BDD);
                   

                    $sql1 = "UPDATE `libro` SET `precio`= precio*?/100 WHERE agno_publicacion BETWEEN ? AND ? ";

                    $resultadoActualizarPrecios = $conexion->prepare(($sql1));

                    $resultadoActualizarPrecios->bindValue(1, $_POST['descuentoLibro']);
                    $resultadoActualizarPrecios->bindValue(2, $_POST['añoInferior']);
                    $resultadoActualizarPrecios->bindValue(3, $_POST['añoSuperior']);

                    print_r($conexion);

                    $resultadoActualizarPrecios->execute();
                    

                    echo "Conexión establecida con éxito";
                }
            };
        } catch (PDOException $e) {
            echo "Problema en la conexión";
        } finally {
            $conexion = null;
            include("view/home.php");
        }
    }
    
    public function actualizarCantidadYFechaDisponibilidad()
    {
        $conexion = null;

        try {

            if (
                isset($_POST['cantidadAñadir']) && isset($_POST['codLibro']) && isset($_POST['codTienda'])
            ) {
                if (
                    $_POST['cantidadAñadir'] != "" && $_POST['codLibro'] != "" &&
                    $_POST['codTienda'] != "") 
                    {

                    $conexion = new PDO(CADENA_CONEXION, USUARIO_BDD, CONTRA_BDD);
                   

                    $sql1 = "UPDATE `disponibilidad` SET `cantidad`= cantidad + ?, `fecha_ultima_reposicion` = CURRENT_TIMESTAMP WHERE codigo_libro = ? AND codigo_tienda = ?";

                    $resultadoActualizarDisponibilidad = $conexion->prepare(($sql1));

                    $resultadoActualizarDisponibilidad->bindValue(1, $_POST['cantidadAñadir']);
                    $resultadoActualizarDisponibilidad->bindValue(2, $_POST['codLibro']);
                    $resultadoActualizarDisponibilidad->bindValue(3, $_POST['codTienda']);

                    print_r($conexion);

                    $resultadoActualizarDisponibilidad->execute();
                    

                    echo "Conexión establecida con éxito";
                }
            };
        } catch (PDOException $e) {
            echo "Problema en la conexión";
        } finally {
            $conexion = null;
            include("view/home.php");
        }
    }
}
