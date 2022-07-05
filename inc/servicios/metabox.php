<?php 

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;



/**
 * Configuracion de los metaboxes de (custom post type) servicios con CMB2
 */

add_action( 'cmb2_admin_init', 'cmb2_servicios_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function cmb2_servicios_metaboxes() {
	$prefix = 'serasur_';
	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box( array(
		'id'            => 'servicios_metabox',
		'title'         => __( 'configuración', 'cmb2' ),
		'object_types'  => array( 'servicios', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // Keep the metabox closed by default
	) );

	
	$cmb->add_field( array(
		'name'             => __( 'Icono', 'cmb2' ),
		'desc'             => __( 'Seleccione un icono para mostrar en la sección', 'cmb2' ),
		'id'               => $prefix . 'icono',
		'type'             => 'radio_image',
		'options'          => get_icon_array_images_names(),
		'images_path'      => get_template_directory_uri(),
		'images'           => get_icon_array_images_uri('tiny')
	) );


	



	$cmb->add_field( array(
		'name'             => 'Página',
		'desc'             => 'Seleccione una página, para redireccionar en el botón (Saber más) ',
		'id'               => $prefix . 'page_url',
		'type'             => 'select',
		'show_option_none' => true,
		'default'          => 'custom',
		'options'          => codipix_get_pages_options(),
		
	) );
	

	$cmb->add_field( array(
		'name' => '¿Se muestra en la página de inicio?',
		'desc' => 'Marque si este servicio aparece en la página de inicio',
		'id'   => $prefix . 'inicio_servicio',
		'type' => 'checkbox',
	) );

	$cmb->add_field( array(
		'name'    => 'Sección',
		'id'      => $prefix . 'servicio_seccion',
		'type'    => 'radio_inline',
		'options' => array(
			'general' => __( 'Servicio General', 'cmb2' ),
			'especial'   => __( 'Servicio especial IT', 'cmb2' ),
		),
		'default' => 'general',
	) );

}

