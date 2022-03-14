<?php
/**
 * Replaces "WordPress Generated Classes" with default Bootstrap classes
 *
 * @package Tobias
 */

function add_bootstrap_classes( $content ) {

    // Bail if there is no content to work with.
    if ( ! $content ) {
        return $content;
    }

    // Create an instance of DOMDocument.
    $dom = new \DOMDocument();

    // (Optional) Populate $dom with $content, making sure to handle UTF-8, otherwise
    // problems will occur with UTF-8 characters.
    // Also, make sure that the doctype and HTML tags are not added to our HTML fragment. http://stackoverflow.com/a/22490902/3059883
    //$libxml_previous_state = libxml_use_internal_errors( true );
    //$dom->loadHTML( mb_convert_encoding( $content, 'HTML-ENTITIES', 'UTF-8' ), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD );
    //libxml_use_internal_errors( $libxml_previous_state );

    // (Standard) Populate $dom with just $content and trim implied html/body elements
    $dom->loadHTML( mb_convert_encoding( $content, 'HTML-ENTITIES', 'UTF-8' ), LIBXML_HTML_NODEFDTD );
    $trim_off_front = strpos($dom->saveHTML(),'<body>') + 6;
    $trim_off_end = (strrpos($dom->saveHTML(),'</body>')) - strlen($dom->saveHTML());

    // Create an instance of DOMXpath.
    $xpath = new \DOMXpath( $dom );

    /**
     * 
     * Images
     * 
     */
    // Add img-fluid to all images
    $imgs = $xpath->query( '//img' );
    foreach ( $imgs as $img ) {
        $existing_class = $img->getAttribute( 'class' );
        $new_class = $existing_class . ' img-fluid';
        $new_class = trim($new_class);
        $img->setAttribute( 'class', "{$new_class}" );
    }

    /**
     *
     * Alignments
     * 
     */
    // Remove aligncenter and replace with text-center
    // $aligncenters = $xpath->query( '//*[contains(@class, "aligncenter")]' );
    // foreach ( $aligncenters as $aligncenter ) {
    //     $existing_class = $aligncenter->getAttribute( 'class' );
    //     $new_class = str_replace('aligncenter', 'd-block mx-auto text-center', $existing_class);
    //     $aligncenter->setAttribute( 'class', "{$new_class}" );
    // }

    // // Remove alignleft and replace with float-start
    // $alignlefts = $xpath->query( '//*[contains(@class, "alignleft")]' );
    // foreach ( $alignlefts as $alignleft ) {
    //     $existing_class = $alignleft->getAttribute( 'class' );
    //     $new_class = str_replace('alignleft', 'float-start me-3', $existing_class);
    //     $alignleft->setAttribute( 'class', "{$new_class}" );
    // }

    // // Remove alignright and replace with float-end
    // $alignrights = $xpath->query( '//*[contains(@class, "alignright")]' );
    // foreach ( $alignrights as $alignright ) {
    //     $existing_class = $alignright->getAttribute( 'class' );
    //     $new_class = str_replace('alignright', 'float-end ms-3', $existing_class);
    //     $alignright->setAttribute( 'class', "{$new_class}" );
    // }

    /**
     *
     * Figures
     * 
     */
    // Add additional classes to each figure
    $figures = $xpath->query( '//figure' );
    foreach ( $figures as $figure ) {
        $existing_class = $figure->getAttribute( 'class' );
        $new_class = $existing_class . ' figure';
        $new_class = trim($new_class);
        $figure->setAttribute( 'class', "{$new_class}" );
    }
    
    // Add additional classes to each figure image
    $figimages = $xpath->query( '//figure//img' );
    foreach ( $figimages as $figimage ) {
        $existing_class = $figimage->getAttribute( 'class' );
        $new_class = $existing_class . ' figure-image';
        $new_class = trim($new_class);
        $figimage->setAttribute( 'class', "{$new_class}" );
    }

    // Add additional classes to each figcaption
    $figcaptions = $xpath->query( '//figure//figcaption' );
    foreach ( $figcaptions as $figcaption ) {
        $existing_class = $figcaption->getAttribute( 'class' );
        $new_class = $existing_class . ' figure-caption';
        $new_class = trim($new_class);
        $figcaption->setAttribute( 'class', "{$new_class}" );
    }

    /**
     * 
     * Tables
     * 
     */
    // Add additional classes to each table
    $tables = $xpath->query( '//table' );
    foreach ( $tables as $table ) {
        $existing_class = $table->getAttribute( 'class' );
        $new_class = $existing_class . ' table';
        $new_class = trim($new_class);
        $table->setAttribute( 'class', "{$new_class}" );
    }

    /**
     * 
     * Blockquotes
     * 
     */
    // Add additional classes to each blockquote
    $blockquotes = $xpath->query( '//blockquote' );
    foreach ( $blockquotes as $blockquote ) {
        $existing_class = $blockquote->getAttribute( 'class' );
        $new_class = $existing_class . ' blockquote';
        $new_class = trim($new_class);
        $blockquote->setAttribute( 'class', "{$new_class}" );
    }

    /**
     * 
     * Form Fields
     * 
     */
    // Add additional classes to each text input
    $input_texts = $xpath->query( '//input[@type="text"]' );
    foreach ( $input_texts as $input_text ) {
        $existing_class = $input_text->getAttribute( 'class' );
        $new_class = $existing_class . ' form-control';
        $new_class = trim($new_class);
        $input_text->setAttribute( 'class', "{$new_class}" );
    }

    // Add additional classes to each search input
    $input_searches = $xpath->query( '//input[@type="search"]' );
    foreach ( $input_searches as $input_search ) {
        $existing_class = $input_search->getAttribute( 'class' );
        $new_class = $existing_class . ' form-control';
        $new_class = trim($new_class);
        $input_search->setAttribute( 'class', "{$new_class}" );
    }

    // Add additional classes to each select
    $selects = $xpath->query( '//select' );
    foreach ( $selects as $select ) {
        $existing_class = $select->getAttribute( 'class' );
        $new_class = $existing_class . ' form-select';
        $new_class = trim($new_class);
        $select->setAttribute( 'class', "{$new_class}" );
    }

    // Add additional classes to each textarea
    $textareas = $xpath->query( '//textarea' );
    foreach ( $textareas as $textarea ) {
        $existing_class = $textarea->getAttribute( 'class' );
        $new_class = $existing_class . ' form-control';
        $new_class = trim($new_class);
        $textarea->setAttribute( 'class', "{$new_class}" );
    }

    // Modifications to post password form input
    $post_password_form__buttons  = $xpath->query( '//form[contains(@class, "post-password-form")]//input[@type="password"]' );
    foreach ( $post_password_form__buttons as $post_password_form__button ) {
        $existing_class = $post_password_form__button->getAttribute( 'class' );
        $new_class = $existing_class . ' form-control';
        $new_class = trim($new_class);
        $post_password_form__button->setAttribute( 'class', "{$new_class}" );
    }

    /**
     * 
     * WP Block Search Form
     * 
     */
    // Add class and attributes to form tag
    $forms  = $xpath->query( '//form[contains(@class, "wp-block-search")]' );
    foreach ( $forms as $form ) {
        $existing_class = $form->getAttribute( 'class' );
        $new_class = $existing_class . ' needs-validation';
        $new_class = trim($new_class);
        $form->setAttribute( 'class', "{$new_class}" );
        $form->setAttribute( 'novalidate', "" );
    }

    /**
     * 
     * Buttons
     * 
     */
    // Remove wp-block-button and replace btn btn-primary
    $wp_block_button__links = $xpath->query( '//*[contains(@class, "wp-block-button")]//a' );
    foreach ( $wp_block_button__links as $wp_block_button__link ) {
        $existing_class = $wp_block_button__link->getAttribute( 'class' );
        $new_class = str_replace('wp-block-button__link', 'btn btn-primary', $existing_class);
        $wp_block_button__link->setAttribute( 'class', "{$new_class}" );
    }

    // Remove is-style-outline and replace with btn btn-outline-primary
    $is_style_outline__links = $xpath->query( '//*[contains(@class, "is-style-outline")]//a' );
    foreach ( $is_style_outline__links as $is_style_outline__link ) {
        $existing_class = $is_style_outline__link->getAttribute( 'class' );
        $new_class = str_replace('btn-primary', 'btn btn-outline-primary', $existing_class);
        $is_style_outline__link->setAttribute( 'class', "{$new_class}" );
    }

    // Remove is-style-squared and replace with btn btn-primary rounded-0
    $is_style_squared__links = $xpath->query( '//*[contains(@class, "is-style-squared")]//a' );
    foreach ( $is_style_squared__links as $is_style_squared__link ) {
        $existing_class = $is_style_squared__link->getAttribute( 'class' );
        $new_class = $existing_class . ' rounded-0';
        $new_class = trim($new_class);
        $is_style_squared__link->setAttribute( 'class', "{$new_class}" );
    }

    // Modifications to search widget button
    $wp_block_search__buttons  = $xpath->query( '//button[contains(@class, "wp-block-search__button")]' );
    foreach ( $wp_block_search__buttons as $wp_block_search__button ) {
        $existing_class = $wp_block_search__button->getAttribute( 'class' );
        $new_class = str_replace('wp-block-search__button', 'btn btn-primary', $existing_class);
        $wp_block_search__button->setAttribute( 'class', "{$new_class}" );
    }

    // Modifications to post password form button
    $post_password_form__buttons  = $xpath->query( '//form[contains(@class, "post-password-form")]//input[@type="submit"]' );
    foreach ( $post_password_form__buttons as $post_password_form__button ) {
        $existing_class = $post_password_form__button->getAttribute( 'class' );
        $new_class = $existing_class . ' btn btn-primary';
        $new_class = trim($new_class);
        $post_password_form__button->setAttribute( 'class', "{$new_class}" );
    }

    /**
     * 
     * Accessibility
     * 
     */
    // Remove screen-reader-text and replace with sr-only
    $screen_reader_texts = $xpath->query( '//*[contains(@class, "screen-reader-text")]' );
    foreach ( $screen_reader_texts as $screen_reader_text ) {
        $existing_class = $screen_reader_text->getAttribute( 'class' );
        $new_class = str_replace('screen-reader-text', 'sr-only', $existing_class);
        $screen_reader_text->setAttribute( 'class', "{$new_class}" );
    }

    // Save and return updated HTML.
    $new_content = substr($dom->saveHTML(), $trim_off_front, $trim_off_end);
    return $new_content;

}

add_filter( 'the_content', 'add_bootstrap_classes', 9999 );
add_filter( 'navigation_markup_template', 'add_bootstrap_classes', 9999 );
add_filter( 'edit_post_link', 'add_bootstrap_classes', 9999 );
add_filter( 'comment_text', 'add_bootstrap_classes', 9999 );