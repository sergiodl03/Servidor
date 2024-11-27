<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <style>
            body{
                background-color: greenyellow;
            }
        </style>
    </head>
    <body>
        <div>
            Registrar producto
        </div>
        <br>
        <form action="?method=registrarProducto2" method="post">
            <label for="">Nombre</label><br>
            <input type="text" name="nombre"><br>
            <label for="">Stock</label><br>
            <input type="text" name="stock"><br>
            <label for="">Precio/unidad</label><br>
            <input type="text" name="precio"><br>
            <label for="">Correo</label><br>
            <input type="text" name="correo"><br>
            <input type="submit"><br>
        </form>
        

    </body>
</html>