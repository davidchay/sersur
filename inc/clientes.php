<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;



/**
 * Agregar Nuevo rol de usuario Cliente
 */ 
 

add_role( 'cliente', 'Cliente', array( 'read' => true, 'level_0' => true ) );
   
//Restrigir el dashboard
//Restringir panel admin a clientes
function restrict_admin_area_by_rol(){
	if ( current_user_can('cliente') ){
	  wp_redirect(site_url());
	  exit;
	}
  }
add_action('admin_init', 'restrict_admin_area_by_rol', 1);

//Ocultar admin bar a todos los usuarios con rol de cliente
add_action('after_setup_theme', 'ocultar_admin_bar');
function ocultar_admin_bar() {
	if ( current_user_can('cliente') ) {
		add_filter( 'show_admin_bar', '__return_false' );
	}
}


//Mostrar menu diferente para clientes
function codipix_menu_dinamico_autores( $args ) {


	if ( $args['theme_location'] == 'primary'){

		if ( is_user_logged_in() ) {

			$user = wp_get_current_user();
			if ( in_array('cliente', $user->roles) ){
	 			$args['menu'] = 'menu-clientes';
			}
	
		}
	}

	return $args;
}
//add_filter( 'wp_nav_menu_args', 'codipix_menu_dinamico_autores' );


// Añadir permisos de lectura a páginas y entradas privadas para cualquier usuario con rol suscriptor.

function wp_acceso_contenido_privado()
{
global $wp_roles;
// Obtenemos en una variable el rol suscriptor.
$role = get_role('cliente');
// Le añadimos el permiso de lectura a páginas privadas.
$role->add_cap('read_private_pages');
// Incluimos también el permiso de lectura a posts privados.
$role->add_cap('read_private_posts');
}

// Llamada a nuestra función.
add_action ( 'admin_init', 'wp_acceso_contenido_privado' );

// Retirar permisos de lectura especiales a usuarios con rol suscriptor.

function wp_restrigir_acceso_contenido_privado()
{
global $wp_roles;
// Obtenemos en una variable el rol suscriptor.
$role = get_role('cliente');
// Retiramos el permiso de lectura a páginas privadas.
$role->remove_cap('read_private_pages');
// Retiramos también el permiso de lectura a posts privados.
$role->remove_cap('read_private_posts');
}

// Llamada a nuestra función.
//add_action ( 'admin_init', 'wp_restrigir_acceso_contenido_privado' );