<!DOCTYPE html>
<html>
<head>
    <title>Consulta Personalizada</title>
</head>
<body>
    <h2>Paso 1: Seleccionar BD</h2>
    <form method="post">
        <select name="BD">
            <option value="nba">NBA</option>
            <option value="world">World</option>
        </select>

        <input type="submit" name="submitBD" value="Seleccionar">
    </form>

    <?php
    if(isset($_POST['submitBD'])) {
        $selectedBD = $_POST['BD'];
        echo "<h2>Paso 2: Seleccionar Tabla</h2>";
        echo "<form method='post'>";
        if ($selectedBD == "nba") {
            echo "<select name='tabla'>
                    <option value='equipos'>Equipos</option>
                    <option value='jugadores'>Jugadores</option>
                  </select>";
        } elseif ($selectedBD == "world") {
            // Opciones de tablas para la base de datos "world"
            echo "<select name='tabla'>
                    <option value='tabla1'>Tabla 1</option>
                    <option value='tabla2'>Tabla 2</option>
                  </select>";
        }
        echo "<input type='submit' name='submitTabla' value='Seleccionar'>";
        echo "</form>";
    }

    if(isset($_POST['submitTabla'])) {
        $selectedTabla = $_POST['tabla'];
        echo "<h2>Paso 3: Seleccionar Campo</h2>";
        // Aquí puedes obtener los campos de la tabla seleccionada y mostrarlos en un dropdown
        echo "<h2>Paso 4: Establecer Criterio</h2>";
        // Formulario para establecer el criterio de búsqueda y el valor de búsqueda
        echo "<h2>Paso 5: Mostrar Consulta Resultante</h2>";
        // Aquí se mostrarán los resultados de la consulta en una tabla
    }
    ?>

</body>
</html>
