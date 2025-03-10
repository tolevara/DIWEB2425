<?php  //Ex1306-menu.php//

require("errores.php");
$mensaje = "Mensaje"; //ESTO ES PARA QUE SALGA ALGO EN EL NAVEGADOR//

if(isset($_REQUEST['elegir'])) { //SI SE ENVIA EL FORMULARIO ENTONCES HACEMOS...//
    $opcion = $_REQUEST['opcion'];
    switch ($opcion) {  //PARA PASAR A OTRA PAGINA SE USA header(); //
        case 'ej1': header('Location: Ex1306-menu.php');           break;
        case 'ej2': header('Location: Ex1306-volumenes.php');      break;
        case 'ej3': header('Location: Ex1306-geometria.php');      break;
        case 'ej4': header('Location: Ex1306-tabmultiplicar.php'); break;
        case 'ej5': header('Location: Ex1306-futbol.php');         break;
       // case 'ej0': header('Location: https//:www.as.php');      break;//
        default:
            # code...
            break;
    }

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
<body>         <!--ESTE (section) ES PARA QUE SALGA ALGO EN EL NAVEGADOR-->
    <section aria-label="alerta"
       class="alert alert-success m-3 p-3 w-50">
        <pre class="mb-0"><?php echo $mensaje;?></pre>
    </section>
    <nav aria-label="navegacion" class="m-3 p-3 w-50 bg-primary"> <!--(bg-primary) = COLOR EN EL NAVEGADOR -->
        <form action="#" method="post">
            <label for="opcion">Elige Opción:</label><br>
            <select name="opcion" id="opcion" class="for-control">
                <option value="ej1">Menú</option>
                <option value="ej2">Volúmenes</option>
                <option value="ej3">Geometria</option>
                <option value="ej4">TablaMultiplicar</option>
                <option value="ej5">Fútbol</option>
            </select><br>
            <button type="submit" name="elegir" class="btn btn-success">Elegir</button> <!--ESTO SE ENVIA PARA RECOGER EL FORMULARIO-->

        </form>

    </nav>
</body>
</html>