<?php
 $options = get_query_var( 'options' );
 $category = (isset($options['hidden_cat'])) ? !$options['hidden_cat'] : true;
 $date = (isset($options['hidden_date'])) ? !$options['hidden_date'] : true;
 
 $post_categories = get_post_primary_category($post->ID, 'category'); 
 $primary_category = $post_categories['primary_category'];
 
 
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'mb-12 bg-white rounded-lg shadow-lg  hover:shadow-xl ease-in-out transition delay-150 ' ); ?>>
	<div class="feature-post relative">
		<?php if(get_the_post_thumbnail_url(get_the_ID(),'full')): ?>
			<img class="w-full block <?php echo (is_blog()) ? 'h-96' : 'h-64'; ?> mx-h-96" 
			src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>" alt="">
			<a class="absolute z-50 inset-0 opacity-0 flex justify-center text-white items-center hover:opacity-100 hover:bg-primary/40 transition-opacity delay-150 ease-linear"
				href="<?php echo esc_url( get_permalink() ); ?>" 
				title="<?php echo __(get_the_title()); ?>" >
				<svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
				<path stroke-linecap="round" stroke-linejoin="round" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
				</svg>
			</a>
		<?php endif; ?>
	</div>
	<div class="content-post p-8">

	
		<header class="entry-header mb-4 pb-4">
			<?php if($category): ?>
			<a class="uppercase font-bold text-primary tracking-wide" href="<?php echo esc_url( get_category_link( $primary_category->term_id ) ) ?>" title="<?php echo  $primary_category->name ; ?>"><?php echo  $primary_category->name ; ?></a>
			<?php endif; ?>
			<?php the_title( sprintf( '<h2 class="entry-title text-2xl md:text-3xl font-bold leading-tight mb-1"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			<?php if($date): ?>
			<time datetime="<?php echo get_the_date( 'c' ); ?>" itemprop="datePublished" class="flex justify-start items-center">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
					<path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
				</svg>

				<?php echo get_the_date(); ?>
			</time>
			<?php endif; ?>
		</header>

		
		<div class="entry-content">
			<?php
			the_excerpt();
			

			
			?>
		</div>

	</div>

</article>
