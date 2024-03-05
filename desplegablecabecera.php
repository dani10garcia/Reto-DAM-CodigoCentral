<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
       *{
    margin: 0;
    padding: 0;
    border: 0;
    font-size: 100%;
    vertical-align: baseline;
}
body{
    text-align: center;
    font-family: sans-serif;
}

.head{
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 63px;
    background: #171717;
    position: fixed;
    width: 100%;
    z-index: 100;

}
.navbar{
    display:flex;
    margin-right: 10px;
}
.logo{
    margin-left: 30px;
}
.logo a {
    text-decoration: none;
    color:#fff;
    text-transform: uppercase;
    font-size: 20px;
}
.navbar a {
    display: block;
    padding: 23px 20px;
    color: #fff;
    text-decoration: none;
    text-transform: uppercase;
    font-size: 20px;
}
.navbar a:hover {
    background: #3f3f3f;
}
.header{
    display:flex;
    justify-content: center;
    align-items: center;

}
.header{
    height: 60vh !important;
    background: url(NBA.jpg) no-repeat center;
}

.title{
    margin-bottom: 40px;
    font-size: 60%;
    font-weight: 600;
    text-transform: uppercase;
    color: #fff;

}

p{
    margin-bottom: 40px;
    font-size: 18px;
    color: #fff;
    padding: 0 100px;

}

.btn{
    display: inline-block;
    margin-top: 15px;
    padding: 10px 40px;
    border: 2px solid #9c27b0;
    color: #fff;
    text-decoration: none;
    background: #9c27b0;
}
.btn:hover{
    background: none;
}
.btn-home{
    display: flex;

}
.btn-home{
    margin: 0 10px;
}
.content {
    height: 50vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.clasificacion{
padding: 30px;
background: #1f1d1d;
}
.box-container {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    text-align: center;
}
.box-container .box {
    height: 11rem;
    width: 17rem;
    background: #101010;
    text-align: center;
    border-radius: 1rem;
    box-shadow: 0.3rem 5rem rgba(0, 0, 0, .5);
    margin: 2rem;
}
.box-container .box i{
    height: 3rem;
    width: 3rem;
    line-height: 3rem;
    text-align: center;
    border-radius: 50%;
    color: #fff;
    background: #9c27b0;
    font-size: 2rem;
    margin: 1rem 0;
}
.box-container .box h3{
    font-size: 20px;
    color: #9c27b0;
}
.box-container .box p{
    padding: 0 15px;
    font-size: 16px;
}
.partidos{
    background: #171717;
}
.noticias{
    background: url(noticias.jpg) no-repeat center;
    background-attachment: fixed;
    background-size:cover;
    text-align: center;
}
.estadisticas{
    padding-top: 20px;
    background: #171717;
    padding-bottom: 0;
}
.dropdown {
    float: left;
    overflow: hidden;
}

/* Estilos para el botón del desplegable */
.dropbtn {
    display: block;
    padding: 23px 20px;
    color: #fff;
    text-decoration: none;
    text-transform: uppercase;
    font-size: 20px;
    background-color: #171717;

}
/* Estilos para el contenido del desplegable */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: black;
    z-index: 1;
}

/* Cambia el color del enlace dentro del desplegable al pasar el mouse sobre él */
.dropdown-content a:hover {
    background-color: #ddd;
    color: black;
}

/* Muestra el contenido del desplegable al pasar el mouse sobre el botón */
.dropdown:hover .dropdown-content {
    display: block;
}

@media (max-width: 768px) {

        .title{
            margin-bottom: 0;
            font-size: 40px;
        }
        .clasificacion{
            height: 120vh;
        }
        .navbar{
            display: none;
        }
}
    
    </style>
<body>

<div class= "head">
            <div class="logo">
                <a href="NBA.jpg">Logo</a>
            </div>
            <nav class="navbar">
                <a href="https://www.sportingnews.com/es/nba?gr=www">Inicio</a>
                <a href="#">Partidos</a>
                <a href="Scripts.php">Aplicación BD</a>
                <a href="https://es.global.nba.com/standings/">Clasificacion</a>
                <a href="#">Estadisticas</a>
                    <div class="dropdown">
                        <button class="dropbtn">EQUIPOS</button>
                        <div class="dropdown-content">
<?php
 
    require_once("conexion.php");
    extract($_POST);
    $param = $cnx->prepare("SELECT DISTINCT Nombre FROM equipos ");
    $param->execute();
    $data = $param->get_result();
    while ($row = $data->fetch_assoc()) {
        //fetch assoc devuelve un array o fila que se carga en la variable $row (la podremos llamar como queramos)//
        extract($row); //Extraemos cada fila y creamos los tr y td//
        //echo " <option value='$Nombre'>$Nombre </option>";
        echo " <a href='https://www.nba.com/team/atlanta-hawks'> $Nombre </a>";

    }
    $cnx->close();
?>    
 <a href="#">Jugadores</a>
                <a href="#">Nominas</a>
            </nav>
        </div>
        <header class="content header">
            
        </header>
       <section class="content Clasificacion">
            
            <div class="box-container">
                <div class="box">
                    <i class="fab fa-oeste"></i>
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
                    <i class="fab fa-este"></i>
                    <h3>Conferencia este</h3>
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
                    <i class="fab fa-playoffs"></i>
                    <h3>Playoffs temporada pasada</h3>
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
            </div>
       </section> 
       <section class="content partidos">
            <h2 class="title">Partidos</h2>
            <p>En este apartado aparecen los partidos que se juegan durante la temporada 23/24 en la NBA</p>
            <a href=""class="btn">Calendario de Partidos</a>
             
       </section>

       <section class="content noticias">
            <article class="contain">
                <h2 class="title">Noticias</h2>
                <p>Aqui ponemos un enlace para las noticias que ocurren a diario en la NBA</p>
            </article>

       </section>
       <section class="content Estadisticas">
        <h2 class="title">Estadisticas</h2>
        <p>Aqui ponemos un enlace para las estadisticas de la NBA</p>
       </section>
    </body>
</html>
