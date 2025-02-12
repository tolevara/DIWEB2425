<!-- http://localhost/Curso/PHP/consultar-alumnos.php -->

<?php
// LLAMAR A ERRORES Y FUNCIONES
require("errores.php");
require("funciones.php");

//LLAMAMOS A LA BASE DE DATOS
$conexion = conectarBBDD();




// Solo si se envía el formulario, se definen las variables del alert
if (isset($_REQUEST['enviar'])) {
    //HACEMOS LA CONSULTA
    $consulta = "SELECT * 
                FROM alumnos, docentes
                WHERE docentes.nif = alumnos.docentes_nif"; //WHERE = JOIN //
    $filas = $conexion->query($consulta);
    $numFilas = $filas->num_rows;
    $alerta = "Nº de Registros:" . $numFilas;


    /* Recogemos datos del formulario */
    $alerta = "Mensaje...";
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
    <link rel="stylesheet" href="estilos.css">
    <style>
        header p.alert {
            background-color: pink;
        }
        
        table.table tr th {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 18px;
        }

        button.btn {
            color: black;
        }

        button.btn:hover {       /*TRANSFORMAR LA LETRA A SU DOBLE AL PASAR POR ENCIMA*/
            transform: scale(2); 
        }
        
        body {             /* FONDO DEGRADADO DE IZQ. A DERECHA DE ROJO A AZUL*/
            background: linear-gradient(to right, red, blue);
        }

        * {             /*TODOS LOS ELEMENTOS DE LA PAGINA EN CURSIVA*/
            font-style: italic;
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
        <!-- Inyección de PHP ó SCRIPT-->
        <?php
        // Si se envía el formulario, cargo la tabla 
        if (isset($_REQUEST['enviar'])) {
        ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>NIF Alumno</th>
                        <th>Nombre</th>
                        <th>Fecha Nacimiento</th>
                        <th>Pagado</th>
                        <th>Importe</th>
                        <th>NIF Docente</th>
                        <th>Nombre Docente</th>
                        <th>Edad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    //ASOCIO LA SALIDA A SU CAMPO; "EN ESTE CASO MYSQLI_ASSOC POR MYSQL_NUM"//
                    //CAMBIAMOS DENOMINACION CABECERA TABLA POR: PRIMERA COLUMNA= 0, SEGUNDA= 1, etc..
                    //PARA QUE NO SE REPITA CON LAS OTRAS TABLAS//

                    $alumnos = $filas->fetch_all(MYSQLI_NUM);
                    foreach ($alumnos as $alumno) {
                    ?>
                        <!--CONSTRUCCION DE TABLA CON HTML -->
                        <tr>
                            <td><?php echo $alumno[0]; ?></td>
                            <td><?php echo $alumno[1]; ?></td>
                            <td><?php echo $alumno[2]; ?></td>
                            <td><?php echo $alumno[3]; ?></td>
                            <td><?php echo $alumno[4]; ?></td>
                            <td><?php echo $alumno[5]; ?></td>
                            <td><?php echo $alumno[7]; ?></td>
                            <td><?php echo $alumno[8]; ?></td>
                        </tr>
                    <?php
                    }

                    ?>
                </tbody>
            </table>
        <?php

        // Cierre de inyección de PHP ó SCRIPT
        //Si se envía el formulario, cargo la tabla//
        }
        ?>

    </section>
    <!-- Línea de separación -->
    <hr class="m-3 border border-primary border-5 w-50">

    <form action="#" method="post" class="m-3 shadow-lg">

        <button type="submit" class="btn btn-success" name="enviar">Consultar</button>
    </form>


    <section class="row">
        <nav class="col">
            <a href="cargar.php"
                class="btn btn-sm btn-success w-100">Cargar BBDD</a>
            <a href="insertar-docentes.php"
                class="btn btn-sm btn-warning w-100">Inserta Docentes</a>
            <a href="insertar-alumnos.php"
                class="btn btn-sm btn-warning w-100">Inserta Alumnos</a>


        </nav>
        <nav class="col">
            <a href="consultar-docentes.php"
                class="btn btn-sm btn-secondary w-100">Consulta Docentes</a>
            <a href="consultar-alumnos.php"
                class="btn btn-sm btn-danger w-100">Consulta Alumnos/Docentes </a>
            <a href="actualizar-alumnos.php"
                class="btn btn-sm btn-secondary w-100">Actualizar Alumnos</a>
            <a href="borrar-alumnos.php"
                class="btn btn-sm btn-danger w-100">Borrar Alumnos</a>


        </nav>
    </section>
</body>

</html>