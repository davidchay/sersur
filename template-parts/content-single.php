<?php 
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('border-b border-gray-200 pb-10'); ?>>
	
	<header class="entry-header mb-4 hidden">
		<?php the_title( sprintf( '<h2 class="entry-title text-2xl lg:text-5xl font-extrabold leading-tight mb-1">', esc_url( get_permalink() ) ), '</h2>' ); ?>
		<time datetime="<?php echo get_the_date( 'c' ); ?>" itemprop="datePublished" class="text-sm text-gray-700">
			
			<?php echo get_the_date(); ?>
		</time>
	</header>

	<div class="entry-content ">
		<?php the_content(); ?>

		<?php
			wp_link_pages(
				array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Páginas:', 'tailpress' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span class="py-2 px-3 mr-2 bg-secondary text-white rounded">',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'tailpress' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				)
			);
		?>
	</div>

</article>
