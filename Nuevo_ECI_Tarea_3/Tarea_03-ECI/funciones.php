<?php
//FUNCIONES.php
//LAS FUNCIONES SON UN CONJUNTO DE CÓDIGOS QUE SE AGRUPAN CON UN NOMBRE
//HAY DOS FORMAS DE CONECTARSE A BASE DE DATOS:
//FORMA PROGRAMACIÓN ORIENTADA A OBJETOS
//FORMA PROGRAMACIÓN ORIENTADA A PROCEDIMENTAL

function conectar()  // SE PUEDE USAR LA OPCION A ó B
{   // DECLARAR VARIABLES DE CONEXIÓN
    $servidor = "localhost";
    $usuario = "root";
    $clave = "root";


    //A) FORMATO PROCEDIMENTAL
    // $conexion = mysqli_connect($servidor, $usuario, $clave);


    //B) FORMATO POO (PROGRAMACION ORIENTADA A OBJETOS)
    //$conexion = new -> ES EL CONTRUCTOR PARA CREAR OBJETOS
    $conexion = new mysqli($servidor, $usuario, $clave);

    if ($conexion->connect_error) {
        die("error!," . $conexion->connect_errno);
    } else {
        echo " LA CONEXION ES CORRECTA";
        return $conexion;
    }
}

function conectarBBDD() //SE PUEDE USAR LA OPCION A ó B
{
    // DECLARAR VARIABLES DE CONEXIÓN
    $servidor = "localhost";
    $usuario = "root";
    $clave = "root";
    $bbdd = "tarea03_ECI";

    //A) FORMATO PROCEDIMENTAL
    // $conexion = mysqli_connect($servidor, $usuario, $clave, $bbdd);


    //B) FORMATO POO (PROGRAMACION ORIENTADA A OBJETOS)
    //$conexion = new -> ES EL CONTRUCTOR PARA CREAR OBJETOS
    $conexion = new mysqli($servidor, $usuario, $clave, $bbdd);

    if ($conexion->connect_error) {
        die("error!," . $conexion->connect_errno);
    } else {
        echo " LA CONEXION ES CORRECTA";
        return $conexion;
    }
}
