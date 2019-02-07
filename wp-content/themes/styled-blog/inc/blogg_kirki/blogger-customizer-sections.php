<?php

/*****************************************************/
	// styled_blog Theme Customizer All SECTIONS  //
/*****************************************************/



/**** styled_blog Homepage Panel ****/
  
/*
 *	All sections customization 
 *	
 *	1. Theme base Color Section
 *	2. Top Header Section
 */


/** 1.0 Theme Base Color Section **/
	Kirki::add_section( 'theme_color_section', array(
	    'title'          => esc_attr__( 'Theme Color Selector', 'styled-blog' ),
	    'panel'          => 'theme_color_panel',
	    'priority'       => 160,
	) );


/**	1. Homepage banner section **/
	Kirki::add_section( 'top_header_section', array(
	    'title'          => esc_attr__( 'Latest Trend section', 'styled-blog' ),
	    'panel'          => 'top_header_panel',
	    'priority'       => 160,
	) );
