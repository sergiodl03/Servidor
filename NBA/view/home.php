<!DOCTYPE html>
<html>

<head>
    <title></title>
    <style>
        .pag{
            border: 1px solid black;
            margin: 20px;
            padding: 5px;
        };
    </style>
</head>

<body>
    <p><a href="/NBA/main.php?method=introducirJugadoresVista">Añadir</a> un Jugador a las estadisticas</p>
    <p><a href="/NBA/main.php?method=borrarJugadoresVista">Borrar</a> un Jugador de las estadisticas</p>
    <p><a href="/NBA/main.php?method=actualizarJugadoresVista">Actualizar</a> un Jugador de las estadisticas</p>
    <table>
        <tr>
            <td>ID</td>
            <td>NOMBRE</td>
            <td>EQUIPO</td>
            <td>POSICION</td>
            <td>GP</td>
            <td>MPG</td>
            <td>PPG</td>
            <td>RPG</td>
            <td>APG</td>
            <td>SPG</td>
            <td>BPG</td>
            <td>TPG</td>
        </tr>
        <?php
                    foreach ($pages->nba as $elemento) {
                        echo "<tr>";
                        echo "<td>", $elemento->getId(), "</td>";
                        echo "<td>", $elemento->getNombre(), "</td>";
                        echo "<td>", $elemento->getEquipo(), "</td>";
                        echo "<td>", $elemento->getPosicion(), "</td>";
                        echo "<td>", $elemento->getPartidosJugados(), "</td>";
                        echo "<td>", $elemento->getMinuntosPorPartido(), "</td>";
                        echo "<td>", $elemento->getPuntosPorPartido(), "</td>";
                        echo "<td>", $elemento->getRebotesPorPartido(), "</td>";
                        echo "<td>", $elemento->getAsistenciasPorPartido(), "</td>";
                        echo "<td>", $elemento->getRobosPorPartido(), "</td>";
                        echo "<td>", $elemento->getBloqueosPorPartido(), "</td>";
                        echo "<td>", $elemento->getPerdidasPorPartido(), "</td>";
                        echo "</tr>";
                        
                    }
                
                ?>
    </table>
    <br>
    <div class="pagination">
        <?php
            for($i = 1; $i <= $pages->n; $i++) {
                echo "<a href='?page=$i' class='pag'>$i</a>";
            }
        ?>
    </div>
    
    <a href="/NBA/main.php?method=login">Cerrar sesion</a>

</body>

</html>