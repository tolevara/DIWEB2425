<?php
require("errores.php"); #ESTO ES PARA DEPURAR, TE DICE SI TIENES ALGÚN ERROR#

//EJEMPLO_06_CLASES.PHP = /var/www/html/curso/PHP-POO = Navegador= //localhost/curso/PHP-POO
/*CLASE-> PLANTILLA/MOLDE CON ATRIBUTOS Y METODOS
CONTRUCTOR -> METODO QUE CREA ELOBJETO (NEW)
DESTRUTOR -> METODO QUE ELIMINA EL OBJETO
LAS CLASES SE PONEN AL INICIO DEL ARCHIVO */



class Camion
{  #DECLARACIÓN DE LA CLASE#
    public $modelo = "";         #Cadena de Caracteres(sting) ->ATRIBUTOS AÑADIMOS VISIBILIDAD ->public#
    public $potencia = 0;        #Entero (int)#
    public $precio = 0.0;        #Decimal (float)#
    public $electrico = true;  #Booleano (boollean)#

    //CONSTRUCTOR DEFINIDO COMPLETO//      #function = MÉTODO = CONSTRUCTOR#
    public function __construct($modelo, $potencia, $precio, $electrico)
    { #<-(TODOS SON PARAMETROS)#
        $this->modelo = $modelo; #<-esto vine de los parámetros#
        $this->potencia = $potencia;
        $this->precio = $precio;
        $this->electrico = $electrico;
    }
    //METODO toString -> IMPRIME EL OBJETO//     //De texto a json = (encode),de json a texto = (decode)//
    public function __toString()  #<-(pub + fun + 2guiones bajo + to)#
    {
        return json_encode([         #<-EL OBJETO LO CODIFICAMOS EN (encode)# 
            'Modelo Camión' => $this->modelo,
            'Potencia' => $this->potencia,
            'Precio' => $this->precio,
            'Eléctrico' => $this->electrico ? "Si" : "No"
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP PROGRAMACIÓN ORIENTADA A OBJETO: Clases</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="all.min.css"> <!--SE AÑADE BOOSTRA Y FontAwesome-->
</head>

<body>
    <section class="m-3 p-3 w-50 bg-primary">
        <p class="alert alert-succesos"><?php echo $mensaje; ?></p> <!--ESTO PERTENECE AL ALERT DE ARRIBA-->
    </section>
    <section class="m-3 p-3 w-50 bg-secondary">
        <form action="#" method="post">
            <label for="texto">Modelo</label>
            <input type="text" name="texto" id="texto"><br>
            <label for="entero">Potencia</label>
            <input type="number" name="entero" id="entero"><br>
            <label for="decimal">Precio</label>
            <input type="number" name="decimal" id="decimal" step="0.1"><br>
            <hr class="m-3 p-1 bg-danger">
            <p>¿Es eléctrico?</p>
            <nav class="form-check"> <!--PRIMERO VA LA BOLITA Y DESPUÉS EL TEXTO-->
                <input type="radio" name="booleano" id="1" class="form-check-input" value="1" checked>
                <label for="1" class="form-check-label">Sí</label>
            </nav>
            <nav class="form-check"> <!--PRIMERO VA LA BOLITA Y DESPUÉS EL TEXTO-->
                <input type="radio" name="booleano" id="0" class="form-check-input" value="0">
                <label for="0" class="form-check-label">No</label>
            </nav>
            <hr class="m-3 p-1 bg-danger">
           
            <input type="submit" value="Enviar" name="enviar"><br>
        </form>
    </section>




</body>

</html>