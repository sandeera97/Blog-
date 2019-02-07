<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package styled_blog
 */

?>
<h2 class="main-title"><span class="blogg_cat_name"><?php esc_html_e( 'Nothing Found', 'styled-blog' ); ?></span></h2>
<article id="post-<?php the_ID(); ?>" <?php post_class('no-post ' ); ?>>
		<header class="entry-header single_page_header ">
			
		</header><!-- .entry-header -->

	<div class="row">
		<div class="col-md-10 offset-md-1">
			<div class="entry-content">
				<p>
				<?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'styled-blog' ); ?></p>
				<?php
					get_search_form();
				?>
			</div>
		</div>
	</div>

</article>
