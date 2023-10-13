<?php
/**
 * Adore Themes Customizer
 *
 * @package Recent Blog
 *
 * Banner Section
 */

$wp_customize->add_section(
	'recent_blog_banner_section',
	array(
		'title' => esc_html__( 'Banner Section', 'recent-blog' ),
		'panel' => 'recent_blog_frontpage_panel',
	)
);

// Banner section enable settings.
$wp_customize->add_setting(
	'recent_blog_banner_section_enable',
	array(
		'default'           => false,
		'sanitize_callback' => 'recent_blog_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Recent_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'recent_blog_banner_section_enable',
		array(
			'label'    => esc_html__( 'Enable Banner Section', 'recent-blog' ),
			'type'     => 'checkbox',
			'settings' => 'recent_blog_banner_section_enable',
			'section'  => 'recent_blog_banner_section',
		)
	)
);

// Banner Section content type settings.
$wp_customize->add_setting(
	'recent_blog_banner_section_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'recent_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'recent_blog_banner_section_content_type',
	array(
		'label'           => esc_html__( 'Content type:', 'recent-blog' ),
		'description'     => esc_html__( 'Choose where you want to render the content from.', 'recent-blog' ),
		'section'         => 'recent_blog_banner_section',
		'type'            => 'select',
		'active_callback' => 'recent_blog_if_banner_section_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'recent-blog' ),
			'page'     => esc_html__( 'Page', 'recent-blog' ),
		),
	)
);

for ( $i = 1; $i <= 3; $i++ ) {
	// Banner Section post setting.
	$wp_customize->add_setting(
		'recent_blog_banner_section_post_' . $i,
		array(
			'sanitize_callback' => 'recent_blog_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'recent_blog_banner_section_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Post %d', 'recent-blog' ), $i ),
			'section'         => 'recent_blog_banner_section',
			'type'            => 'select',
			'choices'         => recent_blog_get_post_choices(),
			'active_callback' => 'recent_blog_banner_section_content_type_post_enabled',
		)
	);

	// Banner Section page setting.
	$wp_customize->add_setting(
		'recent_blog_banner_section_page_' . $i,
		array(
			'default'           => 0,
			'sanitize_callback' => 'recent_blog_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'recent_blog_banner_section_page_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Page %d', 'recent-blog' ), $i ),
			'section'         => 'recent_blog_banner_section',
			'type'            => 'dropdown-pages',
			'choices'         => recent_blog_get_page_choices(),
			'active_callback' => 'recent_blog_banner_section_content_type_page_enabled',
		)
	);
}

// Banner Section button label setting.
$wp_customize->add_setting(
	'recent_blog_banner_section_button_label',
	array(
		'default'           => __( 'Read More', 'recent-blog' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'recent_blog_banner_section_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'recent-blog' ),
		'section'         => 'recent_blog_banner_section',
		'type'            => 'text',
		'active_callback' => 'recent_blog_if_banner_section_enabled',
	)
);

// Banner colors enable settings.
$wp_customize->add_setting(
	'recent_blog_banner_colors_enable',
	array(
		'default'           => true,
		'sanitize_callback' => 'recent_blog_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Recent_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'recent_blog_banner_colors_enable',
		array(
			'label'           => esc_html__( 'Enable Banner Colors', 'recent-blog' ),
			'type'            => 'checkbox',
			'settings'        => 'recent_blog_banner_colors_enable',
			'section'         => 'recent_blog_banner_section',
			'active_callback' => 'recent_blog_if_banner_section_enabled',
		)
	)
);

// Banner Section Circle color 1.
$wp_customize->add_setting(
	'recent_blog_banner_circle_color1',
	array(
		'default'           => '#f9aa01',
		'sanitize_callback' => 'recent_blog_sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'recent_blog_banner_circle_color1',
		array(
			'label'           => esc_html__( 'Circle Color 1', 'recent-blog' ),
			'section'         => 'recent_blog_banner_section',
			'settings'        => 'recent_blog_banner_circle_color1',
			'active_callback' => 'recent_blog_banner_section_colors_enabled',
		)
	)
);

// Banner Section Circle color 2.
$wp_customize->add_setting(
	'recent_blog_banner_circle_color2',
	array(
		'default'           => '#FF4AC2',
		'sanitize_callback' => 'recent_blog_sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'recent_blog_banner_circle_color2',
		array(
			'label'           => esc_html__( 'Circle Color 2', 'recent-blog' ),
			'section'         => 'recent_blog_banner_section',
			'settings'        => 'recent_blog_banner_circle_color2',
			'active_callback' => 'recent_blog_banner_section_colors_enabled',
		)
	)
);

// Banner Section Circle color 3.
$wp_customize->add_setting(
	'recent_blog_banner_circle_color3',
	array(
		'default'           => '#4a42ec',
		'sanitize_callback' => 'recent_blog_sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'recent_blog_banner_circle_color3',
		array(
			'label'           => esc_html__( 'Circle Color 3', 'recent-blog' ),
			'section'         => 'recent_blog_banner_section',
			'settings'        => 'recent_blog_banner_circle_color3',
			'active_callback' => 'recent_blog_banner_section_colors_enabled',
		)
	)
);

/*========================Active Callback==============================*/
function recent_blog_if_banner_section_enabled( $control ) {
	return $control->manager->get_setting( 'recent_blog_banner_section_enable' )->value();
}
function recent_blog_banner_section_content_type_page_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'recent_blog_banner_section_content_type' )->value();
	return recent_blog_if_banner_section_enabled( $control ) && ( 'page' === $content_type );
}
function recent_blog_banner_section_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'recent_blog_banner_section_content_type' )->value();
	return recent_blog_if_banner_section_enabled( $control ) && ( 'post' === $content_type );
}
function recent_blog_banner_section_colors_enabled( $control ) {
	$colors = $control->manager->get_setting( 'recent_blog_banner_colors_enable' )->value();
	return recent_blog_if_banner_section_enabled( $control ) && ( true === $colors );
}
