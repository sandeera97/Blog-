<?php
/**
 * styled_blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package styled_blog
 */

if ( ! function_exists( 'styled_blog_setup' ) ) :
	/**
	 * as indicating support for post thumbnails.
	 */
	function styled_blog_setup() {
		/*
		 * Make theme available for translation.
		 */
		load_theme_textdomain( 'styled-blog', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 */
		add_theme_support( 'post-thumbnails' );
		// for grid layout 
		add_image_size('styled_blog_grid_post_img', 768, 650, true );

		add_image_size('styled_blog_widget_post_img', 75, 75, true );
		add_image_size('styled_blog_blog_listing', 574, 466, true);
		add_image_size('styled_blog_widget_post_img', 75, 75, true );


		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'main-menu' => esc_html__( 'Primary', 'styled-blog' ),
			'social-menu' => esc_html__( 'Social Menu', 'styled-blog' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'post-formats', array(
			'audio',
			'video',
			'gallery',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'styled_blog_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'woocommerce' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );



		/**
		 * Changing excerpt length for styled blog theme
		 */
		function styled_blog_excerpt_length( $length ) {
			if ( ! is_admin() ) {
				return 15;
			} else {
				return $length;
			}
		}
		add_filter( 'excerpt_length', 'styled_blog_excerpt_length', 999 );


		// changing the default end of the_excerpt()
		function styled_blog_excerpt_more( $more ) {
			if ( ! is_admin() ) {
				return '...';
			}
		}
		add_filter('excerpt_more', 'styled_blog_excerpt_more');
	}
endif;
add_action( 'after_setup_theme', 'styled_blog_setup' );


function styled_blog_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'styled_blog_content_width', 640 );
}
add_action( 'after_setup_theme', 'styled_blog_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function styled_blog_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'styled-blog' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'styled-blog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar', 'styled-blog' ),
		'id'            => 'styled_blog-footer-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'styled-blog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	if( class_exists('Woocommerce') ){
		register_sidebar( array(
		'name'          => esc_html__( 'Shop Sidebar', 'styled-blog' ),
		'id'            => 'styled_blog-shop-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'styled-blog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	}
	
}
add_action( 'widgets_init', 'styled_blog_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function styled_blog_pro_scripts() {

	//google fonts
	wp_enqueue_style('styled_blog-fonts',styled_blog_fonts_url(),array(),null);
	
	//bootstrap css
	wp_enqueue_style( 'bootstrap-css', get_stylesheet_directory_uri() . '/inc/library/bootstrap/css/bootstrap.min.css', array(), '4.0.0' );
	
	//font awesome css
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/inc/library/font-awesome/css/fontawesome-all.min.css', false, '5.0.12' );
	
	// light slider css
	wp_enqueue_style( 'lightslider-css', get_template_directory_uri() . '/inc/library/lightslider/lightslider.css', array(), '1.1.3' );
	
	// aos animation css
	wp_enqueue_style( 'aos-css', get_template_directory_uri() . '/inc/library/aos-animation/aos.css', array(), '1.0.1' );
	
	// main theme css
	wp_enqueue_style( 'styled_blog-style', get_stylesheet_uri() );
	
	// skip link focus js
	wp_enqueue_script( 'styled_blog-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	
	// bootstrap js
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/inc/library/bootstrap/js/bootstrap.min.js', array('jquery'), '4.0.0', true );
	
	// lightslider js
	wp_enqueue_script('lightslider-js', get_template_directory_uri() . '/inc/library/lightslider/lightslider.js', array(), '1.1.3' );
	
	// aos js
	wp_enqueue_script( 'aos-js', get_template_directory_uri() . '/inc/library/aos-animation/aos.js', array('jquery'), '1.0.1', true );

	//navigation
	wp_enqueue_script( 'styled_blog-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	
	//theme main js
	wp_enqueue_script( 'styled_blog-main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true );

	// for implementing masonry
	wp_enqueue_script( 'jquery-masonry' );
	wp_enqueue_script( 'masonry' );
	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'styled_blog_pro_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

// custom action hooks
require get_template_directory(). '/inc/blogger-custom-actions/blogger-action-link.php';

// custom functions
require get_template_directory(). '/inc/blogger-custom-actions/blogger-template-function.php';


if ( ! class_exists( 'Kirki' ) ) {
	require get_template_directory() . '/inc/blogg_kirki/blogger-kirki-installer.php'; // installer
}

// kirki configuration
if ( class_exists( 'Kirki' ) ) {
require get_template_directory() . '/inc/blogg_kirki/blogger-kirki-config.php';
}


/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
* Load custom widgets 
**/
require get_template_directory(). '/inc/widgets/widgets.php';

/**
 * Load TGM Plgin to recommended plugins 
 */
require get_template_directory() . '/inc/library/tgm-plugin-activation/blogger-plugin-activation.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

//google fonts
function styled_blog_fonts_url(){
	$fonts_url = '';

	$styled_blog_roboto = _x( 'on', 'Roboto: on or off', 'styled-blog' );
	$styled_blog_poppins = _x( 'on', 'Poppins: on or off', 'styled-blog' );
	$styled_blog_rubik = _x( 'on', 'Rubik: on or off', 'styled-blog' );


	if ( 'off' !== $styled_blog_roboto || 'off' !== $styled_blog_poppins || 'off' !==$styled_blog_rubik) {

		$font_families = array();

		if ( 'off' !== $styled_blog_roboto ) {
				$font_families[] = 'Roboto:300,300i,400,500,700,700i,900,900i';
		}

		if ( 'off' !== $styled_blog_poppins ) {
				$font_families[] = 'Poppins:300,300i,400,400i,600,700,700i,800,900,900i';
		}

		if ( 'off' !== $styled_blog_rubik ) {
				$font_families[] = 'Rubik:400,400i,700,700i,900,900i';
		}
		
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );

}
