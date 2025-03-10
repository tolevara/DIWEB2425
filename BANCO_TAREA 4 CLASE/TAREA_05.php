<?php
// Incluyendo las clases necesarias
include 'artista.php';
include 'musico.php';
include 'director.php';
include 'orquesta.php';
include 'ensayo.php';
include 'iconcierto.php';

// Creamos algunos músicos y directores de orquesta
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
echo json_encode($personas, JSON_PRETTY_PRINT);
?>

<!-- Formulario HTML para capturar datos -->
<form method="post">
    Nombre: <input type="text" name="nombre"><br>
    Edad: <input type="number" name="edad"><br>
    Género: 
    <select name="genero">
        <option value="Masculino">Masculino</option>
        <option value="Femenino">Femenino</option>
    </select><br>
    <input type="submit" value="Enviar">
</form>




<?php
abstract class Artista {
    protected $nombre;
    protected $edad;
    protected $genero;

    public function __construct($nombre, $edad, $genero = true) {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->genero = $genero;
    }

    abstract public function toString();
}
?>






<?php
include 'ensayo.php';
include 'iconcierto.php';

class Musico extends Artista implements iConcierto {
    private $instrumento;
    private $orquesta;

    public function __construct($nombre, $edad, $genero, $instrumento, $orquesta) {
        parent::__construct($nombre, $edad, $genero);
        $this->instrumento = $instrumento;
        $this->orquesta = $orquesta;
    }

    public function toString() {
        return json_encode([
            'nombre' => $this->nombre,
            'edad' => $this->edad,
            'genero' => $this->genero,
            'instrumento' => $this->instrumento,
            'orquesta' => $this->orquesta->toString()
        ]);
    }

    public function tocar() {
        return "Toco mi instrumento: " . $this->instrumento;
    }
}
?>




<?php
class Director extends Artista implements iConcierto {
    private $experiencia;

    public function __construct($nombre, $edad, $genero, $experiencia) {
        parent::__construct($nombre, $edad, $genero);
        $this->experiencia = $experiencia;
    }

    public function toString() {
        return json_encode([
            'nombre' => $this->nombre,
            'edad' => $this->edad,
            'genero' => $this->genero,
            'experiencia' => $this->experiencia
        ]);
    }

    public function dirigirOrquesta() {
        return "Dirigiendo la orquesta";
    }
}
?>




<?php
class Orquesta {
    private $denominacion;
    private $fundacion;

    public function __construct($denominacion, $fundacion) {
        $this->denominacion = $denominacion;
        $this->fundacion = $fundacion;
    }

    public function toString() {
        return json_encode([
            'denominacion' => $this->denominacion,
            'fundacion' => $this->fundacion
        ]);
    }
}
?>



<?php
trait Ensayo {
    public function ensaya() {
        return "Estoy ensayando";
    }
}
?>



<?php
interface iConcierto {
    public function tocar();
    public function dirigirOrquesta();
}
?>
