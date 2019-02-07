<?php
/**
 * Custom Header feature.
 *
 * @link http://codex.wordpress.org/Custom_Headers
 *
 * @package styled_blog
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @since 1.0.0
 */
function styled_blog_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'styled_blog_custom_header_args', array(
			'default-image' => get_template_directory_uri() . '/inc/images/header_img.jpg',
			'width'         => 1920,
			'height'        => 500,
			'flex-height'   => true,
			'header-text'   => false,
	) ) );

	// Register default headers.
	register_default_headers( array(
		'real-estate' => array(
			'url'           => '%s/inc/images/header_img.jpg',
			'thumbnail_url' => '%s/inc/images/header_img.jpg',
			'description'   => esc_html_x( 'styled-blog', 'header image description', 'styled-blog' ),
		),

	) );

}

add_action( 'after_setup_theme', 'styled_blog_custom_header_setup' );
