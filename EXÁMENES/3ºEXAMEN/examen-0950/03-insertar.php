<!-- http://localhost/Curso/PHP/03-insertar.php -->
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

    $referencia = $_REQUEST['Referencia'] ?? '';
    $descripcion = $_REQUEST['Descripcion'] ?? '';
    $precio = $_REQUEST['Precio'] ?? '';
    $stock = $_REQUEST['Stock'] ?? '';

    // En el caso de Categorias mando un Array
    $categorias = $_REQUEST['Categorias'] ?? [];

    // implode sirve para escribir los elementos del array
    $categoriasValores = implode(',', $categorias);
    $alerta = " Referencia: $referencia
        Descripción: $descripcion
        Precio: $precio
        Stock: $stock
        Categorias: $categoriasValores";

    // Ahora introducimos lo de arriba en la BBDD
    // Defino una Sentencia preparada (? por cada campo!)
    $sentenciaSQL = "INSERT INTO productos 
                    (Referencia, Descripcion, Precio, Stock, Categorias) 
                    VALUES (?,?,?,?,?)";
    $sentenciaPreparada = $conexion->prepare($sentenciaSQL);
    // Encriptamos la sentencia (bind_param)
    $sentenciaPreparada->bind_param("isdis", 
    $referencia,$descripcion,$precio,$stock,$categoriasValores);

    // ejecutaSQL es booleano; true (correcto), false (error)
    $ejecutaSQL = $sentenciaPreparada->execute();
    if($ejecutaSQL){
        $alerta .= "<br> Producto insertado correctamente";
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
    <hr class="m-3 border border-primary border-5 w-50">

    <form action="#" method="post" class="m-3 shadow-lg">
        <!-- -->
        <!-- Campo Referencia -->
        <label for="Referencia" class="form-label">Referencia:</label>
        <input type="number" name="Referencia" id="Referencia"
            class="form-control w-50" required><br>
        <!-- -->
        <!-- Campo Descripcion -->
        <label for="Descripcion" class="form-label">Descripción:</label>
        <input type="text" name="Descripcion" id="Descripcion"
            class="form-control w-50" required><br>
        <!-- -->
        <!-- -->
        <!-- Campo Precio -->
        <label for="Precio" class="form-label">Precio:</label>
        <input type="number" name="Precio" id="Precio"
            class="form-control w-50" step="0.05" required><br>
        <!-- -->
        <!-- Campo Stock -->
        <label for="Stock" class="form-label">Stock:</label>
        <input type="number" name="Stock" id="Stock"
            class="form-control w-50" required><br>


        <!-- -->
        <!-- Campo Categorias -->
        <label class="form-label">Categorias</label><br>
        <input type="checkbox" name="Categorias[]" 
        value="papelería" id="papelería">
        <label for="papelería">Papelería</label><br>
        <input type="checkbox" name="Categorias[]" 
        value="escolar" id="escolar">
        <label for="escolar">Escolar</label><br>
        <input type="checkbox" name="Categorias[]" 
        value="oficina" id="oficina">
        <label for="oficina">Oficina</label><br><br>
        <!-- -->
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