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