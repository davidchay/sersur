<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// includes directory.
$inc_dir = get_template_directory() . '/inc';

// Array of files to include.
$files_includes = array(
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/menus_class.php',                     // Adds option 'li_class' & 'submenu_class' to 'wp_nav_menu'
	'/breadcrum.php',                     	// Adds funciones de clientes
	'/pagination.php',                      // Custom pagination for this theme.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	
	'/clientes.php',                     	// Adds funciones de clientes
	
	'/CMB2/init.php',                      								//Inicializa CMB2.
	'/CMB2/plugins/cmb2-radio-image.php',                      			//MEtaboxes.
	'/CMB2/plugins/cmb2-page-select-master/cmb2_page_select.php',       //MEtaboxes.
	'/CMB2/plugins/cmb2-tabs-master/cmb2-tabs.php',                     //MEtaboxes.
	
	'/theme-functions.php',                 // Funciones del  theme
	
	'/caracteristicas/custom-post.php',
	'/caracteristicas/metabox.php',
	
	'/documentos/custom-post.php',
	'/documentos/metabox.php',
	
	'/logos/admin.php',
	'/logos/custom-post.php',
	'/logos/metabox.php',
	'/logos/frontend.php',
	
	'/servicios/admin.php',           
	'/servicios/helper.php',           
	'/servicios/custom-post.php',           
	'/servicios/metabox.php',               
	'/servicios/icons.php',
	
	
	'/sucursales/admin.php',
	'/sucursales/custom-post.php',
	'/sucursales/frontend.php',
	'/sucursales/shortcodes.php',
	'/sucursales/metabox.php',


	'/shortcodes.php',                      // Load shortcodes.
	'/inicio.php',                      // Load shortcodes.
);


// Include files.
foreach ( $files_includes as $file ) {
	require_once $inc_dir . $file;
}






// if ( function_exists( 'register_block_style' ) ) {
//     register_block_style(
//         'core/button',
//         array(
//             'name'         => 'rounded-codipix',
//             'label'        => __( 'Redondeado', 'codipix' ),
//             'is_default'   => true,
//             'inline_style' => '.wp-block-button.is-style-rounded { border-radius: 9999px !important; }',
//         )
//     );
// }