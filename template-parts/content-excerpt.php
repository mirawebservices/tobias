<?php
/**
 * Template part for displaying post excerpts on a blog index
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tobias
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('mb-3'); ?>>
	<div class="row">

		<?php if ( has_post_thumbnail() ) : ?>

			<div class="col-lg-4 order-lg-1 ps-lg-3 mb-3 mb-lg-0">
				<div class="entry-thumbnail">
					<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail( '', array('class' => 'img-fluid') ); ?></a>
				</div>
			</div>
			<div class="col-lg-8">

		<?php else: ?>
		
			<div class="col-lg-12">
			
		<?php endif; ?>

			<div class="entry-header">
				<?php
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

					if ( 'post' === get_post_type() ) :
				?>

						<div class="entry-meta mb-3">
							<?php
								tobias_posted_on( $post->post_date );
								tobias_posted_by( $post->post_author );
							?>
						</div>

					<?php endif; ?>
				</div>

			<div class="entry-content mb-3">
				<p><?php echo get_the_excerpt(); ?></p>
			</div>

			<div class="entry-footer">
				<?php tobias_entry_footer(); ?>
			</div>

		</div>
	</div>
</article>

<hr />