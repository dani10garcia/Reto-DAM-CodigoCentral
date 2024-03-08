<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Seleccionar Campo</title>
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

    select, input[type="submit"], input[type="button"] {
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

    input[type="submit"], input[type="button"] {
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
if(isset($_GET['submitTabla'])) {
    // Obtener la variable 'BD'
    if(isset($_GET['BD'])) {
        $selectedBD = $_GET['BD'];
    } else {
        // Si 'BD' no está definido, muestra un mensaje de error o redirige al Paso 1
        echo "Error: Base de datos no seleccionada.";
        // Otra opción sería redirigir al usuario de vuelta al Paso 1
        // header("Location: paso1.php");
        // exit();
    }

    // Verificar si se ha seleccionado una tabla
    if(isset($_GET['tabla'])) {
        // Establecer la conexión a la base de datos
        $servername = "localhost"; // Cambia esto si es necesario
        $username = "JavaUser"; // Cambia esto con tu usuario de MySQL
        $password = "123456789"; // Cambia esto con tu contraseña de MySQL
        $database = $selectedBD; // Utilizamos la base de datos seleccionada

        // Crear la conexión
        $conn = mysqli_connect($servername, $username, $password, $database);

        // Verificar la conexión
        if (!$conn) {
            die("Conexión fallida: " . mysqli_connect_error());
        }

        $selectedTable = $_GET['tabla'];

        // Mostrar el formulario para seleccionar un campo
        echo "<h2>Paso 3: Seleccionar Campo</h2>";
        echo "<form method='get' action='paso4.php'>";
        
        // Consulta para obtener los campos de la tabla seleccionada
        $query = "SHOW COLUMNS FROM $selectedTable";
        
        // Ejecutar la consulta
        $result = mysqli_query($conn, $query);

        // Verificar si la consulta fue exitosa
        if ($result) {
            echo "<select name='campo'>";
            // Recorrer los resultados y mostrar las opciones del formulario
            while($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['Field'] . "'>" . $row['Field'] . "</option>";
            }
            echo "</select>";
        } else {
            echo "Error al obtener los campos de la tabla: " . mysqli_error($conn);
        }
        
        // Campos ocultos para enviar 'BD' y 'tabla'
        echo "<input type='hidden' name='BD' value='$selectedBD'>"; 
        echo "<input type='hidden' name='tabla' value='$selectedTable'>";
        
        // Botón de envío
        echo "<input type='submit' name='submitCampo' value='Seleccionar'>";
        // Botón de retroceso al Paso 2
        echo "<input type='button' value='Retroceder' onclick='window.history.back();'>";
        echo "</form>";

        // Cerrar la conexión
        mysqli_close($conn);
    } else {
        // Si no se seleccionó ninguna tabla, muestra un mensaje de error
        echo "Error: No se ha seleccionado ninguna tabla.";
    }
}
?>
</body>
</html>