<?php
// Register Custom Post Type logo carousel
// agrga logos para mostrarlos en forma de carrousel un slide 
function documentos_post_type() {

	$labels = array(
		'name'                  => _x( 'Documento', 'Post Type General Name', 'codipix' ),
		'singular_name'         => _x( 'Documento', 'Post Type Singular Name', 'codipix' ),
		'menu_name'             => __( 'Documentos', 'codipix' ),
		'name_admin_bar'        => __( 'Documento', 'codipix' ),
		'archives'              => __( 'Archivos de documentos', 'codipix' ),
		'attributes'            => __( 'Atributos de documeno', 'codipix' ),
		'parent_item_colon'     => __( 'Documento padre:', 'codipix' ),
		'all_items'             => __( 'Todos los documentos', 'codipix' ),
		'add_new_item'          => __( 'Agregar nuevo documento', 'codipix' ),
		'add_new'               => __( 'Agregar Nuevo', 'codipix' ),
		'new_item'              => __( 'Nuevo documento', 'codipix' ),
		'edit_item'             => __( 'Editar documento', 'codipix' ),
		'update_item'           => __( 'Actualizar documento', 'codipix' ),
		'view_item'             => __( 'Ver documento', 'codipix' ),
		'view_items'            => __( 'Ver documentos', 'codipix' ),
		'search_items'          => __( 'Buscar documento', 'codipix' ),
		'not_found'             => __( 'No encontrado', 'codipix' ),
		'not_found_in_trash'    => __( 'No encontrado en la papelera', 'codipix' ),
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
		'label'                 => __( 'Documentos', 'codipix' ),
		'description'           => __( 'Documentos de clientes.', 'codipix' ),
		'labels'                => $labels,
		'supports'              => array( 'title',  'thumbnail' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 6,
		'menu_icon'             => 'dashicons-open-folder',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
        'rewrite' 				=> array('slug' => 'documentos', 'with_front' => true),
        'query_var'				=> true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'documentos', $args );

}
add_action( 'init', 'documentos_post_type' );

// rewrites custom post type name
// global $wp_rewrite;
// $projects_structure = '/documentos/%year%/%monthnum%/%day%/%documentos%/';
// $wp_rewrite->add_rewrite_tag("%documentos%", '([^/]+)', "doscumento=");
// $wp_rewrite->add_permastruct('documentos', $projects_structure, false);

/**
* Agregar columna en logos
*/

// Add the data to the custom columns for the logos post type:
    

// add_filter( 'manage_documentos_posts_columns', 'set_documentos_columns' );
// add_action( 'manage_documentos_posts_custom_column' , 'info_documentos_column', 10, 2 );
	
function set_documentos_columns($columns) {
	$columns = array(
		'cb' => $columns['cb'],
		'title' => __( 'Title' ),
		// 'serasur_logo_image' => __( 'Logo' ), //id metabox logo image
		// 'serasur_logo_grupo' => __( 'Grupo', 'codipix' ), //id metabox grupo
		'date' => $columns['date'],
	);
	
	return $columns;
}
	
function info_documentos_column ( $column, $post_id) {

	// if( $column === 'serasur_logo_image'  ) {
		
	// 	echo '<img src="'. get_post_meta( $post_id, 'serasur_logo_image', 1 ). '" width="90" height="60" >';

	// }    
	// if( $column === 'serasur_logo_grupo'  ) {
		
	// 	echo get_post_meta( $post_id , 'serasur_logo_grupo' , true ); 
		
	// }
	
}
	