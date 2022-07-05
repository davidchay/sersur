<?php 

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;



/**
 * Configuracion de los metaboxes de (custom post type) servicios con CMB2
 */

add_action( 'cmb2_admin_init', 'cmb2_caracteristicas_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function cmb2_caracteristicas_metaboxes() {
	$prefix = 'serasur_features_';
	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box( array(
		'id'            => 'caracteristicas_metabox',
		'title'         => __( 'configuración', 'cmb2' ),
		'object_types'  => array( 'caracteristicas', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // Keep the metabox closed by default
	) );

	
	
	$cmb->add_field( array(
		'name' => 'Brebe descripción',
		'default' => '',
		'id' => 'descripcion',
		'type' => 'textarea_small'
	) );
}

