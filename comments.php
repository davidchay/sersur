<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
/**
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area mt-10 ">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title text-2xl font-bold text-title">
			<?php
				printf(
					_nx( 'Un commentario', '%1$s commentarios', get_comments_number(), 'comments title', 'tailpress' ),
					number_format_i18n( get_comments_number() ),
					get_the_title()
				);
			?>
		</h2>

		<ol class="comment-list my-8 overflow-hidden">
			<?php
				wp_list_comments(
					array(
						'style'       => 'ol',
						'short_ping'  => true,
						'avatar_size' => 62,
					)
				);
			?>
		</ol>

	<?php endif; ?>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>

		<nav class="comment-navigation" id="comment-nav-above">

			<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'tailpress' ); ?></h1>

			<?php if ( get_previous_comments_link() ) { ?>
					<div class="nav-previous">
						<?php previous_comments_link( __( '&larr; Older Comments', 'tailpress' ) ); ?>
					</div>
			<?php } ?>

			<?php if ( get_next_comments_link() ) { ?>
				<div class="nav-next">
					<?php next_comments_link( __( 'Newer Comments &rarr;', 'tailpress' ) ); ?>
				</div>
			<?php } ?>

		</nav><!-- #comment-nav-above -->

	<?php endif; ?>

	<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'tailpress' ); ?></p>
	<?php endif; ?>

	<?php
	comment_form();
	?>

</div>
