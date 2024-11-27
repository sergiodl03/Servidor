
<?php

class App
{
    public function run()
    {
        if (isset($_GET['method'])) {
            $method = $_GET['method'];
        } else {
            $method = 'home';
        }
        $this -> $method();
    }


    public function home()
    {
        include("view/home.php");
    }


    public function cambio()
    {    
        if (isset($_GET['color'])){

            setcookie("color",  $_GET['color'] ,time()+3600*24);
        }
        header('Location: ?method=home');
    }
    
    public function close()
    {
        
    }
    


}