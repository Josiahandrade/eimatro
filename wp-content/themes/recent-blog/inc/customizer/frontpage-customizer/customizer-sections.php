<?php

// Home Page Customizer panel.
$wp_customize->add_panel(
	'recent_blog_frontpage_panel',
	array(
		'title'    => esc_html__( 'Frontpage Sections', 'recent-blog' ),
		'priority' => 140,
	)
);

require get_template_directory() . '/inc/customizer/frontpage-customizer/banner.php';
