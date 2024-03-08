<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Seleccionar Tabla</title>
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

    form {
        max-width: 400px;
        margin: 0 auto;
        background-color: #444; /* Cambiado a un tono de gris más claro */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    select, input[type="submit"] {
        display: block;
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        background-color: #555; /* Cambiado a un tono de gris más claro */
        color: #fff; /* Cambiado a blanco para contrastar */
    }

    select {
        background-color: #666; /* Cambiado a un tono de gris más oscuro */
    }

    input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>
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
</body>
</html>