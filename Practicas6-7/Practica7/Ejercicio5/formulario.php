
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ingreso de usuario</title>
</head>
<body>

    <h1>Ingreso de usuario</h1>

    <form action="guardar.php" method="POST">

        <label>Nombre de usuario:</label>
        <input type="text" name="usuario" required>

        <br><br>

        <label>Clave:</label>
        <input type="password" name="clave" required>

        <br><br>

        <button type="submit">Guardar datos</button>

    </form>

</body>
</html>
