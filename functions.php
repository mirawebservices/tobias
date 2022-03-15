<?php
/**
 * Tobias functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Tobias
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '0.3.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tobias_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Tobias, use a find and replace
		* to change 'tobias' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'tobias', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// Register navigation menus
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'tobias' ),
	) );

	register_nav_menus( array(
		'menu-2' => esc_html__( 'Mobile', 'tobias' ),
	) );

	register_nav_menus( array(
		'menu-3' => esc_html__( 'Footer Credits', 'tobias' ),
	) );

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Add support for different post formats.
	add_theme_support( 
		'post-formats',
		array( 
			'aside',
			'audio',
			'chat',
			'gallery',
			'image',
			'link',
			'quote',
			'status',
			'video',
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

}
add_action( 'after_setup_theme', 'tobias_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tobias_widgets_init() {

	// Sidebar widget area
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'tobias' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'tobias' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		)
	);

	// Footer CTA widget area
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer CTA', 'tobias' ),
			'id'            => 'footer-cta',
			'description'   => esc_html__( 'Add widgets here.', 'tobias' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		)
	);


	// Footer 1 widget area
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 1', 'tobias' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'tobias' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		)
	);

	// Footer 2 widget area
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 2', 'tobias' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'tobias' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		)
	);

	// Footer 3 widget area
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 3', 'tobias' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'tobias' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		)
	);

	// Footer 4 widget area
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 4', 'tobias' ),
			'id'            => 'footer-4',
			'description'   => esc_html__( 'Add widgets here.', 'tobias' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		)
	);
}
add_action( 'widgets_init', 'tobias_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function tobias_scripts() {
	wp_enqueue_style( 'tobias-style', get_template_directory_uri() . '/assets/css/style.min.css', array(), _S_VERSION );
	wp_enqueue_script( 'tobias-js', get_template_directory_uri() . '/assets/js/web.min.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tobias_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom pagination for the theme
 */
require get_template_directory() . '/inc/template-pagination.php';

/**
 * Custom filter for widget content
 */
require get_template_directory() . '/inc/template-filter-sidebar.php';

/**
 * Custom function for footer widgets
 */
require get_template_directory() . '/inc/template-footer-widgets.php';

/**
 * Custom functions for theme customizer and theme options
 */
require get_template_directory() . '/inc/template-customizer.php';

/**
 * WP_Nav_Menu walkers for Bootstrap Navbar elements and WP-generated menus.
 */
require get_template_directory() . '/inc/bootstrap-walkers.php';

/**
 * Replaced WordPress Generated CSS Classes with Bootstrap CSS Classes
 */
require get_template_directory() . '/inc/bootstrap-classes.php';

/**
 * Remove unneccessary scripts and styles
 */
remove_action('wp_head', 'print_emoji_detection_script', 7); 
remove_action('admin_print_scripts', 'print_emoji_detection_script'); 
remove_action('wp_print_styles', 'print_emoji_styles'); 
remove_action('admin_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
add_filter('feed_links_show_comments_feed', '__return_false');

/**
 * Remove wp-embed script
 */
function wpassist_dequeue_scripts(){
    wp_deregister_script('wp-embed');
} 
add_action( 'wp_enqueue_scripts', 'wpassist_dequeue_scripts' );

/**
 * Uncomment below to remove block library styles
 */
// function wpassist_remove_block_library_css(){
//     wp_dequeue_style( 'wp-block-library' );
// } 
// add_action('wp_enqueue_scripts', 'wpassist_remove_block_library_css');

