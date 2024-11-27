<!DOCTYPE html>
<html>

<head>
    <title></title>
    <style>
        table,
        td,
        th {
            border: 1px solid black;
            border-collapse: collapse;
        }

        body {
            background-color: greenyellow;
        }
    </style>
</head>

<body>
    <div>
        <h1>Supermercado 1</h1>
        <a href="/practica1/main.php?method=buscarProducto">BuscarProducto</a>
        <a href="/practica1/main.php?method=registrarProducto">RegistrarProducto</a>
        <a href="/practica1/main.php?method=valorTotal">ValorTotal</a>

        <br>
        <br>
        <table>
            <thead>
                <tr>
                    <td>Producto</td>
                    <td>Stock</td>
                    <td>Precio/unidad</td>
                    <td>Añadido por</td>
                    <td>Eliminar</td>
                </tr>
            </thead>
            <tbody>

                <?php
                if (isset($_SESSION['listaProductos'])) {

                    $lista = $_SESSION['listaProductos'];

                    foreach ($lista as $elemento) {
                        echo "<tr>";
                        echo "<td>", $elemento['nombre'], "</td>";
                        echo "<td>", $elemento['stock'], "</td>";
                        echo "<td>", $elemento['precio'], "</td>";
                        echo "<td>", $elemento['correo'], "</td>";
                        echo '<td><form action="?method=deleteEspecifico&id=',$elemento['id'],'" method="post">
                            <button type="submit" name="nombreBorrar">Borrar columna</button>
                            </form></td>';
                        echo "</tr>";
                        
                    }
                }
                ?>


            </tbody>
        </table>
        <br>
        <a href="/practica1/main.php?method=delete">Borrar toda la tabla</a>
        <br>
        <br>
        <a href="/practica1/main.php?method=logout">Cerrar sesión</a>
    </div>
</body>

</html>