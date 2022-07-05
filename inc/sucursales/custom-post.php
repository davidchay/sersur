<?php 
// Register Custom Post Type de ubicaciones sucursales
function cpt_ubicaciones_sucursales() {

	$labels = array(
		'name'                  => _x( 'Sucursales', 'Post Type General Name', 'codipix' ),
		'singular_name'         => _x( 'Sucursal', 'Post Type Singular Name', 'codipix' ),
		'menu_name'             => __( 'Sucursales', 'codipix' ),
		'name_admin_bar'        => __( 'Sucursales', 'codipix' ),
		'archives'              => __( 'Archivos de sucursal' , 'codipix' ),
		'attributes'            => __( 'Atributos de sucursal', 'codipix' ),
		'parent_item_colon'     => __( 'Sucursal padre:', 'codipix' ),
		'all_items'             => __( 'Todas las sucursales', 'codipix' ),
		'add_new_item'          => __( 'Nueva sucursal', 'codipix' ),
		'add_new'               => __( 'Agregar sucursal', 'codipix' ),
		'new_item'              => __( 'Nueva sucursal', 'codipix' ),
		'edit_item'             => __( 'Editar sucursal', 'codipix' ),
		'update_item'           => __( 'Actualizar sucursal', 'codipix' ),
		'view_item'             => __( 'Ver sucursal', 'codipix' ),
		'view_items'            => __( 'Ver sucursales', 'codipix' ),
		'search_items'          => __( 'Buscar sucursal', 'codipix' ),
		'not_found'             => __( 'No encontrado', 'codipix' ),
		'not_found_in_trash'    => __( 'No encontrado en la papelera', 'codipix' ),
		'featured_image'        => __( 'Imagen destacada', 'codipix' ),
		'set_featured_image'    => __( 'Establecer imagen destacada', 'codipix' ),
		'remove_featured_image' => __( 'Quitar imagen destacada', 'codipix' ),
		'use_featured_image'    => __( 'Usar como imagen destacada', 'codipix' ),
		'insert_into_item'      => __( 'Insertar en sucursal', 'codipix' ),
		'uploaded_to_this_item' => __( 'Actualizar esta sucursal', 'codipix' ),
		'items_list'            => __( 'Lista de sucursales', 'codipix' ),
		'items_list_navigation' => __( 'Navegación de lista de sucursales', 'codipix' ),
		'filter_items_list'     => __( 'Filtrar sucursales', 'codipix' ),
	);
	$args = array(
		'label'                 => __( 'Sucursales', 'codipix' ),
		'description'           => __( 'Sucursales', 'codipix' ),
		'labels'                => $labels,
		'supports'              => array('title', 'thumbnail','revisions','page-attributes'),
		//'taxonomies'            => false,//array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 7,
		'menu_icon'           => 'dashicons-location-alt',
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
	register_post_type( 'ubicaciones', $args );

}
add_action( 'init', 'cpt_ubicaciones_sucursales', 0 );



/**
* Agregar columna en ubicaciones
*/

// Add the data to the custom columns for the ubicciones post type:


add_filter( 'manage_ubicaciones_posts_columns', 'set_ubicaciones_columns' );
add_action( 'manage_ubicaciones_posts_custom_column' , 'info_ubicaciones_column', 10, 2 );
	
function set_ubicaciones_columns($columns) {
	$columns = array(
		'cb' => $columns['cb'],
		'title' => __( 'Title' ),
		'serasur_ubicacion_latitud' => __( 'Latitud' ), //id metabox 
		'serasur_ubicacion_longitud' => __( 'Longitud', 'serasur' ), //id metabox 
		'date' => $columns['date'],
	);
	
	return $columns;
}
	
function info_ubicaciones_column ( $column, $post_id) {

	if( $column === 'serasur_ubicacion_latitud'  ) {
		
		echo get_post_meta( $post_id , 'serasur_ubicacion_latitud' , true ); 

	}    
	if( $column === 'serasur_ubicacion_longitud'  ) {
		
		echo get_post_meta( $post_id , 'serasur_ubicacion_longitud' , true ); 
		
	}
	
}
	


