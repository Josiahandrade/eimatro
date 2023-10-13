<?php
/**
 * Template part for displaying front page introduction.
 *
 * @package Pretty Blog
 */

// Featured Posts Section.
$featured_posts_section = get_theme_mod( 'pretty_blog_featured_posts_section_enable', false );

if ( false === $featured_posts_section ) {
	return;
}

$content_ids = array();

$featured_posts_content_type = get_theme_mod( 'pretty_blog_featured_posts_content_type', 'post' );

if ( $featured_posts_content_type === 'post' ) {

	for ( $i = 1; $i <= 4; $i++ ) {
		$content_ids[] = get_theme_mod( 'pretty_blog_featured_posts_post_' . $i );
	}

	$args = array(
		'post_type'           => 'post',
		'post__in'            => array_filter( $content_ids ),
		'orderby'             => 'post__in',
		'posts_per_page'      => absint( 4 ),
		'ignore_sticky_posts' => true,
	);

} else {
	$cat_content_id = get_theme_mod( 'pretty_blog_featured_posts_category' );
	$args           = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 4 ),
	);
}

$query = new WP_Query( $args );
if ( $query->have_posts() ) {

	$button_label = get_theme_mod( 'pretty_blog_featured_posts_button_label', __( 'Read More', 'pretty-blog' ) );
	?>
	<div id="pretty_blog_featured_posts_section" class="frontpage featured-grid-section style-1">
		<div class="theme-wrapper">
			<div class="featured-grid-wrapper">
				<?php
				$i = 1;
				while ( $query->have_posts() ) :
					$query->the_post();
					$classes = $i === 1 ? 'post-list' : 'post-grid';
					?>
					<div class="post-item <?php echo esc_attr( $classes ); ?>">
						<div class="post-item-image">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'post-thumbnail' ); ?>
							</a>
							<div class="read-time-comment">
								<span class="reading-time">
									<i class="far fa-clock"></i>
									<?php
									echo recent_blog_time_interval( get_the_content() );
									echo esc_html__( ' min read', 'pretty-blog' );
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
							<?php if ( $i === 1 ): ?>
								<div class="post-exerpt">
									<p><?php echo wp_kses_post( wp_trim_words( get_the_content(), 40 ) ); ?></p>
								</div>
								<?php if ( ! empty( $button_label ) ) { ?>
									<div class="post-btn">
										<a href="<?php the_permalink(); ?>" class="btn-read-more"><?php echo esc_html( $button_label ); ?></a>
									</div>
								<?php }
							endif; ?>
						</div>
					</div>
					<?php
					$i++;
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		</div>
	</div>

	<?php
}
