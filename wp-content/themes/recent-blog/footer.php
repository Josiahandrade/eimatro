<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Recent Blog
 */

?>

</div>

<?php

if ( is_singular( 'post' ) && get_theme_mod( 'recent_blog_enable_related_post_section', true ) ) {
	$cat_content_id = get_the_category( $post->ID )[0]->term_id;
	$args           = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 4 ),
		'post__not_in'   => array( $post->ID ),
		'orderby'        => 'rand',
	);

	$query = new WP_Query( $args );

	if ( $query->have_posts() ) :
		$related_title = get_theme_mod( 'recent_blog_related_posts_title', __( 'Related Posts', 'recent-blog' ) );
		?>
		<div class="related-posts">
			<?php if ( ! empty( $related_title ) ) : ?>
				<h2><?php echo esc_html( $related_title ); ?></h2>
			<?php endif; ?>
			<div class="related-grid theme-archive-layout grid-layout grid-column-4">
				<?php
				while ( $query->have_posts() ) :
					$query->the_post();
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="post-item post-grid">
							<div class="post-item-image">
								<a href="<?php the_permalink(); ?>"><?php recent_blog_post_thumbnail(); ?></a>
							</div>
							<div class="post-item-content">
								<div class="entry-cat">
									<?php the_category( '', '', get_the_ID() ); ?>
								</div>
								<?php
								the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
								?>
								<ul class="entry-meta">
									<li class="post-author"> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><i class="far fa-user"></i><?php echo esc_html( get_the_author() ); ?></a></li>
									<li class="post-date"><i class="far fa-calendar-alt"></i><?php echo esc_html( get_the_date() ); ?></li>

									<li class="read-time">
										<i class="far fa-clock"></i>
										<?php
										echo recent_blog_time_interval( get_the_content() );
										echo esc_html__( ' min read', 'recent-blog' );
										?>
									</li>
									<li class="comment">
										<i class="far fa-comment"></i>
										<?php echo absint( get_comments_number( get_the_ID() ) ); ?>
									</li>
								</ul>
								<div class="post-content">
									<p><?php echo wp_kses_post( wp_trim_words( get_the_excerpt(), get_theme_mod( 'recent_blog_excerpt_length', 15 ) ) ); ?></p>
								</div><!-- post-content -->
							</div>
						</div>
					</article>
					<?php
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		</div>
		<?php
	endif;
}

?>
<?php if ( ! is_front_page() || is_home() ) { ?>
</div>
</div><!-- #content -->

<?php

}

?>
<footer id="colophon" class="site-footer">
	<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) : ?>
	<div class="top-footer">
		<div class="theme-wrapper">
			<div class="top-footer-widgets">

				<?php for ( $i = 1; $i <= 4; $i++ ) { ?>
					<div class="footer-widget">
						<?php dynamic_sidebar( 'footer-' . $i ); ?>
					</div>
				<?php } ?>

			</div>
		</div>
	</div>
<?php endif; ?>

<?php
$recent_blog_search = array( '[the-year]', '[site-link]' );
$replace                 = array( date( 'Y' ), '<a href="' . esc_url( home_url( '/' ) ) . '">' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>' );
$copyright_default       = sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'recent-blog' ), '[the-year]', '[site-link]' );
$copyright_text          = get_theme_mod( 'recent_blog_copyright_txt', $copyright_default );
$copyright_text          = str_replace( $recent_blog_search, $replace, $copyright_text );
?>
<div class="bottom-footer">
	<div class="theme-wrapper">
		<div class="bottom-footer-info">
			<div class="site-info">
				<span>
					<?php echo wp_kses_post( $copyright_text ); ?>
					<?php echo sprintf( esc_html__( 'Theme: %1$s By %2$s.', 'recent-blog' ), wp_get_theme()->get( 'Name' ), '<a href="' . wp_get_theme()->get( 'AuthorURI' ) . '">' . wp_get_theme()->get( 'Author' ) . '</a>' ); ?>
				</span>	
			</div><!-- .site-info -->
		</div>
	</div>
</div>

</footer><!-- #colophon -->

<?php if ( get_theme_mod( 'recent_blog_enable_scroll_to_top', true ) === true ) : ?>
	<a href="#" id="scroll-to-top" class="recent-blog-scroll-to-top"><i class="fas fa-chevron-up"></i></a>		
<?php endif; ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
