<?php                     /*Ejemplo_02_Arrays Bidimensionales o Matricies.php (PLANTILLA DE php)*/

# ARRAYS BIDIMENSIONALES (TODOS LOS ARRAYS EMPIEZAN POR EL 0) #

$matriz = [     #FORMATO MODERNO#
  [1,3,7,2],           # FILA1, INDICE = 0  #
  [3,2,1,0],           
  [6,2,2,1],            
  [4,5,8,4],           # $MATRIZ[3,2] = 8 #
  [1,1,1,0]
]; 

# RECOGEMOS LOS DATOS DEL FORMULARIO #

if(isset($_REQUEST['enviar'])) {
    $fila = $_REQUEST['n1'] -1;
    $columna = $_REQUEST['n2'] -1;
    $mensaje = "El elemento es: {$matriz[$fila][$columna]}";
}
$mensaje .= "<br> Matriz <br>";
foreach ($matriz as $fila) {
    foreach ($fila as $columna) { 
        $mensaje .= $columna . "\t";
    }
    $mensaje .= "<br>";
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
        <label for="n1" class="form-label">Fila</label>
        <input type="number" name="n1" id="n1" class="form-control" min="1" max="5"><br>
        <label for="n2" class="form-label">Columna</label>
        <input type="number" name="n2" id="n2" class="form-control" min="1" max="4"><br>
        <input type="submit" value="Enviar" class="btn btn-success" name="enviar">
    </form>
   

</body>

</html>