<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
 exit;
}

// Do not proceed if Kirki does not exist.
if ( ! class_exists( 'Kirki' ) ) {
 return;
}

/**
 * First of all, add the config.
 *
 * @link https://aristath.github.io/kirki/docs/getting-started/config.html
 */
Kirki::add_config(
 'styled_blog_config', array(
  'capability'  => 'edit_theme_options',
  'option_type' => 'theme_mod',
 )
);

//*********************************************************//
        //   styled_blog Theme Customizer All Panels     //
//*********************************************************//

// 1 Theme Color Panel
// 2 Top Header Panel


	
	/*** 1 styled_blog Theme Selector ***/
	Kirki::add_panel( 'theme_color_panel', array(
    'priority'    => 10,
    'title'       => esc_attr__( 'Theme Color Switch', 'styled-blog' ),
    'description' => esc_attr__( 'Choose the base theme color', 'styled-blog' ),
    ) );

    /**** 2  styled_blog Top Header Panel ****/
    Kirki::add_panel( 'top_header_panel', array(
    'priority'    => 10,
    'title'       => esc_attr__( 'Top Header Panel', 'styled-blog' ),
    'description' => esc_attr__( 'For Latest Trend panel', 'styled-blog' ),
    ) );