<!-- http://localhost/Curso/PHP/Insertar-docentes.php -->

<?php

// LLAMAR A ERRORES Y FUNCIONES //
require("errores.php");
require("funciones.php");

/* RECOGEMOS DATOS DEL FORMULARIOR */
$alerta = "Mensaje...";

// SOLO SI SE ENVÍA EL FORMULARIO, SE DEFINEN LAS VARIABLES DEL ALERT //
if (isset($_REQUEST['enviar'])) {

    // LLAMAMOS A LA BASE DE DATOS //
    $conexion = conectarBBDD(); //Primera llamada (PRIMER PASO)//

    $nif = $_REQUEST['nif'] ?? '';
    $nombre = $_REQUEST['nombre'] ?? '';
    $edad = $_REQUEST['edad'] ?? '';


    $alerta = " NIF: $nif
        Nombre: $nombre
        Edad: $edad";


    // AHORA INTRODUCIMOS LO DE ARRIBA EN LA bbdd // 
    // Defino una Sentencia Preparada (? por cada campo!) //
    $sentenciaSQL = "INSERT INTO docentes
     (nif, nombre, edad)
        VALUES (?,?,?)";      // Preparar la sentencia (SEGUNDO PASO) //

    $sentenciaPreparada = $conexion->prepare($sentenciaSQL); //(Primera Encriptacion"normalita")//

    // Encriptamos la sentencia (bind-param)(Segunda Encriptacion"fuerte") //
    $sentenciaPreparada->bind_param(
        "ssi",
        $nif,
        $nombre,
        $edad
    );

    // EjecutaSQL es boleano: true(correcto), false(error) //
    $ejecutaSQL = $sentenciaPreparada->execute();
    if ($ejecutaSQL) {
        $alerta = "<br> Insertado correctamente";
    } else {
        $alerta = "<br> ERROR FATAL (EXPLOTA!!)";
    }
}
?>

<!-- Comenzamos la sección HTML -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plantilla</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="bootstrap.bundle.min.js"></script>
</head>

<body>
    <!-- En el alert presentamos los datos recogidos del formulario -->
    <header>
        <p class="alert alert-primary m-3 w-50" style="white-space: pre-line;">
            <?php echo $alerta; ?>
        </p>
    </header>


    <form action="#" method="post" class="m-3 shadow-lg">

        <!-- Línea de separación -->
        <hr class="m-3 border border-primary border-5 w-50">

        <!-- Campo Nombre -->
        <label for="nif" class="form-label">NIF:</label>
        <input type="text" name="nif" id="nif"
            class="form-control w-50" required><br>
        <!-- -->

        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text" name="nombre" id="nombre"
            class="form-control w-50" required><br>
        <!-- -->


        <!-- -->
        <!-- Campo Edad -->
        <label for="edad" class="form-label">Edad:</label>
        <input type="number" name="edad" id="edad"
            class="form-control w-50" required><br>


        <hr class="border border-primary border-5 w-50">

        <button type="submit" class="btn btn-success" name="enviar">Ver alumnos</button>
    </form>
    <section class="row">
        <nav class="col">
            <a href="01-cargar-bbdd.php"
                class="btn btn-sm btn-warning w-100">Cargar BBDD</a>
            <a href="02-consultar.php"
                class="btn btn-sm btn-success w-100">Insertar Docente</a>
            <a href="04-actualizar.php"
                class="btn btn-sm btn-secondary w-100">Insertar Alumno</a>


        </nav>
        <nav class="col">
            <a href="04-actualizar.php"
                class="btn btn-sm btn-secondary w-100">Consulta Docente</a>
            <a href="05-eliminar.php"
                class="btn btn-sm btn-danger w-100">Consulta Alumnos/Docente</a>
            <a href="04-actualizar.php"
                class="btn btn-sm btn-secondary w-100">Actualizar Alumnos</a>
            <a href="borrar-alumnos.php"></a>
        </nav>

    </section>
</body>

</html>