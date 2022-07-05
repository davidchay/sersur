<?php 


if(!is_user_logged_in()) {
    wp_redirect( home_url(), 302 );
    exit();
}

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header(); ?>
<?php




$featured_img_url = ''; //custom image
 
	 $class="grid grid-cols-1 md:grid-cols-3 gap-8";
	// $col_span="md:col-span-2";
 
?>

<div class="wrapper">

	<?php get_template_part( 'template-parts/hero-title', get_post_format() ); ?>

	<div class="container my-8">
			
				<main class="site main   <?php echo $class; ?>">
					<?php if ( have_posts() ) : ?>
						<?php
				while ( have_posts() ) :
					the_post();
					?>
					<?php get_template_part( 'template-parts/content', 'documentos' ); ?>
					
					<?php endwhile; ?>
					
					<?php endif; ?>
					
					<!-- The pagination component -->
					<?php understrap_pagination(); ?>
				</main>
				
			
		
	</div><!-- container -->
</div><!-- wrapper -->
	<?php
get_footer();
