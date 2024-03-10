<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Lista Simple</title>
    <link href="css/styles.css" type="text/css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #333;
            color: #fff;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #dddddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
   
<section>
    <h2>Partidos</h2>

    <!-- Creamos nuestra tabla y su cabecera -->
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Equipo Local</th>
                <th>Equipo Visitante</th>
                <th>Puntos Local</th>
                <th>Puntos Visitante</th>
                <th>Temporada</th>
            </tr>
        </thead>
        <tbody>

        <?php
            // Conexión a la base de datos
            require_once("conexion.php");

            // Consulta SQL para obtener todos los partidos
            $sql = "SELECT * FROM partidos";
            $result = $cnx->query($sql);

            // Mostrar los datos en una tabla HTML
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row['codigo']."</td>";
                echo "<td>".$row['equipo_local']."</td>";
                echo "<td>".$row['equipo_visitante']."</td>";
                echo "<td>".$row['puntos_local']."</td>";
                echo "<td>".$row['puntos_visitante']."</td>";
                echo "<td>".$row['temporada']."</td>";
                echo "</tr>";
            }

            // Cerrar la conexión
            $cnx->close();
        ?>            
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6" class="text-center">
                    <a href="index.php">Volver</a>
                </td>
            </tr>
        </tfoot>
    </table>
</section>

</body>
</html>
