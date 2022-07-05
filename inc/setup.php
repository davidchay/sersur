<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Theme setup.
 */
function tailpress_setup() {
	add_theme_support( 'title-tag' );

	register_nav_menus(
		array(
			'primary' => __( 'Menú Principal', 'tailpress' ),
			'clientes' => __( 'Menú Clientes', 'tailpress' ),
			'servicios' => __( 'Menú servicios. En pie de página', 'tailpress' ),
			'empresa' => __( 'Menú empresa. En pie de página', 'tailpress' ),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

    add_theme_support( 'custom-logo' );
	
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );

	add_theme_support( 'editor-styles' );
	add_editor_style( 'css/editor-style.css' );
}

add_action( 'after_setup_theme', 'tailpress_setup' );



add_filter( 'excerpt_more', 'understrap_custom_excerpt_more' );

if ( ! function_exists( 'understrap_custom_excerpt_more' ) ) {
	/**
	 * Removes the ... from the excerpt read more link
	 *
	 * @param string $more The excerpt.
	 *
	 * @return string
	 */
	function understrap_custom_excerpt_more( $more ) {
		if ( ! is_admin() ) {
			$more = '';
		}
		return $more;
	}
}

add_filter( 'wp_trim_excerpt', 'understrap_all_excerpts_get_more_link' );

if ( ! function_exists( 'understrap_all_excerpts_get_more_link' ) ) {
	/**
	 * Adds a custom read more link to all excerpts, manually or automatically generated
	 *
	 * @param string $post_excerpt Posts's excerpt.
	 *
	 * @return string
	 */
	function understrap_all_excerpts_get_more_link( $post_excerpt ) {
		if ( ! is_admin() ) {
			$post_excerpt = $post_excerpt . ' ... <div x-data="{open:false}"> <a @mouseover="open=true" @mouseleave="open=false" class="py-2 px-4 uppercase bg-primary rounded-full text-md text-white transition ease-linear delay-150 hover:bg-primary-dark " href="' . esc_url( get_permalink( get_the_ID() ) ) . '">' . __(
				'<span x-show="open" x-transition >Leer más</span> <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
				<path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
			  </svg>',
				'understrap'
			) . '</a></div>';
		}
		return $post_excerpt;
	}
}

//add_image_size( 'logo_image', 220, 124, true );
 add_image_size( 'logo_image', 220, 124, array( 'center', 'center' ) );