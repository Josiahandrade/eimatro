<?php
/**
 * Pagination setting
 */

// Pagination setting.
$wp_customize->add_section(
	'recent_blog_pagination',
	array(
		'title' => esc_html__( 'Pagination', 'recent-blog' ),
		'panel' => 'recent_blog_theme_options_panel',
	)
);

// Pagination enable setting.
$wp_customize->add_setting(
	'recent_blog_pagination_enable',
	array(
		'default'           => true,
		'sanitize_callback' => 'recent_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Recent_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'recent_blog_pagination_enable',
		array(
			'label'    => esc_html__( 'Enable Pagination.', 'recent-blog' ),
			'settings' => 'recent_blog_pagination_enable',
			'section'  => 'recent_blog_pagination',
			'type'     => 'checkbox',
		)
	)
);

// Pagination - Pagination Style.
$wp_customize->add_setting(
	'recent_blog_pagination_type',
	array(
		'default'           => 'loadmore',
		'sanitize_callback' => 'recent_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'recent_blog_pagination_type',
	array(
		'label'           => esc_html__( 'Pagination Style', 'recent-blog' ),
		'section'         => 'recent_blog_pagination',
		'type'            => 'select',
		'active_callback' => 'recent_blog_pagination_enabled',
		'choices'         => array(
			'default'  => __( 'Default (Older/Newer)', 'recent-blog' ),
			'loadmore' => __( 'Load More Button', 'recent-blog' ),
		),
	)
);

// Loadmore text label.
$wp_customize->add_setting(
	'recent_blog_loadmore_text_label',
	array(
		'default'           => __( 'Load More', 'recent-blog' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'recent_blog_loadmore_text_label',
	array(
		'label'           => esc_html__( 'Load More Button Label', 'recent-blog' ),
		'settings'        => 'recent_blog_loadmore_text_label',
		'section'         => 'recent_blog_pagination',
		'active_callback' => 'recent_blog_loadmore_text_label_enabled',
	)
);

/*========================Active Callback==============================*/
function recent_blog_pagination_enabled( $control ) {
	return $control->manager->get_setting( 'recent_blog_pagination_enable' )->value();
}
function recent_blog_loadmore_text_label_enabled( $control ) {
	$pagination = $control->manager->get_setting( 'recent_blog_pagination_type' )->value();
	return recent_blog_pagination_enabled( $control ) && ( 'loadmore' === $pagination );
}
