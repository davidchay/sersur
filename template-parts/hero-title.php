<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$page = get_queried_object();
$featured_img_url = get_the_post_thumbnail_url($page->ID,'full'); 
if(is_archive()){
    $featured_img_url = get_theme_mod('serasur_cover_archivos_setting'); 
}else if(is_search()){
    $featured_img_url = get_theme_mod('serasur_cover_search_setting');; //default image 
}
else if(is_page_template( 'page-templates/user-profile.php' )) {
    $featured_img_url = get_theme_mod('serasur_cover_perfil_setting');; //default 

}
else if(is_post_type_archive( 'documentos' )) {
    $featured_img_url = get_theme_mod('serasur_cover_documentos_setting');; //default image 
}

?>

<?php if($featured_img_url): ?>
    <?php if(is_page() || is_single()): ?>
        <header id="hero" class="entry-header relative h-[20rem] lg:h-[28rem] bgImage" style="background-image:url('<?php echo $featured_img_url ; ?>')">
    <?php else: ?>
        <div id="hero" class="entry-header relative h-[20rem] lg:h-[28rem] bgImage" style="background-image:url('<?php echo $featured_img_url ; ?>')">
    <?php endif; ?>    
<?php else: ?>
    <?php if(is_page() || is_single()): ?>
        <header id="hero" class="entry-header relative h-[20rem] lg:h-[28rem] bg-primary" >
    <?php else: ?>
        <div id="hero" class="entry-header relative h-[20rem] lg:h-[28rem] bg-primary" >
    <?php endif; ?>    
                    
<?php endif; ?>
        <div id="hero-overlay" class="overlay absolute inset-0 bg-gradient-to-r from-primary to-secondary  opacity-50">
        </div> 
        <div id="hero-content" class="absolute w-full h-full 
                                      flex flex-col justify-center content-center inset-0 page-header text-center text-white  bg-secondary   bg-opacity-25  shadow-inner" >
                
                        <h1 class="entry-title  text-3xl lg:text-5xl font-bold leading-tight">
                            <?php 
                                if( is_home() || is_single() ){
                                    single_post_title();
                                    
                                }else if(is_post_type_archive( 'documentos' )) {
                                    echo "Documentos";
                                }
                                else if(is_archive()){
                                    the_archive_title();
                                    // the_archive_description( '<div class="taxonomy-description text-xl mt-3">', '</div>' );
                    
                                }else if(is_search()){
                                    printf(
                                        /* translators: %s: query term */
                                        esc_html__( 'Resultados de la busqueda: %s', 'understrap' ),
                                        '<span class="text-2xl lg:text-5xl font-bold leading-tight block mt-2">' . get_search_query() . '</span>'
                                    );
                                }
                                else{
                                    the_title(); 
                                }

                                ?>
                        </h1>
                        <?php if(is_single() && 'post' == get_post_type()){ ?>
                            <time datetime="<?php echo get_the_date( 'c' ); ?>" itemprop="datePublished" class="flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <?php echo get_the_date(); ?>
                            </time>
                        <?php } ?>
                        
                        <?php the_breadcrumb(); ?>
                
        </div>

<?php if(is_page() || is_single()): ?>
    </header>
<?php else: ?>
    </div>
<?php endif; ?>    

