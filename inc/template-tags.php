<?php
/**
 * Custom template tags for this theme
 *
 * @package Tobias
 */

/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
if ( ! function_exists( 'tobias_entry_footer' ) ) {
	
	function tobias_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'tobias' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'tobias' ) . '</span><br />', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'tobias' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'tobias' ) . '</span><br />', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'tobias' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}

}

/**
 * Prints HTML with meta information for the current post-date/time.
 */
if ( ! function_exists( 'tobias_posted_on' ) ) {

	function tobias_posted_on( $postDate ) {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( $postDate ) ),
			esc_html( get_the_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Published on %s', 'post date', 'tobias' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}

}

/**
 * Prints HTML with meta information for the current author.
 */
if ( ! function_exists( 'tobias_posted_by' ) ) {
	
	function tobias_posted_by( $authorID ) {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'tobias' ),
			'<a class="url fn n" href="' . esc_url( get_author_posts_url( $authorID ) ) . '">' . esc_html( get_author_name($authorID) ) . '</a>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}

}

/**
 * Shim for sites older than 5.2.
 *
 * @link https://core.trac.wordpress.org/ticket/12563
 */
if ( ! function_exists( 'wp_body_open' ) ) {
	
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}

}
