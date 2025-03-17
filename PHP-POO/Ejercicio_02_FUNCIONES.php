<?php                     /*Ejercicio_02_Volúmenes.php*/

/*  Sacar volúmenes de estas figuras:
    a) Prisma: V = AreaBase x Altura;
    b) Cilindro: V = PI x radio² x Altura
    c) Cono: V = 1/3 x AreaBase x Altura
    d) Esfera: V = 4/3 x PI x radio³*/

$PI = 3.1416;
$resultado = 0;
$mensaje = "";
$n1 =  0;
$n2 =  0;

// vPrisma - Tipo 0E0S (La más facil)
function vPrisma()
{
    global $resultado, $mensaje, $n1, $n2;
    $resultado = $n1 * $n2;
    $mensaje = "area prisma es $resultado";
}

 #-> (TIPO DE funcion NE 0S)#
function vCilindro($n1, $n2) 
{
    global $PI, $resultado, $mensaje;
    $resultado = $PI* $n1 * $n1 *$n2;
    $mensaje = "area prisma es $resultado";
}

function vCono() {

}

function vEsfera() {

}


// vCilindro - Tipo NE0S

// vCono - Tipo 0E1S
global $PI, $n1, $n2;
$resultado = (1/3) * $PI *$n1 * $n2;
return "El volumen del cono es $resultado";

// VEsfera - Tipo NE1S (la más dificil)
function vEsfera($radio) {
    global $PI;
    $resultado = (4/3) * $PI * $radio * $radio * $radio;
    return "El volumen de la esfera es $resultado";

}

// Se activan las funciones al pulsar enviar
// Usamos un switch con los value de los option del select  
if (isset($_REQUEST['enviar'])) {
    $solucion = $_REQUEST['solucion'];
    $n1 =  $_REQUEST['n1'];
    $n2 =  $_REQUEST['n2'];

    switch ($solucion) {
        case 'Prisma':
            vPrisma();
            break;
        case 'Cilindro':
            vCilindro($n1, $n2, $resultado);
            break;
        case 'Cono':
            vCono();
            break;
        case 'Esfera':
            vEsfera($n1);
            break;
            //default:   break;    
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=., initial-scale=1.0">
    <title>Ejercicio Volúmenes</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
    <section aria-label="alert">
        <p class="alert alert-primary m-3 p-3 w-50">
            <?php echo $mensaje; ?></p>
    </section>
    <hr class="m-3 p-1 bg-primary">
    <form action="#" method="post" class="form m-3 p-3 w-50">
        <nav class="form-group">
            <label for="solucion">Elige Volumen</label>
            <select class="form-control" id="solucion" name="solucion">
                <option disabled selected>-- Elige Opción -- </option>
                <option value="prisma">Prisma</option>
                <option value="cilindro">Cilindro</option>
                <option value="cono">Cono</option>
                <option value="esfera">Esfera</option>
            </select>
            <label for="n1" class="form-label">Num1</label>
            <input type="number" name="n1" id="n1"
                class="form-control"><br>
            <label for="n2" class="form-label">Num2</label>
            <input type="number" name="n2" id="n2"
                class="form-control"><br>
        </nav>
        <input type="submit" value="Enviar" class="btn btn-success" name="enviar">
    </form>
</body>

</html>