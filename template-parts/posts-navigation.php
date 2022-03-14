<?php
/**
 * Template part for displaying the previous and next links in a single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tobias
 */

?>

<nav class="posts-navigation mt-4" role="navigation" aria-label="Posts">
    <h2 class="sr-only">Posts navigation</h2>
    <div class="row nav-links">
        <div class="col-6 py-4 nav-previous">
            <div class="float-start">
                <?php echo previous_post_link($format = '%link', $link = '<i class="fa-solid fa-chevron-left"></i> Prev<br />%title'); ?>
            </div>
        </div>
        <div class="col-6 py-4 nav-next">
            <div class="float-end text-end">
                <?php echo next_post_link($format = '%link', $link = 'Next <i class="fa-solid fa-chevron-right"></i><br />%title '); ?>
            </div>
    </div>
</nav>