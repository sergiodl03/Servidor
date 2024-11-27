
<?php

class App
{
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
                setcookie("name", $_POST['name'], time()+3600*24);
                setcookie("password", $_POST['password'], time()+3600*24);
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
                if (isset($_COOKIE['listaDeseos'])){
                    $lista = unserialize($_COOKIE['listaDeseos']);
                } else {
                    $lista = [];
                }

                $lista[] = $_POST['deseos'];

                setcookie("listaDeseos", serialize($lista), time()+3600*24);
            }
            
            
        }
        header('Location: ?method=home');
    }

    public function delete()
    {
        if(isset($_POST['numeroDeseo'])) {
            $numDeseo = (int)$_POST['numeroDeseo'];

            if($numDeseo > 0){
                if (isset($_COOKIE['listaDeseos'])){
                    $lista = unserialize($_COOKIE['listaDeseos']);
                    unset($lista[$numDeseo - 1]);

                    $lista = array_values($lista);
                }

                setcookie("listaDeseos", serialize($lista), time()+3600*24);
            }
            
            header('Location: ?method=home');
        }
    }
    
    public function empty()
    {
        setcookie("listaDeseos", "", time() - 1);

        header('Location: ?method=home');
    }

    public function close()
    {
        
    }


}