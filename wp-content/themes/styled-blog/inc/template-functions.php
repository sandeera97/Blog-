<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package styled_blog
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function styled_blog_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	if( get_theme_mod('theme_color_selector_setting', 'light') == 'light'){
		$classes[] = 'styled_blog--light';
	}else{
		$classes[] = 'styled_blog--dark';
	}

	if( get_theme_mod('latest_trend_display_setting', 'on') == 'on'){
		$classes[] = 'styled_blog_latest_trend_show';
	}

	return $classes;
}
add_filter( 'body_class', 'styled_blog_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function styled_blog_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'styled_blog_pingback_header' );


/** get feature image */
if ( !function_exists( 'styled_blog_feat_img' ) ):
	function styled_blog_feat_img() { 

		if(has_post_thumbnail()){ 
			the_post_thumbnail( 'styled_blog_grid_post_img' );
			}  
	}
endif; 


if ( !function_exists( 'styled_blog_feat_img_single' ) ):
	function styled_blog_feat_img_single() { 

		if(has_post_thumbnail()){
			the_post_thumbnail( 'full' );
		}  
	}
endif;