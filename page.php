<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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

	<div class="container my-3">
		<div class="row">
			<div id="primary" class="col-lg-9 pe-lg-3">

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
			<div id="secondary" class="col-lg-3 mt-3 mt-lg-0">

				<?php get_sidebar(); ?>

			</div>
		</div>
	</div>
</main>

<?php
get_footer();