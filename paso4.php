<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Establecer Criterio</title>
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

    select, input[type="submit"], input[type="text"] {
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
if(isset($_GET['submitCampo'])) {
    // Verificar si 'BD' está definido
    if(isset($_GET['BD'])) {
        $selectedBD = $_GET['BD'];
    } else {
        // Si 'BD' no está definido, muestra un mensaje de error o redirige al Paso 1
        echo "Error: Base de datos no seleccionada.";
        // Otra opción sería redirigir al usuario de vuelta al Paso 1
        // header("Location: paso1.php");
        // exit();
    }

    // Verificar si 'tabla' está definido
    if(isset($_GET['tabla'])) {
        $selectedTable = $_GET['tabla'];
    } else {
        // Si 'tabla' no está definido, muestra un mensaje de error o redirige al Paso 2
        echo "Error: Tabla no seleccionada.";
        // Otra opción sería redirigir al usuario de vuelta al Paso 2
        // header("Location: paso2.php?BD=$selectedBD");
        // exit();
    }

    // Obtener el campo seleccionado
    $selectedField = $_GET['campo'];

    // Aquí puedes realizar la consulta SQL utilizando las variables $selectedBD, $selectedTable y $selectedField
    // Por ahora, vamos a simular una consulta y mostrar el campo seleccionado

    echo "<h2>Paso 4: Establecer criterio</h2>";
    echo "<form method='get' action='paso5.php'>";
    echo "<label for='criterio'>Criterio:</label>";
    echo "<select name='criterio'>
            <option value='igual'>Igual a</option>
            <option value='contiene'>Contiene</option>
            <option value='empieza'>Empieza por</option>
            <option value='termina'>Termina con</option>
          </select>";
    echo "<input type='text' name='valor'>";
    echo "<input type='hidden' name='BD' value='$selectedBD'>";
    echo "<input type='hidden' name='tabla' value='$selectedTable'>";
    echo "<input type='hidden' name='campo' value='$selectedField'>";
    echo "<input type='submit' name='submitCriterio' value='Establecer'>";
    echo "</form>";
}
?>
</body>
</html>