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
        <ol>
        <?php 
        if (isset($_COOKIE['listaDeseos'])){
            
            $lista = unserialize($_COOKIE['listaDeseos']);

            foreach($lista as $elemento) {
                echo "<li>$elemento</li>";
            }
        }
        ?>
        </ol>
        
        <div>
            Elimina un deseo(número)
        </div>

        <form action="?method=delete" method="post">
            <label for=""></label><br>
            <input type="text" name="numeroDeseo"><br>
            <input type="submit"><br>
        </form>

        <a href="/ejercicioDeseos/main.php?method=empty">Vaciar lista</a>

    </body>
</html>