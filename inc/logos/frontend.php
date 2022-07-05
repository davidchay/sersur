<?php
/**
* enqueue swiper
* 
*/
function enqueue_swiper(){
  global $post;
  $theme = wp_get_theme();
  if ( (is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'logos-testimoniales')) 
      || (is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'logos-dependencias')) 
      || is_page_template( 'page-templates/Inicio.php' ) ) {

      if (!wp_script_is('https://unpkg.com/swiper@8/swiper-bundle.min.js', 'registered')) {
          wp_register_script( 'swiper',
              'https://unpkg.com/swiper@8/swiper-bundle.min.js', 
              array(), 
              $theme->get( 'Version' ) 
          );
          wp_enqueue_script( 'swiper' );
      }

      if (!wp_style_is('https://unpkg.com/swiper@8/swiper-bundle.min.css', 'registered')) {
          wp_register_style( 'swiper',
              'https://unpkg.com/swiper@8/swiper-bundle.min.css', 
              array(), 
              $theme->get( 'Version' ) 
          );
          wp_enqueue_style( 'swiper' );
      }

  }
}
add_action( 'wp_enqueue_scripts', 'enqueue_swiper' );

/**
* agregar configuracion de styles y script en wp_head 
*/
function styles_logos_carousel(){
  global $post;
  if ( (is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'logos-testimoniales')) 
    || (is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'logos-dependencias')) 
    || is_page_template( 'page-templates/Inicio.php' ) ) {
  
    
    ?>
    <!-- ESTOS SON LOS STYLES de logos carousel -->
   <style type="text/css">

    .swiper {
        width: 100%;
        height: 100%;
        margin-left: auto;
        margin-right: auto;
        
      }
      .swiper-wrapper {
         margin-bottom: 50px;
         
      }
      .swiper-pagination-bullet {
          opacity: 0.2;
          
          width: 13px;
          height: 13px;
      }

      .swiper-pagination-bullet-active {
          opacity: 1;
      }

      .swiper-slide {
        

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        
        align-items: center;
        justify-self: center;
        flex-direction: column;
        
        position: relative;

        width: 220px;

        height: 124px;

      }
     
      .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: contain !important;
       
      }
      
      .swiper-slide a {
        position: absolute;
        top:0;
        left:0;
        right: 0;
        bottom: 0;
        z-index: 49;
        display: block;
        width: 100%;
        height: 100%;
      }

      
      .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
      }
      




   </style> 
    <?php
  }
}

add_action( 'wp_head', 'styles_logos_carousel' );

function scripts_logos_carousel($grupo) {
    
    $row = cmb2_get_option('config-logos-'.$grupo.'', 'logo_'.$grupo.'_carousel_row');
    $velocity = cmb2_get_option('config-logos-'.$grupo.'', 'logo_'.$grupo.'_slider_velocity');
    $nav = cmb2_get_option('config-logos-'.$grupo.'', 'logo_'.$grupo.'_carousel_nav');
    $pages = cmb2_get_option('config-logos-'.$grupo.'', 'logo_'.$grupo.'_carousel_pages');
    if($row==='slide_2'){
      $row=2;
    }else {
      $row=1;
    }
    if(!$velocity){
      $velocity = 3000;
    }


    ?>
    <!-- scripts for <?php echo ucfirst($grupo); ?>  -->
  <script  type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
       const swiper<?php echo ucfirst($grupo); ?> = new Swiper(".lc-<?php echo $grupo; ?>", {
        
         spaceBetween: 30,
          
          
        <?php if( $row > 1 ): ?>
        slidesPerColumn: 1,
        slidesPerGroup :5,
        <?php endif; ?>

        <?php if( $row == 1 ): ?>
        loop: true, //error en grid
        rewind: true, //error en grid
        <?php endif; ?> 

        autoplay: {
          delay: <?php echo $velocity; ?>,//velocidad 900 - 2800 - 4000 
          disableOnInteraction: false,
        },
        grid: {
          fill: 'row',
          rows: <?php echo $row; ?>,
        },
        <?php if($nav): ?>
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        <?php endif; ?>

        <?php if($pages): ?>
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        <?php endif; ?>
        breakpoints: {
            // when window width is >= 480px
            480: {
            slidesPerView: 2,
            spaceBetween: 15
            },
            // when window width is >= 600px
            600: {
            slidesPerView: 3,
            spaceBetween: 20
            },
            // when window width is >= 782px
            782: {
            slidesPerView: 4,
            spaceBetween: 30
            },
            960: {
            slidesPerView: 5,
            spaceBetween: 25
            }
        }
      });
    }, false);
  </script>
  <?php
  
}


function scripts_logos_testimoniales() {
  global $post;
  if ( (is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'logos-testimoniales')) || is_page_template( 'page-templates/Inicio.php' ) ) {
    scripts_logos_carousel('testimoniales');
  }
}
function scripts_logos_dependencias() {
  global $post;
  if ( (is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'logos-dependencias')) || is_page_template( 'page-templates/Inicio.php' ) ) {
    scripts_logos_carousel('dependencias');
  }
}

add_action( 'wp_head', 'scripts_logos_testimoniales' );
add_action( 'wp_head', 'scripts_logos_dependencias' );

  /**
   * configuracion de enqueue cuando sea en template inicio.php y contenido shortcode
   */

/**
* funcion logoCarousel - shortcode
* configura los slides de cada grupo
*/
function logoCarousel($grupo) {
      
      
      $style = cmb2_get_option('config-logos-'.$grupo.'', 'logo_'.$grupo.'_slider_style');
      $rtl = cmb2_get_option('config-logos-'.$grupo.'', 'logo_'.$grupo.'_carousel_direction');
      $border = cmb2_get_option('config-logos-'.$grupo.'', 'logo_'.$grupo.'_logo_border');
      $rounded = cmb2_get_option('config-logos-'.$grupo.'', 'logo_'.$grupo.'_logo_rounded');
      $nav = cmb2_get_option('config-logos-'.$grupo.'', 'logo_'.$grupo.'_carousel_nav');
      $pages = cmb2_get_option('config-logos-'.$grupo.'', 'logo_'.$grupo.'_carousel_pages');

  
      if(!$style){
        //$style = 'style_1';
      }
      if($border){
        $border='logo-border';
      }
      if($rounded){
        $rounded='logo-rounded';
      }
      $args = array(  
          'post_type' => 'logos',
          'post_status' => 'publish',
          'orderby' => 'menu_order', 
          'order' => 'ASC', 
          'posts_per_page' => -1,
          'meta_key' => 'serasur_logo_grupo',
          'meta_value' => $grupo
      );
      $html = '';
      
      $loop = new WP_Query( $args ); 
      
      if($loop->have_posts()):
          while ( $loop->have_posts() ) : $loop->the_post(); 
          $src = get_post_meta( get_the_ID(), 'serasur_logo_image' , 1 );
          $bgColor = get_post_meta( get_the_ID(), 'serasur_logo_gbcolor' , 1 );
          $url = get_post_meta( get_the_ID(), 'serasur_logo_url' , 1 );
                  if($url){

                    $html .=  '
                    <div class="swiper-slide '.$border.' logo-hover-'.$style.' '.$rounded.' " style="background-color:'.$bgColor.';">
                        <a href="'.$url.'" rel="nofollow" target="blank" title="'.get_the_title().'">
                        </a>
                            <img src="'.$src.'" width="220" height="124" />
                        <span class="label">'. get_the_title() .'</span>     
                    </div>
                        ';
                  }else{

                    $html .=  '
                        <div class="swiper-slide '.$border.' logo-hover-'.$style.' '.$rounded.'  " style="background-color:'.$bgColor.';">
                            
                            <img src="'.$src.'" width="220" height="124" />
                            <span class="label" >'. get_the_title() .'</span>     

                        </div>
                        ';
                  }

      
          endwhile;
          wp_reset_postdata(); 
        endif;
        
        if($rtl !== 'rtl'){
          $rtl='';
        } 
        if($nav){
          $nav='<div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>';
        }
        if($pages){
          $pages='<div class="swiper-pagination"></div>';
        }
      
      return '
      <div class="swiper lc-'.$grupo.' " dir="'.$rtl.'" >
          <div class="swiper-wrapper">
          '. $html .'
          </div>
          '.$nav.'
          '.$pages.'
      </div>
      ';
}

function logoCarouselTestimoniales(){
  return logoCarousel('testimoniales');
}
function logoCarouselDependencias(){
  return logoCarousel('dependencias');
}

add_shortcode('logos-testimoniales', 'logoCarouselTestimoniales');
add_shortcode('logos-dependencias', 'logoCarouselDependencias');



 