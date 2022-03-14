<?php
/**
 * The template for displaying search forms
 *
 * @link https://developer.wordpress.org/reference/functions/get_search_form/
 *
 * @package Tobias
 */

?>

<form method="get" id="searchform" class="needs-validation" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search" novalidate>
    <div class="input-group">
        <input type="text" class="form-control" name="s" id="s" placeholder="<?php esc_attr_e( 'Search &hellip;', 'tobias' ); ?>" required="required" aria-label="Search" aria-describedby="search-button" aria-required="true" value="<?php echo get_search_query(); ?>">
        <button class="btn btn-primary" type="submit" id="search-button">Search</button>
        <div class="invalid-feedback">Please enter a search term.</div>
    </div>
</form>