<?php 
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	
	<?php get_template_part( 'template-parts/hero-title', get_post_format() ); ?>

	
	<div class="entry-content <?php if(is_page_template( 'page-templates/littlewidthpage.php' )) echo "mx-auto max-w-content "; ?>">
		<div class="container">
		
			<?php the_content(); ?>

			<?php
				wp_link_pages(
					array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'tailpress' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'tailpress' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
					)
				);
			?>

		</div><!--container-->
	</div>

</article>
