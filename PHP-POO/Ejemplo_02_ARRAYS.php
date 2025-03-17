<?php                     /*Ejemplo_02_Arrays o Vectores.php (PLANTILLA DE php)*/
# ARRAYS UNIDIMENSIONALES #


# ARRAYS EN FORMATO CLÁSICO #
$frutas = array("Peras","Fresas", "Kiwi"); #$variable= array; $key= indice; $value= elemento#
$mensaje = "";
foreach ($frutas as $indice => $fruta) {  # EL foreach ES LO QUE PINTA #
    $mensaje .= "$fruta <br>";
}

# ARRAY EN FORMATO MODERNO #
$elementos = ["Camión", true, 12, 3.1416];
$mensaje .= "Array moderno <br>";
foreach ($elementos as $indice => $elemento) {
    $mensaje .= "[$indice] -> $elemento <br>";
$elementos[0] = "Coche";  #AÑADIMOS UN NUEVO ELEMENTO#
}

$elementos[] = 5000;
array_splice($elementos, 2, 0, "Moto"); #array_splice quita/pone elementos al array#
foreach ($elementos as $indice => $elemento) {
    $mensaje .= "[$indice] -> $elemento <br>"; 
}

# ARRAY ASOCIATIVOS #
$alumna = [ 
    "nombre" => "Ana",
    "edad" => 30,
    "aprobada" => true 
];
$mensaje .= "Array Asociativo <br>";
foreach ($alumna as $campo => $dato) {
    $mensaje .= "[$campo] => $dato <br>";
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

   

</body>

</html>