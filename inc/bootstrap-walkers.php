<?php
/**
 * Custom wp_nav_menu walker class for better alignment with default Bootstrap navbar elements
 * Mobile walker class is used to for a collapsible, list-group menu
 * 
 * By AlexWebLab: https://github.com/AlexWebLab/bootstrap-5-wordpress-navbar-walker
 *
 * @package Tobias
 */

class Bootstrap_5_Walker_Nav_menu extends Walker_Nav_menu {
	
	private $menu_item;
	private $dropdown_menu_alignment_values = [
    	'dropdown-menu-start',
    	'dropdown-menu-end',
    	'dropdown-menu-sm-start',
    	'dropdown-menu-sm-end',
    	'dropdown-menu-md-start',
    	'dropdown-menu-md-end',
    	'dropdown-menu-lg-start',
    	'dropdown-menu-lg-end',
    	'dropdown-menu-xl-start',
    	'dropdown-menu-xl-end',
    	'dropdown-menu-xxl-start',
    	'dropdown-menu-xxl-end'
	];

	/**
	 * 
	 * https://developer.wordpress.org/reference/classes/walker_nav_menu/start_lvl/
	 * 
	 */
	function start_lvl( &$output, $depth = 0, $args = null ) {

		$dropdown_menu_class[] = '';

		foreach( $this->menu_item->classes as $class ) {
			if( in_array( $class, $this->dropdown_menu_alignment_values ) ) {
				$dropdown_menu_class[] = $class;
			}
		}

		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = str_repeat( $t, $depth );
		
		$submenu = ( $depth > 0 ) ? ' submenu' : '';
		$output .= "\n$indent<ul class=\"dropdown-menu$submenu " . esc_attr( implode( " ",$dropdown_menu_class ) ) . " depth_$depth\">\n";

	}

	/**
	 * 
	 * https://developer.wordpress.org/reference/classes/walker_nav_menu/start_el/
	 * 
	 */
	function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {

		$this->current_item = $item;

		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = str_repeat( $t, $depth );

		$li_attributes = '';
		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : ( array ) $item->classes;

		$classes[] = ( $args->walker->has_children ) ? 'dropdown' : '';
		$classes[] = 'nav-item';
		$classes[] = 'nav-item-' . $item->ID;
		if ( $depth && $args->walker->has_children ) {
			$classes[] = 'dropdown-menu-end';
		}

		$class_names =  join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';

		$attributes = !empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
		$attributes .= !empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
		$attributes .= !empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
		$attributes .= !empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';

		$active_class = ( $item->current || $item->current_item_ancestor || in_array( "current_page_parent", $item->classes, true ) || in_array( "current-post-ancestor", $item->classes, true ) ) ? 'active' : '';
		$nav_link_class = ( $depth > 0 ) ? 'dropdown-item ' : 'nav-link ';

		// (Default) Make parent dropdown links clickable as links
		$attributes .= ( $args->walker->has_children ) ? ' class="'. $nav_link_class . $active_class . ' dropdown-toggle dropdown-link d-inline-block" aria-haspopup="true" aria-expanded="false"' : ' class="'. $nav_link_class . $active_class . '"';
		// (Optional) Prevent parent dropdown links from being clickable
		// $attributes .= ( $args->walker->has_children ) ? ' class="'. $nav_link_class . $active_class . ' dropdown-toggle dropdown-link d-inline-block" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="'. $nav_link_class . $active_class . '"';

		$item_output = $args->before;
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';

		// Recreate the toggle chevron/caret so that it is a tabbable element
		$item_output .= ( $args->walker->has_children ) ? '<a href="#" class="'. $nav_link_class . $active_class . ' dropdown-toggle dropdown-icon d-inline-block" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="Dropdown Toggle"><i class="fa-solid fa-chevron-down"></i></a>' : '';

		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

	}
}

class Bootstrap_5_Walker_Nav_Mobile_menu extends Walker_Nav_menu {

	private $menu_item;

	/**
	 * 
	 * https://developer.wordpress.org/reference/classes/walker_nav_menu/start_lvl/
	 * 
	 */
	function start_lvl( &$output, $depth = 0, $args = null ) {

		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = str_repeat( $t, $depth );

		// List group, collapse, and depth classes.
		$classes = array(
			'list-group',
			'collapse',
			'depth_'. $depth,
		);

		$class_names = implode( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$item_id = $this->$menu_item->ID;	
		
		$output .= "{$n}{$indent}<ul$class_names id=\"item-$item_id\">{$n}";

	}

	/**
	 * 
	 * https://developer.wordpress.org/reference/classes/walker_nav_menu/start_el/
	 * 
	 */
	function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {

		$this->$menu_item = $item;

		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

		$classes   = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		//Add list-group-item class to li tag
		$classes[] = 'list-group-item';
	 
		$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );
	 
		$class_names = implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
	 
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
	 
		$output .= $indent . '<li' . $id . $class_names . '>';
	 
		$atts           = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target ) ? $item->target : '';
		if ( '_blank' === $item->target && empty( $item->xfn ) ) {
			$atts['rel'] = 'noopener';
		} else {
			$atts['rel'] = $item->xfn;
		}
		$atts['href']         = ! empty( $item->url ) ? $item->url : '';
		$atts['aria-current'] = $item->current ? 'page' : '';

		// Add list-group-dropdown-link or list-group-link class to a tag
		if ( $args->walker->has_children ) {
			$atts['class']  = 'list-group-dropdown-link';
		} else {
			$atts['class']  = 'list-group-link';
		}
	 
		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
	 
		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( is_scalar( $value ) && '' !== $value && false !== $value ) {
				$value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}
	 
		$title = apply_filters( 'the_title', $item->title, $item->ID );
	 
		$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

		// If menu item has children, add dropdown link to open collapsed list group
		if ( $args->walker->has_children ) {
			$args->after = '<a href="#item-'. $item->ID .'" class="list-group-dropdown-icon" data-bs-toggle="collapse" aria-expanded="false" aria-controls="item-'. $item->ID .'"><i class="fa-solid fa-chevron-right"></i></a>';
		} else {
			$args->after = '';
		}
	 
		$item_output  = $args->before;
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . $title . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;
	 
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

	}
}