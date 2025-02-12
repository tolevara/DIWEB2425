<!-- http://localhost/Curso/PHP/04_actualizar.php -->

<?php

// LLAMAR A ERRORES Y FUNCIONES //
require("errores.php");
require("funciones.php");

/* RECOGEMOS DATOS DEL FORMULARIOR */
$alerta = "Mensaje...";

//LLAMAMOS A LA BASE DE DATOS
$conexion = conectarBBDD();

//HACEMOS LA CONSULTA
$consulta = "SELECT * FROM productos";
$filas = $conexion->query($consulta);
$numFilas = $filas->num_rows;
$alerta = "Nº de Registros:" . $numFilas;


// SOLO SI SE ENVÍA EL FORMULARIO, SE DEFINEN LAS VARIABLES DEL ALERT //
if (isset($_REQUEST['enviar'])) {

    // LLAMAMOS A LA BASE DE DATOS //
    // $conexion = conectarBBDD(); //Primera llamada (PRIMER PASO)//

    $referencia = $_REQUEST['Referencia'] ?? '';
    $descripcion = $_REQUEST['Descripcion'] ?? '';
    $precio = $_REQUEST['Precio'] ?? '';
    $stock = $_REQUEST['Stock'] ?? '';

    // EN EL CASO DEL CHECKBOX SE ENVÍA UN ARRAY // 
    $categorias = $_REQUEST['Categorias'] ?? [];

    // IMPLODE SIRVE PARA ESCRIBIR LOS ELEMENTOS DEL ARRAY //
    $categoriasValores = implode(', ', $categorias);
    $alerta = " Referencia: $referencia
        Descripcion: $descripcion
        Precio: $precio
        Stock: $stock
        Categorias: $categoriasValores";

    // AHORA INTRODUCIMOS LO DE ARRIBA EN LA bbdd // 
    // Defino una Sentencia Preparada (? por cada campo!) //
    $sentenciaSQL = "UPDATE productos SET Descripcion = ?, <!--ACTUALIZA TODOS LOS CAMPOS-->
                    Precio = ?, Stock = ?, Categorias = ? WHERE Referencia = ? ";
                                                        // WHERE = FILTRAR // 
    $sentenciaPreparada = $conexion->prepare($sentenciaSQL); //(Primera Encriptacion"normalita")//

    // Encriptamos la sentencia (bind-param)(Segunda Encriptacion"fuerte") //
    $sentenciaPreparada->bind_param(
        "sdisi",  // CODIGO ENCRIPTADO //
        $descripcion,
        $precio,
        $tock,
        $categoriasValores,
        $referencia,  
    );

    // EjecutaSQL es boleano: true(correcto), false(error) //
    $ejecutaSQL = $sentenciaPreparada->execute();
    if ($ejecutaSQL) {
        $alerta = "<br> Producto insertado correctamente";
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

    <!-- Línea de separación -->
    <hr class="m-3 border border-primary border-5">

    <table class="table">
        <thead>
            <tr>
                <th>Referencia</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Categorías</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //ASOCIO LA SALIDA A SU CAMPO //
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

    <?php  //CARGO EL FORMULARIO CON EL REGISTRO SELECCIONADO//
    if (isset($_REQUEST['cargar'])) {

        //Desactivo las excepciones por error en el driver MYSQLi//
        mysqli_report(MYSQLI_REPORT_OFF);

        $referencia = $_REQUEST['Referencia'];
        $sql = "SELECT * FROM productos WHERE Referencia = ?"; // SIN EL WHERE BORRARIA TODA LA TABLA (productos) //
        $sentenciaPreparada = $conexion->prepare($sql);
        $sentenciaPreparada->bind_param("i", $referencia);
        $ejecutaSQL = $sentenciaPreparada->execute();
        $fila = $sentenciaPreparada->get_result();
        $producto = $fila->fetch_assoc();

        // Al tener un arry, hay que hacer lo contrario del implode //
        $categoriasElegidas = explode(",", $producto['Categorias'] ?? "");
        //PASO DE "papeleria"
    ?>

        <form action="#" method="post" class="m-3 shadow-lg">

            <!-- Campo Referencia -->
            <label for="Referencia" class="form-label">Referencia:</label>
            <input type="number" name="Referencia" id="Referencia"
                class="form-control w-50" required
                value="<?php echo $producto['Referencia']; ?>"><br>


            <!-- Campo Descripción -->
            <label for="Descripcion" class="form-label">Descripción:</label>
            <input type="text" name="Descripcion" id="Descripcion"
                class="form-control w-50" required
                value="<?php echo $producto['Descripcion']; ?>"><br>


            <!-- Campo Precio -->
            <label for="Precio" class="form-label">Precio:</label>
            <input type="number" name="Precio" id="Precio"
                class="form-control w-50" step="0.05" required
                value="<?php echo $producto['Precio']; ?>"><br>


            <!-- Campo Stock -->
            <label for="Stock" class="form-label">Stock:</label>
            <input type="number" name="Stock" id="Stock"
                class="form-control w-50" required value="<?php echo $producto['Stock']; ?>"><br>



            <!-- Campo Categoria -->
            <label class="form-label">Categorias</label><br>


            <!--CARGO CON PHP LAS CATEGORIAS MARCADAS -->
            <?php
            // ($misCategorias) son TODAS las categorias de los checkbox //
            $misCategorias = ["papelería", "escolar", "oficina"]; // (ARRAY CON UNA CADENA)
            foreach ($misCategorias as $categoria) {
                $seleccionado = in_array($categoria, $categoriasElegidas) ? "checked" : ""; // si no es igual se deja en blanco
            ?> <!-- UN ARRAY ES UNA VARIABLE CON VARIOS VALORES (TIPO: BOOLEANO,FECHA NUMERICO, CADENAS) -->
                <!--CODIGO HTML: LOS checkbox + label -->
                <input type="checkbox" name="Categorias[]"
                    value="<?php echo $categoria ?>"
                    id="<?php echo $categoria ?>" <?php echo $seleccionado ?>>
                <label for="<?php echo $categoria ?>"><?php echo $categoria ?></label><br>
            <?php
            }
            ?>

            <!-- -->
            <hr class="border border-primary border-5 w-50">
            <button type="submit" class="btn btn-success" name="enviar">Enviar</button>
        </form>
    <?php
    }
    ?>

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