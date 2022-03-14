<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tobias
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( has_post_thumbnail() ) : ?>

		<div class="entry-thumbnail mb-3">
			<?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?>
		</div>
		
	<?php endif; ?>

	<div class="entry-content clearfix">
		<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'tobias' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
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

			tobias_entry_footer();

			get_template_part( 'template-parts/author', 'card' );
		?>
	</div>
</article>
