<?php get_header(); ?>

<div class="wrapper">

	<!-- <div class="container"> -->
		<main >

			<?php if ( have_posts() ) : ?>
				
				<?php
				while ( have_posts() ) :

					the_post();
					?>

					<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php endwhile; ?>

			<?php endif; ?>
		</main>

<!-- </div> -->
<!-- container -->
</div><!-- wrapper -->

<?php
get_footer();
