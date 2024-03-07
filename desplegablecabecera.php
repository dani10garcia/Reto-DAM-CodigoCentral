<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NBA RETO</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('NBA.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
            text-align: center;
        }

        header, section, article {
            padding: 50px 20px;
        }

        .head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(0, 0, 0, 0.7);
            position: fixed;
            width: 100%;
            z-index: 100;
        }

        .logo {
            margin-left: 30px;
        }

        .logo a {
            text-decoration: none;
            color: #fff;
            text-transform: uppercase;
            font-size: 24px;
            font-weight: bold;
        }

        .navbar {
            display: flex;
        }

        .navbar a {
            display: block;
            padding: 20px;
            color: #fff;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 16px;
            font-weight: bold;
            margin: 0 10px;
            transition: background 0.3s ease, color 0.3s ease;
        }

        .navbar a:hover {
            background: #333;
            color: #ffd700; /* Color dorado al pasar el ratón sobre el enlace */
        }

        .content {
            text-align: left;
        }

        .title {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 15px 30px;
            border: 2px solid #fff;
            color: #fff;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 16px;
            font-weight: bold;
            background: transparent;
            transition: background 0.3s ease, color 0.3s ease;
        }

        .btn:hover {
            background: #fff;
            color: #000;
        }

        .box-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .box {
            flex: 0 1 calc(33.333% - 40px);
            background: rgba(0, 0, 0, 0.7);
            text-align: center;
            border-radius: 10px;
            margin: 20px 0;
            padding: 20px;
            transition: transform 0.3s ease;
        }

        .box:hover {
            transform: scale(1.05);
        }

        .box i {
            display: block;
            font-size: 40px;
            margin-bottom: 20px;
        }

        .box h3 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .box p {
            font-size: 16px;
            line-height: 1.6;
        }
    </style>
</head>

<body>

    <div class="head">
        <div class="logo">
            <a href="#NBA.jpg">NBA RETO</a>
        </div>
        <nav class="navbar">
    <a href="https://www.sportingnews.com/es/nba?gr=www">Inicio</a>
    <a href="https://www.google.com/search?client=firefox-b-e&q=calendario+de+partidos+nba#cobssid=s&sie=lg;/g/11snv1vp6v;3;/m/05jvx;mt;fp;1;;;">Partidos</a>
    <a href="paso1.php">Aplicación BD</a>
    <a href="mostrarequipo.php"> Equipos</a>
    <?php
require_once("conexion.php");

// Consultar la base de datos para obtener la lista de equipos
$query = "SELECT DISTINCT Nombre FROM equipos";
$result = $cnx->query($query);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Iniciar el desplegable
    echo '<select name="equipos" id="equipos">';
    
    // Iterar sobre los resultados y generar opciones
    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row['Nombre'] . '">' . $row['Nombre'] . '</option>';
    }

    // Cerrar el desplegable
    echo '</select>';
} else {
    // Si no hay equipos en la base de datos
    echo 'No se encontraron equipos.';
}

// Cerrar la conexión
$cnx->close();
?>
    <a href="jugadoresTOP.php">Jugadores TOP</a>
    <a href="Nomina2.php">Nominas</a>
    <a href="https://es.global.nba.com/standings/">Clasificacion</a>
</nav>

    </div>
    <header class="content">
        <h1 class="title">Descubre la emoción de la NBA</h1>
    </header>

    <section class="content">
        <div class="box-container">
            <div class="box">
                <i class="fas fa-trophy"></i>
                <h3>Conferencia Oeste</h3>
                    <p>Equipos de la conferencia oeste:<br>
                        -Dallas Mavericks<br>
                        -Denver Nuggets
                        - Warriors-Houston Rockets<br>
                        -LA Clippers-Los Angeles Lakers<br>
                        -Memphis Grizzlies-Timberwolves<br>
                        -Pelicans-Oklahoma City Thunder<br>
                        -Phoenix Suns-Portland Trail Blazers<br>
                        -Sacramento Kings-Spurs<br>
                        -Utah Jazz
                    </p>
            </div>
            <div class="box">
                <i class="fas fa-trophy"></i>
                <h3>Conferencia Este</h3>
                <p>Equipos de la conferencia este:
                        -Atlanta Hawks -Boston Celtics <br>
                          -Charlotte Hornets -Chicago Bulls<br>
                         -Cleveland Cavaliers -Detroit Pistons<br>
                          -Indiana Pacers -Miami Heat<br>
                        -Milwaukee Bucks -New York Knicks<br>
                         -Orlando Magic -Brooklyn Nets<br>
                         - Philadelphia 76ers -Toronto Raptors <br>
                         -Washington Wizards
                    </p>
            </div>
            <div class="box">
                <i class="fas fa-trophy"></i>
                <h3>Playoffs Temporada Pasada</h3>
                <p>Equipos ganadores de la NBA ultimos 10 años:<br>
                        2013-2014: San Antonio Spurs<br>
                        2014-2015:  Warriors<br>
                        2015-2016: Cleveland Cavaliers<br>
                        2016-2017: Warriors<br>
                        2017-2018: Warriors<br>
                        2018-2019: Toronto Raptors<br>
                        2019-2020: Angeles Lakers<br>
                        2020-2021: Milwaukee Bucks<br>
                        2021-2022: Warriors<br>
                        2022-2023: Denver Nuggets<br>

                    </p>
            </div>
        </div>
    </section>
    <section class="content">
        <h2 class="title">Grupo de Trabajo</h2>
        <p>Esta pagina web ha sido creada por:
            Christian Ayllon, 
            Daniel Valiente,
            Daniel Garcia y 
            Jesus Zancada
        </p>
        <img src="logocodigocentral.png" alt="Logo del grupo de estudiantes" style="max-width: 100%; height: auto;">
    </section>

</body>

</html>