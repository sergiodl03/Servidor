<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <style>
            <?php 
                if (isset($_SESSION['color'])){
                    $color = $_SESSION['color'];
                    echo "body{
                        background-color : $color;
                    }";
            
                }
            ?>
        </style>
    </head>
    <body>
        <h1>Bienvendo</h1>
        <a href="/ejercicioColoresSesiones/main.php?method=cambio&color=red">Color rojo</a>
        <a href="/ejercicioColoresSesiones/main.php?method=cambio&color=blue">Color azul</a>
    </body>
</html>