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

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the alpinejs / any 3rd part library on each release.
	define( '_S_VERSION', '3.12.0' );
}

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

// Alpine js support

if( defined('ALPINEJS') ){

	add_action( 'wp_enqueue_scripts', 'register_custom_script_alpine_js' );
	function register_custom_script_alpine_js() {
		wp_enqueue_script( 'alpinejs', '//unpkg.com/alpinejs', array(), _S_VERSION );
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

add_action('rest_api_init', function () {
	register_rest_route('custom/v1', '/transactions/', [
	  'methods' => 'GET',
	  'callback' => 'get_transactions',
	]);
  });

  function get_transactions($request) {

	$paged = $request->get_param('page') ? $request->get_param('page') : 1;
	$year  = $request->get_param('year') ? $request->get_param('year') : NULL;

	$args = [
		'post_type' => 'transaction',
		'posts_per_page' => -1,
		'paged' => $paged,
		'tax_query' => [],
		'orderby'=> 'date',
		'order'		=> 'DESC'
	];

	if($year) {
		$args['meta_query'] = [
			[
				'key'     => 'transaction_announcement_date',
				'compare' => 'LIKE',
				'value'   => $year,
			],
		];
	}

	$taxonomies = [
	  'transaction-type' => 'transaction-type',
	  'location' => 'location',
	  'sector' => 'sector',
	  'subsector' => 'subsector',
	];

	foreach ($taxonomies as $param => $taxonomy) {
	  if (!empty($request->get_param($param))) {
		$args['tax_query'][] = [
		  'taxonomy' => $taxonomy,
		  'field' => 'slug',
		  'terms' => explode(',', $request->get_param($param)),
		];
	  }
	}

	$query = new WP_Query($args);

	if ($query->have_posts()) {
	  $transactions = [];
	  while ($query->have_posts()) {
		$query->the_post();
		$transactions[] = [
		  'ID' 		=> get_the_ID(),
		  'title' 	=> get_the_title(),
		  'link'	=> get_permalink(),
		  'year'	=> wp_date('Y', strtotime(get_field('transaction_announcement_date'))),
		  'content' => get_the_content(),
		  'acf'     => get_fields(),
		];
	  }
	  wp_reset_postdata();


	  return new WP_REST_Response($transactions, 200);
	} else {
	  return new WP_Error('no_transactions', 'No transactions found', ['status' => 404]);
	}
  }

/**
 * Add Active CSS class for a nav menu based on condition.
 *
 * @param array  $classes The CSS classes that are applied to the menu item's <li> element.
 * @param object $item    The current menu item.
 * @return array (maybe) modified nav menu class.
 */
function custom_menu_class( $classes, $item ) {
	$post = get_post();

	if ( $item->title == $post->post_title ) {
		array_push($classes, 'active');
	}

	return $classes;
}
add_filter( 'nav_menu_css_class' , 'custom_menu_class' , 10, 2 );

/**
 * Add Green House Job Boards in the footer
 *
 */

add_action('wp_footer','greenhouse_scripts');
function greenhouse_scripts(){
    if( is_page('careers') ) {
		echo '<script src="https://boards.greenhouse.io/embed/job_board/js?for=sheacompany"></script>';
	}
}
