<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package styled_blog
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( is_singular() ) { ?>
		<header class="entry-header single_page_header">
			<figure>
				<?php styled_blog_feat_img_single(); ?>
				<?php the_category(); ?>
				<?php 
					if(class_exists('Sassy_Social_Share_Public')){
					?>
					<div class="styled_blog_social_share">
						<div class="styled_blog_social_share_text">
							<?php esc_html_e('SHARE:','styled-blog'); ?>
						</div>
						<div class="styled_blog_social_share_icons">
							<?php echo do_shortcode('[Sassy_Social_Share]'); ?>
						</div>	
					</div>
					<?php 
					}
				?>
			</figure>		
		</header><!-- .entry-header -->
	<?php }else{ ?>
		<header class="entry-header">
			<figure>
				<?php styled_blog_feat_img(); ?>
				<?php the_category(); ?>
				<div class="styled_blog_social_share">
					<?php 
						if(class_exists('Sassy_Social_Share_Public')){	?>	
							<div class="styled_blog_social_share_text">
								<?php esc_html_e('SHARE:','styled-blog'); ?>
							</div>
							<div class="styled_blog_social_share_icons">
								<?php echo do_shortcode('[Sassy_Social_Share]'); ?>
							</div>
						<?php 
						}
					?>
				</div>
			</figure>		
		</header><!-- .entry-header -->
	<?php } ?>

	<div class="row">
		<?php if ( is_singular() ) : ?>
				<div class="col-md-10 offset-md-1">
					<div class="entry-content">
						<?php 
						the_title( '<h1 class="entry-title">', '</h1>' );
				else : ?>
					<div class="col-md-11 offset-md-1">
						<div class="entry-content">
							<?php 
							the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif; // single checking end header part

				if ( 'post' === get_post_type() ) :
					?>
					<div class="entry-meta">
						<?php
						$styled_blog_date_post_format = get_option( 'date_format' );
						the_time($styled_blog_date_post_format);
						styled_blog_posted_by();
						?>
					</div><!-- .entry-meta -->
				<?php endif; ?>

				<?php
				if(is_singular()){
					the_content( sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'styled-blog' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					) );
				}else{ ?>
				 <div class="row">
				 	<div class="col-md-11">
						 <?php the_excerpt(); ?>
						 <a href="<?php the_permalink(); ?>" class="btn styled_blog--readmore"><?php esc_html_e('Read More','styled-blog'); ?></a>
				 	</div>
				 </div>
			 <?php
			} ?>
			</div> <!-- col md end -->
		</div> <!-- row end -->
		<?php 
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'styled-blog' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- end row -->

</article>