<?php  //Ex1306-Fútbol.php//

require("errores.php");
$mensaje = "Mensaje";   #<-ESTO ES PARA QUE SALGA ALGO EN EL NAVEGADOR#

if (isset($_REQUEST['elegir'])) {  #<-SI SE ENVÍA EL FORMULARIO ENTONCES HACEMOS...#
    $opcion = $_REQUEST['opcion'];
    switch ($opcion) {     #<- PARA PASAR A OTRA PÁGINA SE USA header(); #

        case 'ej1': header('Location: Ex1306-menu.php'); break;    
        case 'ej2': header('Location: Ex1306-volumenes.php'); break;   
        case 'ej3': header('Location: Ex1306-geometria.php'); break;   
        case 'ej4': header('Location: Ex1306-tabmultiplicar.php'); break;   
        case 'ej5': header('Location: Ex1306-futbol.php'); break;
            
//EJEMPLO DE OTRA FORMA DE HACERLO: case 'ej0': header('Location: https//:www.as.php'); break;//
        default:
            # code...
            break;
    }
}

//SE EMPIEZA POR LA INTERFAZ// -> 1º PASO
interface Eventos
{
    public function concentrarse(): void;
    public function viajar(): void;
}

//SIGUIENTE EL TRAIT// -> 2º PASO
trait Partido
{
    public function jugarPartido(): void
    {
        echo "Voy a jugar";
    }
    public function dirigirPartido(): void
    {
        echo "Soy el mister";
    }
}

//SEGUIMOS CON LA CLASE PADRE// -> 3º PASO
abstract class Deportista
{
    protected string $identidad = "";
    protected int $edad = 0;
    protected bool $sexo = true;

    public function __construct(
        string $identidad,
        int $edad,
        bool $sexo)
    {
        $this->identidad = $identidad;
        $this->edad = $edad;
        $this->sexo = $sexo;
    }

    public function __toString() : string{
        return json_encode([
            "Identidad: " => $this->identidad,
            "Edad: " => $this->edad,
            "Sexo" => $this->sexo? "Mujer" : "Hombre"  #<- (?) SE PONE PARA DEFINIR UN BOOLEANO#
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

//DEFINIMOS EL MÉTODO ABSTRACTO//
    abstract public function federarse() : void; 
}

//CLASE COMPOSICION -> 4º PASO
class Club {
    public string $denominacion = "";
    public int $fundacion = 1890;

    public function __construct(string $denominacion, int $fundacion)
    {
        $this->denominacion = $denominacion;
        $this->fundacion = $fundacion;
    }

    public function __toString() : string {
        return json_encode([
            "Denominacion: " => $this->denominacion,
            "Fundacion: " => $this->fundacion,
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
}

//CLASE HIJA -> 5º PASO
class Futbolista extends Deportista implements Eventos {
    use Partido;
    public Club $club; #<- ATRIBUTO COMPOSICION

    private int $dorsal = 0;   #<- DEFINIMOS ATRIBUTO PRIVADO#
              
    public function setDorsal(int $dorsal) : void {  #<- Y SETTER/GETTER#
        if($dorsal>0) {
            $this->dorsal = $dorsal;
        }
    }

    public function getDorsal() : int
    {
        return $this->dorsal;
    }

    public function __construct(string $identidad, int $edad, bool $sexo, int $dorsal)
    {
        parent::__construct($identidad, $edad, $sexo);
        $this->setDorsal($dorsal);
        $this->club = new Club("Real Betis", 1907);
    }

    public function __toString(): string {
        $miJSON = json_decode(parent::__toString(),true);
        $miJSON['Dorsal'] = $this->dorsal;
        $miJSON['Club'] = json_decode($this->club, true);
        return json_encode($miJSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public function concentrarse() : void { #<-IMPLEMENTAR LOS TRES MÉTODOS OBLIGATORIO#
        echo "Concentrado";
    }
    public function viajar() : void {
        echo "Viaje"; 
    }
    public function federarse(): void   {
        echo "Estoy Federado";
    }
}

//CLASE HIJA 6º PASO
class Entrenador extends Deportista implements Eventos {
    use Partido;
    public Club $club; #<- ATRIBUTO COMPOSICION

    private int $inicio = 0;   #<- DEFINIMOS ATRIBUTO PRIVADO#
              
    public function setInicio(int $inicio) : void {  #<- Y SETTER/GETTER#
        if($inicio>2000) {
            $this->inicio = $inicio;
        }
    }

    public function getDorsal() : int
    {
        return $this->inicio;
    }

    public function __construct(string $identidad, int $edad, bool $sexo, int $inicio)
    {
        parent::__construct($identidad, $edad, $sexo);
        $this->setInicio($inicio);
        $this->club = new Club("Real Betis", 1907);
    }

    public function __toString(): string {
        $miJSON = json_decode(parent::__toString(),true);
        $miJSON['Inicio'] = $this->inicio;
        $miJSON['Club'] = json_decode($this->club, true);
        return json_encode($miJSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public function concentrarse() : void { #<-IMPLEMENTAR LOS TRES MÉTODOS OBLIGATORIO#
        echo "Concentrado";
    }
    public function viajar() : void {
        echo "Viaje"; 
    }
    public function federarse(): void   {
        echo "Estoy Federado";
    }
}

//SCRIPT PRINCIPAL//
if (isset($_REQUEST['solucion'])) {  
    $deportista = [];
    $deportista[] = new Futbolista("Isco", 32, false,8);
    $deportista[] = new Entrenador("Pellegrini", 70, false, 2020);

    foreach ($deportista as $indice => $deportista) {
        $mensaje .= "<br> $deportita <br>";
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