<?php 
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('border-b border-gray-200 pb-10'); ?>>
	
	<header class="entry-header mb-4 hidden">
		<?php the_title( sprintf( '<h2 class="entry-title text-2xl lg:text-5xl font-extrabold leading-tight mb-1">', esc_url( get_permalink() ) ), '</h2>' ); ?>
		<!-- <time datetime="<?php echo get_the_date( 'c' ); ?>" itemprop="datePublished" class="text-sm text-gray-700">
			
			<?php echo get_the_date(); ?>
		</time> -->
	</header>

	<div class="entry-content ">
	<?php		
	$descripcion = get_post_meta( get_the_ID(), 'serasur_documento_descripcion', true );
	$url_file = get_post_meta( get_the_ID(), 'serasur_documento_archivo', true );
	$url_file = substr( $url_file, strpos($url_file, '/') );
	
	
	?>
	<p class="text-lg">
		<?php echo esc_html( $descripcion ); ?>
	</p>
	
	<?php  echo do_shortcode( '[pdfjs-viewer url='. $url_file.'  fullscreen=true fullscreen_text="Ver pantalla completa" fullscreen_target:true zoom:true download=true print=true]' ); ?> 
	
	 

	</div>

</article>
