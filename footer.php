<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Tobias
 */

?>

<?php get_template_part( 'template-parts/footer', 'cta' ); ?>

<footer>
	<div class="container pt-5">
		<div class="row g-4">
			<div class="col-lg-3 pe-lg-5 mb-5 mb-lg-0 text-center">
				<a class="me-0" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<?php tobias_theme_images( 'footer_logo' ); ?>
				</a>

				<p class="my-3"><?php echo get_bloginfo('description'); ?></p>

				<?php 
					tobias_socials(
						array(
							'ul_class' => 'mb-0 mt-3'
						)
					);
				?>
			</div>

			<div class="col-lg-9 d-none d-md-block">

				<?php tobias_footer_widgets(); ?>

			</div>
		</div>

		<hr class="mt-0 mt-md-4 mb-0">

		<div class="py-3">
			<div class="container px-0">
				<div class="d-md-flex justify-content-between align-items-center py-3 text-center text-md-left">
					&copy; <?php echo date('Y'); ?> <?php tobias_copyright(); ?>

					<div class=" mt-3 mt-md-0">

						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-3',
									'container'      => '',
									'menu_id'        => 'policies',
									'menu_class' 	 => 'list-inline mb-0',
									'li_class'		 => 'list-inline-item',
									'link_class'	 => 'nav-link pe-0',
									'fallback_cb'	 => false,
								)
							);
						?>

					</div>
				</div>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
