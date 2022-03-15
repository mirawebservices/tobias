<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Tobias
 */

/**
 * Add support for excerpts on pages
 */
function tobias_page_excerpt() {	
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'tobias_page_excerpt' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function tobias_pingback_header() {

	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}

}
add_action( 'wp_head', 'tobias_pingback_header' );

/**
 * Add additional "li_class" argument for wp_nav_menu
 */
function tobias_menu_li_class( $classes, $item, $args ) {

    if( ! empty( $args->li_class ) ) {
        $classes[] = $args->li_class;
    }

    return $classes;

}
add_filter( 'nav_menu_css_class', 'tobias_menu_li_class', 1, 3 );

/**
 * Add additional "link_class" argument for wp_nav_menu
 */
function tobias_menu_link_class( $atts, $item, $args ) {

  if ( ! empty( $args->link_class ) ) {
    $atts['class'] = $args->link_class;
  }
  return $atts;

}
add_filter( 'nav_menu_link_attributes', 'tobias_menu_link_class', 1, 3 );

/**
 * Function for displaying theme images within templates
 * 
 */
function tobias_theme_images( $image ) {
    $tobias_theme_images = get_option( 'tobias_images' );
    $theme_image = $tobias_theme_images[$image];

    if( ! empty( $theme_image ) ) {
        echo '<img src="' . esc_url( $theme_image ) . '" class="img-fluid" alt="' . get_bloginfo( 'name' ) . '">';
    } else {
        echo '<span class="h5">'. get_bloginfo('name') .'</span>';
    }
 }

 /**
 * Custom admin logo
 */
function tobias_admin_logo() {
    $tobias_theme_images = get_option( 'tobias_images' );
    $admin_logo = $tobias_theme_images['admin_logo'];

    if( ! empty( $admin_logo ) ) {
        echo '
            <style type="text/css"> 
            body.login div#login h1 a {
                background-image: url('. $admin_logo .');
                width: 250px;
            } 
            </style>
        ';
    }
}
add_action( 'login_enqueue_scripts', 'tobias_admin_logo' );

/**
 * Display social media links
 */
function tobias_socials( $args = '' ) {
	$tobias_socials = get_option( 'tobias_socials' );
	$tobias_socials_icon_type = get_option( 'tobias_socials_icon_type' );
  
  	if ( ! empty ( $args['ul_class'] ) ) {
    	$list_class = 'list-inline ' . $args['ul_class'];
  	} else {
    	$list_class = 'list-inline';
  	}
  	$list_class = trim( $list_class );

  	$output = '
    	<ul class="'. $list_class .'">
	';

	// Facebook icon
	if ( ! empty ( $tobias_socials['facebook'] ) ) {
		if ( $tobias_socials_icon_type == 'square' ) {
			$facebook_icon = 'fa-facebook-square';
		} else {
			$facebook_icon = 'fa-facebook-f';
		}

		$output .= '
			<li class="list-inline-item">
				<a class="pe-1" href="'. $tobias_socials['facebook'] .'" aria-label="'. get_bloginfo('name') .' on Facebook">
					<i class="fab fa-fw '. $facebook_icon .' fa-lg"></i>
				</a>
			</li>
		';
	}

	// Instagram icon
	if ( ! empty ( $tobias_socials['instagram'] ) ) {
		if ( $tobias_socials_icon_type == 'square' ) {
			$instagram_icon = 'fa-instagram-square';
		} else {
			$instagram_icon = 'fa-instagram';
		}

		$output .= '
			<li class="list-inline-item">
				<a class="pe-1" href="'. $tobias_socials['instagram'] .'" aria-label="'. get_bloginfo('name') .' on Instagram">
					<i class="fab fa-fw '. $instagram_icon .' fa-lg"></i>
				</a>
			</li>
		';
	}

	// Twitter icon
	if ( ! empty ( $tobias_socials['twitter'] ) ) {
		if ( $tobias_socials_icon_type == 'square' ) {
			$twitter_icon = 'fa-twitter-square';
		} else {
			$twitter_icon = 'fa-twitter';
		}

		$output .= '
			<li class="list-inline-item">
				<a class="pe-1" href="'. $tobias_socials['twitter'] .'" aria-label="'. get_bloginfo('name') .' on Twitter">
					<i class="fab fa-fw '. $twitter_icon .' fa-lg"></i>
				</a>
			</li>
		';
	}

	// LinkedIn icon
	if ( ! empty ( $tobias_socials['linkedin'] ) ) {
		if ( $tobias_socials_icon_type == 'square' ) {
			$linkedin_icon = 'fa-linkedin';
		} else {
			$linkedin_icon = 'fa-linkedin-in';
		}

		$output .= '
			<li class="list-inline-item">
				<a class="pe-1" href="'. $tobias_socials['linkedin'] .'" aria-label="'. get_bloginfo('name') .' on LinkedIn">
					<i class="fab fa-fw '. $linkedin_icon .' fa-lg"></i>
				</a>
			</li>
		';
	}

	// YouTube icon
	if ( ! empty ( $tobias_socials['youtube'] ) ) {
		if ( $tobias_socials_icon_type == 'square' ) {
			$linkedin_icon = 'fa-youtube-square';
		} else {
			$linkedin_icon = 'fa-youtube';
		}

		$output .= '
			<li class="list-inline-item">
				<a class="pe-1" href="'. $tobias_socials['youtube'] .'" aria-label="'. get_bloginfo('name') .' on YouTube">
					<i class="fab fa-fw '. $linkedin_icon .' fa-lg"></i>
				</a>
			</li>
		';
	}

	// Pinterest icon
	if ( ! empty ( $tobias_socials['pinterest'] ) ) {
		if ( $tobias_socials_icon_type == 'square' ) {
			$pinterest_icon = 'fa-pinterest-square';
		} else {
			$pinterest_icon = 'fa-pinterest-p';
		}

		$output .= '
			<li class="list-inline-item">
				<a class="pe-1" href="'. $tobias_socials['pinterest'] .'" aria-label="'. get_bloginfo('name') .' on Pinterest">
					<i class="fab fa-fw '. $pinterest_icon .' fa-lg"></i>
				</a>
			</li>
		';
	}

	// Github icon
	if ( ! empty ( $tobias_socials['github'] ) ) {
		if ( $tobias_socials_icon_type == 'square' ) {
			$github_icon = 'fa-github-square';
		} else {
			$github_icon = 'fa-github';
		}

		$output .= '
			<li class="list-inline-item">
				<a class="pe-1" href="'. $tobias_socials['github'] .'" aria-label="'. get_bloginfo('name') .' on Github">
					<i class="fab fa-fw '. $github_icon .' fa-lg"></i>
				</a>
			</li>
		';
	}

	$output .= '
		</ul>
  	';

  	echo $output;

}

/**
 * Display a page title
 */
function tobias_title() {

	if ( is_front_page() && is_home() ) {

		echo '<h1 class="display-4 mt-0">'. get_bloginfo('name') .'</h1>';

	} elseif( is_home() ) {

		$blog_title = get_the_title( get_option( 'page_for_posts', true ) );
		echo '<h1 class="display-4 mt-0">'. $blog_title .'</h1>';

	} elseif( is_archive() ) {
	  
		the_archive_title( '<h1 class="display-4 mt-0">', '</h1>' );

	} elseif( is_search() ) {
	  
		$search_query = get_search_query();
		echo '<h1 class="display-4 mt-0">Search: '. $search_query .'</h1>';

	} elseif( is_404() ) {
	  
		echo '<h1 class="display-4 mt-0">404 - Page Not Found</h1>';

	} elseif( is_page_template( 'page-featured.php' ) ) {

		echo '
			<div class="row py-5">
				<div class="col-md-8 py-5">
		';
	  
		the_title( '<h1 class="display-4 mt-0">', '</h1>' );

		if ( has_excerpt() ) {
			echo '<h2 class="display-6">'. get_the_excerpt() .'</h2>';
		}

		echo '
				</div>
			</div>
		';

	} else {

		the_title( '<h1 class="display-4 mt-0">', '</h1>' );
		
	}

}

/**
 * Display featured image as background image in title for Featured Page template
 */
function tobias_featured_page_image() {

	if ( is_page_template( 'page-featured.php' ) && has_post_thumbnail() ) {
		echo 'style="background: linear-gradient(90deg, rgb(0 0 0 / 75%), rgb(0 0 0 / 50%)), url('. esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ) .') right / cover no-repeat; color: #fff;"';
	}

}

/**
 * Display breadcrumbs on pages
 */
function tobias_breadcrumb() {

	$output = '
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
	';

	if ( is_front_page() ) {

		$output .= '<li class="breadcrumb-item active" aria-current="page">Home</li>';

	} elseif ( is_home() && ! is_front_page() ) {

		$blog_title = get_the_title( get_option( 'page_for_posts', true ) );

		$output .= '<li class="breadcrumb-item"><a href="'. home_url() .'">Home</a></li>';
		$output .= '<li class="breadcrumb-item active" aria-current="page">'. $blog_title .'</li>';

	} else {

		$output .= '<li class="breadcrumb-item"><a href="'. home_url() .'">Home</a></li>';

		$parents = get_post_ancestors( $post->ID );
		foreach ( $parents as $parent ) {
			$output .='<li class="breadcrumb-item"><a href="'. get_the_permalink( $parent ) .'">'. get_the_title( $parent ) .'</a></li>';
		}

		if ( is_archive() ) {
			$output .= '<li class="breadcrumb-item active" aria-current="page">'. get_the_archive_title() .'</li>';
		} elseif ( is_search() ) {
			$output .= '<li class="breadcrumb-item active" aria-current="page">Search</li>';
		} elseif ( is_404() ) {
			$output .= '<li class="breadcrumb-item active" aria-current="page">Page Not Found</li>';
		} else {
			$output .='<li class="breadcrumb-item active" aria-current="page">'. get_the_title() .'</li>';
		}

	}

	$output .= '
			</ol>
		</nav>
	';

	echo $output;

}

/**
 * Header button
 * 
 */
function tobias_header_button() {
    $tobias_options = get_option( 'tobias_options' );
    $header_button_text = $tobias_options['header_button_text'];
	$header_button_link = $tobias_options['header_button_link'];

	if( ! empty ( $header_button_text ) ) {
		echo '
			<li id="navbar-cta" class="navbar-item align-middle ml-auto me-4 d-block">
				<a href="'. $header_button_link .'" class="btn btn-primary">'. $header_button_text .'</a>
			</li>
		';
	}

 }