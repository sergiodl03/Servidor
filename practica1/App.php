
<?php

class App
{
    public function __construct()
    {
        session_start();
    }
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

    public function home()
    {
        include("view/home.php");
    }

    public function auth()
    {
        if (isset($_POST['name']) && isset($_POST['password'])) {
            $nombre = $_POST['name'];
            $contraseña = $_POST['password'];
            if (strlen($contraseña) >= 8 && filter_var($nombre, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['name'] = $nombre;
                $_SESSION['password'] = $contraseña;
                header('Location: ?method=home');
            } else {
                $error = "Error en la introduccion de datos";
                $_SESSION['error'] = $error;
                header('Location: ?method=login');
            }
        } else {
            $error = "Error datos insuficinetes";
            $_SESSION['error'] = $error;
            header('Location: ?method=login');
        }
    }

    public function registrarProducto2()
    {

        if (isset($_POST['nombre']) && isset($_POST['stock']) && isset($_POST['precio']) && isset($_POST['correo'])) {


            if (isset($_SESSION['listaProductos'])) {
                $lista = $_SESSION['listaProductos'];
            } else {
                $lista = [];
            }

            $lista[] = [
                'id' => count($lista) + 1,
                'nombre' => $_POST['nombre'],
                'stock' => $_POST['stock'],
                'precio' => $_POST['precio'],
                'correo' => $_POST['correo']
            ];

            $_SESSION['listaProductos'] = $lista;
        }
        header('Location: ?method=home');
    }

    public function buscarProducto2()
    {
        $resultado = [];
        if (isset($_SESSION['listaProductos'])) {
            $nombreBuscar = $_POST['nombreBuscar'];
            foreach ($_SESSION['listaProductos'] as $elemento) {
                if (strtolower($elemento['nombre']) === strtolower($nombreBuscar)) {
                    $resultado [] = $elemento;
                    break; 
                }
            }
        }

        include("view/buscarProducto.php");
    }

    public function valorTotal2()
    {
        if (isset($_SESSION['listaProductos'])) {
            $valor = 0;
            $lista = $_SESSION['listaProductos'];
            foreach ($lista as $elemento) {
                $valor += $elemento['stock'] * $elemento['precio'];
            }
        }
        include("view/valorTotal.php");
    }

    public function delete()
    {
        if (isset($_SESSION['listaProductos'])) {
            unset($_SESSION['listaProductos']);
        }
        header('Location: ?method=home');
        exit();
    }
    public function deleteEspecifico()
    {
        if (isset($_GET['id'])) {
            $numProducto = (int)$_GET['id'];
            if ($numProducto > 0) {
                if (isset($_SESSION['listaProductos'])) {
                        unset($_SESSION['listaProductos'][$numProducto-1]);
                        $_SESSION['listaProductos'] = array_values($_SESSION['listaProductos']);
                }
            }



            header('Location: ?method=home');
        }
    }


    public function registrarProducto()
    {
        include("view/registrarProducto.php");
    }

    public function buscarProducto()
    {
        include("view/buscarProducto.php");
    }

    public function valorTotal()
    {
        include("view/valorTotal.php");
    }

    public function logout()
    {
        setcookie("name", "", time() - 1);
        setcookie("password", "", time() - 1);
        header('Location: ?method=login');
    }
}
