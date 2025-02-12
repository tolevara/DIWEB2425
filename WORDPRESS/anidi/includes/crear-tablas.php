<?php        /* includes/crear-tablas.php*/

function anidi_crear_tablas()
{
    global $wpdb;     // ESTO EQUIVALE A: DIWEB2425>php>funciones.php>conectarBBDD?=function conectarBBDD()
    $tabla_docentes = $wpdb->prefix . "docentes";  // prefix.= (wp) prefijo//
    $tabla_alumnos = $wpdb->prefix . "alumnos";

    $set_caracteres = $wpdb->get_charset_collate();

        //BORRAMOS LAS TABLAS SI ESTÁN CREADAS//
    $wpdb->query("DROP TABLE IF EXISTS $tabla_alumnos");
    $wpdb->query("DROP TABLE IF EXISTS $tabla_docentes");

    $sql_docentes = " CREATE TABLE $tabla_docentes (
                    nif_docente CHAR(9) NOT NULL,
                    nombre_docente VARCHAR(50) NOT NULL,
                    salario DECIMAL(7,2) NOT NULL,
                    fecha_ingreso DATE NOT NULL,
                    PRIMARY KEY (nif_docente)
                           )$set_caracteres";

    $sql_alumnos = " CREATE TABLE $tabla_alumnos (
                    nif_alumno CHAR(9) NOT NULL,
                    nombre_alumno VARCHAR(50) NOT NULL,
                    edad TINYINT NOT NULL,
                    genero BOOLEAN NOT NULL,
                    nif_docente CHAR(9) NOT NULL,
                    fecha_ingreso DATE NOT NULL,
                    INDEX idx_alumnos (nombre_alumno),
                    FOREIGN KEY fk_alumnos (nif_docente)
                        REFERENCES $tabla_docentes (nif_docente),
                    PRIMARY KEY (nif_alumno)
                ) $set_caracteres ";

    //LLAMAMOS A ACTUALIZAR LA BBDD//
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql_docentes,);
    dbDelta($sql_alumnos,);
}

register_activation_hook(__FILE__, "anidi_crear_tablas");  //HAY QUE REGISTRAR LA FUNCIÓN// 
