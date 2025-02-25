<?php                     /*Ejemplo_04_EstructurasControl.php*/

# ARRAYS BIDIMENSIONALES (TODOS LOS ARRAYS EMPIEZAN POR EL 0) #

# if.....else(si...si no)
#switch (bucle: mientras)
#for (bucle: para... hasta)
#continue/break (para y reanuda iteración/rompe iteración)


if (isset($_REQUEST['enviar'])) { //AMBOS NÚMEROS DEBEN SER POSITIVO, N2 > N1(EN CASO CONTRARIO PONER MENSAJE...)
    $n1 = $_REQUEST['n1'];
    $n2 = $_REQUEST['n2'];
    $mensaje = "";

    if ($n1 <= 0 || $n2 <= 0) {     #COMBERTIR LOS VALORES EN POSITIVO#
        $n1 = abs($n1);             #abs -> VALOR ABSOLUTO#
        $n2 = abs($n2);
    } //else se quita para comprobar que si hay negativos y uno es mayor que el otro entre //
    if ($n1 > $n2) {
        $mensaje = "ERROR en datos de entrada <br>";
        $aux = $n2;                #ESTO SE HACE PARA DAR LA VUELTA AL LOS VALORES DE n1 y n2@
        $n2 = $n1;
        $n1 = $aux;
    } else if ($n1 == $n2) {
        $mensaje = "Ambos datos son iguales <br>";

    } else {
        $mensaje = "Datos de entrada NORMALIZADOS!! <br>";
    }

    $contador = $n1;
    while ($contador <= 10) {           #BUCLE while (while = MIENTRAS)#
        $mensaje .= "$contador <br>";
        $contador++;                    #PARA EL BUCLE#
    }

    $mensaje = "Lo mismo con for <br>"; # LO MISMO QUE ARRIBA PERO CON EL for
    for ($i = $n1; $i <= $n2; $i++) {
        $mensaje .= "$i <br>";
    }

    $vector = [1,4,2,2,3,4,2,1];       #EL BUCLE for SE PUEDE USAR PARA RECORRER vectores#
    $mensaje .= "Coordenadas X <br>";  #EL INDICE 0 = PARES / EL INDICE 1 = IMPARES#
    $longitud = count($vector);
    for ($i=0; $i < $longitud; $i+=2) {
        $mensaje .= "$vector[$i] <br>";
    } 

    $mensaje .= "Coordenadas Y <br>"; 
    for ($i=1; $i < $longitud; $i+=2) { 
        $mensaje .= "$vector[$i] <br>"; 
    }
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
    </section>

    <hr class="m-3 p-1 bg-primary"> <!--LINEA DE SEPARACIÓN-->


    <form action="#" method="post" class="form m-3 p-3 w-50"> <!--m3=MARGEN, p3=RELLENO(paddign), w50=ANCHO-->
        <label for="n1" class="form-label">Num1</label>
        <input type="number" name="n1" id="n1" class="form-control"><br>
        <label for="n2" class="form-label">Num2</label>
        <input type="number" name="n2" id="n2" class="form-control"><br>
        <input type="submit" value="Enviar" class="btn btn-success" name="enviar">
    </form>


</body>

</html>