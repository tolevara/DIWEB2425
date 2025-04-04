<!-- http://localhost/Curso/PHP/05-Eliminar.php -->

<?php
// LLAMAR A ERRORES Y FUNCIONES
require("errores.php");
require("funciones.php");

//LLAMAMOS A LA BBDD
$conexion = conectarBBDD();

/* Recogemos datos del formulario */
$alerta = "Mensaje...";

//LLAMAMOS A LA BASE DE DATOS
$conexion = conectarBBDD();


//HACEMOS LA CONSULTA
$consulta = "SELECT * FROM productos";
$filas = $conexion->query($consulta);
$numFilas = $filas->num_rows;



/* Recogemos datos del formulario */
$alerta = "Mensaje...";


// Solo si se envía el formulario, se definen las variables del alert
if (isset($_REQUEST['enviar'])) {
    $alerta = "Nº de Registros:" . $numFilas;
}



// Si se pulsa Sí, se por referencia...
if (isset($_REQUEST['eliminar'])) {

    //Desactivo las excepciones por error en el driver MYSQLi
    mysqli_report(MYSQLI_REPORT_OFF);

    //BORRAMOS EL REGISTRO CON UNA SENTENCIA PREPARADA
    $referencia = $_REQUEST['Referencia'];
    $sql = "DELETE FROM productos WHERE Referencia = ?"; // SIN EL WHERE BORRARIA TODA LA TABLA (productos)
    $sentenciaPreparada = $conexion->prepare($sql);
    $sentenciaPreparada->bind_param("i", $referencia);

    $ejecutaSQL = $sentenciaPreparada->execute();
    if ($ejecutaSQL) {
        $alerta .= "<br> Fila borrada!";
    } else {
        $alerta .= "<br> ERROR  en el borrado:" . $conexion->error;
    }
}

// Si se pulsa No, concateno este mensaje
if (isset($_REQUEST['volver'])) {
    $alerta .= "<br>No se ha borrado nada!!"; // El "punto + =" concatena (Nº registro con eliminar) //

}

//HACEMOS LA CONSULTA
$consulta = "SELECT * FROM productos";
$filas = $conexion->query($consulta);
$numFilas = $filas->num_rows;
$alerta .= "Nº de Registros:" . $numFilas;

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
    <style>
        table td form {
            display: inline;
        }
    </style>
</head>

<body>
    <!-- En el alert presentamos los datos recogidos del formulario -->
    <header>
        <p class="alert alert-primary m-3 w-50" style="white-space: pre-line;">
            <?php echo $alerta; ?>

        </p>
    </header>

    <!--EN EL class DEFINO booststrap-->
    <section class="container aling-center m-e w-70 bg-primary"> <!--bg = (COLORES)-->

        <table class="table">
            <thead>
                <tr>
                    <th>Referencia</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Categorías</th>
                    <th>VACIO</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //ASOCIO LA SALIDA A SU CAMPO
                $productos = $filas->fetch_all(MYSQLI_ASSOC);
                foreach ($productos as $producto) {
                ?>
                    <!--CONSTRUCCION DE TABLA CON HTML-->
                    <tr>
                        <td><?php echo $producto['Referencia']; ?></td>
                        <td><?php echo $producto['Descripcion']; ?></td>
                        <td><?php echo $producto['Precio']; ?></td>
                        <td><?php echo $producto['Stock']; ?></td>
                        <td><?php echo $producto['Categorias']; ?></td>

                        <!--EN CADA FILA PONGO UN BOTÓN ELIMINAR-->
                        <td>
                            <form action="#" method="post">
                                <input type="hidden" name="Referencia"
                                    value="<?php echo $producto['Referencia']; ?>">
                                <input type="hidden" name="Descripcion"
                                    value="<?php echo $producto['Descripcion']; ?>">
                                <button type="submit" name="confirmar"
                                    class="btn btn-outline-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php
                }
                ?>


            </tbody>
        </table>
    </section>


    <!-- Línea de separación -->
    <hr class="m-3 border border-primary border-5 w-50">

    <?php
    if (isset($_REQUEST['confirmar'])) {
    ?>
        <p>¿Desea eliminar <?php echo $_REQUEST['Descripcion']; ?>?</p>
        <form action="#" method="post">
            <input type="hidden" name="Referencia"
                value="<?php echo $_REQUEST['Referencia']; ?>">
            <button type="submit" name="eliminar"
                class="btn btn-outline-danger">Sí</button>e
            <button type="submit" name="volver"
                class="btn btn-outline-success">No</button>
        </form>

    <?php
    }
    ?>

    <form action="#" method="post" class="m-3 shadow-lg">

        <button type="submit" class="btn btn-success" name="enviar">Consultar</button>
    </form>


    <section class="row">
        <nav class="col">
            <a href="01-cargar-bbdd.php"
                class="btn btn-sm btn-success w-100">Cargar BBDD</a>
            <a href="03-insertar-bbdd.php"
                class="btn btn-sm btn-warning w-100">Insertar Producto</a>

        </nav>
        <nav class="col">
            <a href="04-actualizar.php"
                class="btn btn-sm btn-secondary w-100">Actualizar Producto</a>
            <a href="05-eliminar.php"
                class="btn btn-sm btn-danger w-100">Eliminar Producto</a>

        </nav>


    </section>
</body>

</html>