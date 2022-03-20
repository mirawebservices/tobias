<?php
/**
 * Template Name: Featured Template
 *
 * This is a "Featured" template which includes a larger title section,
 * a full width layout, and which is meant to be used with more advanced designs/blocks.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tobias
 */

get_header();
?>

<main>
	<?php get_template_part( 'template-parts/title', '' ); ?>

	<?php get_template_part( 'template-parts/breadcrumb', '' ); ?>

	<div class="<?php tobias_page_container(); ?> my-3">
		<div class="row">
			<div id="primary" class="col-12">

				<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'page' );

						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					endwhile;
				?>
				
			</div>
		</div>
	</div>
</main>

<?php
get_footer();