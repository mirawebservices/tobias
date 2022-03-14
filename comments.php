<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tobias
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php

		if ( have_comments() ) :
			?>
			<h2 class="h3 comments-title">
				<?php
				$tobias_comment_count = get_comments_number();
				if ( '1' === $tobias_comment_count ) {
					printf(
						/* translators: 1: title. */
						esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'tobias' ),
						'<span>' . wp_kses_post( get_the_title() ) . '</span>'
					);
				} else {
					printf( 
						/* translators: 1: comment count number, 2: title. */
						esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $tobias_comment_count, 'comments title', 'tobias' ) ),
						number_format_i18n( $tobias_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						'<span>' . wp_kses_post( get_the_title() ) . '</span>'
					);
				}
				?>
			</h2>

			<?php tobias_comments_navigation(); ?>

			<ul class="comment-list">
				<?php
				wp_list_comments(
					array(
						'style'      => 'ul',
						'short_ping' => true,
						'avatar_size' => '60',
					)
				);
				?>
			</ul>

	<?php 
			$comments_nav_args = array(
				'row_class' => 'mb-3',
			);
			tobias_comments_navigation($comments_nav_args);


			// If comments are closed and there are comments, let's leave a little note, shall we?
			if ( ! comments_open() ) :
				?>
				<p><?php esc_html_e( 'Comments are closed.', 'tobias' ); ?></p>
				<?php
			endif;

		endif; // Check for have_comments().

		$comments_args = array(
			'fields' => array(
				'author' => '<fieldset class="form-group mb-2"><label for="author" class="mt-2">' . _x( 'Name*', 'tobias' ) . '</label> <input id="author" name="author" type="text" class="form-control" required="required" aria-required="true"></input><div class="invalid-feedback">Please enter your name.</div></fieldset>',
				'email' => '<fieldset class="form-group mb-2"><label for="email" class="mt-2">' . _x( 'Email*', 'tobias' ) . '</label> <input id="email" name="email" type="email" class="form-control" required="required" aria-required="true"></input><div class="invalid-feedback">Please enter your email address.</div></fieldset>',
				'url' => '<fieldset class="form-group mb-2"><label for="url" class="mt-2">' . _x( 'Website', 'tobias' ) . '</label> <input id="url" name="url" type="text" class="form-control"></input></fieldset>',
			),
			'comment_field' => '<fieldset class="form-group mb-2"><label for="comment">' . _x( 'Comment*', 'tobias' ) . '</label> <textarea id="comment" name="comment" class="form-control" rows="5" required="required" aria-required="true"></textarea><div class="invalid-feedback">Please enter a comment.</div></fieldset>',
			'label_submit' => 'Submit',
			'class_submit' => 'btn btn-primary',
			'class_form' => 'needs-validation',
			'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title h3 mt-0">',
			'title_reply_after' => '</h2>',
		);
		comment_form( $comments_args );

	?>

</div>
