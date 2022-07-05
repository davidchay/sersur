<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;



//Es ecesario para que funcione is_plugin_active 
if (!function_exists('is_plugin_active')) {
    include_once(ABSPATH . 'wp-admin/includes/plugin.php');
}

//optiene la url personalizada con el plugin wps hide login
function codipix_get_url_login(){
	//plugin is activated
	if ( is_plugin_active( 'wps-hide-login/wps-hide-login.php' ) ) {
			global $wpdb;
			$url_login = "";
			$url_login = $wpdb->get_results("SELECT option_value FROM ".$wpdb->prefix."options WHERE option_name='whl_page' LIMIT 1");
			return "/".$url_login[0]->option_value;
	}else {
 		return wp_login_url();
	}
}

//Cerrar sesion redirecciona a la pagina de inicio
add_action( 'wp_logout','wpdocs_ahir_redirect_after_logout' );
function wpdocs_ahir_redirect_after_logout() {
    wp_safe_redirect( home_url() );
    exit();
}



//Esta funcion verifica si la pagina en que esta es blog
function is_blog () {
    return ( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
}


/**
 * 
 * get_post_primary_category()
 * Devuelve la categoria principal marcada con el plugin Yoast SEO 
 * Como se usa:
 * $post_categories = get_post_primary_category($post->ID, 'category'); 
 * $primary_category = $post_categories['primary_category'];
 *  tomado de: https://www.lab21.gr/blog/wordpress-get-primary-category-post/
 * 
 */
function get_post_primary_category($post_id, $term='category', $return_all_categories=false){
    $return = array();

    if (class_exists('WPSEO_Primary_Term')){
        // Show Primary category by Yoast if it is enabled & set
        $wpseo_primary_term = new WPSEO_Primary_Term( $term, $post_id );
        $primary_term = get_term($wpseo_primary_term->get_primary_term());

        if (!is_wp_error($primary_term)){
            $return['primary_category'] = $primary_term;
        }
    }

    if (empty($return['primary_category']) || $return_all_categories){
        $categories_list = get_the_terms($post_id, $term);

        if (empty($return['primary_category']) && !empty($categories_list)){
            $return['primary_category'] = $categories_list[0];  //get the first category
        }
        if ($return_all_categories){
            $return['all_categories'] = array();

            if (!empty($categories_list)){
                foreach($categories_list as &$category){
                    $return['all_categories'][] = $category->term_id;
                }
            }
        }
    }

    return $return;
}