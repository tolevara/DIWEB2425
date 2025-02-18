<!-- http://localhost/Curso/PHP/01-cargar-bbdd.php -->

<?php
// LLAMAR A ERRORES Y FUNCIONES
require("errores.php");
require("funciones.php");

//LLAMAMOS A LA BASE DE DATOS
$conexion = conectar();


/* Recogemos datos del formulario */
$alerta = "Mensaje...";


// Solo si se envía el formulario, se definen las variables del alert
if (isset($_REQUEST['enviar'])) {
    $archivoSQL = "Tarea03.sql";
    $contenidoSQL = file_get_contents($archivoSQL);

    /*Formato procedimental*/
    //$cargaBBDD -> Booleano: true (correcto), false (error);
    //$cargaBBDD = mysqli_multi_query($conexion, $contenidoSQL);

    //formato POO
    $cargaBBDD = $conexion->multi_query($contenidoSQL);

    // Como $cargaBBDD es booleano, SI es correcto...
    if ($cargaBBDD) {
        $alerta = "La carga es correcta";
    } // Y si no es  correcto(false)
    else {
        $alerta = "ERROR, no se ha cargado la BBDD";
    }
}
?>

<!-- Comenzamos la sección HTML -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plantilla</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="bootstrap.bundle.min.js"></script>
</head>

<body>
    <!-- En el alert presentamos los datos recogidos del formulario -->
    <header>
        <p class="alert alert-primary m-3 w-50" style="white-space: pre-line;">
            <?php echo $alerta; ?>

        </p>
    </header>


    <!-- Línea de separación -->
    <hr class="m-3 border border-primary border-5 w-50">

    <form action="#" method="post" class="m-3 shadow-lg">

        <button type="submit" class="btn btn-success" name="enviar">Cargar BBDD</button>
    </form>


</body>

</html>