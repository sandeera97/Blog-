<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package styled_blog
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<!-- styled_blog-latest-posts-section -->
		<section class="styled_blog_list_page_wrap">
			<div class="container-fluid">
				<!-- Latest trend section -->
				<?php do_action('styled_blog_latest_trend'); ?>

				<!-- styled_blog Main Content -->
				<div class="styled_blog__main__content">

					<div class="row">
						<!-- styled_blog Left Content -->
						<div class="col-md-4 col-lg-3 col-sm-12 order-3 order-md-1">
							<div class="styled_blog__left__sidebar" data-aos="fade-right"  data-aos-delay="200">
								<div class="styled_blog_tagline_logo">
									<?php do_action('styled_blog_main_header_site_title_section'); ?>
								</div>
								<?php 
									get_sidebar();
									do_action('styled_blog_footer_section');
								?>	
							</div>			
						</div>


					<!-- 404 error content -->
					<div class="col-md-6 col-lg-8 col-sm-12 order-2 order-md-2 styled_blog__main__content__block page_not_found_page" data-aos="fade-bottom"  data-aos-delay="400">
						<div class="row">
							<div class="col-md-12">
								<figure>
									<?php 
									if ( get_header_image() ) { ?>
										<img src="<?php echo esc_url(( get_header_image()) ); ?>" alt=""/>
									<?php 
									}
									?>
								</figure>
							</div>
							<div class="col-md-10 offset-md-1">
								<div class="entry-content">
									<header class="page-header">
									<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'styled-blog' ); ?>
									</h1>
								</header><!-- .page-header -->
									<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'styled-blog' ); ?></p>
								<fieldset class="search-404">
									<?php
										get_search_form();
									?>
								</fieldset>
								</div>
							</div>
						</div>
					</div>

					<!-- styled_blog right content -->
					<div class="col-md-2 col-lg-1 col-sm-12 order-1 order-md-3">
						<div class="styled_blog__right__fixed" data-aos="fade-left" data-aos-delay="300">
							<?php
								// styled_blog main menu 
								do_action('styled_blog_menu_right_section');  

								//styled_blog woocommerce icons
								if(class_exists( 'Woocommerce' ) ){
									do_action('styled_blog_woocommerce_cart_ico');
								}

								// styled_blog follow us menu
								do_action('styled_blog_social_share_right_section'); 
							?>
						</div>
					</div>
		</div>
	</div>
</section>




<?php 
get_footer(); ?>