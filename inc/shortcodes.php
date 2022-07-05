<?php 
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
/**
 * Muestra los ultimos post 
 */
function last_post($atts) {   
        extract(shortcode_atts(array(
            'cols'  => 3,
            'posts' => 3,
            'hidden_date' => true,
            'hidden_category' => false
        ), $atts));

        $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => $posts,
            'post__not_in' => get_option('sticky_posts')
        );
        $loop = new WP_Query($args);
        ob_start();
        ?>
        <div class="grid grid-cols-1 lg:grid-cols-<?php echo $cols ?> gap-8">
                <?php 
                    if($loop->have_posts()):
                        while( $loop->have_posts() ): $loop->the_post(); ?>
                            <?php 
                                $options = array(
                                    'hidden_date' => $hidden_date,
                                    'hidden_cat'  => $hidden_category
                                );
                                set_query_var( 'options', $options );
                                get_template_part( 'template-parts/content', get_post_format() ); 
                            ?>
                        <?php endwhile;
                        wp_reset_postdata();
                    endif;
                ?>
                
        </div>
    <?php 
    $content = ob_get_contents(); ob_end_clean();
    return $content;
}

add_shortcode('recent-posts','last_post');



/**
 * MAPA UBICACIONES
 * Devuelve un mapa de una ubicacion pasando la latitud y longitud
 */


// function script
function script_mapa_ubicacion() {
    global $post;
    if ( (is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'mapa-ubicacion')) || is_page_template( 'page-templates/Inicio.php' )) {
    ob_start();
    ?>
    <!-- Mapa ubicación -->
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
                const mapUbicacion = document.querySelector('#mapL-ubicacion');
                const latitud = mapUbicacion.dataset.latitud;
                const longitud = mapUbicacion.dataset.longitud;
                mapUbicacion.style.width='100%';
                mapUbicacion.style.height='100%';
                let map = L.map('mapL-ubicacion', {
                    center:[latitud, longitud],
                    zoom:16
                });
                
                L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
                    maxZoom: 18,
                    tileSize: 512,
                    zoomOffset: -1
                }).addTo(map);

                L.control.scale().addTo(map);
                L.marker([latitud, longitud]).addTo(map);
            });
    </script>
<?php
    $content = ob_get_contents(); ob_end_clean();
    return $content;
    } //if
}  

add_action( 'wp_footer', 'script_mapa_ubicacion' );
// hortcode function

function mapa_ubicacion($atts){
    $latitud = get_theme_mod('serasur_contacto_latitud_setting');
    $longitud = get_theme_mod('serasur_contacto_longitud_setting');
    extract(shortcode_atts(array(
        'lat'   => $latitud,//'14.678923347619456',
        'long'  => $longitud,//'-92.15454492829724',
     ), $atts));
    return '
      <div id="mapL-ubicacion" style="z-index:40;"data-latitud="'.$lat.'" data-longitud="'.$long.'"></div>
    ';
}
add_shortcode( 'mapa-ubicacion', 'mapa_ubicacion' );



function grid_servicios_generales() {
    $args = array(  
        'post_type' => 'servicios',
        'post_status' => 'publish',
        'posts_per_page' => -1, 
        'orderby' => 'menu_order', 
        'order' => 'ASC', 
        'meta_key' => 'serasur_servicio_seccion',
        'meta_value' => 'general',
    );

    
    $loop = new WP_Query( $args ); 
    ob_start();
    ?>
<div class="my-10  grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php 
            while ( $loop->have_posts() ) : $loop->the_post(); 
                $icono  = get_post_meta( get_the_ID(), 'serasur_icono', true );
                $page_url = get_post_meta( get_the_ID(), 'serasur_page_url', true );
               
            ?>
             <div class="service-card ">
                    <div class="service-card_overlay"></div>
                    <div class="service-card_content">
                        <div class="service-card_content-icon">
                            <?php echo get_icon_svg( $icono ); ?>  
                        </div>
                        <h3 class="font-title text-xl font-bold text-secondary my-5">
                            <?php the_title(); ?>
                        </h3>
                        
                        <?php the_content(); ?>
                        <?php if($page_url): ?>
                            
                            <a href="<?php echo get_permalink( $page_url) ?>" class="service-card_content-button">
                                Saber más
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        <?php endif;?>


                    </div>
                </div><!-- service-card -->
                 
                <?php endwhile;
                    wp_reset_postdata(); 
                ?>   
                
            </div><!-- grid -->
    <?php
     $content = ob_get_contents(); ob_end_clean();
     return $content;
}

add_shortcode( 'servicios-generales', 'grid_servicios_generales' );


function grid_servicios_especiales() {
    
    $args = array(  
        'post_type' => 'servicios',
        'post_status' => 'publish',
        'posts_per_page' => -1, 
        'orderby' => 'menu_order', 
        'order' => 'ASC', 
        'meta_key' => 'serasur_servicio_seccion',
        'meta_value' => 'especial',
    );

    
    $loop = new WP_Query( $args ); 
    ob_start();
    ?>
    <div class="my-10  grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php 
           
                
            while ( $loop->have_posts() ) : $loop->the_post(); 
                $icono  = get_post_meta( get_the_ID(), 'serasur_icono', true );
                $page_url = get_post_meta( get_the_ID(), 'serasur_page_url', true );
               
            ?>
             <div class="service-card-alt ">
                    <div class="service-card_overlay"></div>
                    <div class="service-card_content">
                        <div class="service-card_content-icon">
                            <?php echo get_icon_svg ( $icono ); ?>  
                        </div>
                        <h3 class="font-title text-xl font-bold my-5">
                            <?php the_title(); ?>
                        </h3>
                        
                        <?php the_content(); ?>
                        <?php if($page_url): ?>
                            
                            <a href="<?php echo get_permalink( $page_url) ?>" class="service-card_content-button">
                                Saber más
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        <?php endif;?>


                    </div>
                </div><!-- service-card -->
               
                
                
                 
           <?php endwhile;
        
            wp_reset_postdata(); 
                    ?>   
                
            </div><!-- grid -->
            
    <?php
    $content = ob_get_contents(); ob_end_clean();
    return $content;
}

add_shortcode( 'servicios-especiales', 'grid_servicios_especiales' );



function features_list() {
    $args = array(  
        'post_type' => 'caracteristicas',
        'post_status' => 'publish',
        'posts_per_page' => -1, 
        'orderby' => 'menu_order', 
        'order' => 'ASC', 
        
    );

    
    $loop = new WP_Query( $args ); 
    ob_start();
    ?>
    
    <ul class="mt-10">
        <?php
        if($loop->have_posts()):
            while ( $loop->have_posts() ) : $loop->the_post(); 
        ?>

            <li class="my-3 flex items-start text-lg" >
                <svg xmlns="http://www.w3.org/2000/svg" class="flex-none h-7 w-7  mr-4 text-primary" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                
                <?php print the_title(); ?>
                
            </li>
        <?php 
            endwhile;
            wp_reset_postdata(); 
        endif;
        ?>                
    </ul>

<?php
    $content = ob_get_contents(); ob_end_clean();
    return $content;
}

add_shortcode( 'caracteristicas-lista', 'features_list' );

function features_grid(){
    $args = array(  
        'post_type' => 'caracteristicas',
        'post_status' => 'publish',
        'posts_per_page' => -1, 
        'orderby' => 'menu_order', 
        'order' => 'ASC', 
        
    );

    $loop = new WP_Query( $args ); 
    ob_start();
    ?>
        <div class="my-10  grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php 
           
            while ( $loop->have_posts() ) : $loop->the_post(); 
               
            ?>
            <div class=" flex  items-start justify-start ">
                <svg xmlns="http://www.w3.org/2000/svg" class="flex-none h-9 w-9  mr-4 text-primary" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                <h3 classs="text-lg font-bold">
                    <?php the_title(); ?>
                </h3>
            </div>

            <?php 
            endwhile;
        
            wp_reset_postdata(); 
            ?>   
            
        </div><!-- grid -->
    <?php
    $content = ob_get_contents(); ob_end_clean();
    return $content;
}

add_shortcode( 'caracteristicas-grid', 'features_grid' );