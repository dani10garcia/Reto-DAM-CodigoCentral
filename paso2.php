<?php
// Establecer la conexión a la base de datos
$servername = "localhost"; // o tu dirección de servidor
$username = "JavaUser"; // tu nombre de usuario de la base de datos
$password = "123456789"; // tu contraseña de la base de datos
$database = "nba"; // nombre de tu base de datos

// Crear la conexión
$conn = mysqli_connect($servername, $username, $password, $database);

// Verificar la conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Verificar si el formulario ha sido enviado
if(isset($_GET['submitBD'])) {
    // Recuperar la base de datos seleccionada del formulario
    $selectedBD = $_GET['BD'];

    // Generar la consulta SQL para obtener las tablas de la base de datos seleccionada
    $query = "SHOW TABLES FROM $selectedBD";

    // Ejecutar la consulta
    $result = mysqli_query($conn, $query);

    // Verificar si la consulta fue exitosa
    if ($result) {
        echo "<h2>Paso 2: Seleccionar Tabla</h2>";
        echo "<form method='get' action='paso3.php'>";
        echo "<input type='hidden' name='BD' value='$selectedBD'>"; // Campo oculto para enviar 'BD'
        echo "<select name='tabla'>";

        // Recorrer los nombres de las tablas en el conjunto de resultados
        while ($row = mysqli_fetch_row($result)) {
            echo "<option value='" . $row[0] . "'>" . $row[0] . "</option>";
        }

        echo "</select>";
        echo "<input type='submit' name='submitTabla' value='Seleccionar'>";
        echo "</form>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Liberar el conjunto de resultados
    mysqli_free_result($result);
}

// Cerrar la conexión
mysqli_close($conn);
?>


