<?php
/**
 * Template part for displaying a breadcrumb.
 * For single posts, show the byline
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tobias
 */

?>

<div class="entry-breadcrumb py-3">
    <div class="container">
        <?php 
            if ( is_single() ) {
                tobias_posted_on( $post->post_date );
                tobias_posted_by( $post->post_author );
            } else {
                tobias_breadcrumb();
            }
        ?>
    </div>
</div>