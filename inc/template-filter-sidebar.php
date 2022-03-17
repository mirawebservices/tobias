<?php
/**
 * By default, there's no generic hook to filter all widget content.
 * This function filters the content of an entire sidebar without the need
 * for each type of widget hook.
 * The primary purpose is to filter sidebar/widget content and apply Bootstrap
 * classes to output.
 *
 * @package Tobias
 */

function tobias_filter_sidebar( $sidebar ) {

    ob_start();

    $bool = dynamic_sidebar( $sidebar );
    $output = '';

    if ( $bool ) {
        $output = ob_get_contents();
        $output = add_bootstrap_classes($output);
    }

    ob_end_clean();

    echo $output;
    
}