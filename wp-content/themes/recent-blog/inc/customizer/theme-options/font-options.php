<?php

/**
 * Font section
 */

// Font section.
$wp_customize->add_section(
	'recent_blog_font_options',
	array(
		'title' => esc_html__( 'Font ( Typography ) Options', 'recent-blog' ),
		'panel' => 'recent_blog_theme_options_panel',
	)
);

// Typography - Site Title Font.
$wp_customize->add_setting(
	'recent_blog_site_title_font',
	array(
		'default'           => '',
		'sanitize_callback' => 'recent_blog_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'recent_blog_site_title_font',
	array(
		'label'    => esc_html__( 'Site Title Font Family', 'recent-blog' ),
		'section'  => 'recent_blog_font_options',
		'settings' => 'recent_blog_site_title_font',
		'type'     => 'select',
		'choices'  => recent_blog_font_choices(),
	)
);

// Typography - Site Description Font.
$wp_customize->add_setting(
	'recent_blog_site_description_font',
	array(
		'default'           => '',
		'sanitize_callback' => 'recent_blog_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'recent_blog_site_description_font',
	array(
		'label'    => esc_html__( 'Site Description Font Family', 'recent-blog' ),
		'section'  => 'recent_blog_font_options',
		'settings' => 'recent_blog_site_description_font',
		'type'     => 'select',
		'choices'  => recent_blog_font_choices(),
	)
);

// Typography - Header Font.
$wp_customize->add_setting(
	'recent_blog_header_font',
	array(
		'default'           => '',
		'sanitize_callback' => 'recent_blog_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'recent_blog_header_font',
	array(
		'label'    => esc_html__( 'Header Font Family', 'recent-blog' ),
		'section'  => 'recent_blog_font_options',
		'settings' => 'recent_blog_header_font',
		'type'     => 'select',
		'choices'  => recent_blog_font_choices(),
	)
);

// Typography - Body Font.
$wp_customize->add_setting(
	'recent_blog_body_font',
	array(
		'default'           => '',
		'sanitize_callback' => 'recent_blog_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'recent_blog_body_font',
	array(
		'label'    => esc_html__( 'Body Font Family', 'recent-blog' ),
		'section'  => 'recent_blog_font_options',
		'settings' => 'recent_blog_body_font',
		'type'     => 'select',
		'choices'  => recent_blog_font_choices(),
	)
);
