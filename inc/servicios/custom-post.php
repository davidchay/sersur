<?php 
// Register Custom Post Type de servicios
function cpt_servicios() {

	$labels = array(
		'name'                  => _x( 'Servicios', 'Post Type General Name', 'codipix' ),
		'singular_name'         => _x( 'Servicio', 'Post Type Singular Name', 'codipix' ),
		'menu_name'             => __( 'Servicios', 'codipix' ),
		'name_admin_bar'        => __( 'Servicios', 'codipix' ),
		'archives'              => __( 'Servicio Archivos', 'codipix' ),
		'attributes'            => __( 'Servicio Attributos', 'codipix' ),
		'parent_item_colon'     => __( 'Servicio Padre:', 'codipix' ),
		'all_items'             => __( 'Todo los servicios', 'codipix' ),
		'add_new_item'          => __( 'Nuevo servicio', 'codipix' ),
		'add_new'               => __( 'Agregar Nuevo', 'codipix' ),
		'new_item'              => __( 'Nuevo Servicio', 'codipix' ),
		'edit_item'             => __( 'Editar Servicio', 'codipix' ),
		'update_item'           => __( 'Actualizar Servicio', 'codipix' ),
		'view_item'             => __( 'Ver Servicio', 'codipix' ),
		'view_items'            => __( 'Ver Servicios', 'codipix' ),
		'search_items'          => __( 'Buscar Servicio', 'codipix' ),
		'not_found'             => __( 'No encontrado', 'codipix' ),
		'not_found_in_trash'    => __( 'No encontrado en la papelera', 'codipix' ),
		'featured_image'        => __( 'Featured Image', 'codipix' ),
		'set_featured_image'    => __( 'Set featured image', 'codipix' ),
		'remove_featured_image' => __( 'Remove featured image', 'codipix' ),
		'use_featured_image'    => __( 'Use as featured image', 'codipix' ),
		'insert_into_item'      => __( 'Insertar en Servicios', 'codipix' ),
		'uploaded_to_this_item' => __( 'Actualizar este Servicio', 'codipix' ),
		'items_list'            => __( 'Lista de Servicios', 'codipix' ),
		'items_list_navigation' => __( 'Navegación de lista de Servicios', 'codipix' ),
		'filter_items_list'     => __( 'Filtrar Servicios', 'codipix' ),
	);
	$args = array(
		'label'                 => __( 'Servicios', 'codipix' ),
		'description'           => __( 'Servicios', 'codipix' ),
		'labels'                => $labels,
		'supports'              => array('title','editor','page-attributes'),
		//'taxonomies'            => false,//array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'           => 'dashicons-clipboard',
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
	register_post_type( 'servicios', $args );

}
add_action( 'init', 'cpt_servicios', 0 );




/**
* Agregar columnas a servicios
*/

// Add the data to the custom columns for the logos post type:
    

add_filter( 'manage_servicios_posts_columns', 'set_servicios_columns' );
add_action( 'manage_servicios_posts_custom_column' , 'info_servicios_column', 10, 2 );
	
function set_servicios_columns($columns) {
	$columns = array(
		'cb' => $columns['cb'],
		'title' => __( 'Title' ),
		'serasur_icono' => __( 'Icono' ),
		'serasur_servicio_seccion' => __( 'Tipo de servicio', 'codipix' ),
		'date' => $columns['date'],
	);
	
	return $columns;
}
		
function info_servicios_column ( $column, $post_id) {

	if( $column === 'serasur_icono'  ) {
		
		$url_icon= get_url_icon_image(get_post_meta( $post_id, 'serasur_icono', 1 ));
		
		echo '<img src="'. $url_icon . '" width="62" height="62" >';

	}    
	if( $column === 'serasur_servicio_seccion'  ) {
		
		echo get_post_meta( $post_id , 'serasur_servicio_seccion' , true ); 
		
	}
	
}