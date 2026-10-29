
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar alumno</title>
</head>
<body>

    <h1>Buscar alumno</h1>

    <form action="buscar.php" method="POST">

        <label>Correo electrónico:</label>

        <input
            type="email"
            name="mail"
            required
        >

        <br><br>

        <button type="submit">Buscar alumno</button>

    </form>

    <br>

    <a href="bienvenida.php">
        Ir a la página de bienvenida
    </a>

</body>
</html>
