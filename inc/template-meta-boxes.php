<?php
/**
 * Functions to add meta boxes based on theme posts/pages.
 * Theoretically, this shold be converted to a react component.
 * However, there's currently no standard way to do that from a theme.
 * Traditional meta boxes also provide backwards compatibility and
 * compatibility with ClassicPress. 
 *
 * @package Tobias
 */

/**
 * Add "Page Container" meta box to Featured page template
 */
function tobias_page_container_meta() {

    global $post;

    if ( ! empty ( $post ) ) {
        $page_template = get_post_meta( $post->ID, '_wp_page_template', true );

        // Only add meta box to Featured Page template
        if( $page_template == 'page-featured.php' ) {
            add_meta_box(
                'page-container',
                'Page Container',
                'tobias_page_container_meta_html',
                'page',
                'side',
                'default'
            );
        }
    }

}
add_action('add_meta_boxes', 'tobias_page_container_meta');

/**
 * "Page Container" meta box HTML
 */
function tobias_page_container_meta_html( $post ) {

    $value = get_post_meta( $post->ID, '_tobias_page_container', true );
    ?>
    <select name="page_container" id="page_container" class="components-select-control__input">
        <option value="container" <?php selected( $value, 'container' ); ?>>Container</option>
        <option value="container-fluid" <?php selected( $value, 'container-fluid' ); ?>>Container Fluid</option>
        <option value="container-none" <?php selected( $value, 'container-none' ); ?>>No Container</option>
    </select>
    <?php

}

/**
 * Save "Page Container" meta data to "_tobias_page_container" meta key
 */
function tobias_page_container_meta_save( $post_id ) {

    if ( array_key_exists( 'page_container', $_POST ) ) {
        // Sanitize value even if in select box
        $sanitized_value = sanitize_text_field( $_POST['page_container'] );

        $valid_values = array(
            'container',
            'container-fluid',
            'container-none',
        );

        // Validate sanitized value against array of accepted values
        if( in_array( $sanitized_value, $valid_values ) ) {
            update_post_meta(
                $post_id,
                '_tobias_page_container',
                $sanitized_value
            );
        }

    }

}
add_action( 'save_post', 'tobias_page_container_meta_save' );