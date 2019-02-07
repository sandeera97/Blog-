<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package styled_blog
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header single_page_header">
			<figure>
				<?php 
					if(has_post_thumbnail()){
						styled_blog_feat_img_single();
					}elseif ( get_header_image() ) { ?>
						<img src="<?php echo esc_url(( get_header_image()) ); ?>" alt="<?php echo esc_attr(( get_bloginfo( 'title' )) ); ?>" />
					<?php 
					}
				?>
			</figure>
	</header><!-- .entry-header -->	
	<div class="row">
		<div class="col-md-10 offset-md-1">
			<div class="entry-content">
				<h2><?php the_title(); ?></h2>

				<?php
					the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'styled-blog' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->
		</div>
	</div>
	
</article><!-- #post-<?php the_ID(); ?> -->
