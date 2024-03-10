
<?php
// Dirección del host, usuario, password, base de datos
    $cnx = new mysqli("localhost","JavaUser","123456789","nba"); //Variable de enlace entre el PHP y la base de datos
    //$cnx = new mysqli("localhost","root","***No os lo voy a decir***","BDCINE3");
    //$cnx = new mysqli("sql313.infinityfree.com","if0_34648844","RONB874QgrsHhn","if0_34648844_bdcine"); //Variable de enlace entre el PHP y la base de datos

    if ($cnx->error) {
        //die("Error de conexión");
        echo "No he conectado";
        
    }
    
    else {
        $cnx->query("SET NAMES utf8mb4");
        echo "";
    }
?>