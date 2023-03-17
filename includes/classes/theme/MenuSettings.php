<?php
/**
 * Menu Location Registration
 *
 * @package stride-theme
 */

namespace TenUpTheme\Theme;

/**
 * Handles Menu Location Registration
 */
class MenuSettings {
	/**
	 * Initializes WordPress hooks
	 *
	 * @return void
	 */
	public function init_hooks() {
		add_action( 'after_setup_theme', array( $this, 'register_menu_theme_locations' ) );
	}

	/**
	 * Registers menu theme locations
	 */
	public function register_menu_theme_locations() {
		register_nav_menus(
			array(
				'menu_footer_one'   => esc_html__( 'Footer 1st Sub Column Menu', 'shea-co-theme' ),
				'menu_footer_two'   => esc_html__( 'Footer 2nd Sub Column Menu', 'shea-co-theme' ),
			)
		);
	}
}
