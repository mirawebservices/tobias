<?php
/**
 * Template part for displaying a call-to-action above the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tobias
 */

if ( ! is_active_sidebar( 'footer-cta' ) ) {
	return;
}
?>

<aside>
	<div class="bg-primary">
		<div class="container py-5">
			<div class="row">
				<div class="col-lg-6 mx-auto">

					<?php tobias_filter_sidebar( 'footer-cta' );?>

				</div>
			</div>
		</div>
	</div>
</aside>