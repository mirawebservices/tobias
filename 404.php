<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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

			<p><?php esc_html_e( 'It looks like nothing was found at this URL. The page may not exist, has been renamed, or has changed locations.', 'tobias' ); ?></p>

			<p><?php esc_html_e( 'Check your URL or perform a search below.', 'tobias' ); ?></p>

			<?php get_search_form(); ?>

			</div>
			
			<div id="secondary" class="col-lg-3 mt-3 mt-lg-0">

				<?php get_sidebar(); ?>

			</div>
		</div>
	</div>
</main>

<?php
get_footer();