<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Tobias
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link visually-hidden-focusable" href="#title"><?php esc_html_e( 'Skip to content', 'tobias' ); ?></a>

<header>
	<nav class="navbar navbar-expand navbar-dark bg-dark px-0 py-3 text-uppercase">
		<div class="container">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="navbar-brand">
				<?php tobias_theme_images( 'header_logo' ); ?>
			</a>

			<p class="site-description sr-only"><?php echo get_bloginfo( 'description', 'display' ); ?></p>

			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'container'      => '',
						'menu_id'        => 'primary-menu',
						'menu_class' 	 => 'navbar-nav me-auto d-none d-xl-flex',
						'walker' 		 => new Bootstrap_5_Walker_Nav_menu(),
						'fallback_cb'	 => false,
					)
				);
			?>

			<ul class="navbar-nav navbar-nav-secondary ml-auto align-items-center">
				<?php tobias_header_button(); ?>

				<li id="navbar-toggle" class="navbar-item menu-toggle align-middle ml-auto d-block cursor-pointer">
					<a data-bs-toggle="offcanvas" href="#sidenav" role="button" aria-controls="sidenav" aria-label="Menu toggle">
						<i class="fa-solid fa-bars fa-2x text-white"></i>
					</a>
				</li>					
			</ul>
		</div>
	</nav>

	<div class="offcanvas offcanvas-end" tabindex="-1" id="sidenav" aria-labelledby="sidenavLabel">
		<div class="offcanvas-header py-4">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php tobias_theme_images( 'mobile_logo' ); ?>
			</a>
			<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		</div>
		<div class="offcanvas-body">
			<?php get_search_form(); ?>
			
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-2',
						'container'      => 'nav',
						'menu_id'        => 'mobile-menu',
						'menu_class' 	 => 'mobile-menu list-group mt-3',
						'walker'		 => new Bootstrap_5_Walker_Nav_Mobile_menu(),
						'fallback_cb'	 => false,
					)
				);
			?>

			<?php 
				tobias_socials(
					array(
						'ul_class' => 'mt-5 mb-3 text-center'
					)
				);
			?>

			<p class="mb-0 text-center">&copy; <?php echo date('Y'); ?> <?php tobias_copyright(); ?></p>

		</div>
	</div>
</header>