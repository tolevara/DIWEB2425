<?php
/* includes/menu-admin.php */ //(REFERENCIA DE LA PESTAÑA EN LA QUE ESTOY )//

function anidi_menu_admin()
{ //(PESTAÑA DE LA PÁGINA) (LISTADO DE ICONOS=https://developer.wordpress.org/resource/dashicons/#location-alt)
    add_menu_page(
        "Crear BBDD",
        "Anidi",
        "manage_options",
        "plugin-anidi",
        "anidi_crear_bbdd",
        "dashicons-admin-site-alt3",
        6
    );


    add_submenu_page(        //(INSERTAR subMENÚ)//
        "plugin-anidi",
        "Crear BBDD",
        "Crear BBDD",
        "manage_options",
        "plugin-anidi",
        "anidi_crear_bbdd",
    );

    add_submenu_page(        //(INSERTAR subMENÚ)//
        "plugin-anidi",
        "Insertar Docente",
        "Insertar Docente",
        "manage_options",
        "insertar-docente",
        "anidi-insertar-docente",
    );

    add_submenu_page(        //(INSERTAR MENÚ)//
        "plugin-anidi",
        "Insertar Alumno",
        "Insertar Alumno",
        "manage_options",
        "insertar-alumno",         //slug (etiquetas) propio//
        "anidi_insertar_alumno",  //función que voy a llamar//
    );

    add_submenu_page(        //(INSERTAR subMENÚ)//
        "plugin-anidi",
        "",                   // SEPARA LOS MENUS //
        "-----------------",  // APARECE COMO SEPARADOR //
        "manage_options",
        "#",                  // NO TIENE ENLACE FUNCIONAL //
        ""                    //NO EJECUTA NADA // 
    );

    add_submenu_page(        //(INSERTAR subMENÚ)//
        "plugin-anidi",
        "Gestión Docente",
        "Gestión Docente",
        "manage_options",
        "gestion-docente",
        "anidi-gestion-docente",
    );

    add_submenu_page(        //(INSERTAR subMENÚ)//
        "plugin-anidi",
        "Gestión Alumno",
        "Gestión Alumno",
        "manage_options",
        "gestion-alumno",
        "anidi-gestion-alumno",
    );
}



//LLAMADA A LA FUNCIÓN SUPERIOR//
add_action('admin_menu', 'anidi_menu_admin');

function anidi_crear_bbdd()
{
    if (isset($_REQUEST['crear_bbdd'])) {
        anidi_crear_tablas();
        ?>
        <section class="notice notice-success is-dismissible">
            <p>BBDD Creada correctamente!</p>
        </section>
        <?php
    }
    ?>
    <section class="wrap m-3 p-3">
        <h1>Crear BBDD Anidi</h1>
        <p>Para crear la BBDD pulsa "Crear"</p>
        <form action="" method="post">
            <input type="submit" value="Crear" name="crear_bbdd"
            class="btn btn-primary">
        </form>

    </section>
    <?php
}

//PARA REICIAR EL SERVIDOR EN CONSOLA: sudo service apache2 restart
