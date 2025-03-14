<?php

require("errores.php");
$mensaje = "Mensajes";


// //CREAMOS MÚSICOS Y DIRECTORES DE ORQUESTA//
// $orquesta = new Orquesta("ROSS", 1992);
// $m1 = new Musico("Juan", 30, "Masculino", "Guitarra", $orquesta);
// $m2 = new Musico("Maria", 25, "Femenino", "Batería", $orquesta);
// $m3 = new Musico("Carlos", 40, "Masculino", "Bajo", $orquesta);
// $m4 = new Musico("Laura", 28, "Femenino", "Violín", $orquesta);
// $m5 = new Musico("Pedro", 35, "Masculino", "Piano", $orquesta);

// $d1 = new Director("Luis", 45, "Masculino", 20);
// $d2 = new Director("Ana", 50, "Femenino", 25);

// //CREAR ARRAY DE  MÚSICOS Y DIRECTORES//
// $personas = [$m1, $m2, $m3, $m4, $m5, $d1, $d2];

// // CONVERTIR A JSON //
// echo json_encode($personas, JSON_PRETTY_PRINT);


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
        return "Estoy ensayando";
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
            'Nombre' => $this->nombre,
            'Edad' => $this->edad,
            'Genero' => $this->genero ? "Masculino" : "Femenino"
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
}

// CLASE HIJA //
class Musico extends Artista implements iConcierto
{
    public string $instrumento;

    public function __construct(string $nombre, int $edad, bool $genero, string $instrumento)
    {
        parent::__construct($nombre, $edad, $genero);
        $this->instrumento = $instrumento;
    }

    public function __toString(): string
    {
        $miJSON = json_decode(parent::__toString(), true);
        $miJSON['instrumento'] = $this->instrumento;
        return json_encode($miJSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public function tocar(): void {

        for ($i=0; $i<5; $i++)
        $nuevoMusico = new Musico("Juan", 30, "Masculino", "Guitarra", $orqueta)

        
        $mensaje .= "           <br>";
       
    foreach ($nuevoMusico as $indice => $elemento) {
    $mensaje .= "[$indice] -> $elemento <br>";
    $elementos[0] = "Coche"; 
    }
    }

    $grupoMusicos=[];
    for ($i=0; $i<5; $i++){
      $elInstrumento=["Violin", "Piano", "Guitarra", "Bombo", "Chelo", "Clarinete", "Oboe","Arpa"];
      $instrumento=$elInstrumento[rand(0, 7)];
        $nuevoMusico=new Musico($nombre, $edad,  $genero, $instrumento);
        $grupoMusicos[]=$nuevoMusico;
}
    $losmusicos="";
    foreach($grupoMusicos as $num=>$elmusico){
        $losmusicos.="Musico nº:".($num+1).$elmusico;
    }
    return $losmusicos;
}

    public function dirigirOrquesta(): void {}

// CLASE HIJA //
class Director extends Artista implements iConcierto
{
    private $experiencia;

    public function __construct(string $nombre, int $edad, bool $genero, string $experiencia)
    {
        parent::__construct($nombre, $edad, $genero);
        $this->experiencia = $experiencia;
    }

    public function __toString()
    {
        $miJSON = json_decode(parent::__toString(), true);
        $miJSON['experiencia'] = $this->experiencia;
        return json_encode($miJSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public function tocar() {}

    public function dirigirOrquesta()
    {
        return "Dirigiendo la orquesta";
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
            <input type="text" name="texto" id="texto" class="w-50"><br>

            <label for="entero" class="w-50">Edad</label>
            <input type="number" name="entero" id="entero" class="w-50"><br>

    <select name="genero">
        <option value="Masculino">Masculino</option>
        <option value="Femenino">Femenino</option>
    </select><br>

    <input type="submit" value="Enviar">
   
</form>

</body>
</html>