<?php

// upgrade to pro.
require get_theme_file_path() . '/inc/upgrade-to-pro/class-customize.php';

function pretty_blog_customize_register( $wp_customize ) {

	class Pretty_Blog_Toggle_Checkbox_Custom_control extends WP_Customize_Control {
		public $type = 'toogle_checkbox';

		public function render_content() {
			?>
			<div class="checkbox_switch">
				<div class="onoffswitch">
					<input type="checkbox" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" class="onoffswitch-checkbox" value="<?php echo esc_attr( $this->value() ); ?>" 
					<?php
					$this->link();
					checked( $this->value() );
					?>
					>
					<label class="onoffswitch-label" for="<?php echo esc_attr( $this->id ); ?>"></label>
				</div>
				<span class="customize-control-title onoffswitch_label"><?php echo esc_html( $this->label ); ?></span>
				<p><?php echo wp_kses_post( $this->description ); ?></p>
			</div>
			<?php
		}
	}

	// customizer section.
	require get_theme_file_path() . '/inc/customizer/featured-posts.php';

}
add_action( 'customize_register', 'pretty_blog_customize_register' );

function pretty_blog_custom_control_scripts() {
	wp_enqueue_style( 'pretty-blog-blog-customize-controls', get_theme_file_uri() . '/assets/css/customize-controls.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'pretty_blog_custom_control_scripts' );
