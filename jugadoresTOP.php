<?php
// Incluye el archivo de conexión a la base de datos
require_once("conexion.php");

// Verifica si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica si se proporcionaron todas las variables necesarias
    if (isset($_POST['Estadistica']) && isset($_POST['Temporada']) && isset($_POST['num_jugadores'])) {
        // Establece las variables con los valores recibidos del formulario
        $estadistica = $_POST['Estadistica'];
        $temporada = $_POST['Temporada'];
        $num_jugadores = $_POST['num_jugadores'];

        // Consulta SQL para obtener los N mejores jugadores en la estadística y temporada seleccionadas
        $sql = "SELECT jugador, $estadistica AS estadistica FROM estadisticas WHERE temporada = ? ORDER BY $estadistica DESC LIMIT ?";
        
        // Preparar la consulta
        $stmt = $cnx->prepare($sql);
        
        // Verificar si la preparación de la consulta fue exitosa
        if ($stmt) {
            // Vincular parámetros
            $stmt->bind_param("si", $temporada, $num_jugadores);
            
            // Ejecutar la consulta
            $stmt->execute();
            
            // Obtener el resultado
            $result = $stmt->get_result();
            
            // Verificar si se encontraron resultados
            if ($result->num_rows > 0) {
                // Mostrar los resultados en una tabla HTML
                echo "<h2>Top $num_jugadores jugadores en $estadistica para la temporada $temporada</h2>";
                echo "<table border='1'>";
                echo "<tr><th>Jugador</th><th>$estadistica</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row['jugador']."</td>";
                    echo "<td>".$row['estadistica']."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "No se encontraron resultados.";
            }
            
            // Liberar el conjunto de resultados
            $result->free();
            
            // Cerrar la declaración
            $stmt->close();
        } else {
            echo "Error al preparar la consulta.";
        }
    } else {
        echo "Por favor, complete todos los campos del formulario.";
    }
} else {
    echo "Error: Los datos del formulario no se recibieron correctamente.";
}

// Cerrar la conexión a la base de datos
$cnx->close();
?>

