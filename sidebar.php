<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Tobias
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside class="widget-area">
	<?php
		// See inc/template-filter-sidebar.php for details
		//dynamic_sidebar( 'sidebar-1' );
		tobias_filter_sidebar( 'sidebar-1' );
	?>
</aside>
