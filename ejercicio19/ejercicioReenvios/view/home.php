<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <div>
            Lista de deseos
        </div>
        <form action="?method=new" method="post">
            <label for=""></label><br>
            <input type="text" name="deseos"><br>
            <input type="submit"><br>
        </form>

        <?php 
        if(isset($_COOKIE['listaDeseos'])){
            
            $lista = unserialize($_COOKIE['listaDeseos']);

            foreach($lista as $elemento) {
                echo "<li>$elemento</li>";
            }
        }
        ?>

        
    </body>
</html>