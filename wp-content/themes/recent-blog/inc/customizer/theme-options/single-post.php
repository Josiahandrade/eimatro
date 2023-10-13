<?php
/**
 * Single Post Options
 */

$wp_customize->add_section(
	'recent_blog_single_page_options',
	array(
		'title' => esc_html__( 'Single Post Options', 'recent-blog' ),
		'panel' => 'recent_blog_theme_options_panel',
	)
);

// Enable single post category setting.
$wp_customize->add_setting(
	'recent_blog_enable_single_category',
	array(
		'default'           => true,
		'sanitize_callback' => 'recent_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Recent_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'recent_blog_enable_single_category',
		array(
			'label'    => esc_html__( 'Enable Category', 'recent-blog' ),
			'settings' => 'recent_blog_enable_single_category',
			'section'  => 'recent_blog_single_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable single post author setting.
$wp_customize->add_setting(
	'recent_blog_enable_single_author',
	array(
		'default'           => true,
		'sanitize_callback' => 'recent_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Recent_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'recent_blog_enable_single_author',
		array(
			'label'    => esc_html__( 'Enable Author', 'recent-blog' ),
			'settings' => 'recent_blog_enable_single_author',
			'section'  => 'recent_blog_single_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable single post date setting.
$wp_customize->add_setting(
	'recent_blog_enable_single_date',
	array(
		'default'           => true,
		'sanitize_callback' => 'recent_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Recent_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'recent_blog_enable_single_date',
		array(
			'label'    => esc_html__( 'Enable Date', 'recent-blog' ),
			'settings' => 'recent_blog_enable_single_date',
			'section'  => 'recent_blog_single_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable single post tag setting.
$wp_customize->add_setting(
	'recent_blog_enable_single_tag',
	array(
		'default'           => true,
		'sanitize_callback' => 'recent_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Recent_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'recent_blog_enable_single_tag',
		array(
			'label'    => esc_html__( 'Enable Post Tag', 'recent-blog' ),
			'settings' => 'recent_blog_enable_single_tag',
			'section'  => 'recent_blog_single_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable single post related Posts setting.
$wp_customize->add_setting(
	'recent_blog_enable_related_post_section',
	array(
		'default'           => true,
		'sanitize_callback' => 'recent_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Recent_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'recent_blog_enable_related_post_section',
		array(
			'label'    => esc_html__( 'Enable Related Posts', 'recent-blog' ),
			'settings' => 'recent_blog_enable_related_post_section',
			'section'  => 'recent_blog_single_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Single post related Posts title label.
$wp_customize->add_setting(
	'recent_blog_related_posts_title',
	array(
		'default'           => __( 'Related Posts', 'recent-blog' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'recent_blog_related_posts_title',
	array(
		'label'           => esc_html__( 'Related Posts Title', 'recent-blog' ),
		'section'         => 'recent_blog_single_page_options',
		'settings'        => 'recent_blog_related_posts_title',
		'active_callback' => 'recent_blog_if_related_posts_enabled',
	)
);

/*========================Active Callback==============================*/
function recent_blog_if_related_posts_enabled( $control ) {
	return $control->manager->get_setting( 'recent_blog_enable_related_post_section' )->value();
}
