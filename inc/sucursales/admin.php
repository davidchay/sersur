<?php

/**
 * Configuración de ubicaciones
 * Agrega un submenu, subpagina  de custom type ubicaciones .
 */
add_action('admin_menu', 'serasur_register_page_setting_ubicaciones');

function serasur_register_page_setting_ubicaciones() {
    add_submenu_page(
        'edit.php?post_type=ubicaciones', //parent slug
        __( 'Configuración del mapa de sucursales', 'serasur' ), //Titulo de pagina - (titulo de la pestaña del navegador)  
        __( 'Configuración', 'serasur' ), //titulo de submenu
        'manage_options', //capacidades de usuario
        'ubicaciones-opciones', //menu slug (url)
        'page_ubicaciones_opciones_html' //Funcion llamada con el contenido de la pagina
    );
}


/**
 * Display callback for the submenu page.
 */

function page_ubicaciones_opciones_html() { 
    if( ! current_user_can('manage_options')){
        return;
    }

    $tab = isset($_GET['tab']) ? $_GET['tab'] : null ;

    ?>
    <div class="wrap">
        <h1><?php _e( 'Configuración del mapa de sucursales', 'textdomain' ); ?></h1>
        <?php
			if ( 'true' == esc_attr( $_GET['updated'] ) ) echo '<div class="updated" ><p>Theme Settings updated.</p></div>';
			
            if($tab==null){

            }
			//if ( isset ( $_GET['tab'] ) ) ilc_admin_tabs($_GET['tab']); else ilc_admin_tabs('homepage');
		?>
        <nav class="nav-tab-wrapper">
            <a href="?post_type=ubicaciones&page=ubicaciones-opciones" class="nav-tab <?php echo ($tab===null || $tab==='mapa') ?'nav-tab-active':''; ?>">Mapa</a>
            <a href="?post_type=ubicaciones&page=ubicaciones-opciones&tab=config" class="nav-tab <?php echo ($tab==='config') ?'nav-tab-active':''; ?>">Configuración</a>
        </nav>
        <div class="tab-content">
            <?php 
            switch ($tab) {
                case 'config':
                    ?>
                    <h2>Configuraciones</h2>
                    <?php
                    
                    break;
                case 'mapa':
                default:
                    ?>
                    <h2>Mapa de sucursales</h2>
                    
                    <?php
                  
                    echo do_shortcode( '[mapa-sucursales]' );
                break;
            }
            ?>
        </div>
    </div>
    <?php
}


/*** */


add_action( 'cmb2_admin_init', 'register_metabox2' );
function register_metabox2() {

    $cmb2 = new_cmb2_box( array(
        'id'           => 'serasur_config_map_sucursales',
        'object_types' => array( 'options-page' ),
        'option_key' => 'ubicaciones-opciones',
        'parent_slug' => 'edit.php?post_type=ubicaciones',
        'show_on_cb' => 'get_tab_option_config',
    ) );

    // Set our CMB2 fields
    $cmb2->add_field( array(
        'name'    => 'Imagen de punto de control',
        'desc'    => '',
        'id'      => 'mapa_image_point',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
        ),
        'text'    => array(
            'add_upload_file_text' => 'Agregar archivo' // Change upload button text. Default: "Add or Upload File"
        ),
        // query_args are passed to wp.media's library query.
        'query_args' => array(
            //'type' => 'application/pdf', // Make library only display PDFs.
            // Or only allow gif, jpg, or png images
            'type' => array(
            	'image/gif',
            	'image/jpeg',
            	'image/png',
            ),
        ),
        'preview_size' => 'large', // Image size to use when previewing in the admin.
    ) );

    $cmb2->add_field( array(
        'name' => '¿Activar zoom?',
        'desc' => 'Marque si desea activar el zoom ',
        'id'   => 'mapa_is_active_zoom',
        'type' => 'checkbox',
    ) );
   
    $cmb2->add_field( array(
        'name'    => 'Color de mapa',
        'id'      => 'mapa_color_fill',
        'type'    => 'colorpicker',
        'default' => '#0DA04F',
        
    ) );

    $cmb2->add_field( array(
        'name'    => 'Color de mapa al pasar el cursor',
        'id'      => 'mapa_color_fill_hover',
        'type'    => 'colorpicker',
        'default' => '#25A960',
        
    ) );

    $cmb2->add_field( array(
        'name'    => 'Color de division politica',
        'id'      => 'mapa_color_stroke',
        'type'    => 'colorpicker',
        'default' => '#25A960',
        
    ) );
    $cmb2->add_field( array(
        'name'    => 'Color de fondo',
        'id'      => 'mapa_color_bg',
        'type'    => 'colorpicker',
        'default' => '#0EA5E9',
        
    ) );
    $cmb2->add_field( array(
        'name'    => 'Color de fondo del tooltip',
        'id'      => 'mapa_color_bg_tooltip',
        'type'    => 'colorpicker',
        'default' => '#214AB0',
        'options' => array(
	    	'alpha' => true, // Make this a rgba color picker.
	    ),
        
    ) );
    $cmb2->add_field( array(
        'name'    => 'Color del texto del tooltip',
        'id'      => 'mapa_color_text_tooltip',
        'type'    => 'colorpicker',
        'default' => '#FFFFFF',
        
    ) );

}
/**
 * get_tab_option_config
 *
 * esta funcion devuelve true si el parametro tab de get es igual a config
 * @return void
 */
function get_tab_option_config(){
    $tab = isset($_GET['tab']) ? $_GET['tab'] : null ;
    
    return ($tab==='config');
}