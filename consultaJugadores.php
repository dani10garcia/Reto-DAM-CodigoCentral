<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Lista Simple</title>
    <link href="css/styles.css" type="text/css" rel="stylesheet">
    <style>
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
    <h2>Jugadores</h2>

    <!-- Creamos nuestra tabla y su cabecera -->
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Procedencia</th>
                <th>Altura</th>
                <th>Peso</th>
                <th>Posición</th>
                <th>Nombre Equipo</th>
            </tr>
        </thead>
        <tbody>

        <?php
            // Conexión a la base de datos
            require_once("conexion.php");

            // Consulta SQL para obtener todos los jugadores
            $sql = "SELECT * FROM jugadores";
            $result = $cnx->query($sql);

            // Mostrar los datos en una tabla HTML
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row['codigo']."</td>";
                echo "<td>".$row['Nombre']."</td>";
                echo "<td>".$row['Procedencia']."</td>";
                echo "<td>".$row['Altura']."</td>";
                echo "<td>".$row['Peso']."</td>";
                echo "<td>".$row['Posicion']."</td>";
                echo "<td>".$row['Nombre_equipo']."</td>";
                echo "</tr>";
            }

            // Cerrar la conexión
            $cnx->close();
        ?>            
        </tbody>
        <tfoot>
            <tr>
                <td colspan="7" class="text-center">
                    <a href="index.php">Volver</a>
                </td>
            </tr>
        </tfoot>
    </table>
</section>

</body>
</html>

