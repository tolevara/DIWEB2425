<?php
// LLAMAR A ERRORES Y FUNCIONES //
require("errores.php");
require("funciones.php");

// LLAMAMOS A LA BASE DE DATOS /
$conexion = conectarBBDD(); //Primera llamada (PRIMER PASO)//

// La consulta se hace siempre
$consulta = "SELECT * FROM usuarios";
$filas = $conexion->query($consulta);
$numFilas = $filas->num_rows;
$alerta = "Nº de Registros:" . $numFilas;

/* RECOGEMOS DATOS DEL FORMULARIO */
$alerta = "Para Autónomos...";

if (isset($_REQUEST['enviar'])) {
    $correo = $_REQUEST['correo'] ?? '';
    $clave = $_REQUEST['clave'] ?? '';
    $nombre = $_REQUEST['nombre'] ?? '';
    $autonomo = $_REQUEST['autonomo'] ?? '';
    $nif_cif = $_REQUEST['nif_cif'] ?? '';

    $alerta = " correo: $correo
        clave: $clave
        nombre: $nombre
        autonomo: $autonomo
        nif_cif: $nif_cif";

    // Preparar la sentencia (SEGUNDO PASO)
    $sentenciaSQL = "INSERT INTO usuarios (correo, clave, nombre, autonomo, nif_cif) 
    VALUES (?,?,?,?,?)";

    $sentenciaPreparada = $conexion->prepare($sentenciaSQL); //(Primera Encriptacion"normalita")//

    $sentenciaPreparada->bind_param(
        "sssii", //("sssii")= s-> string/date; i-> int; d-> decimal//
        $correo,
        $clave,
        $nombre,
        $autonomo,
        $nif_cif
    );

    $ejecutaSQL = $sentenciaPreparada->execute(); //booleano//
    if ($ejecutaSQL) {
        $alerta = "<br> autonomo";
    } else {
        $alerta = "<br> ERROR FATAL (EXPLOTA!!)";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>El Corte Inglés</title>
    <link rel="stylesheet" type="text/css" href="estilos.css" />

    <style>
        section table {
            color: green;
        }

        table {
            border: 2px solid green;
            border-collapse: separate;
            border-spacing: 10px;
            empty-cells: hide;
            background-color: #fdfefe;
        }
    </style>

</head>

<!--LOGO "EL CORTE INGLES"-->

<body>
    <header>
        <p>Descárgate aquí nuestra <span> App.</span></p>

        <aside class="logo-el corte ingles">
            <figure>
                <a href="https://www.elcorteingles.es/"><img src="Img/Logo.png" width="250" alt="logo"></a>
            </figure>
        </aside>
        <nav>
            <form action="#" method="get" role="search">
                <label for="buscar" class=""></label>
                <input type="text" name="buscar" id="buscar" placeholder="¿Qué estás buscando?" aria-label="buscar">
                <!--LOGO "LUPA"-->
                <button type="submit">
                    <a href="https://www.elcorteingles.es/search-nwx/"></a>
                    <img src="Img/lupa_buscador.png" width="40" alt="bot">
                </button>
            </form>
        </nav>

        <!--TRES ICONOS-->
        <aside class="icon-container">
            <a
                href="https://cuenta.elcorteingles.es/oauth/authorize?response_type=code&scope=openid%20profile%20plans&client_id=rjx5snOWlh40SgcE0dg2guk4YnXhECYd&redirect_uri=https%3A%2F%2Fwww.elcorteingles.es%2Fecivuestore%2Fsession%2Fcallback%3Fto%3D%252F&back_to=https%3A%2F%2Fwww.elcorteingles.es%252F&locale=es&_gl=1*1x5sv5y*_gcl_au*MTc5NDk0ODY2NC4xNzMyNzQxMjgw*_ga*MTg3NjAyMjI4My4xNzMyNzQwOTYy*_ga_XG9L1L3E0D*MTczNjAyNTk1Ni4yNi4xLjE3MzYwMjg1ODAuNDAuMC4w"><img
                    src="Img/Usuario.png" width="20" alt="Usuario"></a>
            <a
                href="https://cuenta.elcorteingles.es/oauth/authorize?response_type=code&scope=openid%20profile%20plans&client_id=rjx5snOWlh40SgcE0dg2guk4YnXhECYd&redirect_uri=https%3A%2F%2Fwww.elcorteingles.es%2Fecivuestore%2Fsession%2Fcallback%3Fto%3D%252F&back_to=https%3A%2F%2Fwww.elcorteingles.es%252F&locale=es&_gl=1*i0a90v*_gcl_au*MTkzNjczMTA0My4xNzM0MDQxMjgy*_ga*MTc3NjA4NzA1MC4xNzMzMzQ5NTEz*_ga_XG9L1L3E0D*MTczNjE5NzY3Ny4zMy4wLjE3MzYxOTc2NzguNTkuMC4w"><img
                    src="Img/Corazon2.png" width="27" alt="corazon2"></a>
            <a href="https://www.elcorteingles.es/"><img src="Img/Cesta.png" width="28" alt="cesta"></a>
        </aside>

        <!--Lista después de la cabecera-->
        <article aria-label="lista">
            <ul>
                <li><a href="https://www.elcorteingles.es/moda-mujer/?stype=search_redirect"><span> MODA
                            MUJER</span></a></li>

                <li><a href="https://www.elcorteingles.es/deportes/"><span>DEPORTE</span></a></li>

                <li><a href="https://www.elcorteingles.es/electronica/"><span>ELECTRÓNICA</span></a></li>

                <li><a href="https://www.elcorteingles.es/hogar/"><span>HOGAR</span></a></li>

                <li><a
                        href="https://www.elcorteingles.es/supermercado/?utm_source=eci&utm_medium=home&utm_campaign=botones"><span>SUPERMERCADO</span></a>
                </li>

            </ul>
        </article>
    </header>
    <!--BANER-->
    <main>
        <section aria-label="gallery">

            <p><a href="">Ahórrate el IVA en todo*</a></p>
            <p>Empezamos hoy a las 22:00h ¡En Web y App!</p>
            <p>Electrónica, electromésticos y más</p><br>

        </section>
    </main>

    <h2>CATEGORIA</h2>
    <table>
        <thead>
            <tr>
                <td><a href="https://www.elcorteingles.es/moda-mujer/"><img src="Img/mujer.jpeg" alt="mujer"
                            width="220"></a></td>
                <td><a href="https://www.elcorteingles.es/moda-hombre/"><img src="Img/Hombre.png" alt="hombre"
                            width="220"></a></td>
                <td><a href="https://www.elcorteingles.es/moda-infantil/"><img src="Img/Niña.png" alt="niña"
                            width="220"></a></td>
                <td><a href="https://www.elcorteingles.es/hogar/"><img src="Img/Hogar.png" alt="hogar" width="220"></a>
                </td>
                <td><a href="https://www.elcorteingles.es/deportes/"><img src="Img/Deporte.png" alt="deporte"
                            width="220"></a></td>
                <td><a href="https://www.elcorteingles.es/electronica/"><img src="Img/Electrónica.png" alt="electrónica"
                            width="220"></a></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>moda mujer</td>
                <td>moda hombre</td>
                <td>niña</td>
                <td>hogar</td>
                <td>deporte</td>
                <td>electrónica</td>
            </tr>
        </tbody>
    </table>
    <section aria-label="verde">
        <ul>
            <li><img src="Img/Recogida.jpeg" alt="gratis" width="25" height="25">
                <a href="https://www.elcorteingles.es/click-collect/">Recogida en tienda <span>gratis</span></a>
            </li>

            <li><img src="Img/Envío.png" alt="domicilio" width="25" height="25">
                <a href="https://www.elcorteingles.es/ayuda/es/envio-y-recogida/envio/gastos-de-envio/">Envío a
                    domicilio</a>
            </li>
            <li><img src="Img/Devolución.png" alt="devolucion" width="25" height="25">
                <a href="https://www.elcorteingles.es/ayuda/es/devolucion-y-reembolso/devolucion-y-cambio/">Devolución
                    <span>gratis</span> en tienda</a>
            </li>
            <li><img src="Img/Click&Car.png" alt="click" width="25" height="25">
                <a href="https://www.elcorteingles.es/click-car/">Click & Car</a>
            </li>
        </ul>
    </section>



    <!--FOOTER + FORMULARIO= CAMPO DE CORREO ELECTRÓNICO-->
    <footer>
        <section>
            <p class="alert alert-primary m-3 w-50" style="white-space: pre-line;">
                <?php echo $alerta; ?>
            </p>
        </section>
        <section aria-label="formulario">
            <form action="#" method="post">
                <fieldset>
                    <legend>Datos básico del formulario</legend>
                    <label for="correo">Añade tu correo electrónico</label><br>
                    <input type="email" id="correo" name="correo" class="form-control"
                        placeholder="usuario@example.com     (Este es el identificador de la cuenta)" required><br>
                    <small> </small><br>
                    <label for="clave">Crea una contraseña fuerte</label><br>
                    <input type="password" id="clave" name="clave" class="form-control"
                        placeholder="Nueva contraseña" required><br>
                    <small>Tu contraseña debe tener al menos:<br> 8 caracteres, 1 número, 1 minúscula, 1 mayúcula, 1
                        carácter especial</small>
                </fieldset>

                <fieldset>
                    <legend>Datos Personales</legend>
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre">
                </fieldset>


                <fieldset>

                    <legend>Autónomo:</legend> <!--AQUÍ EMPIEZA LA PARTE DE AUTÓMO-->
                    <nav class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="autonomo" id="si" value="1">
                        <span class="form-check-label" for="si">Si</span>
                        <input class="form-check-input" type="radio" name="autonomo" id="no" value="0">
                        <span class="form-check-label" for="no">No</span>
                    </nav>
                    <br>
                </fieldset>

                <fieldset>
                    <legend>Documento:</legend>
                    <label for="nif_cif">Nif_Cif:</label>
                    <input type="number" id="nif_cif" name="nif_cif" class="form-control" placeholder="Nif_Cif">
                </fieldset>

                <section aria-label="botones_inscripcion">
                    <button type="submit" class="btn-success" name="enviar">Continuar</button>
                    <button type="reset" class="btn-secondary">Borrar</button>
                </section>
            </form>
        </section>

        <!--EN EL class DEFINO booststrap-->
        <section class="container aling-center m-e w-70 bg-primary"> <!--bg = (COLORES)-->
            <!-- La tabla aparece siempre -->
            <table class="table">
                <thead>
                    <tr>
                        <th>Correo</th>
                        <th>Clave</th>
                        <th>Nombre</th>
                        <th>Autónomo</th>
                        <th>NIF-CIF</th>
                        <th>----</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //ASOCIO LA SALIDA A SU CAMPO
                    $usuarios = $filas->fetch_all(MYSQLI_ASSOC);
                    foreach ($usuarios as $usuario) {

                    ?>
                        <!--CONSTRUCCION DE TABLA CON HTML-->
                        <tr>
                            <td><?php echo $usuario['correo']; ?></td>
                            <td><?php echo $usuario['clave']; ?></td>
                            <td><?php echo $usuario['nombre']; ?></td>
                            <td><?php echo $usuario['autonomo']; ?></td>
                            <td><?php echo $usuario['nif_cif']; ?></td>
                            <!--EN CADA FILA PONGO UN BOTÓN ELIMINAR-->
                        <td>
                            <form action="#" method="post">
                                <input type="hidden" name="correo"
                                    value="<?php echo $usuario['correo']; ?>">
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

    </footer>
</body>

</html>