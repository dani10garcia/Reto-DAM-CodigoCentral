<?php 
// Requerir el archivo de conexión a la base de datos
require_once("conexion.php");

// Verificar si se enviaron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar que los campos obligatorios no estén vacíos
    if (!empty($_POST['Nombre']) && !empty($_POST['Ciudad']) && !empty($_POST['Conferencia']) && !empty($_POST['Division'])) {
        // Extraer los datos del formulario
        $nombre = $_POST['Nombre'];
        $ciudad = $_POST['Ciudad'];
        $conferencia = $_POST['Conferencia'];
        $division = $_POST['Division'];

        // Preparar la consulta SQL para insertar los datos en la base de datos
        $param = $cnx->prepare("INSERT INTO equipos (Nombre, Ciudad, Conferencia, Division) VALUES (?, ?, ?, ?)");

        // Enlazar los parámetros con los valores
        $param->bind_param("ssss", $nombre, $ciudad, $conferencia, $division);

        // Ejecutar la consulta
        $param->execute();

        // Verificar si se produjo algún error durante la ejecución de la consulta
        if ($param->error) {
            echo "Se ha producido un error, inténtalo más tarde<br><a href='motos.php' class='btn btn-dark'>VOLVER AL FORMULARIO</a>";
        } else {
            echo "El proceso se ha realizado con éxito<br><a href='motos.php' class='btn btn-dark'>VOLVER AL FORMULARIO</a>";
        }
    } else {
        echo "Por favor, completa todos los campos del formulario.";
    }
} else {
    echo "Error: Los datos del formulario no se recibieron correctamente.";
}

// Cerrar la conexión a la base de datos
$cnx->close();
?>

