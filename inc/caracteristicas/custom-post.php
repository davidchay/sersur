<?php 
// Register Custom Post Type de Caracteristicas
function cpt_caracteristicas() {

	$labels = array(
		'name'                  => _x( 'Caracteristicas', 'Post Type General Name', 'codipix' ),
		'singular_name'         => _x( 'Caracteristica', 'Post Type Singular Name', 'codipix' ),
		'menu_name'             => __( 'Caracteristicas', 'codipix' ),
		'name_admin_bar'        => __( 'Caracteristicas', 'codipix' ),
		'archives'              => __( 'Caracteristica Archivos', 'codipix' ),
		'attributes'            => __( 'Caracteristica Attributos', 'codipix' ),
		'parent_item_colon'     => __( 'Caracteristica Padre:', 'codipix' ),
		'all_items'             => __( 'Todo las caracteristicas', 'codipix' ),
		'add_new_item'          => __( 'Nueva caracteristica', 'codipix' ),
		'add_new'               => __( 'Agregar Nuevo', 'codipix' ),
		'new_item'              => __( 'Nueva caracteristica', 'codipix' ),
		'edit_item'             => __( 'Editar caracteristica', 'codipix' ),
		'update_item'           => __( 'Actualizar Caracteristica', 'codipix' ),
		'view_item'             => __( 'Ver caracteristica', 'codipix' ),
		'view_items'            => __( 'Ver caracteristicas', 'codipix' ),
		'search_items'          => __( 'Buscar caracteristica', 'codipix' ),
		'not_found'             => __( 'No encontrado', 'codipix' ),
		'not_found_in_trash'    => __( 'No encontrado en la papelera', 'codipix' ),
		'featured_image'        => __( 'Featured Image', 'codipix' ),
		'set_featured_image'    => __( 'Set featured image', 'codipix' ),
		'remove_featured_image' => __( 'Remove featured image', 'codipix' ),
		'use_featured_image'    => __( 'Use as featured image', 'codipix' ),
		'insert_into_item'      => __( 'Insertar en caracteristicas', 'codipix' ),
		'uploaded_to_this_item' => __( 'Actualizar caracteristica', 'codipix' ),
		'items_list'            => __( 'Lista de cracteristicas', 'codipix' ),
		'items_list_navigation' => __( 'Navegación de lista de Caracteristicas', 'codipix' ),
		'filter_items_list'     => __( 'Filtrar caracteristicas', 'codipix' ),
	);
	$args = array(
		'label'                 => __( 'Caracteristicas', 'codipix' ),
		'description'           => __( 'Caracteristicas', 'codipix' ),
		'labels'                => $labels,
		'supports'              => array('title','revisions','page-attributes'),
		//'taxonomies'            => false,//array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'           	=> 'dashicons-tag',
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
	register_post_type( 'caracteristicas', $args );

}
add_action( 'init', 'cpt_caracteristicas', 0 );




