<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Estadísticas</title>
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
    <?php
        // Conexión a la base de datos
        require_once("conexion.php");

        // Consulta SQL para obtener todas las estadísticas
        $sql = "SELECT * FROM estadisticas";
        $result = $cnx->query($sql);

        // Mostrar los datos en una tabla HTML
        echo "<h2>Estadísticas</h2>";
        echo "<table>";
        echo "<tr><th>Temporada</th><th>Jugador</th><th>Puntos por Partido</th><th>Asistencias por Partido</th><th>Tapones por Partido</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row['temporada']."</td>";
            echo "<td>".$row['jugador']."</td>";
            echo "<td>".$row['Puntos_por_partido']."</td>";
            echo "<td>".$row['Asistencias_por_partido']."</td>";
            echo "<td>".$row['Tapones_por_partido']."</td>";
            echo "</tr>";
        }
        echo "</table>";

        // Cerrar la conexión
        $cnx->close();
    ?>
</body>
</html>
