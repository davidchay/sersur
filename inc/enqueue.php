<?php 

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


/**
 * Get asset path.
 *
 * @param string  $path Path to asset.
 *
 * @return string
 */
function tailpress_asset( $path ) {
	if ( wp_get_environment_type() === 'production' ) {
		return get_stylesheet_directory_uri() . '/' . $path;
	}

	return add_query_arg( 'time', time(),  get_stylesheet_directory_uri() . '/' . $path );
}


/**
 * Esta función agrega los parámetros "async" y "defer" a recursos de Javascript.
 * Solo se debe agregar "async" o "defer" en cualquier parte del nombre del 
 * recurso (atributo "handle" de la función wp_register_script).
 *
 * @param $tag
 * @param $handle
 *
 * @return mixed
 */
function mg_add_async_defer_attributes( $tag, $handle ) {
	// Busco el valor "async"
	if( strpos( $handle, "async" ) ):
		$tag = str_replace(' src', ' async="async" src', $tag);
	endif;
	// Busco el valor "defer"
	if( strpos( $handle, "defer" ) ):
		$tag = str_replace(' src', ' defer="defer" src', $tag);
	endif;
	return $tag;
}
add_filter('script_loader_tag', 'mg_add_async_defer_attributes', 10, 2);




/**
 * Enqueue theme assets.
 */
function tailpress_enqueue_scripts() {
	$theme = wp_get_theme();

	wp_enqueue_style( 'custom-fonts', tailpress_asset( 'css/custom-fonts.css' ), array(), $theme->get( 'Version' ) );
	wp_enqueue_style( 'tailpress', tailpress_asset( 'css/app.css' ), array(), $theme->get( 'Version' ) );
	wp_enqueue_script( 'tailpress-defer', tailpress_asset( 'js/app.js' ), array(), $theme->get( 'Version' ) );
		
}

add_action( 'wp_enqueue_scripts', 'tailpress_enqueue_scripts' );

function animate_enqueue_scripts() {
    if(is_front_page(  )){
        $theme = wp_get_theme();
    
        wp_enqueue_style( 'animate-css', tailpress_asset( 'css/animate.min.css' ), array(), $theme->get( 'Version' ) );
        wp_enqueue_script( 'wow-js', tailpress_asset( 'js/wow.min.js' ), array(), $theme->get( 'Version' ) );
    }
}

add_action( 'wp_enqueue_scripts', 'animate_enqueue_scripts' );

function serasur_sucursales_enqueue_scripts() {
    global $post;
    if ( (is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'mapa-sucursales')) || is_page_template( 'page-templates/Inicio.php' ) || is_admin()) {
        
    
    $theme = wp_get_theme();
    $scripts = array(
        array ( 
            'handle' => 'mousewheel',
            'src'    => 'https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js',
            'deps'   => array('jquery'),
            'type'   => '',
        ),
        array ( 
            'handle' => 'raphael',
            'src'    => 'https://cdnjs.cloudflare.com/ajax/libs/raphael/2.2.7/raphael.min.js',
            'deps'   => array(),
            'type'   => '',
        ),
        array ( 
            'handle' => 'mapael',
            'src'    => get_stylesheet_directory_uri() . '/js/jquery.mapael.min.js',
            'deps'   => array('raphael'),
            'type'   => '',
        ),
        array ( 
            'handle' => 'mexico-map',
            'src'    =>  get_stylesheet_directory_uri() . '/js/maps/mexico.js',
            'deps'   => array('mapael'),
            'type'   => '',
        ),
    );
    
        for($i=0; $i<count($scripts); $i++){
        
            if( ! $scripts[$i]['type'] ){
                if (!wp_script_is( $scripts[$i]['src'], 'registered')) {
                    wp_register_script( $scripts[$i]['handle'],
                        $scripts[$i]['src'], 
                        $scripts[$i]['deps'], 
                        $theme->get( 'Version' ) );
                    wp_enqueue_script( $scripts[$i]['handle'] );
                }
            }
            else{
                if (!wp_style_is( $scripts[$i]['src'], 'registered')) {
                    wp_register_style( $scripts[$i]['handle'],
                        $scripts[$i]['src'], 
                        $scripts[$i]['deps'], 
                        $theme->get( 'Version' ) );
                    wp_enqueue_style( $scripts[$i]['handle'] );
                }

               };
        }

    }
}
add_action('wp_enqueue_scripts','serasur_sucursales_enqueue_scripts');
add_action( 'admin_enqueue_scripts', 'serasur_sucursales_enqueue_scripts' );





/**
 * enqueue_leaflet_map
 * agrega los script de leatflet en pagina de inicio o cuando se utilize 
 * los shortcode de ['mapa-ubicacion'] y ['mapa-sucursales']
 *
 * @return void
 */
//enqueue script
function enqueue_leaflet_map() {
    global $post;
    if ( (is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'mapa-ubicacion')) 
          || (is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'mapa-sucursales'))
          || is_page_template( 'page-templates/Inicio.php' )) {
        $theme = wp_get_theme();
        
        
            if (!wp_script_is( get_stylesheet_directory_uri() . '/js/leaflet.js', 'registered')) {
                wp_register_script( 'leaflet',
                get_stylesheet_directory_uri() . '/js/leaflet.js', 
                array(), 
                $theme->get( 'Version' ) );
                wp_enqueue_script( 'leaflet' );
            }
        

        if (!wp_style_is( get_stylesheet_directory_uri() . '/css/leaflet.css', 'registered')) {
            wp_register_style( 'leaflet',
            get_stylesheet_directory_uri() . '/css/leaflet.css', 
            array(), 
            $theme->get( 'Version' ) );
            wp_enqueue_style( 'leaflet' );
        }

    }   
        
}

add_action('wp_enqueue_scripts','enqueue_leaflet_map');



/**
 * init wow animate
 */
function wow_init(){
    if(is_front_page(  )){
    ?>
        <script>
        new WOW().init();
        </script>

    <?
    }
}
add_action( 'wp_head', 'wow_init' );

/**
 * Load loader screen
 */

 function scripts_loader_screen(){
    ?>
    <style type="text/css">
    .spinner {
        margin: 100px auto 0;
        width: 70px;
        text-align: center;
    }

            .spinner > div {
            width: 18px;
            height: 18px;
            

            border-radius: 100%;
            display: inline-block;
            -webkit-animation: sk-bouncedelay 1.4s infinite ease-in-out both;
            animation: sk-bouncedelay 1.4s infinite ease-in-out both;
            }

            .spinner .bounce1 {
            -webkit-animation-delay: -0.32s;
            animation-delay: -0.32s;
            }

            .spinner .bounce2 {
            -webkit-animation-delay: -0.16s;
            animation-delay: -0.16s;
            }

            @-webkit-keyframes sk-bouncedelay {
            0%, 80%, 100% { -webkit-transform: scale(0) }
            40% { -webkit-transform: scale(1.0) }
            }

            @keyframes sk-bouncedelay {
            0%, 80%, 100% { 
                -webkit-transform: scale(0);
                transform: scale(0);
            } 40% { 
                -webkit-transform: scale(1.0);
                transform: scale(1.0);
            }
            }
        </style>
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function(){
                fadeOutEffect();
            });
            function fadeOutEffect() {
                const fadeTarget = document.getElementById("loader-screen");
                const fadeEffect = setInterval(function () {
                    if (!fadeTarget.style.opacity) {
                        fadeTarget.style.opacity = 1;
                    }
                    if (fadeTarget.style.opacity > 0) {
                        fadeTarget.style.opacity -= 0.1;
                    } else {
                        clearInterval(fadeEffect);
                        fadeTarget.remove();
                    }
                }, 100);
            }
           
        </script>
    <?php 
    
 }
 add_action( 'wp_head', 'scripts_loader_screen' );