<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Listado por Equipos</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        nav {
            background-color: #343a40;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        nav a {
            text-decoration: none;
            color: #fff;
        }

        section {
            margin: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #343a40;
        }

        select, input[type="number"], input[type="submit"] {
            margin-bottom: 10px;
            padding: 10px;
            width: 100%;
            border: 1px solid #ced4da;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .btn {
            background-color: #343a40;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #6c757d;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #dee2e6;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #6c757d;
            color: #fff;
        }

        tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }
    </style>
    <link href="css/styles.css" type="text/css" rel="stylesheet">
</head>
<body>

<nav aria-label="breadcrumb">
    <a href="index.php" class="text-dark">Inicio</a>/Buscar Equipo
</nav>

<section>
    <form name="form1" id="form1" method="post" action="JugadoresTOP.php">
        <label for="estadistica">Estadística:</label>
        <select name="estadistica" id="estadistica">
            <option value="Puntos_por_partido">Puntos</option>
            <option value="Rebotes_por_partido">Rebotes</option>
            <option value="Asistencias_por_partido">Asistencias</option>
            <option value="Tapones_por_partido">Tapones</option>
        </select>
        <br>
        <label for="temporada">Temporada:</label>
        <select name='temporada' id='temporada'>
            <?php
            require_once("conexion.php");
            $param = $cnx->prepare("SELECT DISTINCT temporada FROM partidos ORDER BY temporada ASC");
            $param->execute();
            $data = $param->get_result();
            while ($row = $data->fetch_assoc()) {
                extract($row);
                echo "<option value='$temporada'>$temporada</option>";
            }
            
            ?>
        </select>
        <br>
        <label for="numero_jugadores">Número de Jugadores a Mostrar:</label>
        <input type="number" name="numero_jugadores" id="numero_jugadores" min="1" value="10">
        <br>
        <input type="submit" class="btn btn-dark" value="Mostrar Jugadores">
    </form>
</section>

<?php

if (isset($_POST['estadistica'], $_POST['temporada'], $_POST['numero_jugadores'])){
    $estadistica = $_POST['estadistica'];
    $temporada = $_POST['temporada'];
    $numero_jugadores = $_POST['numero_jugadores'];

    //require_once("conexion.php");
    switch ($estadistica)
    
    {
        case 'Puntos_por_partido':
        

            $sql = "SELECT Nombre, Nombre_equipo, Puntos_por_partido
            FROM estadisticas
            INNER JOIN jugadores ON jugador = codigo 
            WHERE temporada = ?
            ORDER BY Puntos_por_partido DESC 
            LIMIT ?";
            break;
        case 'Rebotes_por_partido':
            $sql = "SELECT Nombre, Nombre_equipo, Rebotes_por_partido 
            FROM estadisticas
            INNER JOIN jugadores ON jugador = codigo 
            WHERE temporada = ?
            ORDER BY Rebotes_por_partido DESC 
            LIMIT ?";
            break;
        case 'Asistencias_por_partido':
            $sql = "SELECT Nombre, Nombre_equipo, Asistencias_por_partido
            FROM estadisticas
            INNER JOIN jugadores ON jugador = codigo 
            WHERE temporada = ?
            ORDER BY Asistencias_por_partido DESC 
            LIMIT ?";
            break;
        default:
            $sql = "SELECT Nombre, Nombre_equipo, Tapones_por_partido 
            FROM estadisticas
            INNER JOIN jugadores ON jugador = codigo 
            WHERE temporada = ?
            ORDER BY Tapones_por_partido DESC 
            LIMIT ?";
            break;}
    $param2 = $cnx->prepare($sql);
                            

    $param2->bind_param("ss", $temporada, $numero_jugadores);
    $param2->execute();
    $data = $param2->get_result();

    if ($data->num_rows == 0) {
        echo "No hay datos disponibles para esta selección.";
    } else {
        echo "<section>";
        echo "<h2>Jugadores TOP</h2>";
        echo "<table class='table'>";
        echo "<thead><tr><th>Nombre</th><th>Equipo</th><th>$estadistica</th></tr></thead>";
        echo "<tbody>";
        while ($row = $data->fetch_assoc()) {
            echo "<tr><td>{$row['Nombre']}</td><td>{$row['Nombre_equipo']}</td><td>{$row[$estadistica]}</td></tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "<a href='JugadoresTOP.php' class='btn btn-secondary'>Volver</a>";
        echo "</section>";
    }
    $cnx->close();
}

?>

</body>
</html>