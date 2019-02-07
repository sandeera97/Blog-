<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package styled_blog
 */


/*
=================================================
Pre Loader 
@Action: styled_blog_pre_loader_sec
=================================================
*/

if( !function_exists( 'styled_blog_pre_loader_sec_fnc' )):
	function styled_blog_pre_loader_sec_fnc (){ ?>
		<div class="bazz_loader preloader"></div>
		<div class=" bazz_loader preloading-icon"> 
			<div class="bazz-folding-cube">
				<div class="bazz-cube1 bazz-cube"></div>
				<div class="bazz-cube2 bazz-cube"></div>
				<div class="bazz-cube4 bazz-cube"></div>
				<div class="bazz-cube3 bazz-cube"></div>
			</div>
		</div>
	<?php 
}
endif;


/*
=================================================
Title and Tagline
@Action: styled_blog_main_header_site_title_section
=================================================
*/

if ( ! function_exists( 'styled_blog_main_header_site_title_section_fnc' ) ) :

	function styled_blog_main_header_site_title_section_fnc(){ ?>
		<header id="masthead" class="site-header">
			<div class="site-branding">
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				endif;
				$styled_blog_description = get_bloginfo( 'description', 'display' );
				if ( $styled_blog_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $styled_blog_description; ?></p> 
				<?php endif; ?>
			</div><!-- .site-branding -->
		</header><!-- #masthead -->
	<?php }
endif;


/*
=================================================
Social Share right section
@Action: styled_blog_social_share_right_section
=================================================
*/

if ( ! function_exists( 'styled_blog_social_share_right_section_fnc' ) ) :
	function styled_blog_social_share_right_section_fnc(){ ?>
		<div class="styled_blog__right__fixed--nav">
			<?php
			if ( has_nav_menu( 'social-menu' ) ):
			    wp_nav_menu(
				    array(
					    'theme_location' => 'social-menu',
					    'container'      => false,
					    'menu_id'        => 'social-menu',
					    'menu_class'     => 'right-social-menu',
					    'depth'          => '1',
				    )
			    );
			endif;
		    ?>
		</div>
	<?php 	 
	}
endif;


/*
=================================================
Site menu right section
@Action: styled_blog_menu_right_section
=================================================
*/

if ( ! function_exists( 'styled_blog_menu_right_section_fnc' ) ) :
	
	function styled_blog_menu_right_section_fnc(){ ?>
		<header id="masthead" class="site-header styled_blog__collapse__menu">
			<nav id="site-navigation" class="">
				<button class="menu-toggle" type="button" aria-controls="primary-menu" aria-expanded="false">
					<div class="styled_blog__collapse__menu--button burger-menu">
						<span></span>
						<span></span>
						<span></span>
					</div>	
				</button>
				<div class="styled_blog__navigation--style main-menu-wrap">
					<?php
					    wp_nav_menu(
						    array(
							    'theme_location' => 'main-menu',
							    'container'      => false,
							    'menu_id'        => 'primary-menu',
							    'menu_class'     => 'header-menu',
							    'depth'          => '2',
							    'fallback_cb'    => 'styled_blog_primary_navigation_fallback',
							    'walker'		=> new styled_blog_Sublevel_Walker,
						    )
					    );
				    ?>
				</div>
			</nav><!-- #site-navigation -->
		</header><!-- #masthead -->
	<?php   
	}
endif;

/** nav walker custom class **/

class styled_blog_Sublevel_Walker extends Walker_Nav_Menu
{
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class='styled_blog-sub-menu-wrap'><ul class='sub-menu'>\n";
    }
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul></div>\n";
    }
}


/*
=================================================
Site footer section section
@Action: styled_blog_footer__section
=================================================
*/

if ( ! function_exists( 'styled_blog_footer_section_fnc' ) ) :
	
	function styled_blog_footer_section_fnc(){ ?>

<footer id="colophon" class="site-footer">
	<div class="footer_bottom_widget">
		<?php 
			if ( is_active_sidebar( 'styled_blog-footer-sidebar' ) ) {
				dynamic_sidebar( 'styled_blog-footer-sidebar' );
			}
		?>
	</div>
	<div class="site-info copyright">
		<?php 
			esc_html_e( 'Styled Blog WordPress Theme by', 'styled-blog' ); ?>
			<a href="<?php echo esc_url('https://blazethemes.com'); ?>" target="_blank"><?php esc_html_e( 'Blaze Themes', 'styled-blog' ); ?></a>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
<?php } 
endif;
/*
=================================================
styled_blog about author 
@Action: styled_blog_about_author
=================================================
*/

if ( ! function_exists( 'styled_blog_about_author_fnc' ) ) :
	
	function styled_blog_about_author_fnc(){ ?>

	<div class="bazz_author_wrap">
		<div class="row">
			<div class="col-md-2">
				<div class="author_img"><?php echo get_avatar(73); ?></div>
			</div>
			<div class="col-md-10">
				<div class="author_content"><h3>
					<?php esc_html_e('Written by', 'styled-blog'); ?></h3>
					<h2 class="author_name"><?php the_author(); ?></h2>
					<div class="author_desc"><?php the_author_meta('description'); ?></div>
				</div>
			</div>
		</div>
	</div>
	<?php }
endif;


/*
=================================================
Navigation fallback 
@Action: styled_blog_primary_navigation_fallback
=================================================
*/
if ( ! function_exists( 'styled_blog_primary_navigation_fallback' ) ) :

	/**
	 * Fallback for primary navigation.
	 *
	 * @since 1.0.0
	 */
	function styled_blog_primary_navigation_fallback() {

		echo '<ul id="primary-menu" class="header-menu nav-menu" aria-expanded="false">';
		$args = array(
			'posts_per_page' => 5,
			'post_type'      => 'page',
			'orderby'        => 'name',
			'order'          => 'ASC',
			);

		$the_query = new WP_Query( $args );

		if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				the_title( '<li><a href="' . esc_url( get_permalink() ) . '">', '</a></li>' );
			}

			wp_reset_postdata();
		}

		echo '</ul>';
	}

endif;


/*
=================================================
styled_blog Latest Trend
@Action: styled_blog_latest_trend
=================================================
*/

if ( ! function_exists( 'styled_blog_latest_trend_fnc' ) ) :
	
	function styled_blog_latest_trend_fnc(){ 
		if( get_theme_mod('latest_trend_display_setting', 'off') == 'on'):
			?>
			<div class="row styled_blog__latest__ticker" data-aos="fade-down"  data-aos-delay="100" >
				<div class="col-lg-8 col-md-12 offset-lg-2">
					<div class="styled_blog__latest__ticker--block m-3">
						<span class="styled_blog__latest__ticker--label p-2">
							<?php esc_html_e('Trend' ,'styled-blog'); ?>
						</span>
						<div class="styled_blog__latest__ticker--message px-3 py-2">
							<?php 
							$latest_trend_post_id= get_theme_mod('latest_trend_category_setting');
							if( $latest_trend_post_id ){

								$latest_trend_query  = new WP_Query( array( 
															'cat' => absint( $latest_trend_post_id ) , 
															'posts_per_page' => 4 ) );
								while ( $latest_trend_query -> have_posts() ) {
										$latest_trend_query -> the_post();
										?>
										<a href="<?php the_permalink(); ?>" class="latest_trend_post">
											<?php the_excerpt(); ?>
										</a>
										<?php 
										}
								wp_reset_postdata();		
							}
							?>
						</div>
					</div>
				</div>
			</div>

	<?php
	endif;
}
endif;


/*
=================================================
Header cart icon
@Action: styled_blog_woocommerce_cart_ico
=================================================
*/

if ( ! function_exists( 'styled_blog_woocommerce_cart_ico_fnc' ) ) :
	
	function styled_blog_woocommerce_cart_ico_fnc(){ ?>
		<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() );?>">
			<span class="styled_blog_cart_icon">
				<i class="fas fa-shopping-cart"></i>
			</span>
			<span class="styled_blog_cart_num">
				<?php 
					echo absint( WC()->cart->get_cart_contents_count() ); ?>
			</span> 
			<?php echo WC()->cart->get_cart_total(); ?>
		</a>
	<?php 
	}
endif;

/*
=================================================
Single bottom content
@Action: styled_blog_single_bottom_sec
=================================================
*/

if ( ! function_exists( 'styled_blog_single_bottom_sec_fnc' ) ) :
	
	function styled_blog_single_bottom_sec_fnc(){ ?>
		<div class="row">
			<div class="col-md-10 offset-md-1">
				<div class="entry_content_bottom">
					<?php 	
					the_post_navigation();
					
					// about author
					do_action('styled_blog_about_author');
					
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>
				</div>
			</div>
		</div>
	<?php }
endif;

/*
=================================================
styled_blog Move to top
@Action: styled_blog_move_to_top
=================================================
*/

if ( ! function_exists( 'styled_blog_move_to_top_fnc' ) ) :
	
	function styled_blog_move_to_top_fnc(){ ?>
		<div class="styled_blog_move_to_top"> 
			<span>
				<i class="fas fa-chevron-circle-up"></i>
			</span>
		</div>
	<?php 
	}
endif;
