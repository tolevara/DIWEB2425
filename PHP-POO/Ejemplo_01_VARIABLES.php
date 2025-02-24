<?php                     /*Ejemplo_01_Variables.php (PLANTILLA DE php)*/

//SI SÓLO HAY php, NO HACE FALTA CERRAR php!!//

//localhost/DIWEB2425/PHP-POO/Ejemplo_01_Variables.php -> (DIRECTORIO)//

if (isset($_REQUEST['enviar'])) {  #ESTO ES LO QUE SE ENVÍA, 'enviar'-> SE RECOJE DEL <form> DE ABAJO#
    $n1 = $_REQUEST['n1'];  #------>VARIABLE PREDEFINIDA#
    $n2 = $_REQUEST['n2'];
    $resultado = $n1 + $n2;
    $mensaje = "La suma es $resultado"; # --->OPERADOR SUMA#

  //ESTO ES UNA CONSTANTE:  define('PI',3.1416...);
    #                       $resultado = $n1 + ($n2 * PI);
    #                       $mensaje .= "<br> Resultado * 'PI' = $resultado"; ->(.= ES PARA CONTATENAR)

  //OPERADORES:
    #Aritméticos -> +; -; *; /; % (modulo); **(potencia)
    #Comparacion -> >; >=; <; <=; ==; !==; (distinto,<>); ===(igual estricto)
    #Incremento/Disminucion -> ++; --; +=; -=
    #Concatenacion -> . , .=
    #Bit a BIT -> &&(and); ||(or); ^(xor); ~(not) 
    #EJEMPLO: 
    #$resultado = $n1 > $n2;
    #if(!$resultado) = $resultado = 0; -> SI ES false = 0
    #mensaje .= "<br> Comparo $n1 > $resultado";  
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VARIABLE PHP</title>
    <link rel="stylesheet" href="bootstrap.min.css"> <!--ESTO LLAMA A BOOSTRAP-->
</head>

<body>

    <section>
        <p class="alert alert-primary m-3 p-3 w-50">
            <?php echo $mensaje; ?></p> <!--ESTE '$mensaje' ES DEL 'if' DE ARRIBA-->
    </section>ancho

    <hr class="m-3 p-1 bg-primary"> <!--LINEA DE SEPARACIÓN-->

    <form action="#" method="post" class="form m-3 p-3 w-50"> <!--m3=MARGEN, p3=RELLENO(paddign), w50=ANCHO-->
        <label for="n1" class="form-label">N1</label>
        <input type="number" name="n1" id="n1" class="form-control"><br>
        <label for="n2" class="form-label">N2</label>
        <input type="number" name="n2" id="n2" class="form-control"><br>
        <input type="submit" value="Enviar" class="btn btn-success" name="enviar">
    </form>

</body>

</html>