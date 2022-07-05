<?php
// Register Custom Post Type logo carousel
// agrga logos para mostrarlos en forma de carrousel un slide 
function logos_post_type() {

	$labels = array(
		'name'                  => _x( 'Logo', 'Post Type General Name', 'codipix' ),
		'singular_name'         => _x( 'Logo', 'Post Type Singular Name', 'codipix' ),
		'menu_name'             => __( 'Logos', 'codipix' ),
		'name_admin_bar'        => __( 'Logo', 'codipix' ),
		'archives'              => __( 'Archivo de logos', 'codipix' ),
		'attributes'            => __( 'Atributos de logo', 'codipix' ),
		'parent_item_colon'     => __( 'Logo padre:', 'codipix' ),
		'all_items'             => __( 'Todos los logos', 'codipix' ),
		'add_new_item'          => __( 'Agregar nuevo logo', 'codipix' ),
		'add_new'               => __( 'Agregar Nuevo', 'codipix' ),
		'new_item'              => __( 'Nuevo logo', 'codipix' ),
		'edit_item'             => __( 'Editar logo', 'codipix' ),
		'update_item'           => __( 'Actualizar logo', 'codipix' ),
		'view_item'             => __( 'Ver Logo', 'codipix' ),
		'view_items'            => __( 'Ver Logos', 'codipix' ),
		'search_items'          => __( 'Buscar logo', 'codipix' ),
		'not_found'             => __( 'No encontrado', 'codipix' ),
		'not_found_in_trash'    => __( 'Not encontrado en la papelera', 'codipix' ),
		'featured_image'        => __( 'Imagen destacada', 'codipix' ),
		'set_featured_image'    => __( 'Establecer imagen destacada', 'codipix' ),
		'remove_featured_image' => __( 'Quitar imagen destacada', 'codipix' ),
		'use_featured_image'    => __( 'Usar como imagen destacada', 'codipix' ),
		'insert_into_item'      => __( 'Insertar en el elemento', 'codipix' ),
		'uploaded_to_this_item' => __( 'Actualizar este logo', 'codipix' ),
		'items_list'            => __( 'Lista de logo', 'codipix' ),
		'items_list_navigation' => __( 'Lista de navegacion', 'codipix' ),
		'filter_items_list'     => __( 'Filtra lista', 'codipix' ),
	);
	$args = array(
		'label'                 => __( 'Logos', 'codipix' ),
		'description'           => __( 'Carousel de logos.', 'codipix' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'page-attributes' ),
		//'taxonomies'            => array( 'category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 6,
		'menu_icon'             => 'dashicons-images-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		//'has_archive'           => false,
        'query_var'				=> true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
        //'rewrite'               => false,
		'capability_type'       => 'page',
	);
	register_post_type( 'logos', $args );

}
add_action( 'init', 'logos_post_type', 0 );



/**
* Agregar columna en logos
*/

// Add the data to the custom columns for the logos post type:
    

add_filter( 'manage_logos_posts_columns', 'set_logos_columns' );
add_action( 'manage_logos_posts_custom_column' , 'info_logos_column', 10, 2 );
	
function set_logos_columns($columns) {
	$columns = array(
		'cb' => $columns['cb'],
		'title' => __( 'Title' ),
		'serasur_logo_image' => __( 'Logo' ), //id metabox logo image
		'serasur_logo_grupo' => __( 'Grupo', 'codipix' ), //id metabox grupo
		'date' => $columns['date'],
	);
	
	return $columns;
}
	
function info_logos_column ( $column, $post_id) {

	if( $column === 'serasur_logo_image'  ) {
		
		echo '<img src="'. get_post_meta( $post_id, 'serasur_logo_image', 1 ). '" width="90" height="60" >';

	}    
	if( $column === 'serasur_logo_grupo'  ) {
		
		echo get_post_meta( $post_id , 'serasur_logo_grupo' , true ); 
		
	}
	
}
	