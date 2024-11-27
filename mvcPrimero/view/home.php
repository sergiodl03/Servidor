<!DOCTYPE html>
<html>

<head>
    <title></title>
    <style>
    </style>
</head>

<body>
    <form action="?method=obtenerEscritores" method="post">
        <label for="">Consultar libros de un escritor ordenados descendentemente</label><br>
        <input type="submit"><br>
    </form>

    <br>
    <ul>
        <?php

        foreach ($escritores as $escritor) {
            echo "<li>" . $escritor->getNombre() . "</li>";
        }

        ?>
    </ul>



</body>

</html>