<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <style>
        body{
                background-color: greenyellow;
            }
    </style>
    <body>
        <br>
        <form action="?method=valorTotal2" method="post">
            <button type="submit">Calcular valor total</button>
        </form>

        <br>

        <?php
            if (isset($valor)) {

                echo "<p>$valor</p>";
                
            }
        ?>

        <br>

        <form action="?method=home" method="post">
            <button type="submit">Volver al home</button>
        </form>
    </body>
</html>
</html>