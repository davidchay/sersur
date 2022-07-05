<?php 


// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


/**
 * Configurción de metaboxes de (custom post type) Ubicaciones con CBM2
 */

add_action( 'cmb2_admin_init', 'cmb2_ubicaciones_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function cmb2_ubicaciones_metaboxes() {
	$prefix = 'serasur_';
	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box( array(
		'id'            => 'ubicaciones_metabox',
		'title'         => __( 'Agregue los datos siguientes', 'cmb2' ),
		'object_types'  => array( 'ubicaciones', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // Keep the metabox closed by default
	) );

	$cmb->add_field( array(
		'name'    => 'Subtitulo',
		'desc'    => '(opcional)',
		'default' => '',
		'id'      => $prefix . 'ubicacion_subtitulo',
		'type'    => 'text_medium',
	) );

	$cmb->add_field( array(
		'name' => 'Dirección',
		'desc' => '',
		'default' => '',
		'id' => $prefix . 'ubicacion_direccion',
		'type' => 'textarea_small'
	) );

	$cmb->add_field( array(
		'name'    => 'Latitud',
		'desc'    => 'No deje en blanco este campo',
		'default' => '',
		'id'      => $prefix . 'ubicacion_latitud',
		'type'    => 'text',
	) );

	$cmb->add_field( array(
		'name'    => 'Longitud',
		'desc'    => 'No deje en blanco este campo',
		'default' => '',
		'id'      => $prefix . 'ubicacion_longitud',
		'type'    => 'text',
	) );



}