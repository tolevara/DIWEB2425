<?php

/*
Plugin Name: Anidi Gestion
Plugin URI: https://developer.wordpress.org/plugins/
Description: Plugin para gestionar docentes y alumnos
Version: 1.0
Autor: María José Toledano
Autor URI: https://developer.wordpress.org/plugins/
Lincese: GPL2
*/

//Para evitar acceder a los archivos del plugin
if (!defined('ABSPATH')) {
    exit;
}
// Este archivo carga el resto de archivos del plugin
require_once plugin_dir_path(__FILE__) . "includes/crear-tablas.php";
require_once plugin_dir_path(__FILE__) . "includes/menu-admin.php";
require_once plugin_dir_path(__FILE__) . "includes/insertar-docente.php";
require_once plugin_dir_path(__FILE__) . "includes/insertar-alumno.php";
require_once plugin_dir_path(__FILE__) . "includes/gestionar-docente.php";
require_once plugin_dir_path(__FILE__) . "includes/gestionar-alumno.php";
require_once plugin_dir_path(__FILE__) . "includes/cargar-scripts.php";

//Función para agregar un menú de Ajustes ó Documentación = (Comentarios como en el visual)//
//add_settings_page -> Añadir página ajustes ó Documentación//

function anidi_management_add_settings_page()
{  //CAMBIAR anidi POR EL NOMBRE DE LA EMPRESA//
    //USAMOS LA FUNCIÓN añadir página de menu//
    //EL LENGUAJE NO ESTÁ TIPADO, si lo quieres tipar poner " : " y la "variable"//

    add_menu_page(             //string CADENA DE CARACTERES//
        'Anidi Gestión',      //$page_title:string',  
        'Anidi Doc',         //$menu_title:string, 
        'manage_options',   //SÓLO PARA Admin// //$capability:string,-> CAPACIDAD REQUERIDA// 
        'anidi-management',                  //$menu_slug:string,->  IDENTIFICADOR ÚNICO// 
        'anidi_management_settings_page',  // $callback:callable,-> FUNCIÓN INFERIOR//
        'dashicons-admin-user',           //$icon_url:string, -> ICONOS DEL MENÚ//
        '6'                              //$position:integer|float|null )-> POSICIÓN MENÚ//
    );                            
}

//PARA AGREGAR LA FUNCIÓN SUPERIOR AL SISTEMA(AÑADIR EN LA WEB LA FUNCIÓN)
add_action(
    'admin_menu',                          //$hook_name:string, -> Nombre del gancho
    'anidi_management_add_settings_page'  //$callback:callable, -> Función inferior
    //$priority:integer,   ->
    //$accepted_args:integer ->
);

//FUNCION PARA RENDERIZAR ó PINTAR EL MENÚ//
function anidi_management_settings_page()
{
?>
    <section class="wrap bg-primary text-white m-3 p-3"><!--SECCION HTML--><!--bg = backgraund--><!--WRAP = PIRAMIDE INVERTIDA-->
        <h1>Gestión Anidi</h1>
        <p>Plugin para gestionar docentes y alumnos</p>

        <h2><i class="fa-sharp fa-solid fa-book fa-beat-fade"></i>
            Información Adicional</h2>
        <p>Plugin recomendados para VSC</p>
        <ul>
            <li>PHP Intelephense</li>
            <li>Wordpress Snippet</li>
            <li>Wordpress Hooks</li>
            <li>PHP Debug</li>

        </ul>
    </section>
<?php
}
//EN CASO DE ERROR (Error fatlal)//
/**
 * 1. DESACTIVAR EL PLUGIN (Si es que se ha activado)
 * 2. QUITAR LA CARPETA DEL PLUGIN Y PONERLA EN OTRO SITIO
 * (EJEMPLO: EN LA CARPETA SUPERIOR, wp-content)
 * 3. REINICIAR APACHE (CONSOLA: sudo service apache2 restart)
 * 4. VOLVER A METER EL PLUGIN EN LA CARPETA DE PLUGINS
 * 5. EN LA SECCIÓN DE PLUGINS DE WORDPRESS, PULSAR F5
 */