<?php //APERTURA PHP
//ERRORES.php (COMENTARIO UILINEA)
ini_set('display_errors',1);  //ESTO MUESTRA ERRORES POR PANTALLA
ini_set('display_startup_errors',1);  //MUESTRA AL INICIO
error_reporting(E_ALL);

ini_set('error_log','errores.log');  //GRABA ERRORES EN ARCHIVOS
ini_set('log_errors',1);              //ACTIVA EL GRABADO ERRORES

/**COMENTARIO MULTILINEA
 * DEBEMOS CONFIGURAR ERRORES A NIVEL DE SERVIDOR:
 * CONSOLA (sudo nano /etc/php/8.3/cli/php.ini)
 * LAS SIGUIENTES SECCIONES SE LES QUITA LOS ;(punto y coma)
 * display_errors
 * display_startup_errors
 * errors_reporting
 * log_errors
 * AL FINAL GUARDAR Y SALIR:control+O Y control+X
 * POR ULTIMO REINICIAR EL APACHE
 * sudo service apache2 restart
 */
// echo $variable;
// require "miarchivo.php";


 //ERRORES DE COMPILACIÓN LO VE EL VISUAL(ERROR DE CÓDIGO)
 //ERRORES DE EJECUCIÓN A LA HORA DE EJECUTAR DA LA PÁGINA




 
 

