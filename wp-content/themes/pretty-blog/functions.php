<?php
/**
 * Pretty Blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Pretty Blog
 */

add_theme_support( 'title-tag' );

add_theme_support( 'automatic-feed-links' );

add_theme_support( 'register_block_style' );

add_theme_support( 'register_block_pattern' );

add_theme_support( 'responsive-embeds' );

add_theme_support( 'wp-block-styles' );

add_theme_support( 'align-wide' );

add_theme_support(
	'html5',
	array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'style',
		'script',
	)
);

add_theme_support(
	'custom-logo',
	array(
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	)
);

if ( ! function_exists( 'pretty_blog_setup' ) ) :
	function pretty_blog_setup() {
		/*
		* Make child theme available for translation.
		* Translations can be filed in the /languages/ directory.
		*/
		load_child_theme_textdomain( 'pretty-blog', get_stylesheet_directory() . '/languages' );
	}
endif;
add_action( 'after_setup_theme', 'pretty_blog_setup' );

if ( ! function_exists( 'pretty_blog_enqueue_styles' ) ) :
	/**
	 * Enqueue scripts and styles.
	 */
	function pretty_blog_enqueue_styles() {
		$parenthandle = 'recent-blog-style';
		$theme        = wp_get_theme();

		wp_enqueue_style(
			$parenthandle,
			get_template_directory_uri() . '/style.css',
			array(
				'recent-blog-fonts',
				'recent-blog-slick-style',
				'recent-blog-fontawesome-style',
				'recent-blog-blocks-style',
			),
			$theme->parent()->get( 'Version' )
		);

		wp_enqueue_style(
			'pretty-blog-style',
			get_stylesheet_uri(),
			array( $parenthandle ),
			$theme->get( 'Version' )
		);

	}

endif;

add_action( 'wp_enqueue_scripts', 'pretty_blog_enqueue_styles' );

require get_theme_file_path() . '/inc/customizer/customizer.php';

function pretty_blog_load_custom_wp_admin_style() {
	?>
	<style type="text/css">

		.ocdi p.demo-data-download-link {
			display: none !important;
		}

	</style>

	<?php
}
add_action( 'admin_enqueue_scripts', 'pretty_blog_load_custom_wp_admin_style' );

// Style for demo data download link
function pretty_blog_admin_panel_demo_data_download_link() {
	?>
	<style type="text/css">
		p.pretty-blog-demo-data {
			font-size: 16px;
			font-weight: 700;
			display: inline-block;
			border: 0.5px solid #dfdfdf;
			padding: 8px;
			background: #ffff;
		}
	</style>
	<?php
}
add_action( 'admin_enqueue_scripts', 'pretty_blog_admin_panel_demo_data_download_link' );

/**
 * Widgets.
 */
require get_theme_file_path() . '/inc/widgets/grid-posts-widget.php';

// One Click Demo Import after import setup.
 if ( class_exists( 'OCDI_Plugin' ) ) {
 	require get_theme_file_path() . '/inc/demo-import.php';
 }