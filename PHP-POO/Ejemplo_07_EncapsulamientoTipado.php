<?php
require("errores.php"); #ESTO ES PARA DEPURAR, TE DICE SI TIENES ALGÚN ERROR#

//EJEMPLO_07_Encapsulamiento y Tipado.PHP// =(/var/www/html/curso/PHP-POO = Navegador= //localhost/curso/PHP-POO

/*ENCAPSULAMIENTO: -> OCULTA ATIBUTOS Y MÉTODOS
-Se emplea public ó protected ó private
-Protected -> visible sólo para descendiente
-Private -> visible sólo para la propia clase(ejemplo:Precio)
*TIPADO: -> Define tipos de datos para la entrada/salida*/

//EN EL CONSTRUCTOR TIPAMOS LAS ENTRADAS Y USAMOS EL SETTER//
class Camion
{  #DECLARACIÓN DE LA CLASE#    //EVITA COMETER ERRORES TIPANDO LAS ENTRADAS DE LOS ATRIBUTOS//
    public string $modelo = "";      #Cadena de Caracteres (Al ponerle sting ya está tipado) 
    public int $potencia = 0;        #Entero               (Al ponerle int ya está tipado)
    private float $precio = 0.0;     #Decimal "private = privado"(Al ponerle float ya está tipado)
    public bool $electrico = true;   #Booleano             (Al ponerle bool ya está tipado)#

    //CONSTRUCTOR DEFINIDO COMPLETO//      #function = MÉTODO = CONSTRUCTOR#
    public function __construct        /*($modelo, $potencia, $precio, $electrico)*/
    (string $modelo, int $potencia, float $precio, bool $electrico)
    { #<-(TODOS SON PARAMETROS)#
        $this->modelo = $modelo; #<-esto vine de los parámetros#
        $this->potencia = $potencia;
        $this->precio = $precio;
        $this->electrico = $electrico;
    }
    //TIPAMOS LA SALIDA
    public function __toString(): string
    {
        return json_encode([
            'Modelo Camión' => $this->modelo,
            'Potencia' => $this->potencia,
            'Precio' => $this->precio,
            'Eléctrico' => $this->electrico ? "Si" : "No"
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    //AL ATRIBUTO PRIVADO (precio) LE DEFINIMOS EL set/get SIEMPRE SON PÚBLICOS
    #SETTER#
    public function setPrecio (float $precio): void {   #la salida es el void(sin salida)#
        if($precio > 0) { #ESTE VALOR ES POSITIVO#
            $this->precio = $precio;
        }  
    }

    #GETTER#
    public function getPrecio (): float {
        return $this->precio;
    }
}

//SCRIP PRINCIPAL//
$mensaje = "Mensajes";      #AQUÍ PONEMOS EL ALERT#
if (isset($_REQUEST['enviar'])) {
    $modelo = $_REQUEST['texto'];
    $potencia = $_REQUEST['entero'];
    $precio = $_REQUEST['decimal'];
    $electrico = $_REQUEST['booleano'];

    //CREAMOS EL CAMIÓN//
    $MiCamion = new Camion($modelo, $potencia, $precio, $electrico);
    $mensaje = $MiCamion; #<-IMPRIMO EL CAMIÓN#
}
?>
<!DOCTYPE html> <!--ESTO PERTENECE AL HTML-->
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP PROGRAMACIÓN ORIENTADA A OBJETO: Clases</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="all.min.css"> <!--SE AÑADE BOOSTRA Y FontAwesome-->
</head>

<body>
    <section class="m-3 p-3 w-50 bg-primary"> <!--PONEMOS pre PARA QUE PINTE TIPO BLOQUE-->
        <pre class="alert alert-succesos"><?php echo $mensaje; ?></p> <!--ESTO PERTENECE AL ALERT DE ARRIBA-->
    </section>

    <section class="m-3 p-3 w-50 bg-secondary text-white">
        <form action="#" method="post">
            <nav class="d-flex mb-3">
            <label for="texto" class="w-50">Modelo</label>
            <input type="text" name="texto" id="texto" class="w-50">
            </nav>

            <nav class="d-flex mb-3">
            <label for="entero" class="w-50">Potencia</label>
            <input type="number" name="entero" id="entero" class="w-50">
            </nav>

            <nav class="d-flex mb-3">
            <label for="decimal" class="w-50">Precio</label>
            <input type="number" name="decimal" id="decimal" step="0.1" class="w-50">
            </nav>

            <hr class="m-3 p-1 bg-danger">
            <p>¿Es eléctrico?</p>
            <nav class="form-check">   <!--PRIMERO VA LA BOLITA Y DESPUÉS EL TEXTO-->
                <input type="radio" name="booleano" id="1" class="form-check-input" value="1" checked>
                <label for="1" class="form-check-label">Sí</label>
            </nav>
            <nav class="form-check">   <!--PRIMERO VA LA BOLITA Y DESPUÉS EL TEXTO-->
                <input type="radio" name="booleano" id="0" class="form-check-input" value="0">
                <label for="0" class="form-check-label">No</label>
            </nav>
            <hr class="m-3 p-1 bg-danger">
           
            <input type="submit" value="Enviar" name="enviar"><br>
        </form>
    </section>
</body>
</html>