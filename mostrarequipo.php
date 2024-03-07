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
            }
            nav {
                background-color: #f8f9fa;
                padding: 10px;
                margin-bottom: 20px;
            }
            nav a {
                text-decoration: none;
                color: #343a40;
            }
            nav a:hover {
                color: #007bff;
            }
            section {
                margin: 20px;
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
                background-color: #007bff;
                color: white;
            }
            tr:nth-child(even) {
                background-color: #f2f2f2;
            }
            .text-center {
                text-align: center;
            }
            .btn {
                padding: 10px 20px;
                background-color: #007bff;
                color: white;
                border: none;
                border-radius: 5px;
                text-decoration: none;
            }
            .btn-secondary {
                background-color: #6c757d;
            }
            .btn:hover {
                background-color: #0056b3;
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
                    <form name="form1" id="form1" method="post" action="DesplegableEquipos.php">
                    <input type="submit" class="btn btn-dark" value="Mostrar Jugadores">
                    <select name='filtro' id='filtro'>
<?php
 
    require_once("conexion.php");
    extract($_POST);
    $param = $cnx->prepare("SELECT Nombre FROM equipos");
    $param->execute();
    $data = $param->get_result();
    while ($row = $data->fetch_assoc()) {
        //fetch assoc devuelve un array o fila que se carga en la variable $row (la podremos llamar como queramos)//
        extract($row); //Extraemos cada fila y creamos los tr y td//
        echo " <option value='$Nombre'>$Nombre</option>";
    }
    $cnx->close();
?>     
</select>
                    </form>
                </section>

                <?php
              }
              else{
                //Sí existe la variable es que el usuario hizo clic y recargo la página, pasamos a mostrar el listado según su petición//
                ?>
                <section>
                    <h2>Resultados</h2>

                <table class="table">
                    <header class="text-center">
                        <tr class="text-center">
                            <th>Nombre</th>
                        </tr>
                    </header>
                    <tbody>
                        <?php
                            //Abrimos desde aquí PHP para cargar los resultados//
                            //Nos conectamos al SERVER y a la BD//
                            require_once("conexion.php");
                            extract($_POST);
                            //Preparamos la sentencia a ejecutar, en este caso si hay parámetro -> los apellidos//
                            $param = $cnx->prepare("SELECT Nombre  FROM jugadores WHERE Nombre_equipo like ?");
                            $param->bind_param("s",$filtro); // Tantas s's como interrogaciones en el SELECT
                            //Ejecutamos//
                            $param->execute();
                            $data = $param->get_result();
                            //get result recoge los resultados obtenidos y los carga en la variable data//
                            if ($data->num_rows == 0) {
                                echo "Ese Titulo no está en la Base de Datos<br>";
                                echo "<a href='DesplegableEquipos.php' class='btn btn-secondary'>Volver</a>";
                            }
                            else {
                                
                            while ($row = $data->fetch_assoc()) {
                                //fetch assoc devuelve un array o fila que se carga en la variable $row (la podremos llamar como queramos)//
                                extract($row); //Extraemos cada fila y creamos los tr y td//
                                echo "<tr><td class='text-center'>$Nombre</td></tr>";
                            }
                            $cnx->close();//Cerramos la conexión//
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6" class="text-center">
                                <a href="DesplegableEquipos.php" class="btn btn-secondary">Volver</a>
                            </td>
                        </tr>
                    </tfoot>
                </table>
                </section>
                <?php
              }
            }
        ?>
  
    </body>
</html>