<!-- http://localhost/Curso/PHP/actualizar-alumnos.php -->
<?php
// Llamar a errores y funciones
require("errores.php");
require("funciones.php");

/* Recogemos datos del formulario */
$alerta = "Mensaje...";

// Llamamos a la BBDD
$conexion = conectarBBDD();

// Hacemos la consulta
$consulta = "SELECT * FROM alumnos";
$filas = $conexion->query($consulta);
$numFilas = $filas->num_rows;
$alerta = "Nº de Registros: " . $numFilas;

// Solo si se envía el formulario, se definen las variables del alert
if (isset($_REQUEST['enviar'])) {

    // LA CLAVE PRINCIPAL //
    $nif = $_REQUEST['nif'] ?? '';

    // EL RESTO DE CAMPOS A ACTUALIZAR //
    $nombre = $_REQUEST['nombre'] ?? '';
    $fechanac = $_REQUEST['fechanac'] ?? '';
    $pagado = $_REQUEST['pagado'] ?? '';
    $importe = $_REQUEST['importe'] ?? '';


    $alerta = " Nif: $nif
        Nombre: $nombre
        Fecha Nacimiento: $fechanac
        Pagado: $pagado
        Importe: $importe";

    // Ahora introducimos lo de arriba en la BBDD
    // Defino una Sentencia preparada (? por cada campo!)
    $sentenciaSQL = "UPDATE alumnos SET nombre = ?, 
                    fechanac = ?, pagado = ?, importe = ? WHERE nif = ? ";
    $sentenciaPreparada = $conexion->prepare($sentenciaSQL);

    // Encriptamos la sentencia (bind_param)
    $sentenciaPreparada->bind_param(
        "ssids",
        $nombre,
        $fechanac,
        $pagado,
        $importe,
        $nif,
    );

    // ejecutaSQL es booleano; true (correcto), false (error)
    $ejecutaSQL = $sentenciaPreparada->execute();
    if ($ejecutaSQL) {
        $alerta .= "<br> Alumno/a actualizado correctamente";
    } else {
        $alerta .= "<br> ERROR FATAL (explota!)";
    }

    $filas = $conexion->query($consulta);
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
    <link rel="stylesheet" href="estilo.css"> <!-- PONER ESTE LINK EN TODAS LAS PLANTILLAS -->
</head>

<body>
    <!-- En el alert presentamos los datos recogidos del formulario -->
    <header>
        <p class="alert alert-primary m-3 w-50" style="white-space: pre-line;">
            <?php echo $alerta; ?>
        </p>
    </header>

    <!-- Línea de separación -->
    <hr class="m-3 border border-primary border-5">

    <table class="table">
        <thead>
            <tr>
                <th>Nif</th>
                <th>Nombre</th>
                <th>Fecha Nacimiento</th>
                <th>Pagado</th>
                <th>Importe</th>
                <th>--BOTONES--</th>
            </tr>
        </thead>
        <tbody>
            <?php       // Asocio la salida a su campo
            $alumnos = $filas->fetch_all(MYSQLI_ASSOC);
            foreach ($alumnos as $alumno) {
            ?>
                <!-- tr>td*5  -->
                <tr>
                    <td><?php echo $alumno['nif']; ?></td>
                    <td><?php echo $alumno['nombre']; ?></td>
                    <td><?php echo $alumno['fechanac']; ?></td>
                    <td><?php echo $alumno['pagado']; ?></td>
                    <td><?php echo $alumno['importe']; ?></td>
                    <!-- En cada fila pongo un botón Eliminar -->
                    <td>
                        <form action="#" method="post">
                            <input type="hidden" name="nif"
                                value="<?php echo $alumno['nif']; ?>">
                            <button type="submit" name="cargar"
                                class="btn btn-outline-primary">Actualizar</button>
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

    <!-- Línea de separación -->
    <hr class="m-3 border border-primary border-5">

    <?php
    if (isset($_REQUEST['cargar'])) {
        // Cargo el formulario con el registro seleccionado
        // Desactivo las excepciones por error en el driver MYSQLi
        mysqli_report(MYSQLI_REPORT_OFF);

        $nif = $_REQUEST['nif'];  /// CLAVE PRINCIPAL //
        $sql = "SELECT * FROM alumnos WHERE nif = ?";
        $sentenciaPreparada = $conexion->prepare($sql);
        $sentenciaPreparada->bind_param("s", $nif);
        $ejecutaSQL = $sentenciaPreparada->execute();

        $fila = $sentenciaPreparada->get_result();
        $alumno = $fila->fetch_assoc();


    ?>

        <form action="#" method="post" class="m-3 shadow-lg">

            <!-- Campo NIF -->
            <label for="nif" class="form-label">Nif:</label>
            <input type="text" name="nif" id="nif"
                class="form-control w-50" required disable
                value="<?php echo $alumno['nif']; ?>"><br>

            <!-- Campo NOMBRE -->
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" name="nombre" id="nombre"
                class="form-control w-50" required
                value="<?php echo $alumno['nombre']; ?>"><br>

            <!-- Campo Fechanac -->
            <label for="fechanac" class="form-label">Fecha Nacimiento:</label>
            <input type="date" name="fechanac" id="fechanac"
                class="form-control w-50" required
                value="<?php echo $producto['fechanac']; ?>"><br>

            <!-- -->

            <!-- Campo Pagado-->
            <label class="form-label">Pagado</label><br>
            <input type="radio" name="pagado" value="si" id="si">
            <label for="si">Si</label><br>
            <input type="radio" name="pagado" value="no" id="no">
            <label for="no">No</label><br><br>

            <!-- -->

            <!-- Campo Importe -->
            <label for="importe" class="form-label">Importe:</label>
            <input type="number" name="importe" id="importe"
                class="form-control w-50" required step="0.05" required
                value="<?php echo $producto['importe']; ?>"><br>

            <!-- -->

            <hr class="border border-primary border-5 w-50">
            <button type="submit" class="btn btn-success" name="enviar">Enviar</button>
        </form>

    <?php
    }
    ?>

        </nav>
    </section>
</body>

</html>