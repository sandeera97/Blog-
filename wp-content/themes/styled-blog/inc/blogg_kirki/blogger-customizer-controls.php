<?php
/*****************************************************/
	// styled_blog Theme Customizer All CONTROLS  //
/*****************************************************/


/**** styled_blog Homepage Panel ****/
/*
 *
 * All controls customization
 *	
 *	1. Theme color Section
 *	2. Top Header Section Controls
 */


/********* 1. Theme Color section ************/
	Kirki::add_field( 'styled_blog_config', array(
		'type'        => 'radio-image',
		'settings'    => 'theme_color_selector_setting',
		'label'       => esc_html__( 'Select Theme Base Color', 'styled-blog' ),
		'section'     => 'theme_color_section',
		'default'     => 'light',
		'priority'    => 10,
		'choices'     => array(
			'light' => get_template_directory_uri() . '/inc/images/lighttheme.png',
			'dark'  => get_template_directory_uri() . '/inc/images/darktheme.png',
		),
	) );


/********* 2. Header Top Banner section ************/

	// 2.0 Latest Trend display setting
	Kirki::add_field( 'styled_blog_config', array(
		'type'        => 'switch',
		'settings'    => 'latest_trend_display_setting',
		'label'       => esc_html__('Choose whether to display this section', 'styled-blog' ),
		'section'     => 'top_header_section',
		'priority'    => 10,
		'default'	  => 1,
		'choices'     => array(
			'on'  => esc_html__( 'Display', 'styled-blog' ),
			'off' => esc_html__( 'Hide', 'styled-blog' ),
		),
	) );

	// 2.1 Latest Trend category selector
	Kirki::add_field( 'styled_blog_config', array(
			'type'        => 'select',
	        'settings'    => 'latest_trend_category_setting',
	        'label'       => esc_html__('Select the Category to display Posts in Latest Trend section', 'styled-blog' ),
	        'section'     => 'top_header_section',
	        'choices'	  => Kirki_Helper::get_terms( 'category' ),
	        'priority'    => 10,
	    ) );


