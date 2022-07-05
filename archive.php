<?php 
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header(); ?>
<?php

$featured_img_url = ''; //custom image
$class='';
$col_span='';
 if( is_blog()){
	 $class="grid grid-cols-1 md:grid-cols-3 gap-8";
	 $col_span="md:col-span-2";
 }
?>

<div class="wrapper">

	<?php get_template_part( 'template-parts/hero-title', get_post_format() ); ?>

	<div class="container my-8 <?php echo $class; ?>">
			
				<main class="site main  <?php echo $col_span; ?>">
					<?php if ( have_posts() ) : ?>
						<?php
				while ( have_posts() ) :
					the_post();
					?>
					<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
					
					<?php endwhile; ?>
					
					<?php endif; ?>
					
					<!-- The pagination component -->
					<?php understrap_pagination(); ?>
				</main>
				
			
		<?php if ( is_blog() && is_active_sidebar( 'sidebar-blog' ) ) : ?>
			<aside class="">
			
				<?php dynamic_sidebar( 'sidebar-blog' ); ?>
		
			</aside>
		<?php endif; ?>
	</div><!-- container -->
</div><!-- wrapper -->
	<?php
get_footer();
