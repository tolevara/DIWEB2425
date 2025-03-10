<?php  //Ex1306-Volumenes.php//

require("errores.php");
$mensaje = "Mensaje";   #<-ESTO ES PARA QUE SALGA ALGO EN EL NAVEGADOR#

if (isset($_REQUEST['elegir'])) {  #<-SI SE ENVIA EL FORMULARIO ENTONCES HACEMOS...//
    $opcion = $_REQUEST['opcion'];
    switch ($opcion) {  //PARA PASAR A OTRA PAGINA SE USA header(); //
        case 'ej1': header('Location: Ex1306-menu.php');      break;   
        case 'ej2': header('Location: Ex1306-volumenes.php'); break;   
        case 'ej3': header('Location: Ex1306-geometria.php');  break;
        case 'ej4': header('Location: Ex1306-tabmultiplicar.php'); break;  
        case 'ej5': header('Location: Ex1306-futbol.php'); break;
             
        //EJEMPLO de otra forma de hacerlo: case 'ej0': header('Location: https//:www.as.php'); break;//
        default:
            # code...
            break;
    }
}

//FUNCIÓN CON ENTRADA Y CON SALIDA//
function volumenes($figura, $a, $h, $r ) : string {
    $resultado = "";
    switch ($figura) {
        case 'prisma': $resultado .= "Área Prisma = " . ($a * $h);                break; 
        case 'clindro': $resultado .= "Área Cilindro = " . (M_PI * $r * $r * $h); break; 
        case 'cono': $resultado .= "Área Cono = " . ((1/3) *  $a * $h);           break; 
        case 'esfera': $resultado .= "Área Esfera = " . ((4/3) * $r * $r * $r);   break; 
    }
    return $resultado;
}

//ESCRIPT PRINCIPAL//
if(isset($_REQUEST['solucion'])) {  //RECOJO DATOS DEL FORMULARIO//
    $figura = $_REQUEST['figura'];
    $a = $_REQUEST['a'];
    $h = $_REQUEST['h'];
    $r = $_REQUEST['r'];

    $mensaje = volumenes($figura, $a, $h, $r);
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen modelo formativo 0951</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body> <!--ESTE (section) ES PARA QUE SALGA ALGO EN EL NAVEGADOR-->
    <section aria-label="alerta"
        class="alert alert-success m-3 p-3 w-50">
        <pre class="mb-0"><?php echo $mensaje; ?></pre>
    </section>

    <section aria-label="volumenes">   <!--ESTE FORMALARIO MANDA LOS DATOS PARA VOLÚMENES-->
        <section class="m-3 p-3 w-50 bg-info text-white">   <!--PINTA EL OBJETO EN EL NAVEGADOR-->
            <form action="#" method="post">

                <nav class="d-flex mb-3">
                    <label for="a" class="w-50">Área Base</label>
                    <input type="number" name="a" id="a" class="w-50" min="1">
                </nav>

                <nav class="d-flex mb-3">
                    <label for="h" class="w-50">Altura </label>
                    <input type="number" name="h" id="h" class="w-50" min="1">
                </nav>

                <nav class="d-flex mb-3">
                    <label for="r" class="w-50">Radio</label>
                    <input type="number" name="r" id="r" class="w-50" min="1">
                </nav>
                
                <label for="figura">Elige Opción:</label><br>
                <select name="figura" id="figura" class="form-control">
                    <option value="prisma">Prisma</option>
                    <option value="cilindro">cilindro</option>
                    <option value="cono">Cono</option>
                    <option value="esfera">Esfera</option>
                </select><br>
                <button type="submit" name="solucion" class="btn btn-success">Solución Volumen</button>

            </form>
        </section>

        <nav aria-label="navegacion" class="m-3 p-3 w-50 bg-primary">   <!--(bg-primary) = COLOR EN EL NAVEGADOR-->
            <form action="#" method="post">   <!--FORMULARIO DE NAVEGACION-->
                <label for="opcion">Elige Opción:</label><br>
                <select name="opcion" id="opcion" class="for-control">
                    <option value="ej1">Menú</option>
                    <option value="ej2">Volúmenes</option>
                    <option value="ej3">Geometria</option>
                    <option value="ej4">TablaMultiplicar</option>
                    <option value="ej5">Fútbol</option>
                </select><br>
                <button type="submit" name="elegir" class="btn btn-success">Elegir</button>   <!--ESTO SE ENVIA PARA RECOGER EL FORMULARIO-->

            </form>
        </nav>
</body>
</html>