<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tobias
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content clearfix">
		<?php
			the_content();
		?>
	</div>
	<div class="entry-footer mt-3">
		<?php
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'tobias' ),
					'after'  => '</div>',
				)
			);
		?>
	</div>
</article>
