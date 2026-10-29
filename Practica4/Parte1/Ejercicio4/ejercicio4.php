
<?php

/*
EJERCICIO 4 - PRÁCTICA 4: PHP

CONSIGNA:
Indicar las salidas que produce el código.
Justificar.


RESPUESTA:

Primera salida:
El

Segunda salida:
El clavel blanco


EXPLICACIÓN:

1) La primera instrucción echo intenta mostrar
   las variables $flor y $color.

   Como todavía no fueron definidas, PHP
   genera advertencias por variables indefinidas.

2) La instrucción include 'datos.php' incorpora
   y ejecuta el contenido de ese archivo.

   Allí se definen:
   $flor = 'clavel';
   $color = 'blanco';

3) El segundo echo ya puede utilizar esas
   variables y muestra "El clavel blanco".

4) include permite reutilizar código de otro
   archivo PHP.


*/


echo "El $flor $color \n";


include 'datos.php';


echo " El $flor $color";

?>
