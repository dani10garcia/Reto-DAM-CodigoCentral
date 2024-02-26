<?php
    
    extract($_POST);
    require_once("conexion.php");
    $param = $cnx->prepare("UPDATE equipos SET nombre = ?, ciudad = ?, conferencia = ?, division = ? WHERE nombre like ?");
    $param->bind_param("ssss",$nombre,$ciudad,$conferencia, $division,);
    $param->execute();
    $cnx->close();
   
    // Llamo a una web que diga que los datos se han grabado correctamente
    // con un botón de volver 
    $url = "exito.php";
    header("Location: $url");
    
?>