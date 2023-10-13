<?php
/**
 * Breadcrumb settings
 */

$wp_customize->add_section(
	'recent_blog_breadcrumb_section',
	array(
		'title' => esc_html__( 'Breadcrumb Options', 'recent-blog' ),
		'panel' => 'recent_blog_theme_options_panel',
	)
);

// Breadcrumb enable setting.
$wp_customize->add_setting(
	'recent_blog_breadcrumb_enable',
	array(
		'default'           => true,
		'sanitize_callback' => 'recent_blog_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Recent_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'recent_blog_breadcrumb_enable',
		array(
			'label'    => esc_html__( 'Enable breadcrumb.', 'recent-blog' ),
			'type'     => 'checkbox',
			'settings' => 'recent_blog_breadcrumb_enable',
			'section'  => 'recent_blog_breadcrumb_section',
		)
	)
);

// Breadcrumb - Separator.
$wp_customize->add_setting(
	'recent_blog_breadcrumb_separator',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '/',
	)
);

$wp_customize->add_control(
	'recent_blog_breadcrumb_separator',
	array(
		'label'           => esc_html__( 'Separator', 'recent-blog' ),
		'section'         => 'recent_blog_breadcrumb_section',
		'active_callback' => function( $control ) {
			return ( $control->manager->get_setting( 'recent_blog_breadcrumb_enable' )->value() );
		},
	)
);
