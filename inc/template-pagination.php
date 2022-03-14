<?php
/**
 * Custom pagination for the posts and comments
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Tobias
 */

function tobias_posts_pagination( $args = array() ) {
    
    $defaults = array(
        'range'           => 5,
        'custom_query'    => false,
        'previous_string' => __( 'Prev', 'tobias' ),
        'next_string'     => __( 'Next', 'tobias' ),
        'before_output'   => '<nav class="mt-5" aria-label="Posts Navigation"><ul class="pagination justify-content-center">',
        'after_output'    => '</ul></nav>'
    );
    
    $args = wp_parse_args( 
        $args, 
        apply_filters( 'tobias_posts_pagination_defaults', $defaults )
    );
    
    $args['range'] = (int) $args['range'] - 1;
    if ( !$args['custom_query'] ) {
        $args['custom_query'] = @$GLOBALS['wp_query'];
    }
    $count = (int) $args['custom_query']->max_num_pages;
    $page  = intval( get_query_var( 'paged' ) );
    $ceil  = ceil( $args['range'] / 2 );
    
    if ( $count <= 1 ) {
        return false;
    }
    
    if ( !$page ) {
        $page = 1;
    }
    
    if ( $count > $args['range'] ) {
        if ( $page <= $args['range'] ) {
            $min = 1;
            $max = $args['range'] + 1;
        } elseif ( $page >= ($count - $ceil) ) {
            $min = $count - $args['range'];
            $max = $count;
        } elseif ( $page >= $args['range'] && $page < ($count - $ceil) ) {
            $min = $page - $ceil;
            $max = $page + $ceil;
        }
    } else {
        $min = 1;
        $max = $count;
    }
    
    $output = '';
    $previous = intval($page) - 1;
    $previous = esc_attr( get_pagenum_link($previous) );
    
    $firstpage = esc_attr( get_pagenum_link(1) );
    if ( $firstpage && (1 != $page) ) {
        $output .= '<li class="page-item d-none d-sm-inline-block first"><a href="' . $firstpage . '" title="' . __( 'First Page', 'tobias') . '" class="page-link"><i class="fa-solid fa-chevron-left d-none d-sm-inline-block"></i><i class="fa-solid fa-chevron-left d-none d-sm-inline-block"></i> ' . __( 'First', 'tobias' ) . '</a></li>';
    }

    if ( $previous && (1 != $page) ) {
        $output .= '<li class="page-item previous"><a href="' . $previous . '" title="' . __( 'Previous Page', 'tobias') . '" class="page-link"><i class="fa-solid fa-chevron-left d-none d-sm-inline-block"></i> ' . $args['previous_string'] . '</a></li>';
    }
    
    if ( !empty($min) && !empty($max) ) {
        for( $i = $min; $i <= $max; $i++ ) {
            if ($page == $i) {
                $output .= '<li class="page-item active"><span class="page-link">' . str_pad( (int)$i, 1, '0', STR_PAD_LEFT ) . '</span></li>';
            } else {
                $output .= sprintf( '<li class="page-item"><a href="%s" class="page-link">%001d</a></li>', esc_attr( get_pagenum_link($i) ), $i );
            }
        }
    }
    
    $next = intval($page) + 1;
    $next = esc_attr( get_pagenum_link($next) );
    if ($next && ($count != $page) ) {
        $output .= '<li class="page-item next"><a href="' . $next . '" title="' . __( 'Next Page', 'tobias') . '" class="page-link">' . $args['next_string'] . ' <i class="fa-solid fa-chevron-right d-none d-sm-inline-block"></i></a></li>';
    }
    
    $lastpage = esc_attr( get_pagenum_link($count) );
    if ( $lastpage && ($count != $page) ) {
        $output .= '<li class="page-item d-none d-sm-inline-block last"><a href="' . $lastpage . '" title="' . __( 'Last Page', 'tobias') . '" class="page-link">' . __( 'Last', 'tobias' ) . ' <i class="fa-solid fa-chevron-right d-none d-sm-inline-block"></i><i class="fa-solid fa-chevron-right d-none d-sm-inline-block"></i></a></li>';
    }

    if ( !empty($output) ) {
        echo $args['before_output'] . $output . $args['after_output'];
    }
}

function tobias_comments_navigation( $args = array() ) {
	$output = '';
    
	// Are there comments to navigate through?
	if ( get_comment_pages_count() > 1 ) {

		// Make sure the nav element has an aria-label attribute: fallback to the screen reader text.
		if ( ! empty( $args['screen_reader_text'] ) && empty( $args['aria_label'] ) ) {
			$args['aria_label'] = $args['screen_reader_text'];
		}

		$args = wp_parse_args(
			$args,
			array(
				'prev_text'          => __( '<i class="fa-solid fa-chevron-left"></i> Older comments' ),
				'next_text'          => __( 'Newer comments <i class="fa-solid fa-chevron-right"></i>' ),
				'screen_reader_text' => __( 'Comments navigation' ),
				'aria_label'         => __( 'Comments' ),
				'class'              => 'comment-navigation',
                'row_class'          => 'mt-4',
			)
		);

		$prev_link = get_previous_comments_link( $args['prev_text'] );
		$next_link = get_next_comments_link( $args['next_text'] );

        $output .= '<div class="row '. $args['row_class'] .'"><div class="col-6  nav-previous"><div class="float-start">';

		if ( $prev_link ) {
			$output .= $prev_link;
		}

        $output .= '</div></div><div class="col-6 nav-next"><div class="float-end">';

		if ( $next_link ) {
			$output .=  $next_link;
		}

        $output .= '</div></div></div>';

		$output = _navigation_markup( $output, $args['class'], $args['screen_reader_text'], $args['aria_label'] );
	}

	echo $output;
}