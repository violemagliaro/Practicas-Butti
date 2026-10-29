
<?php
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$baseDatos = "prueba";

$conexion = mysqli_connect(
    $servidor,
    $usuario,
    $contrasena,
    $baseDatos
);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

mysqli_set_charset($conexion, "utf8mb4");
?>
