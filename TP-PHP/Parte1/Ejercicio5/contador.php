
<?php
// Archivo donde se guarda el número de visitas
$archivo = "contador.dat";

// Abrir el archivo para lectura
$abrir = fopen($archivo, "r");

// Leer el contenido del archivo
$cont = fread($abrir, filesize($archivo));

// Cerrar el archivo
fclose($abrir);

// Abrir el archivo para escritura
$abrir = fopen($archivo, "w");

// Sumar una visita
$cont = $cont + 1;

// Guardar el nuevo contador
$guardar = fwrite($abrir, $cont);

// Cerrar el archivo
fclose($abrir);

// Mostrar la cantidad de visitas
echo "<font face='arial' size='3'>Cantidad de visitas: " . $cont . "</font>";
?>
