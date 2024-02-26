<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Listado por Título</title>
    <link href="css/styles.css" type="text/css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        nav {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
        }
        nav a {
            color: #fff;
            text-decoration: none;
        }
        section {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        form {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="submit"] {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 3px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }
        th {
            background-color: #333;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    
<nav aria-label="breadcrumb">
    <a href="index.php">Inicio</a>/Buscar Equipo
</nav>

<section>
    <?php    
        if (!isset($_POST['filtro'])) {
            // Si no existe la variable filtro, mostramos un pequeño formulario para ayudar a mostrar mejor una tabla grande de datos
    ?>
    <form name="form1" id="form1" method="post" action="consultaFiltro.php">
        <label>Introduzca Equipo a buscar</label>
        <input type="text" required maxlength="50" placeholder="Teclear Equipo" name="filtro" id="filtro">
        <input type="submit" value="Aceptar">
    </form>
    <?php
        } else 
            // Si existe la variable, es que el usuario hizo clic y recargó la página, pasamos a mostrar el listado según su petición
    ?>
    <h2>Resultados</h2>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Ciudad</th>
                <th>Conferencia</th>
                <th>División</th>
            </tr>
        </thead>
        <tbody>
            <?php
                // Nos conectamos a la base de datos
                require_once("conexion.php");
                extract($_POST);
                // Preparamos la consulta SQL para buscar equipos por nombre
                $param = $cnx->prepare("SELECT nombre, ciudad, conferencia, division FROM equipos WHERE nombre like ?");
                $filtro = "%" . $filtro . "%"; // Agregamos comodines para buscar coincidencias parciales
                $param->bind_param("s", $filtro); // El parámetro de búsqueda
                // Ejecutamos la consulta
                $param->execute();
                $result = $param->get_result();
                // Verificamos si se encontraron resultados
                if ($result->num_rows == 0) {
                    echo "<tr><td colspan='4'>Ese Equipo no está en la Base de Datos</td></tr>";
                } else {
                    // Mostramos los resultados en una tabla
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['nombre'] . "</td>";
                        echo "<td>" . $row['ciudad'] . "</td>";
                        echo "<td>" . $row['conferencia'] . "</td>";
                        echo "<td>" . $row['division'] . "</td>";
                        echo "</tr>";
                    }
                }
                // Cerramos la conexión a la base de datos
                $cnx->close();
            ?>
        </tbody

            