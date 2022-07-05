<?php
/**
 * The template for displaying search forms
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<label class="sr-only" for="s"><?php esc_html_e( 'Search', 'understrap' ); ?></label>
	<div class="flex items-center justify-center">
		<input class="text-lg w-full border px-4 py-2 " id="s" name="s" type="text"
			placeholder="<?php esc_attr_e( 'Buscar &hellip;', 'understrap' ); ?>" value="<?php the_search_query(); ?>">
		<span class="input-group-append">
			
			<input class="text-lg text-white border-primary-dark px-4 py-2 bg-primary hover:bg-primary-dark hover:cursor-pointer" id="searchsubmit" name="submit" type="submit"
			value="<?php esc_attr_e( 'Buscar', 'understrap' ); ?>">
		</span>
	</div>
</form>
