<?php
/**
 * Template Name: SERASUR: Página de inicio
 *
 * Template for displaying the home custom page.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<?php

$page_id = get_queried_object_id();

/*Seccion HERO */
$hero = get_post_meta( $page_id, 'serasur_inicio_hero_section', true )[0];


/**Seccion acerca de nosotros */
$acercade =  get_post_meta( $page_id, 'serasur_inicio_about_section', true )[0];



/** Nuestros servicios */
$servicios =  get_post_meta( $page_id, 'serasur_inicio_servicios_section', true )[0];

/** ¿por qué elegirnos? */
 $porque =  get_post_meta( $page_id, 'serasur_inicio_porque_section', true )[0];

if(!$porque['imagen_bg']){
     $porque['imagen_bg'] = get_stylesheet_directory_uri() .'/images/hombre-checando-inventario.jpg';
}

/** sucursales */
$sucursales =  get_post_meta( $page_id, 'serasur_inicio_sucursales_section', true )[0];


/** colaboracion */
$colaboracion =  get_post_meta( $page_id, 'serasur_inicio_testimonial_section', true )[0];


/** colaboracion */
$blog =  get_post_meta( $page_id, 'serasur_inicio_blog_section', true )[0];


/** dependencias */
$dependencias =  get_post_meta( $page_id, 'serasur_inicio_dependencias_section', true )[0];


/** contacto */
$contacto =  get_post_meta( $page_id, 'serasur_inicio_contacto_section', true )[0];


?>

<?php get_header(); ?>

<div class="wrapper">
<main>
    <div id="hero-video" class="section relative overflow-hidden  h-[35rem] lg:h-[50rem] h-max-[60rem] ">
        <video class="absolute inset-0  w-auto min-w-full min-h-full max-w-none " autoplay muted loop  poster="<?php echo esc_url(get_stylesheet_directory_uri() . '/images/video-poster.jpg'); ?>">
            <source src="<?php echo esc_url(get_stylesheet_directory_uri() . '/videos/serasur-portada.mp4'); ?>" type="video/mp4">
            <source src="<?php echo esc_url(get_stylesheet_directory_uri() . '/videos/serasur-portada.webm'); ?>" type="video/webm">
            <source src="<?php echo esc_url(get_stylesheet_directory_uri() . '/videos/serasur-portada.ogv'); ?>" type="video/ogv">

        </video>
        <div class="overlay absolute  inset-0 bg-gradient-to-r from-secondary to-primary opacity-50">
        </div>

        <div class="absolute w-full h-full inset-0 ">
            <div class="container  flex place-items-center h-full  text-white " >
                <div class="content w-auto lg:w-1/2 wow animate__animated animate__fadeInUp">
                    <h1 class="text-3xl md:text-4xl lg:text-6xl font-title block  font-bold uppercase ">
                        <?php echo esc_html($hero['titulo']);?>

                    </h1>
                    <p class="text-xl mt-1 mb-7 -lg:my-10">
                        <?php echo esc_html($hero['subtitulo']) ; ?>
                    </p>
                    <a href="<?php echo get_permalink( $hero['url_boton']); ?>"  
                    class="px-6 
                py-3 
                text-center 
                mx-auto 
                uppercase  
                bg-primary text-white
                tracking-wider
                hover:bg-primary-dark
                transition-all ease-in-out delay-150">
                    <?php echo esc_html($hero['texto_boton']); ?>
                    </a>
                </div>
            </div><!-- .container -->
        </div>

       

    </div><!-- hero-video -->

    <?php if ( $acercade['active'] ) : ?>
    <div id="acerca-nosotros" class="seccion">
        <div class="container grid grid-cols-1 items-center md:grid-cols-2 gap-10">
            <div class="image-feature wow animate__animated animate__bounceInLeft">
                <div class="image relative ml-auto w-full lg:w-10/12">
                    <div class="absolute h-full w-full -bottom-3 -left-3 z-0  bg-primary lg:-bottom-7 lg:-left-7"></div>
                    <?php if(!$acercade['imagen']) : ?>
                    <img class="relative block z-10" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/images/mujer-revisando-mercancia.jpg'); ?>" loading="lazy" alt="">
                    <?php else: ?>
                    <img class="relative block z-10" src="<?php echo $acercade['imagen']; ?>" loading="lazy" alt="">
                    <?php endif; ?>
                    
                </div>
            </div>
            <div class="text wow animate__animated animate__bounceInRight">
                <h3 class="subtitulo "><?php echo esc_html($acercade['subtitulo']); ?></h3>
                <h2 class="titulo ">
                    <?php echo esc_html($acercade['titulo']); ?>
                </h2>
                <div class="mb-10 entry-content text-base">
                    <?php echo $acercade['contenido']; ?>

                </div>
                <a href="<?php echo $acercade_url_boton; ?>"  
                    class="boton-verde wow  bounceInLeft">
                    <?php echo esc_html($acercade['texto_boton']); ?>
                    </a>
            </div>
        </div><!-- container -->

        <div class="container mt-28 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 ">
            <?php 
                if($acercade['titulo_mision']):
            ?>
            <div class="px-4 py-8 border-primary bg-white border-2 drop-shadow-md rounded-lg hover:drop-shadow-2xl wow animate__animated animate__bounceInLeft">
                <h2 class="font-bold text-2xl pb-2 border-b border-b-primary uppercase mb-5"><?php echo esc_html($acercade['titulo_mision']); ?></h2>
                <p class="text-lg">
                <?php echo esc_html($acercade['texto_mision']); ?>
                </p>   

            </div>
            <?php 
                endif;
            ?>
            <?php 
                if($acercade['titulo_vision']):
            ?>
            <div class="px-4 py-8 border-primary bg-white border-2 drop-shadow-md rounded-lg hover:drop-shadow-2xl wow animate__animated animate__bounceInUp">
                <h2 class="font-bold text-2xl pb-2 border-b border-b-primary uppercase mb-5"><?php echo esc_html($acercade['titulo_vision']); ?></h2>
                <p class="text-lg">
                <?php echo esc_html($acercade['texto_vision']); ?>
                </p>   

            </div>
            <?php 
                endif;
            ?>
            <?php 
                if($acercade['titulo_valores']):
            ?>
            <div class="px-4 py-8 border-primary bg-white border-2 drop-shadow-md rounded-lg hover:drop-shadow-2xl wow animate__animated animate__bounceInRight">
                <h2 class="font-bold text-2xl pb-2 border-b border-b-primary uppercase mb-5"><?php echo esc_html($acercade['titulo_valores']); ?></h2>
                <p class="text-lg">
                <?php echo esc_html($acercade['texto_valores']); ?>               
                </p>   

            </div>
            <?php 
                endif;
            ?>

        </div> <!-- container vision mision valores -->
    </div><!-- acerca de nosotros -->
    
    <?php endif; ?>



    <?php if ( $servicios['active'] ) : ?>
    <div id="nuestros-servicios" class="seccion-alt">
        <div class="container">

            <h3 class="subtitulo text-center wow animate__animated animate__fadeInUp"><?php echo esc_html($servicios['subtitulo']); ?></h3>
            <h2 class="titulo text-center wow animate__animated animate__fadeInUp">
            <?php echo esc_html($servicios['titulo']); ?>
            </h2>     
           
            <?php get_template_part( 'template-parts/inicio-grid-servicios', get_post_format() ); ?>

            <?php 
            $servicios_url =  cmb2_get_option( 'config-servicios', 'serasur_servicios_pagina' ) ;
           
            ?>
            <div class="flex wow animate__animated animate__bounceIn">
                <a href="<?php echo get_permalink( $servicios_url) ?>" class="
                px-6 
                py-3 
                text-center 
                mx-auto 
                uppercase  
                bg-primary text-white
                tracking-wider
                hover:bg-primary-dark
                transition-all ease-in-out delay-150
                ">
                <?php echo esc_html($servicios['texto_boton']); ?>
                </a>
            </div>
        </div>

    </div><!-- Nuestros servicios -->
    <?php endif; ?>

  
    <?php if ( $porque['active'] ) : ?>
    <div id="por-que-elegirnos" class="seccion relative bgImage bg-fixed " style="background-image:url('<?php echo $porque['imagen_bg']; ?>'">
        <div class="overlay absolute inset-0 bg-gradient-to-r from-secondary to-primary  opacity-75 z-0"></div>
        <div class="container z-10 relative">
            <div class="bg-white py-5 px-10 rounded-lg  lg:w-2/6 wow animate__animated animate__bounceInUp">

                <h3 class="subtitulo "><?php echo esc_html( $porque['subtitulo']  ); ?></h3>
                <h2 class="titulo ">
                <?php echo esc_html( $porque['titulo'] ); ?>
                </h2> 
                
                <?php echo do_shortcode('[caracteristicas-lista]'); ?>
            </div>
        </div>

    </div><!-- Por que elegirnos -->
    <?php endif; ?>
    
    

    <?php if ( $sucursales['active'] ) : ?>
    <div id="sucursales" class="seccion-alt">
        <div class="container">
            <h3 class="subtitulo text-center wow animate__animated animate__fadeInUp"><?php echo esc_html( $sucursales['subtitulo'] ); ?></h3>
            <h2 class="titulo text-center mb-20 wow animate__animated animate__fadeInUp">
            <?php echo esc_html( $sucursales['titulo'] ); ?>
            </h2>  
            <?php get_template_part( 'template-parts/inicio-grid-ubicaciones', get_post_format() ); ?>
            
        </div>
    </div>
    <?php endif; ?>

   

    <?php if ( $colaboracion['active'] ) : ?>
    <div id="logos-empresas" class="seccion">
        <div class="container">
            <h3 class="subtitulo text-center  wow animate__animated animate__fadeInUp"><?php echo esc_html( $colaboracion['subtitulo'] ); ?></h3>
            <h2 class="titulo text-center  wow animate__animated animate__fadeInUp">
            <?php echo esc_html( $colaboracion['titulo'] ); ?>
            </h2>  
            <div class="mt-20 wow animate__animated animate__bounceIn">
            <?php echo do_shortcode( '[logos-testimoniales]'); ?>
            </div>
            
        </div>
    </div>
    <?php endif; ?>

   

    <?php if ( $blog['active'] ) : ?>
    <div id="utimas-entradas" class="seccion-alt ">
        <div class="container">
            <h3 class="subtitulo text-center wow animate__animated animate__fadeInUp"><?php echo esc_html( $blog['subtitulo'] ); ?></h3>
            <h2 class="titulo text-center wow animate__animated animate__fadeInUp">
            <?php echo esc_html( $blog['titulo'] ); ?>
            </h2>  
            <div class="mt-20 wow animate__animated animate__bounceIn">
                <?php echo do_shortcode('[recent-posts]'); ?>
            </div>    
            <div class="flex">
                <a href="<?php echo $blog['url_boton'] ; ?>" class="
                px-6 
                py-3 
                text-center 
                mx-auto 
                uppercase  
                bg-primary text-white
                tracking-wider
                hover:bg-primary-dark
                transition-all ease-in-out delay-150
                ">
                <?php echo esc_html( $blog['texto_boton'] ); ?>

                </a>
            </div>
        </div>
    </div>
    <?php endif; ?>



    <?php if ( $dependencias['active'] ) : ?>
    <div id="logos-dependencias" class="seccion">
        <div class="container">
            <h3 class="subtitulo text-center wow animate__animated animate__fadeInUp"><?php echo esc_html($dependencias['subtitulo']); ?></h3>
            <h2 class="titulo text-center wow animate__animated animate__fadeInUp">
                <?php echo esc_html($dependencias['titulo']); ?>
            </h2>  
            <div class="mt-20 wow animate__animated animate__fadeIn">  
            <?php echo do_shortcode( '[logos-dependencias]'); ?>
            </div>
            
        </div>
    </div>
    <?php endif; ?>



    <?php if ( $contacto['active'] ) : ?>
    <div id="contacto" class="seccion-alt">
        <div class="container">
            <h3 class="subtitulo text-center wow animate__animated animate__fadeInUp"><?php echo esc_html($contacto['subtitulo']) ; ?></h3>
            <h2 class="titulo text-center wow animate__animated animate__fadeInUp">
            <?php echo esc_html($contacto['titulo']) ; ?>
            </h2>  
           
            <?php if ( $contacto['mostrar_datos'] ) : ?>
            <div class="my-20">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                
                    <?php get_template_part( 'template-parts/inicio-datos-contacto', get_post_format() ); ?>
                                   
                </div>  <!-- grid -->
            </div> <!-- my-20 -->
            <?php endif; ?>

            <?php if ( $contacto['mostrar_map_form'] ) : ?>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 wow animate__animated animate__bounceInLeft">
                <div class="bg-white rounded-lg p-5 border border-gray-100 shadow-lg ">
                    <h2 class="font-title text-2xl font-bold tracking-wide">Ubícanos en el mapa</h2>
                    <div class="w-full h-full pb-14 overflow-hidden mt-5" style="min-height: 350px;">
                        <?php echo do_shortcode('[mapa-ubicacion]'); ?>
                    </div>
                </div>
                <div class="bg-white rounded-lg p-5 border border-gray-100 shadow-lg wow animate__animated animate__bounceInRight">
                    <h2 class="font-title text-2xl font-bold tracking-wide">Contáctanos</h2>
                    <p class="text-lg text-gray-700">Será un gusto poder ayudarle</p>
                    <?php form_contact_inicio(); ?>
                </div>
            </div>
            <?php endif; ?>
            
        </div><!-- container -->
    </div><!-- contacto section -->
    <?php endif; ?>
</main>    

</div><!-- wrapper -->

<!-- botones emergentes -->
<div x-data="{toolShow:false}" x-init="setTimeout(() => toolShow = true, 1000)">
    <template x-if="toolShow">
    <div  x-data="{linksOpen:false}"  class="fixed bottom-4 left-4 z-50 " >
        <div x-show="linksOpen" class="">
            <a class="py-2 px-4 bg-black text-white text-sm mb-2 flex items-center rounded drop-shadow-lg" href="https://www.ventanillaunica.gob.mx/vucem/Ingreso.html" target="_blank">
                VUCEM
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                </svg>
            </a>
            <a class="py-2 px-4 bg-black text-white text-sm mb-2 flex items-center rounded drop-shadow-lg" href="https://www.sat.gob.mx/home" target="_blank">
                SAT
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2 inline-block " fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                </svg>
            </a>
            <a x-data="dof()" 
                x-init="fetch(url).then( response => response.json() ).then( json => { valor = json.ListaIndicadores[0] } )" 
                class="py-2 px-4 bg-black text-white text-sm mb-2 flex items-center relative rounded drop-shadow-lg" href="https://dof.gob.mx/indicadores.php" target="_blank">
                DOF
                <template x-if="valor.codTipoIndicador ===  158">
                    <span class="absolute inset-y-0 -right-28 flex items-center px-4 rounded  bg-red-500">
                        USD $<span x-text="valor.valor"></span>
                    </span>
                </template>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2 inline-block " fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                </svg>

            </a>
        </div>
    
        <button  @click="linksOpen = !linksOpen" class="bg-black text-white p-3 rounded drop-shadow-lg">
            <template x-if="!linksOpen">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
            </svg>
            </template>
            <template x-if="linksOpen">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </template>

        </button>
    </div>
    </template>
</div>    

<?php

get_footer();
