<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Listado por Equipos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2; /* Gris suave */
        }

        nav {
            background-color: #7C7C7C; /* Azul */
            padding: 10px;
            margin-bottom: 20px;
        }

        nav a {
            text-decoration: none;
            color: #ffffff; /* Blanco */
        }

        nav a:hover {
            color: #ffffff; /* Blanco */
            text-decoration: underline;
        }

        section {
            margin: 20px;
            background-color: #ffffff; /* Blanco */
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: inline-block;
            margin-bottom: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            border-bottom: 1px solid #dee2e6;
        }

        th {
            background-color: #7C7C7C; /* Azul */
            color: #ffffff; /* Blanco */
        }

        tr:nth-child(even) {
            background-color: #f2f2f2; /* Gris suave */
        }

        .text-center {
            text-align: center;
        }

        .btn {
            padding: 10px 20px;
            background-color: #7C7C7C; /* Verde */
            color: #ffffff; /* Blanco */
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-secondary {
            background-color: #6c757d; /* Gris */
        }

        .btn:hover {
            background-color: #218838; /* Verde más oscuro */
        }
    </style>
</head>
<body>
    <nav aria-label="breadcrumb">
       <a href="index.php" class="text-dark">Inicio</a>/Buscar Equipo
    </nav>
    <?php    
    if (!isset($_POST['filtro'])) {
        //Si no existe la variable filtro, mostramos un pequeño formulario para ayudar a mostrar mejor una tabla grande de datos//
        ?>
        <section>
            <form name="form1" id="form1" method="post" action="mostrarequipo.php">
                <input type="submit" class="btn btn-dark" value="Mostrar Jugadores">
                <select name='filtro' id='filtro'>
                    <?php
                    require_once("conexion.php");
                    extract($_POST);
                    $param = $cnx->prepare("SELECT Nombre FROM equipos");
                    $param->execute();
                    $data = $param->get_result();
                    while ($row = $data->fetch_assoc()) {
                        extract($row);
                        echo "<option value='$Nombre'>$Nombre</option>";
                    }
                    $cnx->close();
                    ?>     
                </select>
            </form>
        </section>
        <?php
    } else {
        //Sí existe la variable es que el usuario hizo clic y recargó la página, pasamos a mostrar el listado según su petición//
        ?>
        <section>
            <h2 style="color: #007bff;">Resultados</h2> <!-- Título en color azul -->
            <table class="table">
                <thead class="text-center">
                    <tr>
                        <th>Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once("conexion.php");
                    extract($_POST);
                    $param = $cnx->prepare("SELECT Nombre FROM jugadores WHERE Nombre_equipo like ?");
                    $param->bind_param("s", $filtro);
                    $param->execute();
                    $data = $param->get_result();
                    if ($data->num_rows == 0) {
                        echo "Ese Titulo no está en la Base de Datos<br>";
                        echo "<a href='DesplegableEquipos.php' class='btn btn-secondary'>Volver</a>";
                    } else {
                        while ($row = $data->fetch_assoc()) {
                            extract($row);
                            echo "<tr><td class='text-center'>$Nombre</td></tr>";
                        }
                        $cnx->close();
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6" class="text-center">
                            <a href="mostrarequipo.php" class="btn btn-secondary">Volver</a>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </section>
        <?php
    }
    ?>
</body>
</html>

