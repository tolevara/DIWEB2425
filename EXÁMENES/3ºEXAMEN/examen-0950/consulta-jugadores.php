<!-- http://localhost/Curso/PHP/consulta-jugadores.php -->

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

    // Hacemos la consulta
    $consulta = "SELECT * FROM productos";
    $filas = $conexion->query($consulta);
    $numFilas = $filas->num_rows;
    $alerta = "Nº de Registros: " . $numFilas;
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
    <link rel="stylesheet" href="examen0950.css">

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

    <!-- En el class defino bootstrap-->
    <section class="container align-center m-3 w-70 bg-primary">
        <!-- Inyección de script (PHP)-->
        <?php
        // Si se envia el formulario, cargo la tabla
        if (isset($_REQUEST['enviar'])) {
        ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Referencia</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Categorías</th>
                    </tr>
                </thead>
                <tbody>
                    <?php       // Asocio la salida a su campo
                    $productos = $filas->fetch_all(MYSQLI_ASSOC);
                    foreach ($productos as $producto) {
                    ?>
                        <!-- tr>td*5  -->
                        <tr>
                            <td><?php echo $producto['Referencia']; ?></td>
                            <td><?php echo $producto['Descripcion']; ?></td>
                            <td><?php echo $producto['Precio']; ?></td>
                            <td><?php echo $producto['Stock']; ?></td>
                            <td><?php echo $producto['Categorias']; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        <?php
        }
        ?>
    </section>
    <hr class="m-3 border border-primary border-5 w-50">

    <form action="#" method="post" class="m-3 shadow-lg">
        <button type="submit" class="btn btn-success" name="enviar">Ver Jugadores</button>
    </form>

    <section class="row">
        <nav class="col">
            <a href="01-cargar-bbdd.php"
                class="btn btn-sm btn-success w-100">Cargar BBDD</a>
            <a href="03-insertar.php"
                class="btn btn-sm btn-warning w-100"></a>
        </nav>
        <nav class="col">
            <a href="04-actualizar.php"Precio
                class="btn btn-sm btn-secondary w-100"></a>
            <a href="05-eliminar.php"
                class="btn btn-sm btn-danger w-100"></a>
        </nav>
    </section>
</body>

</html>