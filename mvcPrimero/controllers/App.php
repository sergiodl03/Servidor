
<?php
require_once "model/configDB.php";
require_once "model/Escritor.php";
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


    public function obtenerEscritores(){
        
        $escritores = Escritor::consultarTodos();

        include("view/home.php");

    }
}
