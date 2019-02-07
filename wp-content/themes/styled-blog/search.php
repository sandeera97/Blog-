<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package styled_blog
 */


get_header();  ?>


<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<!-- styled_blog-list-page-section -->
		<section class="styled_blog_list_page_wrap">
			<div class="container-fluid">
				<!-- Latest trend section -->
				<?php do_action('styled_blog_latest_trend'); ?>
				<!-- styled_blog Main Content -->
				<div class="styled_blog__main__content">
					<div class="row">
						<!-- styled_blog Left Content -->
						<div class="col-md-4 col-lg-3 col-sm-12 order-3 order-md-1">
							<div class="styled_blog__left__sidebar">
								<div class="styled_blog_tagline_logo">
									<?php do_action('styled_blog_main_header_site_title_section'); ?>
								</div>
								<?php 
									get_sidebar();
									do_action('styled_blog_footer_section');
								?>	
							</div>			
						</div>

						<div class="col-md-6 col-lg-8 col-sm-12 order-2 order-md-2 styled_blog__main__content__block aos-init aos-animate">
							<?php
							if ( have_posts() ) : ?>

							<header class="entry-header single_page_header">
								<figure>
									<?php 
										if ( get_header_image() ) { ?>
											<img src="<?php echo esc_url(( get_header_image()) ); ?>" alt=""/>
										<?php 
										}
									?>
								
								</figure>
							</header><!-- .entry-header -->	

							<div class="row">
								<div class="col-md-10 offset-md-1">
									<div class="entry-content">
											<h1 class="page-title">
											<?php
											/* translators: %s: search query. */
											printf( esc_html__( 'Search Results for: %s', 'styled-blog' ), '<span>' . get_search_query() . '</span>' );
											?>
										</h1>
										<?php
										/* Start the Loop */
										while ( have_posts() ) :
											the_post();

											get_template_part( 'template-parts/content', 'search' );

										endwhile;
										?>
										<ul class="pagination pagination-blog d-flex justify-content-center" role="navigation" aria-label="<?php esc_attr_e('Pagination','styled-blog');?>">
											<?php echo paginate_links(); ?>
										</ul>
										<?php 
										else :

											get_template_part( 'template-parts/content', 'none' );

										endif;
										?>
									</div>
								</div>
							</div>
						</div>

						<!-- styled_blog right content -->
						<!-- styled_blog right content -->
						<div class="col-md-2 col-lg-1 col-sm-12 order-1 order-md-3">
							<div class="styled_blog__right__fixed" data-aos="fade-left"  data-aos-delay="300">
								<?php
									// styled_blog main menu 
									do_action('styled_blog_menu_right_section');  
									
									//styled_blog woocommerce icons
									if(class_exists( 'Woocommerce' ) ){
										do_action('styled_blog_woocommerce_cart_ico');
									}

									// styled_blog follow us menu
									do_action('styled_blog_social_share_right_section');

									//styled_blog move to top 
									do_action('styled_blog_move_to_top'); 
								?>
							</div>
						</div>
					</div> <!-- row -->
				</div>
			</div> <!-- main content end -->
		</section> <!-- styled_blog page list -->
		</main> <!-- main div -->
</div> <!-- primary -->

<?php get_footer();