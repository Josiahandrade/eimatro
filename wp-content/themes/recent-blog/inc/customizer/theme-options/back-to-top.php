<?php
/**
 * Back To Top settings
 */

$wp_customize->add_section(
	'recent_blog_back_to_top_section',
	array(
		'title' => esc_html__( 'Scroll Up ( Back To Top )', 'recent-blog' ),
		'panel' => 'recent_blog_theme_options_panel',
	)
);

// Scroll to top enable setting.
$wp_customize->add_setting(
	'recent_blog_enable_scroll_to_top',
	array(
		'default'           => true,
		'sanitize_callback' => 'recent_blog_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Recent_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'recent_blog_enable_scroll_to_top',
		array(
			'label'    => esc_html__( 'Enable scroll to top.', 'recent-blog' ),
			'settings' => 'recent_blog_enable_scroll_to_top',
			'section'  => 'recent_blog_back_to_top_section',
			'type'     => 'checkbox',
		)
	)
);
