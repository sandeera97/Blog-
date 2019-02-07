<?php
/**
 * The main template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package styled_blog
 */

get_header();
?>
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

						<!-- styled_blog main content -->
						<div class="col-md-6 col-lg-8 col-sm-12 order-2 order-md-2 styled_blog__main__content__block" data-aos="fade-bottom"  data-aos-delay="400">						
							<div class="row styled_blog_masonry_wrap">
								<?php
								if ( have_posts() ) { ?>
									<?php 
									$styled_blog_archive_count = 0;
									while ( have_posts() ) :
										the_post();
										?>
										<div class="col-md-12 col-lg-6 styled_blog_masonry_item" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($styled_blog_archive_count); ?>">
											<?php 
												get_template_part( 'template-parts/content', get_post_format() );
											?>
										</div>
										
										<?php 
										$styled_blog_archive_count = $styled_blog_archive_count+40; 
									endwhile;
									?>
									<ul class="pagination pagination-blog d-flex justify-content-center col-md-12" role="navigation" aria-label="<?php esc_attr_e('Pagination','styled-blog');?>">
										<?php echo paginate_links(); ?>
									</ul>
								<?php 	
								} else {
									get_template_part( 'template-parts/content', 'none' );
									}
								?>
							</div>
						</div>
						<!-- styled_blog right content -->
						<div class="col-md-2 col-lg-1 col-sm-12 order-1 order-md-3">
							<div class="styled_blog__right__fixed" data-aos="fade-left"  data-aos-delay="300">
								<?php
									// styled_blog main menu 
									do_action('styled_blog_menu_right_section'); 
									?>
									<div class="styled_blog__branding--device">
										<?php do_action('styled_blog_main_header_site_title_section'); ?>
									</div>
									<?php 
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
					</div>
				</div><!-- main content end -->
			</div>
		</section>
	</main> <!-- main end -->
</div> <!-- primary end-->

<?php get_footer(); 