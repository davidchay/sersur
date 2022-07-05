<?php 
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header(); 

?>

<div class="wrapper">
	
<?php get_template_part( 'template-parts/hero-title', get_post_format() ); ?>

	<div class="container ">
		<?php if ( have_posts() ) : ?>
			<main class="site main py-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 " >
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<?php get_template_part( 'template-parts/content', get_post_format() ); ?>

				<?php endwhile; ?>

			</main>
		<?php else: ?>
			<main class="site main  container" >
				<div class="h-48 p-8 border bg-white my-40 mx-auto max-w-content">

					<?php
				printf(
					'<p class="text-xl mb-5">%s<p>',
					esc_html__( 'Lo sentimos, pero no encontramos lo que buscabas. Por favor realiza otra busqueda.', 'erasur' )
				);
				get_search_form();
				?>
				</div>
			</main>
		<?php endif; ?>
				
		<!-- The pagination component -->
		<?php understrap_pagination(); ?>
		
	</div><!-- container -->
</div><!-- wrapper -->
	<?php
get_footer();
