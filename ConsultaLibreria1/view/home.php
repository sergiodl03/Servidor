<!DOCTYPE html>
<html>

<head>
    <title></title>
    <style>
    </style>
</head>

<body>
    <form action="?method=escritoriosAscendente" method="post">
        <label for="">Consultar escritores ordenados ascndentemente</label><br>
        <input type="submit"><br>
    </form>

    <br>

    <ul>
        <?php

        foreach ($resultadoEscritor as $escritor) {
            echo "<li>" . $escritor['nombre'] . "</li>";
        }

        ?>
    </ul>

    <br>

    <form action="?method=librosEscritor" method="post">
        <label for="">Consultar libros de un escritor ordenados descendentemente</label><br>
        <label for="">Nombre del escritor</label><br>
        <input type="text" name="codigo_escritor"><br>
        <input type="submit"><br>
    </form>

    <br>

    <ul>
        <?php

        foreach ($resultadoLibrosEscritor as $libro) {
            echo "<li>" . $libro['titulo'] . "</li>";
        }

        ?>
    </ul>

    <br>

    <form action="?method=tienda" method="post">
        <label for="">Consultar una tienda por codigo</label><br>
        <label for="">Codigo de la tienda</label><br>
        <input type="text" name="codigo_tienda"><br>
        <input type="submit"><br>
    </form>

    <br>

    <ul>
        <?php

        foreach ($resultadoTienda as $tienda) {
            echo "<li>" . $tienda['codigo'] . "</li>";
            echo "<li>" . $tienda['centro_comercial'] . "</li>";
            echo "<li>" . $tienda['direccion'] . "</li>";
            echo "<li>" . $tienda['localidad'] . "</li>";
            echo "<li>" . $tienda['telefono'] . "</li>";
        }

        ?>
    </ul>

    <br>

    <form action="?method=borrarTiedaYDisponibilidad" method="post">
        <label for="">Eliminar tienda y disponibilidad</label><br>
        <label for="">Codigo de la tienda</label><br>
        <input type="text" name="codigo_tienda"><br>
        <input type="submit"><br>
    </form>

    

    <br>

    <form action="?method=actualizarEscritor" method="post">
        <label for="">Actualizar escritor</label><br>

        <label for="">Codigo del escritor a actualizar</label><br>
        <input type="text" name="codigoEscritor"><br>

        <label for="">Nombre:</label><br>
        <input type="text" name="nombreEscritor"><br>

        <label for="">Nacionalidad:</label><br>
        <input type="text" name="nacionalidadEscritor"><br>

        <label for="">Fecha de nacimiento:</label><br>
        <input type="text" name="nacimientoEscritor"><br>

        <label for="">Fecha de fallecimiento(si esta vivo se deja vacio):</label><br>
        <input type="text" name="fallecimientoEscritor"><br>
        <input type="submit"><br>
    </form>

    <br>

    <form action="?method=actualizarPrecioLibroEntre2Años" method="post">
        <label for="">Actualizar precio de libros</label><br>       

        <label for="">Año inferior de publicación:</label><br>
        <input type="text" name="añoInferior"><br>

        <label for="">Año superior publicación:</label><br>
        <input type="text" name="añoSuperior"><br>

        <label for="">Descuento a aplicar:</label><br>
        <input type="text" name="descuentoLibro"><br>
        
        <input type="submit"><br>
    </form>

    <br>

    <form action="?method=actualizarCantidadYFechaDisponibilidad" method="post">
        <label for="">Actualizar cantidad y fecha disponibilidad por cod de libro y tienda</label><br>       

        <label for="">Cantiadad a añadir:</label><br>
        <input type="text" name="cantidadAñadir"><br>

        <label for="">Codigo libro:</label><br>
        <input type="text" name="codLibro"><br>

        <label for="">Codigo tienda:</label><br>
        <input type="text" name="codTienda"><br>
        
        <input type="submit"><br>
    </form>

    <br>

</body>

</html>