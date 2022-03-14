<?php
/**
 * Template part for displaying an author card
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tobias
 */

if ( is_author() ) {
    $author_id = get_queried_object_id();
} else {
    $author_id = get_the_author_meta( 'ID' );
}

$author_description = get_the_author_meta( 'description', $author_id );
$author_description_count = str_word_count( $author_description );
$author_display_name = get_the_author_meta( 'display_name', $author_id );
$author_url = get_author_posts_url( $author_id );
$author_website = get_the_author_meta( 'user_url', $author_id );
$author_image = get_avatar_url( $author_id );

// Skip if author description is empty
if ( empty ( $author_description ) ) {
    return;
}

// Change vertical alignment based on description length
if ($author_description_count < 100) {
    $align_items = 'align-items-center';
} else {
    $align_items = 'align-items-start';
}

// Add title if on single post
if ( is_single() ) {
    echo '<h2 class="h3 mt-3">About the Author</h2>';
}

?>

<div class="mb-3 entry-description">
    <div class="row <?php echo $align_items; ?>">
        <div class="col-md-2 p-2 mb-3 mb-md-0 text-center text-sm-left">
            <img src="<?php echo $author_image; ?>" class="img-fluid rounded-circle" alt="<?php echo $author_display_name; ?>">
        </div>
        <div class="col-md-10">
            <?php

                echo '<p>'. $author_description .'</p>';

                if ( !empty ($author_url) || is_single() ){

                    echo '<div class="mt-3">';

                    if ( is_single() ) {
                        echo '<span><a href="'. $author_url .'">View all posts <i class="fa-solid fa-chevron-right"></i></a></span>';
                    } else {
                        echo '<span>Website: <a href="'. $author_website .'">'. $author_website .'</a></span>';
                    }

                    echo '</div>';
                }

            ?>
        </div>
    </div>
</div>