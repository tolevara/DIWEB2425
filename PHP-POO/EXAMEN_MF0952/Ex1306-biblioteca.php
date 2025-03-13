<?php  //Ex1306-menu.php//

require("errores.php");
$mensaje = "Mensaje"; //ESTO ES PARA QUE SALGA ALGO EN EL NAVEGADOR//

if (isset($_REQUEST['elegir'])) { //SI SE ENVIA EL FORMULARIO ENTONCES HACEMOS...//
    $opcion = $_REQUEST['opcion'];
    switch ($opcion) {  //PARA PASAR A OTRA PAGINA SE USA header(); //
        case 'ej1':
            header('Location: Ex1306-menu.php');
            break;
        case 'ej2':
            header('Location: Ex1306-volumenes.php');
            break;
        case 'ej3':
            header('Location: Ex1306-anidi.php');
            break;
        case 'ej4':
            header('Location: Ex1306-medioGeom.php');
            break;
        case 'ej5':
            header('Location: Ex1306-biblioteca.php');
            break;
        // case 'ej0': header('Location: https//:www.as.php');      break;//
        default:
            # code...
            break;
    }
}
interface iPrestamo { #<-ESTA ES LA INTERFAZ#
    public function prestar(): void;
    public function devolver(): void;
} 

trait tReservable   #<-ESTE ES EL TRAIT#
{      
    public function reservar(): string
    {
        return "Voy a reservar";
    }
    public function cancelarReserva(): string
    {
        return "Voy a cancelar";
    }
}

abstract class Biblioteca {
    public string $nombre = "";
    public bool $publica = true;

//CONSTRUCTOR//
    public function __construct (string $nombre, bool $publica) {
    $this->nombre = $nombre;
    $this->publica = $publica;
}

public function __toString(): string 
{
    return json_encode([
        'Nombre ' => $this->nombre,
        'Publica' => $this->publica ? "Si" : "No"

    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

}

}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen modelo formativo 0952</title>
    <link rel="stylesheet" href="bootstrap.min.css">


</head>

<body> <!--ESTE (section) ES PARA QUE SALGA ALGO EN EL NAVEGADOR-->
    <section aria-label="alerta"
        class="alert alert-success m-3 p-3 w-50">
        <pre class="mb-0"><?php echo $mensaje; ?></pre>
    </section>
    <nav aria-label="navegacion" class="m-3 p-3 w-50 bg-primary"> <!--(bg-primary) = COLOR EN EL NAVEGADOR -->
        <form action="#" method="post">
            <label for="opcion">Elige Opción:</label><br>
            <select name="opcion" id="opcion" class="for-control">
                <option value="ej1">Menú</option>
                <option value="ej2">Volúmenes</option>
                <option value="ej3">Anidi</option>
                <option value="ej4">Media Geometrica</option>
                <option value="ej5">Biblioteca</option>
            </select><br>
            <button type="submit" name="elegir" class="btn btn-success">Elegir</button> <!--ESTO SE ENVIA PARA RECOGER EL FORMULARIO-->

        </form>


        <section aria-label="volumenes"> <!--ESTE FORMALARIO MANDA LOS DATOS PARA VOLÚMENES-->
            <section class="m-3 p-3 w-50 bg-info text-white">
                <form action="#" method="post">
                    <button type="submit" name="solucion" class="btn btn-success">Solución</button>

                </form>
            </section>


    </nav>
</body>

</html>