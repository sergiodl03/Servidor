
<?php
require_once "model/configDB.php";
require_once "model/Estadisticas.php";
require_once "model/Usuario.php";
class App
{

    public function run()
    {
        if (isset($_GET['method'])) {
            $method = $_GET['method'];
        } else {
            $method = 'login';
        }
        $this->$method();
    }

    public function login()
    {
        include("view/login.php");
    }

    public function auth()
    {
        if (isset($_POST['name']) && isset($_POST['password'])) {
            if ($_POST['name'] != "" && $_POST['password'] != "") {
                
                $usuario = Usuario::verificarContrasenya($_POST['name']);
                
                if (!$usuario) {
                    $hash = password_hash(($_POST['password']), PASSWORD_BCRYPT);
                    $nba = Usuario::insertarUsuario($_POST['name'], $hash);
                    header('Location: ?method=home');
                } else {
                    
                    $correcto = password_verify(($_POST['password']), $usuario->getContrasenya());
                    echo "hola";
                    if ($correcto) {
                        header('Location: ?method=home');
                    } else {
                        header('Location: ?method=login');
                    }
                }
            }
        }
    }

    public function home()
    {
        if ($_GET['page']) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        $pages = Estadisticas::paginate($page, 20);

        include("view/home.php");
    }
    public function introducirJugadoresVista()
    {
        include("view/introducirJugadores.php");
    }

    public function borrarJugadoresVista()
    {
        include("view/borrarJugadores.php");
    }

    public function actualizarJugadoresVista()
    {
        include("view/actualizarJugadores.php");
    }

    public function introducirJugadores()
    {
        if (
            isset($_POST['nombre']) && isset($_POST['equipo']) && isset($_POST['posicion']) && isset($_POST['partidosJugados']) && isset($_POST['minuntosPorPartido'])
            && isset($_POST['puntosPorPartido']) && isset($_POST['rebotesPorPartido']) && isset($_POST['asistenciasPorPartido']) && isset($_POST['robosPorPartido']) && isset($_POST['bloqueosPorPartido']) && isset($_POST['perdidasPorPartido'])
        ) {
            if (
                $_POST['nombre'] != "" && $_POST['equipo'] != "" && $_POST['posicion'] != "" && $_POST['partidosJugados'] != "" && $_POST['minuntosPorPartido'] != ""
                && $_POST['puntosPorPartido'] != "" && $_POST['rebotesPorPartido'] != "" && $_POST['asistenciasPorPartido'] != "" && $_POST['robosPorPartido'] != "" && $_POST['bloqueosPorPartido'] != "" && $_POST['perdidasPorPartido'] != ""
            ) {
                $nba = Estadisticas::insertar();
                header('Location: ?method=home');
            } else {
                header('Location: ?method=introducirJugadoresVista');
            }
        } else {
            header('Location: ?method=introducirJugadoresVista');
        }
    }

    public function borrarJugadores()
    {
        if (
            isset($_POST['id'])
        ) {
            if (
                $_POST['id'] != ""
            ) {
                $nba = Estadisticas::borrar();
                header('Location: ?method=home');
            } else {
                header('Location: ?method=borrarJugadoresVista');
            }
        } else {
            header('Location: ?method=borrarJugadoresVista');
        }
    }

    public function actualizarJugadores()
    {
        if (
            isset($_POST['nombre']) && isset($_POST['equipo']) && isset($_POST['posicion']) && isset($_POST['partidosJugados']) && isset($_POST['minuntosPorPartido'])
            && isset($_POST['puntosPorPartido']) && isset($_POST['rebotesPorPartido']) && isset($_POST['asistenciasPorPartido']) && isset($_POST['robosPorPartido']) && isset($_POST['bloqueosPorPartido']) && isset($_POST['perdidasPorPartido']) && isset($_POST['id'])
        ) {
            if (
                $_POST['nombre'] != "" && $_POST['equipo'] != "" && $_POST['posicion'] != "" && $_POST['partidosJugados'] != "" && $_POST['minuntosPorPartido'] != ""
                && $_POST['puntosPorPartido'] != "" && $_POST['rebotesPorPartido'] != "" && $_POST['asistenciasPorPartido'] != "" && $_POST['robosPorPartido'] != "" && $_POST['bloqueosPorPartido'] != "" && $_POST['perdidasPorPartido'] != "" && $_POST['id'] != ""
            ) {
                $nba = Estadisticas::actualizar();
                header('Location: ?method=home');
            } else {
                header('Location: ?method=actualizarJugadoresVista');
            }
        } else {
            header('Location: ?method=actualizarJugadoresVista');
        }
    }
}
