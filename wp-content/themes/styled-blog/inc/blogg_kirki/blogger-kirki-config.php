<?php 

//** configuring kirki for styled_blog theme *//
/** 
1.0 Configuring Kirki field Id
2.0 styled_blog Customizer Panels
3.0 styled_blog Customizer Sections
4.0 styled_blog Customizer Controls and sections
*/


// 1.0 Add an empty config for global fields.
Kirki::add_config( 'styled_blog_config' );

// 2.0 styled_blog Panels
get_template_part('inc/blogg_kirki/blogger-customizer','panels');

// 3.0 styled_blog Sections
get_template_part('inc/blogg_kirki/blogger-customizer', 'sections');

// 4.0 styled_blog Controls
get_template_part('inc/blogg_kirki/blogger-customizer', 'controls');
