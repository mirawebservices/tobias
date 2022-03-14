<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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

				<?php get_search_form(); ?>
				
				<hr />

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
