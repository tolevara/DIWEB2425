<?php                     /*Ejemplo_05_Funciones.php*/

// PHP-POO/Ejercicio_01_CoordenadasMatrices.php
/*  Sea el array de coordenadas con valores (x,y), 
    siendo x=fila (empezando por 0) e y=columna (empezando por 0)
    Sacar la suma en el alert de los elementos designados en coordenadas*/


#DEFINIMOS LAS 4 VARIABLES "globales" (ACCESIBLE POR LAS funciones)#

$mensaje = "";
$suma = 0;
$coordenadas = [1, 4, 0, 3, 2, 2, 3, 4, 2, 1, 0, 1, 4, 4];
$matriz = [
    [1, 3, 7, 2, 4],          # Fila1, indice = 0
    [3, 2, 1, 0, 3],
    [6, 2, 2, 1, 6],
    [4, 5, 8, 4, 2],          # $matriz[3,2] = 8
    [1, 1, 1, 0, 1]
];

function ian()     #-> (TIPO DE funcion 0E 0S)      #LAS funciones IGUAL QUE EN JS, HAY QUE CARGARLAS ANTES!!#
{
    global $mensaje, $coordenadas, $matriz; #ESTE GLOBAL LLAMA  A LA VARIABLE DE ARRIBA (global)#
    $suma = 0;
    $longitud = count($coordenadas);
    for ($i = 0; $i < $longitud; $i += 2) {
        $fila = $coordenadas[$i];
        $columna = $coordenadas[$i + 1];
        $suma += $matriz[$fila][$columna];
    }
    $mensaje = "[Ian] La suma de los elementos es $suma";
}

function jesus($coordenadas, $matriz)    #-> (TIPO DE funcion NE 0S)#
{
    global $mensaje;
    $suma = 0;
    $longitud = count($coordenadas);
    for ($fila = 0, $columna = 1; $fila < $longitud; $fila += 2, $columna += 2) {
        $coordenadaX = $coordenadas[$fila];
        $coordenadaY = $coordenadas[$columna];
        $suma += $matriz[$coordenadaX][$coordenadaY];
        $mensaje = "[jesus] La suma de los elementos es $suma";
    }
}
function ivanFor()                      #-> (TIPO DE funcion SE 1S)#
{
    global $coordenadas, $matriz;
    $longitud = count($coordenadas);
    $suma = 0;
    for ($i = 0; $i < $longitud; $i+= 2) {
        $suma += $matriz[$coordenadas[$i]] [$coordenadas[$i+1]];  
    }
    return "[IVÁN-FOR] La suma de los elementos es $suma";

}
function ivanForeach($coordenadas, $matriz)                 #-> (TIPO DE funcion NE 1S)#
{
    $suma = 0;
    foreach ($coordenadas as $indice => $valor) {
        if($indice %2 == 0) {
            $suma += $matriz[$coordenadas[$indice]][$coordenadas[$indice + 1]];
        }
    }
    return "[IVÁN-FOREACH] La suma de los elementos es $suma";
}

if (isset($_REQUEST['enviar'])) {  # ESTO ES LA LLAMADA #

    $solucion = $_REQUEST['solucion'];
    switch ($solucion) {
        case 'ian':
            ian();
            break;
        case 'jesus':
            jesus($coordenadas, $matriz);
            break;
        case 'ivan-for': $mensaje = ivanFor();
            break;
        case 'ivan-foreach': $mensaje = ivanForeach($coordenadas, $matriz);
            break;

            //default: break;      
    }

    /*
    $longitud = count($coordenadas);
    // Cada elemento de la matriz es $matriz[$x][$y]


    // Salida...
    $mensaje = "La suma de los elementos es $suma";

    // SOLUCION IAN:
    $longitud = count($coordenadas);
    for ($i=0; $i < $longitud; $i+=2) {
    $fila = $coordenadas[$i];
    $columna = $coordenadas[$i+1];
    $suma += $matriz[$fila][$columna];
    }

    SOLUCION JESUS:
    $suma = 0;
    for ($fila=0, $columna=1; $fila < $longitud; $fila+=2, $columna+=2)
    $coordenadaX = $coordenadas[$fila];
    $coordenadaY = $coordenadas[$fila];
    $suma += $matriz[$coordenadasX] [$coordenadaY];

    SOLUCION IVAN-FOR:
    $suma = 0;
    for ($i = 0; $i < $longitud; $i += 2) {
        $suma += $matriz[$coordenadas[$i]] [$coordenadas^[$i+1]];
    }

    SOLUCION IVAN-FOREACH:
                                                 // *LOS PARES SON LA X, Y LOS IMPARES EL Y*   
    foreach ($coordenadas as $indice => $valor) { ->(RECORRE EL ARRAY ENTERO, EL SOLO SE ENCARGA DE LA LONGITUD)
        if ($indice % 2 == 0)                       
        $suma += $matriz[$coordenadas[$indice]] [$coordenadas[$indice + 1]]; 
    }*/
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

    <section arial-label="alert">
        <p class="alert alert-primary m-3 p-3 w-50">
            <?php echo $mensaje; ?></p>
    </section>

    <hr class="m-3 p-1 bg-primary">

    <form action="#" method="post" class="form m-3 p-3 w-50"> <!--m3=MARGEN, p3=RELLENO(paddign), w50=ANCHO-->
        <nav class="form-group">
            <label for="solucion">Solución Ejercicio</label>
            <select class="form-control" id="solucion" name="solucion">
                <option disabled selected>--Elige Opción--</option>
                <option value="ian">Ian</option>
                <option value="jesus">Jesús</option>
                <option value="ivan-for">Iván-For</option>
                <option value="ivan-foreach">Iván-Foreach</option>
            </select>
        </nav>
        <input type="submit" value="Enviar" class="btn btn-success" name="enviar">
    </form>

</body>

</html>