<?php  //Ex1306-menu.php//

require("errores.php");
$mensaje = "Mensaje"; //ESTO ES PARA QUE SALGA ALGO EN EL NAVEGADOR//

if (isset($_REQUEST['elegir'])) { //SI SE ENVIA EL FORMULARIO ENTONCES HACEMOS...//
    $opcion = $_REQUEST['opcion'];
    switch ($opcion) {  //PARA PASAR A OTRA PAGINA SE USA header(); //
        case 'ej1':
            header('Location: Ex1306-menu.php');
            break;
        case 'ej2':
            header('Location: Ex1306-volumenes.php');
            break;
        case 'ej3':
            header('Location: Ex1306-anidi.php');
            break;
        case 'ej4':
            header('Location: Ex1306-medioGeom.php');
            break;
        case 'ej5':
            header('Location: Ex1306-biblioteca.php');
            break;
        // case 'ej0': header('Location: https//:www.as.php');      break;//
        default:
            # code...
            break;
    }
}

//FUNCIÓN TETAEDRO//
function tetraedro($a, $h): string
{
    $resultado = "";
    $resultado .= "Volumen Tetraedro = " . ((1 / 3) * $a * $h);
    return $resultado;
}

//FUNCIÓN PARALELEPIDO//
function paralelepipedo($a, $b, $c): string
{
    $resultado = "";
    $resultado .= "Volumen Paralelepípedo = " . ($a * $b * $c);
    return $resultado;
}

//FUNCIÓN ELIPSOIDE//
function elipsoide($a, $b, $c): string
{
    $resultado = "";
    $resultado .= "Volumen Elipsoide = " . ((4 / 3) * M_PI * $a * $b * $c);
    return $resultado;
}


//FUNCIÓN CONO//
function cono($b, $r, $h): string
{
    $resultado = "";
    $resultado .= "Volumen Cono Truncado = " . ((1 / 3) * $h * ($b * $b + $b * $r + $r * $r));
    return $resultado;
}

//ESCRIPT TETRAEDO//
if (isset($_REQUEST['solucion'])) {
    $figura = $_REQUEST['figura'];
    $a = $_REQUEST['a'];
    $b = $_REQUEST['b'];
    $c = $_REQUEST['c'];

    switch ($figura) {
        case 'tetraedro':
            $mensaje .= tetraedro($a, $b);
            break;
        case 'paralelepipedo':
            $mensaje .= paralelepipedo($a, $b, $c);
            break;
        case 'elipsoide':
            $mensaje .= elipsoide($a, $b, $c);
            break;
        case 'cono':
            $mensaje .= cono($a, $b, $c);
            break;
    }
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen modelo formativo 0952</title>
    <link rel="stylesheet" href="bootstrap.min.css">


</head>

<body> <!--ESTE (section) ES PARA QUE SALGA ALGO EN EL NAVEGADOR-->
    <section aria-label="alerta"
        class="alert alert-success m-3 p-3 w-50">
        <pre class="mb-0"><?php echo $mensaje; ?></pre>
    </section>
    <nav aria-label="navegacion" class="m-3 p-3 w-50 bg-primary"> <!--(bg-primary) = COLOR EN EL NAVEGADOR -->
        <form action="#" method="post">
            <label for="opcion">Elige Opción:</label><br>
            <select name="opcion" id="opcion" class="for-control">
                <option value="ej1">Menú</option>
                <option value="ej2">Volúmenes</option>
                <option value="ej3">Anidi</option>
                <option value="ej4">Media Geometrica</option>
                <option value="ej5">Biblioteca</option>
            </select><br>
            <button type="submit" name="elegir" class="btn btn-success">Elegir</button> <!--ESTO SE ENVIA PARA RECOGER EL FORMULARIO-->

        </form>


        <section aria-label="volumenes"> <!--ESTx1306-volumenes.phpE FORMALARIO MANDA LOS DATOS PARA VOLÚMENES-->
            <section class="m-3 p-3 w-50 bg-info text-white">
                <form action="#" method="post">

                    <nav class="d-flex mb-3">
                        <label for="a" class="w-50">Área </label>
                        <input type="number" name="a" id="a" class="w-50" min="1">
                    </nav>

                    <nav class="d-flex mb-3">
                        <label for="b" class="w-50">Altura </label>
                        <input type="number" name="b" id="b" class="w-50" min="1">
                    </nav>

                    <nav class="d-flex mb-3">
                        <label for="c" class="w-50">Radio</label>
                        <input type="number" name="c" id="c" class="w-50" min="1">
                    </nav>

                    <label for="figura">Elige Opción:</label><br>
                    <select name="figura" id="figura" class="form-control">
                        <option value="tetraedro">Tetraedro</option>
                        <option value="paralelepipedo">paralelepípedo</option>
                        <option value="elipsoide">Elipsoide</option>
                        <option value="cono">Cono Truncado</option>
                    </select><br>
                    <button type="submit" name="solucion" class="btn btn-success">Solución Volumen</button>

                </form>
            </section>





















    </nav>
</body>

</html>