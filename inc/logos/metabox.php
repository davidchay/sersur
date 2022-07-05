<?php

/**
 * Configuracion de los metaboxes de (custom post type) logos con CMB2
 */

add_action( 'cmb2_admin_init', 'cmb2_logos_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function cmb2_logos_metaboxes() {
	$prefix = 'serasur_';
	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box( array(
		'id'            => 'logos_metabox',
		'title'         => __( 'Imagen de logo', 'cmb2' ),
		'object_types'  => array( 'logos' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // Keep the metabox closed by default
	) );

	

	$cmb->add_field( array(
        //'name'    => 'Imagen de logo',
        'desc'    => 'Sube una imagen. Se recomienda el tamaño de 220 x 124 px',
        'id'      => $prefix . 'logo_image',
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
        'preview_size' => 'logo_image', // Image size to use when previewing in the admin.
    ) );
    //se usa:  $image = wp_get_attachment_image( get_post_meta( get_the_ID(), 'serasur_logo_image', 1 ), 'logo_image' );


    $cmb->add_field( array(
        'name'             => 'Grupo a que pertenece',
        'desc'             => 'Seleciona una opción',
        'id'               => $prefix . 'logo_grupo',
        'type'             => 'select',
        'show_option_none' => true,
        'default'          => '',
        'options'          => array(
            'testimoniales' => __( 'Empresa que confia en SERASUR (Testimonial)', 'cmb2' ),
            'dependencias'   => __( 'Dependencia que se relaciona con SERASUR', 'cmb2' ),
        ),
    ) );

    $cmb->add_field( array(
        'name' => __( 'Sitio web URL', 'cmb2' ),
        'id'   => $prefix . 'logo_url',
        'type' => 'text_url',
        // 'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
    ) );

    $cmb->add_field( array(
        'name'    => 'Color de fondo',
        'id'      => $prefix . 'logo_gbcolor',
        'type'    => 'colorpicker',
        'default' => '#ffffff',
        // 'options' => array(
        // 	'alpha' => true, // Make this a rgba color picker.
        // ),
    ) );
	

}

