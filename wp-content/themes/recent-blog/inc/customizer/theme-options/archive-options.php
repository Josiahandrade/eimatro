<?php
/**
 * Blog / Archive Options
 */

$wp_customize->add_section(
	'recent_blog_archive_page_options',
	array(
		'title' => esc_html__( 'Blog / Archive Pages Options', 'recent-blog' ),
		'panel' => 'recent_blog_theme_options_panel',
	)
);

// Excerpt - Excerpt Length.
$wp_customize->add_setting(
	'recent_blog_excerpt_length',
	array(
		'default'           => 15,
		'sanitize_callback' => 'recent_blog_sanitize_number_range',
	)
);

$wp_customize->add_control(
	'recent_blog_excerpt_length',
	array(
		'label'       => esc_html__( 'Excerpt Length (no. of words)', 'recent-blog' ),
		'section'     => 'recent_blog_archive_page_options',
		'settings'    => 'recent_blog_excerpt_length',
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 5,
			'max'  => 200,
			'step' => 1,
		),
	)
);

// Enable archive page category setting.
$wp_customize->add_setting(
	'recent_blog_enable_archive_category',
	array(
		'default'           => true,
		'sanitize_callback' => 'recent_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Recent_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'recent_blog_enable_archive_category',
		array(
			'label'    => esc_html__( 'Enable Category', 'recent-blog' ),
			'settings' => 'recent_blog_enable_archive_category',
			'section'  => 'recent_blog_archive_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable archive page author setting.
$wp_customize->add_setting(
	'recent_blog_enable_archive_author',
	array(
		'default'           => true,
		'sanitize_callback' => 'recent_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Recent_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'recent_blog_enable_archive_author',
		array(
			'label'    => esc_html__( 'Enable Author', 'recent-blog' ),
			'settings' => 'recent_blog_enable_archive_author',
			'section'  => 'recent_blog_archive_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable archive page date setting.
$wp_customize->add_setting(
	'recent_blog_enable_archive_date',
	array(
		'default'           => true,
		'sanitize_callback' => 'recent_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Recent_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'recent_blog_enable_archive_date',
		array(
			'label'    => esc_html__( 'Enable Date', 'recent-blog' ),
			'settings' => 'recent_blog_enable_archive_date',
			'section'  => 'recent_blog_archive_page_options',
			'type'     => 'checkbox',
		)
	)
);
