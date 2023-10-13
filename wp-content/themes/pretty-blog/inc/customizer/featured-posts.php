<?php
/**
 * Adore Themes Customizer
 *
 * @package Pretty Blog
 *
 * Featured Posts Section
 */

$wp_customize->add_section(
	'pretty_blog_featured_posts_section',
	array(
		'title' => esc_html__( 'Featured Posts Section', 'pretty-blog' ),
		'panel' => 'recent_blog_frontpage_panel',
	)
);

// Featured Posts section enable settings.
$wp_customize->add_setting(
	'pretty_blog_featured_posts_section_enable',
	array(
		'default'           => false,
		'sanitize_callback' => 'recent_blog_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Pretty_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'pretty_blog_featured_posts_section_enable',
		array(
			'label'    => esc_html__( 'Enable Featured Posts Section', 'pretty-blog' ),
			'type'     => 'checkbox',
			'settings' => 'pretty_blog_featured_posts_section_enable',
			'section'  => 'pretty_blog_featured_posts_section',
		)
	)
);

// Featured Posts content type settings.
$wp_customize->add_setting(
	'pretty_blog_featured_posts_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'recent_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'pretty_blog_featured_posts_content_type',
	array(
		'label'           => esc_html__( 'Content type:', 'pretty-blog' ),
		'description'     => esc_html__( 'Choose where you want to render the content from.', 'pretty-blog' ),
		'section'         => 'pretty_blog_featured_posts_section',
		'type'            => 'select',
		'active_callback' => 'pretty_blog_if_featured_posts_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'pretty-blog' ),
			'category' => esc_html__( 'Category', 'pretty-blog' ),
		),
	)
);

for ( $i = 1; $i <= 4; $i++ ) {
	// Featured Posts post setting.
	$wp_customize->add_setting(
		'pretty_blog_featured_posts_post_' . $i,
		array(
			'sanitize_callback' => 'recent_blog_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'pretty_blog_featured_posts_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Post %d', 'pretty-blog' ), $i ),
			'section'         => 'pretty_blog_featured_posts_section',
			'type'            => 'select',
			'choices'         => recent_blog_get_post_choices(),
			'active_callback' => 'pretty_blog_featured_posts_section_content_type_post_enabled',
		)
	);
}

// Featured Posts category setting.
$wp_customize->add_setting(
	'pretty_blog_featured_posts_category',
	array(
		'sanitize_callback' => 'recent_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'pretty_blog_featured_posts_category',
	array(
		'label'           => esc_html__( 'Category', 'pretty-blog' ),
		'section'         => 'pretty_blog_featured_posts_section',
		'type'            => 'select',
		'choices'         => recent_blog_get_post_cat_choices(),
		'active_callback' => 'pretty_blog_featured_posts_section_content_type_category_enabled',
	)
);

// Featured Posts button label setting.
$wp_customize->add_setting(
	'pretty_blog_featured_posts_button_label',
	array(
		'default'           => __( 'Read More', 'pretty-blog' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'pretty_blog_featured_posts_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'pretty-blog' ),
		'section'         => 'pretty_blog_featured_posts_section',
		'type'            => 'text',
		'active_callback' => 'pretty_blog_if_featured_posts_enabled',
	)
);

/*========================Active Callback==============================*/
function pretty_blog_if_featured_posts_enabled( $control ) {
	return $control->manager->get_setting( 'pretty_blog_featured_posts_section_enable' )->value();
}
function pretty_blog_featured_posts_section_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'pretty_blog_featured_posts_content_type' )->value();
	return pretty_blog_if_featured_posts_enabled( $control ) && ( 'post' === $content_type );
}
function pretty_blog_featured_posts_section_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'pretty_blog_featured_posts_content_type' )->value();
	return pretty_blog_if_featured_posts_enabled( $control ) && ( 'category' === $content_type );
}
