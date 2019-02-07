<?php
/** Action hooks **/

// Site Title and tagline
add_action('styled_blog_main_header_site_title_section','styled_blog_main_header_site_title_section_fnc');

// Site menu right section
add_action('styled_blog_menu_right_section','styled_blog_menu_right_section_fnc');

// social share right section
add_action('styled_blog_social_share_right_section','styled_blog_social_share_right_section_fnc');

// fotter section 
add_action('styled_blog_footer_section', 'styled_blog_footer_section_fnc');

// about author
add_action('styled_blog_about_author', 'styled_blog_about_author_fnc');

// Latest Trend 
add_action('styled_blog_latest_trend', 'styled_blog_latest_trend_fnc');

//pre loader 
add_action('styled_blog_pre_loader_sec', 'styled_blog_pre_loader_sec_fnc');

// header cart icon
add_action('styled_blog_woocommerce_cart_ico', 'styled_blog_woocommerce_cart_ico_fnc');

//single bottom content
add_action('styled_blog_single_bottom_sec', 'styled_blog_single_bottom_sec_fnc');
//styled_blog move to top
add_action('styled_blog_move_to_top','styled_blog_move_to_top_fnc');