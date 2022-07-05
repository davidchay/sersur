<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * get_plots_ubicaciones function
 * Regresa la configuracion de plots (sucursales en el mapa)
 * @return void
 */
function get_plots_ubicaciones() {
    
    // The Query
    $array=[];
    $args = array(  
        'post_type' => 'ubicaciones',
        'post_status' => 'publish',
    );
    $query = new \WP_Query( $args );
    // The Loop
    if ( $query->have_posts() ) :
    //while ( $query->have_posts() ) : $query->the_post(); 
    foreach ($query->get_posts() as $p) {
        // nomal loop logic using $p as a normal WP_Post object
    
       
        
        $lat = get_post_meta( $p->ID, 'serasur_ubicacion_latitud', true );
        $long = get_post_meta( $p->ID, 'serasur_ubicacion_longitud', true );
        $dir = get_post_meta( $p->ID, 'serasur_ubicacion_direccion', true );

       
        $array[get_the_title($p->ID)] = array(
            
                        "latitude" => $lat, 
                        "longitude" => $long,
                        "tooltip" => array(
                            "content" => "<b style=\"display:block;\">  ". get_the_title($p->ID) ." </b> <small>$dir</small>"
                        ),
         );
    }
    //endwhile;
    wp_reset_postdata();
   
endif;

    return json_encode($array);

}

/**
 * sersur_sucursales_map
 * Esta funcion escribe los styles y script de configuraciones de mapa de sucursales
 *
 * @return void
 */
function serasur_sucursales_styles_mapael() {
    global $post;
    if ( (is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'mapa-sucursales')) || is_page_template( 'page-templates/Inicio.php' ) || is_admin()) {
       
        $colorBg = cmb2_get_option('ubicaciones-opciones', 'mapa_color_bg');
        $colorBgTooltip = cmb2_get_option('ubicaciones-opciones', 'mapa_color_bg_tooltip');
        $colorTextTooltip = cmb2_get_option('ubicaciones-opciones', 'mapa_color_text_tooltip');
        
        ?>
        <!-- STYLES FROM MAPAEL -->
        <style type="text/css">
            /* Specific mapael css class are below
            * 'mapael' class is added by plugin
            */
            
            .wp-admin #mapcontainer {
                max-width: 750px;
              
            }

            .mapael .map {
                position: relative;
                background-color:<?php echo $colorBg; ?>;
                margin-bottom:10px;
            }

            .mapael .mapTooltip {
                position : absolute;
                background-color : <?php echo $colorBgTooltip; ?>;
                /* moz-opacity:0.70;
                opacity: 0.70;
                //filter:alpha(opacity=70); */
                border-radius:10px;
                padding : 10px;
                z-index: 1000;
                max-width: 200px;
                display:none;
                color:<?php echo $colorTextTooltip; ?>;
            } 

            /* For all zoom buttons */
            .mapael .zoomButton {
                background-color: #fff;
                border: 1px solid #ccc;
                color: #000;
                width: 35px;
                height: 35px;
                line-height: 35px;
                text-align: center;
                border-radius: 3px;
                cursor: pointer;
                position: absolute;
                top: 0;
                font-weight: bold;
                left: 10px;
                -webkit-user-select: none;
                -khtml-user-select : none;
                -moz-user-select: none;
                -o-user-select : none;
                user-select: none;
            }

            /* Reset Zoom button first */
            .mapael .zoomReset {
                top: 10px;
            }

            /* Then Zoom In button */
            .mapael .zoomIn {
                top: 50px;
            }

            /* Then Zoom Out button */
            .mapael .zoomOut {
                top: 90px;
            }

            #mapL-sucursales.leaflet-container {
                height: 400px;
                width: 800px;
                max-width: 90vw;
                max-height: 90vw;
		    }
        </style>
    <?php
    } //if
}
/**
 * serasur_sucursales_script_mapael
 *  
 * genera el codigo jquery necesario para el mapa svg (mapaeljs)
 * 
 * @return void
 */    
function serasur_sucursales_script_mapael(){

        global $post;
        if ( (is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'mapa-sucursales')) || is_page_template( 'page-templates/Inicio.php' ) || is_admin()) {
            $imgPath = cmb2_get_option('ubicaciones-opciones', 'mapa_image_point');
            $zoom = 'false';
            $colorFill = cmb2_get_option('ubicaciones-opciones', 'mapa_color_fill');
            $colorFillHover = cmb2_get_option('ubicaciones-opciones', 'mapa_color_fill_hover');
            $colorStroke = cmb2_get_option('ubicaciones-opciones', 'mapa_color_stroke');
            
            if(cmb2_get_option('ubicaciones-opciones', 'mapa_is_active_zoom')){
                $zoom = 'true';
            }
            if(!$colorFill){
                $colorFill = '#0DA04F';
            }
            if(!$colorFillHover){
                $colorFillHover = '#25A960';
            }
            if(!$colorStroke){
                $colorStroke = '#25A960';
            }
            
            if(!$imgPath){
                $imgPath = get_stylesheet_directory_uri() . '/images/home.png';
            }
            
        
        ?>

        <!-- SCRIPT FROM MAPA SVG -->
        <script type="text/javascript">
            
        jQuery(document).ready(function($) {
                $("#mapcontainer").mapael({
                    map: {
                        name: "mexico", 
                    
                        zoom: {
                            enabled: <?php echo  $zoom; ?>,
                            maxLevel: 20
                        },
                        defaultArea: {
                            attrs: {
                                fill: "<?php echo $colorFill; ?>",
                                stroke: "<?php echo $colorStroke; ?>",
                            },
                            
                            attrsHover: {
                                fill: "<?php echo $colorFillHover; ?>"
                            },
                            
                        },    
                        defaultPlot: {
                            type: "image",
                            url: "<?php echo $imgPath ; ?>",
                            width: 80,
                            height: 80,
                            attrs: {
                                //fill: "#004a9b"
                            
                            }, 
                            attrsHover: {
                                opacity: 1,
                                transform: "s1.5",
                                <?php if( ! is_admin() ):?>
                                cursor: "pointer",
                                <?php endif; ?>
                            }, 
                            eventHandlers: {
                                <?php if( ! is_admin() ):?>
                                    click: function (e, id, mapElem, textElem, elemOptions) {
                                        mapaSucursales(elemOptions, <?php echo get_plots_ubicaciones(); ?>);
                                    }
                                <?php endif; ?>
                                    
                        }
                        }
                    },
                    

                    
                    plots:  <?php echo get_plots_ubicaciones(); ?>
                    
                });
            });
        </script>
    <?php
    } //if
}

/**
 * serasur_sucursales_script_leaflet
 * 
 * Genera el script necesario para crear el mapa en leaflet 
 * al hacer clic en alguna sucursal
 * @return void
 */
function serasur_sucursales_script_leaflef(){

    global $post;
    if ( (is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'mapa-sucursales')) || is_page_template( 'page-templates/Inicio.php' ) || is_admin()) {
    
    ?>
        <!-- CODE MAPA LEAFLET -->
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function(){
                const btnOpenMap = document.querySelectorAll('.openMapLeaft');
                btnOpenMap.forEach(function(boton){
                    boton.addEventListener('click', function(e){
                        e.preventDefault();
                        const datos = {
                            latitude: boton.dataset.latitude,
                            longitude : boton.dataset.longitude
                        };
                        mapaSucursales(datos, <?php echo get_plots_ubicaciones(); ?>);
                    });
                });
                //mapaSucursales();
            });
            const mapaSucursales = function(att, all){
                const body = document.querySelector('body');
                const overlay = document.createElement('div');
                const mapLeaflet = document.createElement('div');
                let map,marker;
                let cities = L.layerGroup();
                mapLeaflet.setAttribute('id','mapL-sucursales');
               
                overlay.appendChild(mapLeaflet);
                overlay.classList.add('overlayMap');
                body.appendChild(overlay);
                body.style.overflow = 'hidden';

                for ( let item of Object.values(all) ){
                     L.marker([item.latitude, item.longitude]).bindPopup(item.tooltip.content).addTo(cities);
                };

                map = L.map('mapL-sucursales', {
                    center:[att.latitude, att.longitude],
                    zoom:10,
                    layers:[cities]
                });
                
                L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
                    maxZoom: 18,
                    tileSize: 512,
                    zoomOffset: -1
                }).addTo(map);

                L.control.scale().addTo(map);

                //Cerrar el modal
                const cerrarModal = document.createElement('span');
                cerrarModal.innerHTML=`<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <line x1="18" y1="6" x2="6" y2="18" />
                                        <line x1="6" y1="6" x2="18" y2="18" />
                                        </svg>`;
                
                cerrarModal.classList.add('cerrarModal');
                cerrarModal.onclick = function(){
                    const body = document.querySelector('body');
                    body.removeAttribute('style');
                    overlay.remove();
                }
                overlay.appendChild(cerrarModal);

                overlay.onclick= function(event){
                    const isClicInsideOverlay = mapLeaflet.contains(event.target);
                    if(!isClicInsideOverlay) {
                        const body = document.querySelector('body');
                        body.removeAttribute('style');
                        overlay.remove();
                    }
                };
               
            } 
        </script>

    <?php
    }
}

/**
 * 
 * registro de script y estilos en la pagina
 * @return void
 */

add_action( 'wp_head', 'serasur_sucursales_styles_mapael' );
add_action( 'wp_footer', 'serasur_sucursales_script_mapael' );
add_action( 'wp_footer', 'serasur_sucursales_script_leaflef' );

add_action( 'admin_head', 'serasur_sucursales_styles_mapael' );
add_action( 'admin_head', 'serasur_sucursales_script_mapael' );
add_action( 'admin_head', 'serasur_sucursales_script_leaflef' );


