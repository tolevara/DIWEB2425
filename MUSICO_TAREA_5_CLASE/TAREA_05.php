<?php

require("errores.php");
$mensaje = "Mensajes";




// INTERFAZ //
interface iConcierto
{
    public function tocar();
    public function dirigirOrquesta();
}

//TRAIT//
trait Ensayo
{
    public function ensayar(): string
    {
        return "El músico está ensayando";
    }
}

// CLASE PADRE //
abstract class Artista
{
    public string $nombre = "";
    protected int $edad = 0;
    public bool $genero = true;

    public function __construct(string $nombre, int $edad, bool $genero = true)
    {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->genero = $genero;
    }

    public function __toString(): string  //ESTO PERTENECE AL PADRE//
    {
        return json_encode([
            'nombre' => $this->nombre,
            'edad' => $this->edad,
            'genero' => $this->genero ? "Masculino" : "Femenino"
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
}

// CLASE HIJA //
class Musico extends Artista implements iConcierto
{

    public string $instrumento;
    public Orquesta $orquesta;

    use Ensayo;

    public function __construct(
        string $nombre,
        int $edad,
        bool $genero,
        string $instrumento
    ) {
        parent::__construct($nombre, $edad, $genero);
        $this->instrumento = $instrumento;
        $this->orquesta = new Orquesta("ROSS", 1992);
    }

    public function __toString(): string
    {
        $miJSON = json_decode(parent::__toString(), true);
        $miJSON['instrumento'] = $this->instrumento;
        $miJSON['orquesta'] = $this->orquesta;
        return json_encode($miJSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public function tocar(): void
    {

        echo "Tocando el instrumento";
    }

    public function dirigirOrquesta(): void {}
}

// CLASE HIJA //
class Director extends Artista implements iConcierto
{
    private string $experiencia;
    public Orquesta $orquesta;

    public function __construct(string $nombre, int $edad, bool $genero, string $experiencia)
    {
        parent::__construct($nombre, $edad, $genero);
        $this->experiencia = $experiencia;
        $this->orquesta = new Orquesta("ROSS", 1992);
    }

    public function __toString(): string
    {
        $miJSON = json_decode(parent::__toString(), true);
        $miJSON['experiencia'] = $this->experiencia;
        $miJSON['orquesta'] = $this->orquesta;
        return json_encode($miJSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public function tocar() {}

    public function dirigirOrquesta(): void
    {
        echo "Dirigiendo la orquesta";
    }
}


class Orquesta
{
    public string $denominacion;
    public string $fundacion;

    public function __construct(string $denominacion, string $fundacion)
    {
        $this->denominacion = $denominacion;
        $this->fundacion = $fundacion;
    }

    public function __toString()
    {
        return json_encode([
            'denominacion' => $this->denominacion,
            'fundacion' => $this->fundacion
        ],  JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
}

// Script principal
if (isset($_REQUEST['enviar'])) {
    $nombre = $_REQUEST['nombre'];
    $edad = $_REQUEST['edad'];
    $genero = $_REQUEST['genero'];

    // //CREAMOS MÚSICOS Y DIRECTORES DE ORQUESTA//
    $m1 = new Musico($nombre, $edad, $genero, "Guitarra");
    $m2 = new Musico("Maria", 25, "Femenino", "Batería");
    $m3 = new Musico("Carlos", 40, "Masculino", "Bajo");
    $m4 = new Musico("Laura", 28, "Femenino", "Violín");
    $m5 = new Musico("Pedro", 35, "Masculino", "Piano");

    $d1 = new Director("Luis", 45, "Masculino", 20);
    $d2 = new Director("Ana", 50, "Femenino", 25);

    //CREAR ARRAY DE  MÚSICOS Y DIRECTORES//
    $personas = [$m1, $m2, $m3, $m4, $m5, $d1, $d2];

    // CONVERTIR A JSON //
    $mensaje .= json_encode($personas, JSON_PRETTY_PRINT);
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAREA_05</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
    <section class="m-3 p-3 w-50 bg-primary">
        <pre class="alert alert-succesos">
            <?php echo $mensaje; ?></pre> <!--ESTO PERTENECE AL ALERT DE ARRIBA-->
    </section>
    <section class="m-3 p-3 w-50 bg-secondary text-white">
        <form action="#" method="post">
            <label for="texto" class="w-50">Nombre</label>
            <input type="text" name="nombre" id="texto" class="w-50"><br><br>

            <label for="entero" class="w-50">Edad</label>
            <input type="number" name="edad" id="entero" class="w-50"><br><br>

            <select name="genero">
                <option value="0">Masculino</option>
                <option value="1">Femenino</option>
            </select><br><br>

            <input type="submit" value="Enviar" name="enviar">

        </form>

</body>

</html>