<?php
/**
 * Sidebar settings
 */

$wp_customize->add_section(
	'recent_blog_sidebar_option',
	array(
		'title' => esc_html__( 'Sidebar Options', 'recent-blog' ),
		'panel' => 'recent_blog_theme_options_panel',
	)
);

// Sidebar Option - Global Sidebar Position.
$wp_customize->add_setting(
	'recent_blog_sidebar_position',
	array(
		'sanitize_callback' => 'recent_blog_sanitize_select',
		'default'           => 'no-sidebar',
	)
);

$wp_customize->add_control(
	'recent_blog_sidebar_position',
	array(
		'label'   => esc_html__( 'Global Sidebar Position', 'recent-blog' ),
		'section' => 'recent_blog_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'recent-blog' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'recent-blog' ),
		),
	)
);

// Sidebar Option - Post Sidebar Position.
$wp_customize->add_setting(
	'recent_blog_post_sidebar_position',
	array(
		'sanitize_callback' => 'recent_blog_sanitize_select',
		'default'           => 'no-sidebar',
	)
);

$wp_customize->add_control(
	'recent_blog_post_sidebar_position',
	array(
		'label'   => esc_html__( 'Post Sidebar Position', 'recent-blog' ),
		'section' => 'recent_blog_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'recent-blog' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'recent-blog' ),
		),
	)
);

// Sidebar Option - Page Sidebar Position.
$wp_customize->add_setting(
	'recent_blog_page_sidebar_position',
	array(
		'sanitize_callback' => 'recent_blog_sanitize_select',
		'default'           => 'no-sidebar',
	)
);

$wp_customize->add_control(
	'recent_blog_page_sidebar_position',
	array(
		'label'   => esc_html__( 'Page Sidebar Position', 'recent-blog' ),
		'section' => 'recent_blog_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'recent-blog' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'recent-blog' ),
		),
	)
);
