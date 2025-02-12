<?php       /*includes/cargar-scripts.php*/

function anidi_cargar_scripts() { 
    wp_enqueue_style('bootstrap-css','https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');  //BOOTSTRAP//
    wp_enqueue_style('fontawesome','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css');  //FONTAWESOme//
    wp_enqueue_style('anidi-estilos', 
    plugin_dir_url(__FILE__) . "../assets/anidi.css");  //ESTILOS PROPIOS//

}

add_action('admin_enqueue_scripts','anidi_cargar_scripts'); //LLAMADA A LA FUNCIÓN SUPERIOR//

/*
ORDEN DE CREACIÓN DE ARCHIVOS EN EL PLUGIN:
1. /plugin-anidi.php
2. /includes/cargar-scipts.php
3./assets/anidi.css
4./includes/menu/-admin.php
5./ includes/insertar-docente.php
6./includes/insertar-docente.php
7./includes/insertar-alumno.php

*/


