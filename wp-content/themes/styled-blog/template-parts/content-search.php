<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package styled_blog
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="row">

		<div class="col-md-12">
			<div class="search-content">
				<?php 
				the_title( '<h2 class="search-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

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

				<?php the_category(); ?>
				
				<div class="row">
					<div class="col-md-11">
						 <?php the_excerpt(); ?>
						 <a href="<?php the_permalink(); ?>" class="btn styled_blog--readmore"><?php esc_html_e('Read More','styled-blog'); ?></a>
				 	</div>
				 </div>
			</div>
		</div>
		<?php 
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'styled-blog' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- end row -->

</article><!-- #post-<?php the_ID(); ?> -->
