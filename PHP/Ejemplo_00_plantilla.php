<?php      /*PONER UNA INYECCION DE <PHP> */ 
/*RECOGEMOS DATOS DEL <FORMULARIO> */
$alerta = "Mensaje...";
if (isset($_REQUEST["enviar"])) {
    $alerta = $_REQUEST["usuario"];
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLANTILLA DE FORMULARIO</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="bootstrap.bundle.min.js"></script>



</head>
<!-- PARA PROBARLO EN EL SERVIDOR
http://localhost/DIWEB2425/PHP/Ejemplo_00_plantilla.php
-->

<body>
<header> <!-- PARA PONER UN alert-->
    <p class="alert alert-primary m-3 w-50"><?php echo $alerta?></p>
</header>
<form action="#" method="post" class="m-3">
        <label for="usuario" class="form-label">Usuario</label>
        <input type="text" name="usuario" id="usuario" class="form-control w-50"><br>
        <hr> <!--/*CON UN class="border" PUEDE CAMBIAR GROSOR Y COLOR EN EL hr*/-->
        <button type="submit" class="btn btn-success" name="enviar">Enviar</button>
    </form>
    
</body>
</html>