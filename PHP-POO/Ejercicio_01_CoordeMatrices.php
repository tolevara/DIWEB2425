<?php  
// PHP-POO/Ejercicio_01_CoordenadasMatrices.php
/*  Sea el array de coordenadas con valores (x,y), 
    siendo x=fila (empezando por 0) e y=columna (empezando por 0)
    Sacar la suma en el alert de los elementos designados en coordenadas
 */

if (isset($_REQUEST['enviar'])) {
    $suma = 0;
    $coordenadas = [1,4,0,3,2,2,3,4,2,1,0,1,4,4];
    $matriz = [
        [1,3,7,2,4],          # Fila1, indice = 0
        [3,2,1,0,3],
        [6,2,2,1,6],
        [4,5,8,4,2],          # $matriz[3,2] = 8
        [1,1,1,0,1]
    ];

    // Resto de código...
    $longitud = count($coordenadas);
   // Cada elemento de la matriz es $matriz[$x][$y]

   if(isset($_REQUEST['enviar'])) {
    $fila = $_REQUEST['n1'] -1;
    $columna = $_REQUEST['n2'] -1;
    $mensaje = "El elemento es: {$matriz[$x][$y]}";
}

   foreach ($matriz as $fila) {
    foreach ($fila as $columna) { 
        $mensaje .= $columna . "\t";
    }
    $mensaje .= "<br>";
}

    // Salida...
    $mensaje = "La suma de los elementos es $suma";

    /*SOLUCION IAN:
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

    $suma = 0;
    for ($i = 0; $i < $longitud; $i += 2) {
        $suma += $matriz[$coordenadas[$i]] [$coordenadas^[$i+1]];
    }
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
    <meta name="viewport" content="width=., initial-scale=1.0">
    <title>Arrays/Vectores PHP</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
    <section>
        <p class="alert alert-primary m-3 p-3 w-50">
            <?php echo $mensaje; ?></p>
    </section>
    <hr class="m-3 p-1 bg-primary">
    <form action="#" method="post" class="form m-3 p-3 w-50">
    <label for="n1" class="form-label">Fila</label>
        <input type="number" name="n1" id="n1" class="form-control" min="1" max="5"><br>
        <label for="n2" class="form-label">Columna</label>
        <input type="number" name="n2" id="n2" class="form-control" min="1" max="4"><br>
        <input type="submit" value="Enviar" class="btn btn-success" name="enviar">
    </form>
</body>

</html>