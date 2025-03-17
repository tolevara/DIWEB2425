<?php
require_once("errores.php");



// Creamos músicos y directores de orquesta
$orquesta = new Orquesta("ROSS", 1992);
$m1 = new Musico("Juan", 30, "Masculino", "Guitarra", $orquesta);
$m2 = new Musico("Maria", 25, "Femenino", "Batería", $orquesta);
$m3 = new Musico("Carlos", 40, "Masculino", "Bajo", $orquesta);
$m4 = new Musico("Laura", 28, "Femenino", "Violín", $orquesta);
$m5 = new Musico("Pedro", 35, "Masculino", "Piano", $orquesta);

$d1 = new Director("Luis", 45, "Masculino", 20);
$d2 = new Director("Ana", 50, "Femenino", 25);

// Crear un array con los músicos y directores
$personas = [$m1, $m2, $m3, $m4, $m5, $d1, $d2];

// Convertir a JSON
echo json_encode($personas, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

?>

<!-- Formulario HTML para capturar datos 
<form method="post">
    Nombre: <input type="text" name="nombre" required><br>
    Edad: <input type="number" name="edad" required min="1"><br>
    Género: 
    <select name="genero">
        <option value="Masculino">Masculino</option>
        <option value="Femenino">Femenino</option>
    </select><br>
    <input type="submit" value="Enviar">
</form> -->

<?php


interface iDirigir
{
    public function dirigirOrquesta();
}

// Trait Ensayo
trait Ensayo
{
    public function ensaya()
    {
        return "Estoy ensayando";
    }
}

// Interfaz iConcierto
interface iConcierto
{
    public function tocar(): string;
}

// Clase Artista
abstract class Artista
{
    public string $nombre = "";
    private  int $edad = 0;
    public bool $genero = true;

    public function __construct(string $nombre, int $edad, bool $genero)
    {
        $this->nombre = $nombre;
        $this->setEdad($edad);
        $this->genero = $genero;
    }

    //TIPAMOS LA SALIDA//
    public function __toString(): string
    {
        return json_encode([
            'Nombre' => $this->nombre,
            'Edad' => $this->edad,
            'Genero' => $this->genero ? "Masculino" : "Femenino"
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
    public function setEdad(int $edad): void
    {
        if ($edad > 0) {
            $this->edad = $edad;
        }
    }

    public function getEdad(): int
    {
        return $this->edad;
    }

    public static function leeArtista(
        string $nombre,
        int $edad,
        bool $genero
    ): Artista {
        return new Artista($nombre, $edad, $genero);
    }
}


// Clase Musico
class Musico extends Artista implements iConcierto {

    public static function leeArtista(
        string $nombre,
        int $edad,
        bool $genero
    ): Artista {
        return new Musico($nombre, $edad, $genero, "Instrumento", new Orquesta("ROSS", 1992));
    }
    use Ensayo;
    public string $instrumento="";
    public Orquesta $orquesta;

    public function __construct(
        string $nombre,
        int $edad,
        bool $genero,
        string $instrumento,
        string $orquesta
    ) {
        parent::__construct($nombre, $edad, $genero);
        $this->instrumento = $instrumento;
        $this->orquesta = new Orquesta("Ross", 1992);
        
    }

    public function __toString(): string
    {
        return json_encode([
            'nombre' => $this->nombre,
            'edad' => $this->getEdad(),
            'genero' => $this->genero,
            'instrumento' => $this->instrumento,
            'orquesta' => json_decode($this->orquesta->toString(), true),
            'ensayo' => $this->ensaya()
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public function tocar(): string
    {
        return "Toco mi instrumento: " . $this->instrumento;
    }
}

// Clase Director
class Director extends Artista implements iDirigir
{
    public static function leeArtista(
        string $nombre,
        int $edad,
        bool $genero
    ): Artista {
        return new Director($nombre, $edad, $genero, 0);
    }
    private $experiencia;

    public function __construct($nombre, $edad, $genero, $experiencia)
    {
        parent::__construct($nombre, $edad, $genero);
        $this->experiencia = $experiencia;
    }

    public function __toString(): string
    {
        return  json_encode([
            'nombre' => $this->nombre,
            'edad' => $this->getEdad(),
            'genero' => $this->genero,
            'experiencia' => $this->experiencia,
            'dirigir' => $this->dirigirOrquesta()
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public function dirigirOrquesta()
    {
        return "Dirigiendo la orquesta";
    }
}

// Clase Orquesta
class Orquesta
{
    public string $denominacion;
    public int $fundacion;

    public function __construct(string $denominacion, int $fundacion)
    {
        $this->denominacion = $denominacion;
        $this->fundacion = $fundacion;
    }

    public function __toString(): string
    {
        return json_encode([
            'Nombre de la orquesta' => $this->denominacion,
            'Fundación de la orquesta' => $this->fundacion
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Tarea_05</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form {
            margin-bottom: 30px;
        }

        label,
        input,
        select {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <section class="m-3 p-3 w-50 bg-primary">
        <pre class="alert alert-succesos"><?php echo $mensaje; ?></pre> <!--ESTO PERTENECE AL ALERT DE ARRIBA-->
    </section>

    <section class="m-3 p-3 w-50 bg-secondary text-white">
        <form action="#" method="post">
            <nav class="d-flex mb-3">
                <label for="texto" class="w-50">Nombre:</label>
                <input type="text" name="texto" id="texto" class="w-50"><br>
            </nav>

            <nav class="d-flex mb-3">
                <label for="entero">Edad:</label>
                <input type="number" name="entero" id="entero" class="w-50"><br>
            </nav>

            <select id="genero" name="genero" required>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
            </select><br>

            <hr class="m-3 p-1 bg-danger">

            <input type="submit" value="enviar" name="enviar"><br>
        </form>

        <h2>Lista de Artistas y Directores:</h2>
        <pre><?php echo json_encode($personas, JSON_PRETTY_PRINT); ?></pre>

    </section>
</body>

</html>