<?php
/**
 * Function to display widgets in the footer
 * Number of widget areas and their respective column class
 * determined by which widget areas are active/have widgets
 *
 * @package Tobias
 */

if ( ! function_exists( 'tobias_footer_widgets' ) ) {

    function tobias_footer_widgets() {

        // Primary widget area array
        $footer_widget_areas =array( 
            array ( is_active_sidebar( 'footer-1' ), 'footer-1' ),
            array ( is_active_sidebar( 'footer-2' ), 'footer-2' ),
            array ( is_active_sidebar( 'footer-3' ), 'footer-3' ),
            array ( is_active_sidebar( 'footer-4' ), 'footer-4' )
        );

        // Which widget areas are active (true)
        $footer_widget_areas_count = array( 
            is_active_sidebar( 'footer-1' ),
            is_active_sidebar( 'footer-2' ),
            is_active_sidebar( 'footer-3' ),
            is_active_sidebar( 'footer-4' ),
        );

        // Count number of active widget areas and update column class
        if ( count( array_filter( $footer_widget_areas_count ) ) == 4 ) {
            $footer_col = 'col-6 col-md-3';
        } elseif ( count( array_filter( $footer_widget_areas_count ) ) == 3 ) {
            $footer_col = 'col-4';
        } elseif ( count( array_filter( $footer_widget_areas_count ) ) == 2 ) {
            $footer_col = 'col-6';
        } elseif ( count( array_filter( $footer_widget_areas_count ) ) == 1 ) {
            $footer_col = 'col-12';
        } else {
            $footer_col = false;
        }

        if ( $footer_col != false ) {
            echo '<div class="row g-4">';
        }

        foreach ( $footer_widget_areas as $footer_widget_area ) {

            if ( $footer_widget_area[0] == true ) {
                echo '<div class="'. $footer_col .'">';
                tobias_filter_sidebar( $footer_widget_area[1] );
                echo '</div>';
            }
            
        }

        if ( $footer_col != false ) {
            echo '</div>';
        }

    }

}