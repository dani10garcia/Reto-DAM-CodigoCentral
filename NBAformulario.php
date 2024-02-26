<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Base de Datos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
        }
        input[type="text"], select {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Ingresar Datos:</h2>
    <form action="gestion.php" method="POST">
        <label for="nombre">Equipo:</label>
        <input type="text" id="nombre" name="nombre" placeholder="Nombre del equipo">

        <label for="ciudad">Estadísticas:</label>
        <input type="text" id="ciudad" name="ciudad" placeholder="Estadísticas del equipo">

        <label for="conferencia">Jugador:</label>
        <input type="text" id="conferencia" name="conferencia" placeholder="Nombre del jugador">

        <label for="division">Partido:</label>
        <input type="text" id="division" name="division" placeholder="Nombre del partido">

        <input type="submit" value="Guardar">
    </form>
</body>
</html>
