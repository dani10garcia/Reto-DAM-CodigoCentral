<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Mostrar Consulta Resultante</title>
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

    p {
        font-size: 18px;
        text-align: center;
    }

    form {
        text-align: center;
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

$selectedBD = $_GET['BD'];
$selectedTable = $_GET['tabla'];
$selectedCampo = $_GET['campo'];
extract($_GET);

// Aquí podrías realizar la consulta a tu base de datos utilizando los valores seleccionados
// Por ejemplo, podrías construir una consulta SQL dinámica basada en $selectedBD, $selectedTable y $selectedCampo

// Ejemplo de consulta SQL:
// $query = "SELECT * FROM $selectedTable WHERE $selectedCampo = 'valor_deseado'";
// Ejecutar la consulta y mostrar los resultados en el Paso 6

echo "<h2>Paso 5: Mostrar la consulta resultante</h2>";
echo "<p>Consulta realizada: SELECT * FROM $selectedTable WHERE $selectedCampo LIKE '$valor'</p>";

$text = "SELECT * FROM ".$selectedTable." WHERE ".$selectedCampo." LIKE '".$valor.";";
// $text = "SELECT * FROM {$selectedTable} WHERE {$selectedCampo} LIKE '$valor'";
echo "<form method='post' action='paso6.php'>";
echo "<input type='hidden' name='valor' value='$valor'>";
echo "<input type='hidden' name='BD' value='$selectedBD'>";
echo "<input type='hidden' name='tabla' value='$selectedTable'>";
echo "<input type='hidden' name='campo' value='$selectedCampo'>";
echo "<input type='submit' name='submitMostrar' value='Mostrar en una tabla'>";
// Botón de retroceso al Paso 4
echo "<input type='button' value='Retroceder' onclick='window.history.back();'>";
echo "</form>";

?>
</body>
</html>
