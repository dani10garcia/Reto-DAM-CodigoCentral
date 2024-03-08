<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Mostrar Resultados</title>
<style>
    /* Estilos generales */
    body {
        font-family: Arial, sans-serif;
        background-color: #333; /* Cambiado a gris oscuro casi negro */
        color: #fff; /* Cambiado a blanco para contrastar */
    }

    h2 {
        font-size: 24px;
        margin-bottom: 20px;
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        padding: 10px;
        border: 1px solid #fff;
    }

    th {
        background-color: #444;
    }

    td {
        background-color: #555;
    }

    input[type="submit"], input[type="button"] {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        background-color: #007bff;
        color: #fff;
        cursor: pointer;
    }

    input[type="submit"]:hover, input[type="button"]:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>

<?php
if(isset($_POST['submitMostrar'])) {
    // Recoger los valores seleccionados del formulario del Paso 5
    $selectedBD = $_POST['BD'];
    $selectedTable = $_POST['tabla'];
    $selectedCampo = $_POST['campo'];
    $valor = $_POST['valor'];

    // Configurar la conexión a la base de datos (ajusta estos valores según tu configuración)
    $servername = "localhost";
    $username = "JavaUser";
    $password = "123456789";
    $dbname = $selectedBD; // Usar la base de datos seleccionada

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Escapar los valores de las variables para prevenir inyección de SQL
    $selectedTable = $conn->real_escape_string($selectedTable);

    // Construir la consulta SQL para obtener los nombres de las columnas de la tabla seleccionada
    $columns_query = "SHOW COLUMNS FROM {$selectedTable}";
    $columns_result = $conn->query($columns_query);

    // Verificar si hay resultados
    if ($columns_result->num_rows > 0) {
        // Mostrar los resultados en una tabla
        echo "<h2>Paso 6: Mostrar resultados en una tabla</h2>";
        echo "<table>";
        echo "<tr>";
        // Mostrar los nombres de las columnas
        while ($column = $columns_result->fetch_assoc()) {
            echo "<th>".$column['Field']."</th>";
        }
        echo "</tr>";

        // Construir la consulta SQL dinámica
        $query = "SELECT * FROM {$selectedTable} WHERE {$selectedCampo} LIKE '{$valor}'";
        
        // Ejecutar la consulta
        $result = $conn->query($query);

        // Verificar si hay resultados
        if ($result->num_rows > 0) {
            // Mostrar los resultados de la tabla
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                // Mostrar los datos de cada fila
                foreach ($row as $value) {
                    echo "<td>".$value."</td>";
                }
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='" . $columns_result->num_rows . "'>No se encontraron resultados.</td></tr>";
        }

        echo "</table>";
        // Botón de retroceso al Paso 5
        echo "<input type='button' value='Retroceder' onclick='window.history.back();'>";
    } else {
        echo "La tabla seleccionada no tiene columnas.";
    }

    // Cerrar conexión
    $conn->close();
}
?>
</body>
</html>