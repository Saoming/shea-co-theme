<?php
/**
 * WP Theme constants and setup functions
 *
 * @package TenUpTheme
 */

// Useful global constants.
define( 'TENUP_THEME_VERSION', '0.1.0' );
define( 'TENUP_THEME_TEMPLATE_URL', get_template_directory_uri() );
define( 'TENUP_THEME_PATH', get_template_directory() . '/' );
define( 'TENUP_THEME_DIST_PATH', TENUP_THEME_PATH . 'dist/' );
define( 'TENUP_THEME_DIST_URL', TENUP_THEME_TEMPLATE_URL . '/dist/' );
define( 'TENUP_THEME_INC', TENUP_THEME_PATH . 'includes/' );
define( 'TENUP_THEME_BLOCK_DIR', TENUP_THEME_INC . 'blocks/' );

$is_local_env = in_array( wp_get_environment_type(), [ 'local', 'development' ], true );
$is_local_url = strpos( home_url(), '.test' ) || strpos( home_url(), '.local' );
$is_local     = $is_local_env || $is_local_url;

if ( $is_local && file_exists( __DIR__ . '/dist/fast-refresh.php' ) ) {
	require_once __DIR__ . '/dist/fast-refresh.php';
	TenUpToolkit\set_dist_url_path( basename( __DIR__ ), TENUP_THEME_DIST_URL, TENUP_THEME_DIST_PATH );
}

require_once TENUP_THEME_INC . 'core.php';
require_once TENUP_THEME_INC . 'overrides.php';
require_once TENUP_THEME_INC . 'template-tags.php';
require_once TENUP_THEME_INC . 'utility.php';
require_once TENUP_THEME_INC . 'blocks.php';

// Run the setup functions.
TenUpTheme\Core\setup();
TenUpTheme\Blocks\setup();

// Require Composer autoloader if it exists.
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}

if ( ! function_exists( 'wp_body_open' ) ) {

	/**
	 * Shim for the the new wp_body_open() function that was added in 5.2
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

// run the additonal core theme
$core = new TenUpTheme\Additional;
$core->init_hooks();

/**
 * Rename default post label wp-admin
 */

 function shea_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Insights';
    $submenu['edit.php'][5][0] = 'Insights';
    $submenu['edit.php'][10][0] = 'Add Insights';
    $submenu['edit.php'][16][0] = 'Insights Tags';
}
function shea_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Insights';
    $labels->singular_name = 'Insight';
    $labels->add_new = 'Add Insight';
    $labels->add_new_item = 'Add Insight';
    $labels->edit_item = 'Edit Insight';
    $labels->new_item = 'Insights';
    $labels->view_item = 'View Insight';
    $labels->search_items = 'Search Insights';
    $labels->not_found = 'No Insights found';
    $labels->not_found_in_trash = 'No Insights found in Trash';
    $labels->all_items = 'All Insights';
    $labels->menu_name = 'Insights';
    $labels->name_admin_bar = 'Insights';
}

add_action( 'admin_menu', 'shea_change_post_label' );
add_action( 'init', 'shea_change_post_object' );

