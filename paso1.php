<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Seleccionar Base de Datos</title>
<style>
    /* Estilos generales */
    body {
        font-family: Arial, sans-serif;
        background-color: #333; /* Cambiado a gris oscuro casi negro */
        color: #fff; /* Cambiado a blanco para contrastar */
    }

    h2 {
        font-size: 24px;
        margin-bottom: 20px;
        text-align: center;
    }

    form {
        max-width: 400px;
        margin: 0 auto;
        background-color: #444; /* Cambiado a un tono de gris más claro */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    select, input[type="submit"] {
        display: block;
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        background-color: #555; /* Cambiado a un tono de gris más claro */
        color: #fff; /* Cambiado a blanco para contrastar */
    }

    select {
        background-color: #666; /* Cambiado a un tono de gris más oscuro */
    }

    input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>
    <h2>Paso 1: Seleccionar BD</h2>
    <form method="get" action="paso2.php">
        <select name="BD">
            <option value="nba">NBA</option>
            <option value="world">World</option>
        </select>

        <input type="submit" name="submitBD" value="Seleccionar">
    </form>
</body>
</html>
