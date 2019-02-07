<?php
/**
 * Theme widgets.
 *
 * @package styled_blog
 */

// Load widget base.
require_once get_template_directory() . '/inc/widgets/class-widget-fields.php';

if ( ! function_exists( 'styled_blog_load_widgets' ) ) :

	/**
	 * Load widgets.
	 *
	 * @since 1.0.0
	 */
	function styled_blog_load_widgets() {

		// 1.0 Recent Posts widget.
		register_widget( 'styled_blog_Recent_Posts_Widget' );

		// 2.0 About Us Widget
		register_widget('styled_blog_About_Us_Widget');
	}

endif;

add_action( 'widgets_init', 'styled_blog_load_widgets' );

// 1.0 Recent Post Widget
if ( ! class_exists( 'styled_blog_Recent_Posts_Widget' ) ) :

	/**
	 * Recent posts widget Class.
	 *
	 * @since 1.0.0
	 */
	class styled_blog_Recent_Posts_Widget extends styled_blog_Widget_Base {

		/**
		 * Sets up a new widget instance.
		 *
		 * @since 1.0.0
		 */
		function __construct() {

			$opts = array(
				'classname'                   => 'styled_blog_widget_recent_posts',
				'description'                 => __( 'Displays recent posts.', 'styled-blog' ),
				'customize_selective_refresh' => true,
				);
			$fields = array(
				'title' => array(
					'label' => __( 'Title:', 'styled-blog' ),
					'type'  => 'text',
					),
				'post_category' => array(
					'label'           => __( 'Select Category:', 'styled-blog' ),
					'type'            => 'dropdown-taxonomies',
					'show_option_all' => __( 'All Categories', 'styled-blog' ),
					),
				'post_number' => array(
					'label'   => __( 'Number of Posts:', 'styled-blog' ),
					'type'    => 'number',
					'default' => 4,
					'css'     => 'max-width:60px;',
					'min'     => 1,
					'max'     => 100,
					),
				'disable_date' => array(
					'label'   => __( 'Disable Date', 'styled-blog' ),
					'type'    => 'checkbox',
					'default' => false,
					),
				);

			parent::__construct( 'styled_blog-recent-posts', __( 'styled_blog: Recent Posts', 'styled-blog' ), $opts, array(), $fields );

		}

		/**
		 * Outputs the content for the current widget instance.
		 *
		 * @since 1.0.0
		 *
		 * @param array $args     Display arguments.
		 * @param array $instance Settings for the current widget instance.
		 */
		function widget( $args, $instance ) {

			$params = $this->get_params( $instance );

			echo $args['before_widget'];

			if ( ! empty( $params['title'] ) ) {
				echo $args['before_title'] . $params['title'] . $args['after_title'];
			}
			$qargs = array(
				'posts_per_page' => esc_attr( $params['post_number'] ),
				'no_found_rows'  => true,
				);
			if ( absint( $params['post_category'] ) > 0 ) {
				$qargs['cat'] = $params['post_category'];
			}
			$all_posts = get_posts( $qargs );

			?>
			<?php if ( ! empty( $all_posts ) ) :  ?>

				<?php global $post; ?>

				<div class="recent-posts-wrapper">

					<?php foreach ( $all_posts as $key => $post ) :  ?>
						<?php setup_postdata( $post ); ?>

						<div class="recent-posts-item">

							<?php if ( has_post_thumbnail() ) :  ?>
								<div class="recent-posts-thumb">
									<a href="<?php the_permalink(); ?>">
										<?php
										$img_attributes = array(
											'class' => 'alignleft',
											);
										the_post_thumbnail('styled_blog_widget_post_img');
										?>
									</a>
								</div><!-- .recent-posts-thumb -->
							<?php endif ?>
							<div class="recent-posts-text-wrap">
								<h3 class="recent-posts-title">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h3><!-- .recent-posts-title -->

								<?php if ( false === $params['disable_date'] ) :  ?>
									<div class="recent-posts-meta">

										<?php if ( false === $params['disable_date'] ) :  ?>
											<span class="recent-posts-date">
												<i class="far fa-calendar-alt"></i> <?php the_time( get_option( 'date_format' ) ); ?></span>
												<!-- .recent-posts-date -->
										<?php endif; ?>

									</div><!-- .recent-posts-meta -->
								<?php endif; ?>

							</div><!-- .recent-posts-text-wrap -->

						</div><!-- .recent-posts-item -->

					<?php endforeach; ?>

				</div><!-- .recent-posts-wrapper -->

				<?php wp_reset_postdata(); // Reset. ?>

			<?php endif; ?>

			<?php
			echo $args['after_widget'];

		}
	}
endif;


// 2.0 About Us Widget
if ( ! class_exists( 'styled_blog_About_Us_Widget' ) ) :

	/**
	 * Recent posts widget Class.
	 *
	 * @since 1.0.0
	 */
	class styled_blog_About_Us_Widget extends styled_blog_Widget_Base {

		/**
		 * Sets up a new widget instance.
		 *
		 * @since 1.0.0
		 */
		function __construct() {

			$opts = array(
				'classname'                   => 'styled_blog_about_us_widget',
				'description'                 => __( 'Displays Abou Us Page', 'styled-blog' ),
				'customize_selective_refresh' => true,
				);
			$fields = array(
				'styled_blog_about_page_selector' => array(
					'label'           => __( 'Select Page:', 'styled-blog' ),
					'type'            => 'dropdown-pages',
					),
				);

			parent::__construct( 'styled_blog_about_us_widget', __( 'styled_blog: About Us Page', 'styled-blog' ), $opts, array(), $fields );

		}

		/**
		 * Outputs the content for the current widget instance.
		 *
		 * @since 1.0.0
		 *
		 * @param array $args     Display arguments.
		 * @param array $instance Settings for the current widget instance.
		 */
		function widget( $args, $instance ) {

			$params = $this->get_params( $instance );

			echo $args['before_widget'];

			if ( ! empty( $params['styled_blog_about_page_selector'] ) ) {
				$about_us_page = $params['styled_blog_about_page_selector'];
			}
			
			?>
			<?php if ( ! empty( $about_us_page ) ) :
				$the_post = get_post($about_us_page); //Gets post ID
				$the_excerpt = $the_post->post_content;
				?>
			<div class="styled_blog__widget--about">
				<h2 class="widget-title">
					<?php echo get_the_title( $about_us_page ); ?>
				</h2>
				<div class="styled_blog__widget--content">
					<?php if( has_post_thumbnail( $about_us_page ) ): ?>
						<figure class="styled_blog__widget--figure">
						<img src="<?php echo esc_url(get_the_post_thumbnail_url($about_us_page,'styled_blog_widget_post_img')); ?>">	
						</figure>
					<?php endif; ?>
					<div class="styled_blog__widget--excerpt--content">
						<?php the_excerpt(); ?>
					</div>
				</div>
			</div>
			<?php endif; ?>

			<?php
			echo $args['after_widget'];

		}
	}
endif;