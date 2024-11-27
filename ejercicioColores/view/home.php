<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <style>
            <?php 
                if (isset($_COOKIE['color'])){
                    $color = $_COOKIE['color'];
                    echo "body{
                        background-color : $color;
                    }";
            
                }
            ?>
        </style>
    </head>
    <body>
        <h1>Bienvendo</h1>
        <a href="/ejercicioColores/main.php?method=cambio&color=red">Color rojo</a>
        <a href="/ejercicioColores/main.php?method=cambio&color=blue">Color azul</a>
    </body>
</html>