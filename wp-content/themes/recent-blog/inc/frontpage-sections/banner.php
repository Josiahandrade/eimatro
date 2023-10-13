<?php
/**
 * Template part for displaying front page introduction.
 *
 * @package Recent Blog
 */

// Banner Section.
$banner_section = get_theme_mod( 'recent_blog_banner_section_enable', false );

if ( false === $banner_section ) {
	return;
}

$content_ids      = array();
$posts_grid_content_type = get_theme_mod( 'recent_blog_banner_section_content_type', 'post' );

for ( $i = 1; $i <= 3; $i++ ) {
	$content_ids[] = get_theme_mod( 'recent_blog_banner_section_' . $posts_grid_content_type . '_' . $i );
}

$args = array(
	'post_type'           => $posts_grid_content_type,
	'post__in'            => array_filter( $content_ids ),
	'orderby'             => 'post__in',
	'posts_per_page'      => absint( 3 ),
	'ignore_sticky_posts' => true,
);

$query = new WP_Query( $args );
if ( $query->have_posts() ) {

	$button_label = get_theme_mod( 'recent_blog_banner_section_button_label', __( 'Read More', 'recent-blog' ) );
	$banner_style = get_theme_mod( 'recent_blog_banner_section_styles', 'style-1' );
	?>
	<div id="recent_blog_banner_section" class="frontpage banner-navigation banner-section style-1">

		<?php
		$color1 = get_theme_mod( 'recent_blog_banner_circle_color1', '#f9aa01' );
		$color2 = get_theme_mod( 'recent_blog_banner_circle_color2', '#FF4AC2' );
		$color3 = get_theme_mod( 'recent_blog_banner_circle_color3', '#4a42ec' );
		if ( get_theme_mod('recent_blog_banner_colors_enable', true) === true ): 
			?>
			<div class="circle one" style="background-color:<?php echo esc_attr( $color1 ); ?>" ></div>
			<div class="circle two" style="background-color:<?php echo esc_attr( $color2 ); ?>" ></div>
			<div class="circle three" style="background-color:<?php echo esc_attr( $color3 ); ?>" ></div>
		<?php endif; ?>

		<div class="theme-wrapper">
			<div class="banner-section-wrapper adore-navigation">
				<?php
				while ( $query->have_posts() ) :
					$query->the_post();
					?>
					<div class="banner-item">
						<div class="post-item post-list">
							<div class="post-item-image">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'post-thumbnail' ); ?>
								</a>
								<div class="read-time-comment">
									<span class="reading-time">
										<i class="far fa-clock"></i>
										<?php
										echo recent_blog_time_interval( get_the_content() );
										echo esc_html__( ' min read', 'recent-blog' );
										?>
									</span>
									<span class="comment">
										<i class="far fa-comment"></i>
										<?php echo absint( get_comments_number( get_the_ID() ) ); ?>
									</span>
								</div>
							</div>
							<div class="post-item-content">
								<div class="entry-cat">
									<?php the_category( '', '', get_the_ID() ); ?>
								</div>
								<h3 class="entry-title">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h3>  
								<ul class="entry-meta">
									<li class="post-author"> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><i class="far fa-user"></i><?php echo esc_html( get_the_author() ); ?></a></li>
									<li class="post-date"><i class="far fa-calendar-alt"></i></span><?php echo esc_html( get_the_date() ); ?></li>
								</ul>
								<div class="post-exerpt">
									<p><?php echo wp_kses_post( wp_trim_words( get_the_excerpt(), 20 ) ); ?></p>
								</div>
								<?php if ( ! empty( $button_label ) ) { ?>
									<div class="post-btn">
										<a href="<?php the_permalink(); ?>" class="btn-read-more"><?php echo esc_html( $button_label ); ?></a>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
					<?php
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		</div>
	</div>

	<?php
}
