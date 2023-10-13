<?php

/**
 * Color Options
 */

// Site tagline color setting.
$wp_customize->add_setting(
	'recent_blog_header_tagline',
	array(
		'default'           => '#000000',
		'sanitize_callback' => 'recent_blog_sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'recent_blog_header_tagline',
		array(
			'label'   => esc_html__( 'Site tagline Color', 'recent-blog' ),
			'section' => 'colors',
		)
	)
);
