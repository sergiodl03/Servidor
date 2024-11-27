
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
            $color = $_GET['color'];
            $_SESSION['color'] = $color;
        }
        header('Location: ?method=home');
    }
    
    public function close()
    {
        
    }
    


}