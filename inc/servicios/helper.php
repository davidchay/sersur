<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*
 * Funcion para obtener las páginas en un array 
 * 	array (
 * 		"id_pagina_1" = "Titulo págia 1",
 * 		"id_pagina-2" = "Titulo págia 2",
 * 		"id_pagina_3" = "Titulo págia 3",
 * 	);
 */


function codipix_get_pages_options() {
	$get_post_args = array(
        'post_type' => 'page',
		'sort_column' => 'post_title',
        'post_status' => 'publish',
        'sort_order' => 'ASC'
    );

    $options = array();
    foreach ( get_pages( $get_post_args ) as $post ) {
		$title = get_the_title( $post->ID );
        
        $options[$post->ID] =  $title;
	}
   
	return $options;
}
