<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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

					if ( have_posts() ) :

						/* Start the Loop */
						while ( have_posts() ) :

							the_post();

							get_template_part( 'template-parts/content', 'excerpt' );

						endwhile;

						tobias_posts_pagination();

				?>

				<?php

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
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
