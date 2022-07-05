<?php

/**
 * Configuracion de los metaboxes de (custom post type) logos con CMB2
 */

add_action( 'cmb2_admin_init', 'cmb2_documentos_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function cmb2_documentos_metaboxes() {
	$prefix = 'serasur_';
	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box( array(
		'id'            => 'documentos_metabox',
		'title'         => __( 'Nuevo documento', 'cmb2' ),
		'object_types'  => array( 'documentos' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // Keep the metabox closed by default
	) );

	$cmb->add_field( array(
        'name'  => 'Descripción corta',
        'desc'  => 'Agregue una descripcion corta del documento',
        //'default' => 'standard value (optional)',
        'id'    => $prefix . 'documento_descripcion',
        'type'  => 'textarea_small'
    ) );

	$cmb->add_field( array(
        'name'    => 'Documento PDF',
        'desc'    => 'Agregue el archivo pdf del documento',
        'id'      => $prefix . 'documento_archivo',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
        ),
        'text'    => array(
            'add_upload_file_text' => 'Agregar documento' // Change upload button text. Default: "Add or Upload File"
        ),
        // query_args are passed to wp.media's library query.
        'query_args' => array(
            'type' => 'application/pdf', // Make library only display PDFs.
            // Or only allow gif, jpg, or png images
            // 'type' => array(
            // 	'image/gif',
            // 	'image/jpeg',
            // 	'image/png',
            // ),
        ),
        'preview_size' => 'logo_image', // Image size to use when previewing in the admin.
    ) );
    //se usa:  $image = wp_get_attachment_image( get_post_meta( get_the_ID(), 'serasur_logo_image', 1 ), 'logo_image' );

}

