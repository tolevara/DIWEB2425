<!-- http://localhost/Curso/PHP/inserta-club.php -->
<?php
// Llamar a errores y funciones
require("errores.php");
require("funciones.php");

/* Recogemos datos del formulario */
$alerta = "Mensaje...";

// Solo si se envía el formulario, se definen las variables del alert
if (isset($_REQUEST['enviar'])) {
    // Llamamos a la BBDD
    $conexion = conectarBBDD();

    $idclub = $_REQUEST['idclub'] ?? '';
    $club = $_REQUEST['club'] ?? '';
    $internacional = $_REQUEST['internacional'] ?? '';

    $alerta = " idclub: $idclub 
        club: $club
        internacional: $internacional";
        
   
    $sentenciaSQL = "INSERT INTO clubes 
                    (idclub, club, internacional,) 
                    VALUES (?,?,?)";
    $sentenciaPreparada = $conexion->prepare($sentenciaSQL);
    // Encriptamos la sentencia (bind_param)
    $sentenciaPreparada->bind_param(
        "isi",
        $idclub,
        $club,
        $internacional
    );

    // ejecutaSQL es booleano; true (correcto), false (error)
    $ejecutaSQL = $sentenciaPreparada->execute();
    if ($ejecutaSQL) {
        $alerta .= "<br> Club insertado correctamente";
    } else {
        $alerta .= "<br> ERROR FATAL (explota!)";
    }
}
?>

<!-- Comenzamos la sección HTML -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>consulta-jugadores</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="bootstrap.bundle.min.js"></script>

    <style>
         body {
            color: lavender;
        }

        * {
            color: lavender;
            font-size: 20px;
        }

        body header {

            background: linear-gradient(to right, lightblue, lightcoral);
        }

        header p {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            letter-spacing: 0.5ex;
        }

        table section thead {
            text-decoration: underline;
            font-variant: small-caps;

        }

        table section tbody {
            top: 50px;
            border-bottom: blue solid 1px;
        }

        hr {
            border-style: 15px;
            border: none;
        }

        footer {
            box-shadow: 2px 2px 10px white ;
        }

        section {
            margin-top: 10px;
            padding: 15px;
            font-style: italic;
        }

        section hover {
            color: cyan;
            text-decoration-color: black;
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

    <!-- Línea de separación -->
    <hr class="m-3 border border-primary border-5 w-50">

    <form action="#" method="post" class="m-3 shadow-lg">
        <!-- -->

        <label for="idclub" class="form-label">idclub:</label>
        <input type="number" name="idclub" id="idclub"
            class="form-control w-50" required><br>


        <label for="nombreclub" class="form-label">Nombre Club:</label>
        <input type="text" name="nombreclub" id="nombreclub"
            class="form-control w-50" required><br>


        <!-- Campo Internacional -->
        <label class="form-label">Internacional</label><br>
        <input type="radio" name="internacional" value="1" id="1">
        <label for="1">Si</label><br>
        <input type="radio" name="internacional" value="0" id="0">
        <label for="0">No</label><br><br>

        <hr class="border border-primary border-5 w-50">
        <button type="submit" class="btn btn-success" name="enviar">Enviar</button>
    </form>

    <!-- Defino enlaces de navegación -->
    <section class="row">
        <nav class="col">
            <a href="01-cargar-bbdd.php"
                class="btn btn-sm btn-warning w-100">Cargar BBDD</a>
            <a href="02-consultar.php"
                class="btn btn-sm btn-success w-100">Consultar Productos</a>
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