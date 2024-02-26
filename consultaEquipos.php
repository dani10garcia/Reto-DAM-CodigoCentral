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
    <h2>Equipos</h2>

    <!-- Creamos nuestra tabla y su cabecera -->
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Ciudad</th>
                <th>Conferencia</th>
                <th>División</th>
            </tr>
        </thead>
        <tbody>

        <?php
            // Conexión a la base de datos
            require_once("conexion.php");

            // Consulta SQL para obtener todos los equipos
            $sql = "SELECT * FROM equipos";
            $result = $cnx->query($sql);

            // Mostrar los datos en una tabla HTML
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row['Nombre']."</td>";
                echo "<td>".$row['Ciudad']."</td>";
                echo "<td>".$row['Conferencia']."</td>";
                echo "<td>".$row['Division']."</td>";
                echo "</tr>";
            }

            // Cerrar la conexión
            $cnx->close();
        ?>            
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" class="text-center">
                    <a href="index.php">Volver</a>
                </td>
            </tr>
        </tfoot>
    </table>
</section>

</body>
</html>

