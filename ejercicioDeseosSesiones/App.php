
<?php

class App
{
    public function __construct(){
        session_start();
    }
    public function run()
    {
        if (isset($_GET['method'])) {
            $method = $_GET['method'];
        } else {
            $method = 'login';
        }
        $this -> $method();
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
            if($_POST['name'] != "" && $_POST['password'] != "") {
                $name = $_POST['name'];
                $password = $_POST['password'];
                $_SESSION['name'] = $name;
                $_SESSION['password'] = $password;
                header('Location: ?method=home');
            } else{
                header('Location: ?method=login');
            }
        }
        
    }

    public function new()
    {
        if(isset($_POST['deseos'])) {

            if($_POST['deseos'] != "")
            {
                if (isset($_SESSION['listaDeseos'])){
                    $lista = $_SESSION['listaDeseos'];
                } else {
                    $lista = [];
                }
                $lista[] = $_POST['deseos'];
                $_SESSION['listaDeseos'] =  $lista;
                //$_SESSION['listaDeseos'][] = $_POST['deseos'];
            }
            
            
        }
        header('Location: ?method=home');
    }
    public function delete()
    {
        if(isset($_POST['numeroDeseo'])) {
            $numDeseo = (int)$_POST['numeroDeseo'];

            if($numDeseo > 0){
                if (isset($_SESSION['listaDeseos'])){
                    unset($_SESSION['listaDeseos'][$numDeseo - 1]);

                    $$_SESSION['listaDeseos'] = array_values($_SESSION['listaDeseos']);
                }

            }
            
            header('Location: ?method=home');
        }
    }
    
    public function empty()
    {
        $lista = "";
        $_SESSION['listaDeseos'] = $lista;

        header('Location: ?method=home');
    }

    public function close()
    {
        
    }
    


}