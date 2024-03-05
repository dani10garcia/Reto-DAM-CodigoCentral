<?php
if(isset($_POST['submitMostrar'])) {
    // Recoger los valores seleccionados del formulario del Paso 5
    $selectedBD = $_POST['BD'];
    $selectedTable = $_POST['tabla'];
    $selectedCampo = $_POST['campo'];

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
        echo "<table border='1'>";
        echo "<tr>";
        // Mostrar los nombres de las columnas
        while ($column = $columns_result->fetch_assoc()) {
            echo "<th>".$column['Field']."</th>";
        }
        echo "</tr>";

        // Construir la consulta SQL dinámica
        $query = "SELECT * FROM {$selectedTable}";

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
    } else {
        echo "La tabla seleccionada no tiene columnas.";
    }

    // Cerrar conexión
    $conn->close();
}
?>
>







