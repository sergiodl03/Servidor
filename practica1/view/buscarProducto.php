<!DOCTYPE html>
<html>

<head>
    <title></title>
    <style>
        body {
            background-color: greenyellow;
        }
        table,
        td,
        th {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <div>
        Buscar producto
    </div>
    <br>
    <form action="?method=buscarProducto2" method="post">
        <label for="">Nombre del producto a buscar</label><br>
        <input type="text" name="nombreBuscar"><br>
        <input type="submit"><br>
    </form>

    <br>
    <table>
            <thead>
                <tr>
                    <td>Producto</td>
                    <td>Stock</td>
                    <td>Precio/unidad</td>
                    <td>Añadido por</td>
                </tr>
            </thead>
            <tbody>

                <?php
            if (isset($resultado)) {
                    foreach ($resultado as $elemento) {
                        echo "<tr>";
                        echo "<td>", $elemento['nombre'], "</td>";
                        echo "<td>", $elemento['stock'], "</td>";
                        echo "<td>", $elemento['precio'], "</td>";
                        echo "<td>", $elemento['correo'], "</td>";
                        
                    }
                }
                ?>


            </tbody>
        </table>


    <br>

    <form action="?method=home" method="post">
        <button type="submit">Volver al home</button>
    </form>
</body>

</html>