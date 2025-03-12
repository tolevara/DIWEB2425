<?php  //Ex1306-Geometria.php//

require("errores.php");
$mensaje = "Mensaje";   #<-ESTO ES PARA QUE SALGA ALGO EN EL NAVEGADOR#

if (isset($_REQUEST['elegir'])) {  #<-SI SE ENVIA EL FORMULARIO ENTONCES HACEMOS...//
    $opcion = $_REQUEST['opcion'];
    switch ($opcion) {  //PARA PASAR A OTRA PAGINA SE USA header(); //
        case 'ej1':
            header('Location: Ex1306-menu.php');
            break;
        case 'ej2':
            header('Location: Ex1306-volumenes.php');
            break;
        case 'ej3':
            header('Location: Ex1306-geometria.php');
            break;
        case 'ej4':
            header('Location: Ex1306-tabmultiplicar.php');
            break;
        case 'ej5':
            header('Location: Ex1306-futbol.php');
            break;

        //EJEMPLO de otra forma de hacerlo: case 'ej0': header('Location: https//:www.as.php'); break;//
        default:
            # code...
            break;
    }
}

class Geometria  //PADRE//
{
    public int $base = 0;
    public int $altura = 0;

    public function __construct(int $base, int $altura)
    {
        $this->base = $base;
        $this->altura = $altura;
    }

    public function __toString(): string
    {
        return json_encode([
            'Base' => $this->base,
            'Altura' => $this->altura
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
}

class Triangulo extends Geometria {  //HIJAS//
    public string $color; #<- ATRIBUTO PROPIO DEL HIJO#

    public function __construct(int $base, int $altura, string $color)
    {
        parent::__construct($base, $altura);
        $this->color = $color;
    }

    public function __toString(): string
    {
        $miJson = json_decode(parent::__toString(), true);
        $miJson['Color Triangulo'] = $this->color;
        return json_encode($miJson, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public function area() : string {
        return "El área del triangulo es:" . ($this->base * $this->altura / 2);
        
    }
}

class Rectangulo extends Geometria {   //HIJAS//
    public string $color; #<- ATRIBUTO PROPIO DEL HIJO#

    public function __construct(int $base, int $altura, string $textura)
    {
        parent::__construct($base, $altura);
        $this->color = $textura;
    }

    public function __toString(): string
    {
        $miJson = json_decode(parent::__toString(), true);
        $miJson['Textura Rectángulo'] = $this->color;
        return json_encode($miJson, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public function area() : string {
        return "El área del rectángulo es:" . ($this->base * $this->altura);
        
    }
}






//SCRIPT PRINCIPAL//
if (isset($_REQUEST['solucion'])) {  //CREAMOS DOS OBJETOS//
    $triangulo1 = new Triangulo(10,5,"Rojo");
    $rectangulo1 = new Rectangulo(10,5,"Felpa");
    $mensaje .= "<br> Triángulo <br>" . $triangulo1;
    $mensaje .= "<br>" . $triangulo1->area();
    $mensaje .= "<br> Rectángulo <br>" . $rectangulo1;
    $mensaje .= "<br>" . $rectangulo1->area();

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

    <section aria-label="volumenes"> <!--ESTE FORMALARIO MANDA LOS DATOS PARA VOLÚMENES-->
        <section class="m-3 p-3 w-50 bg-info text-white"> <!--PINTA EL OBJETO EN EL NAVEGADOR-->
            <form action="#" method="post">







                <button type="submit" name="solucion" class="btn btn-success">Ver Figuras</button>

            </form>
        </section>

        <nav aria-label="navegacion" class="m-3 p-3 w-50 bg-primary"> <!--(bg-primary) = COLOR EN EL NAVEGADOR-->
            <form action="#" method="post"> <!--FORMULARIO DE NAVEGACION-->
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