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
    echo "<input type='hidden' name='consulta' value='$text'>";
    echo "<input type='hidden' name='BD' value='$selectedBD'>";
    echo "<input type='hidden' name='tabla' value='$selectedTable'>";
    echo "<input type='hidden' name='campo' value='$selectedCampo'>";
    echo "<input type='submit' name='submitMostrar' value='Mostrar en una tabla'>";
    echo "</form>";

?>
