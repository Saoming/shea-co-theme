<?php
/**
 * Register the custom post types
 *
 * @package TenUpTheme
 */

namespace TenUpTheme\Theme;

/**
 * Registers Custom Post Types for the Shea Theme
 */
class RegisterPostTypes {

	/**
	 * Runs the WordPress hooks
	 *
	 * @return void
	 */
	public function init_hooks() {
		add_action( 'init', array( $this, 'register_transactions_cpt' ) );
		add_action( 'init', array( $this, 'register_people_cpt' ) );

	}

	/**
	 * Registers Transactions CPT
	 *
	 * @return void
	 */
	public function register_transactions_cpt() {
		$labels = array(
			'name'                  => _x( 'Transactions', 'Post Type General Name', 'shea-co-theme' ),
			'singular_name'         => _x( 'Transaction', 'Post Type Singular Name', 'shea-co-theme' ),
			'menu_name'             => __( 'Transactions', 'shea-co-theme' ),
			'name_admin_bar'        => __( 'Transaction', 'shea-co-theme' ),
			'archives'              => __( 'Transaction Archives', 'shea-co-theme' ),
			'attributes'            => __( 'Transaction Attributes', 'shea-co-theme' ),
			'parent_item_colon'     => __( 'Parent transaction:', 'shea-co-theme' ),
			'all_items'             => __( 'All transactions', 'shea-co-theme' ),
			'add_new_item'          => __( 'Add New Transaction', 'shea-co-theme' ),
			'add_new'               => __( 'Add New', 'shea-co-theme' ),
			'new_item'              => __( 'New Transaction', 'shea-co-theme' ),
			'edit_item'             => __( 'Edit Transaction', 'shea-co-theme' ),
			'update_item'           => __( 'Update Transaction', 'shea-co-theme' ),
			'view_item'             => __( 'View Transaction', 'shea-co-theme' ),
			'view_items'            => __( 'View Transactions', 'shea-co-theme' ),
			'search_items'          => __( 'Search Transaction', 'shea-co-theme' ),
			'not_found'             => __( 'Not found', 'shea-co-theme' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'shea-co-theme' ),
			'featured_image'        => __( 'Featured Image', 'shea-co-theme' ),
			'set_featured_image'    => __( 'Set featured image', 'shea-co-theme' ),
			'remove_featured_image' => __( 'Remove featured image', 'shea-co-theme' ),
			'use_featured_image'    => __( 'Use as featured image', 'shea-co-theme' ),
			'insert_into_item'      => __( 'Insert into transaction', 'shea-co-theme' ),
			'uploaded_to_this_item' => __( 'Uploaded to this transaction', 'shea-co-theme' ),
			'items_list'            => __( 'Transactions list', 'shea-co-theme' ),
			'items_list_navigation' => __( 'Transactions list navigation', 'shea-co-theme' ),
			'filter_items_list'     => __( 'Filter Transactions list', 'shea-co-theme' ),
		);
		$args   = array(
			'label'               => __( 'Transaction', 'shea-co-theme' ),
			'description'         => __( 'Transactions representing more than $40Bn+ in value across the strategic acquirer and financial investor landscape, with clients in the U.S., Canada, Europe and Israel.', 'shea-co-theme' ),
			'labels'              => $labels,
			'supports'            => array(
				'editor',
				'thumbnail',
	            'title',
	            'page-attributes',
	            'custom-fields',
				'revisions'
			),
			'hierarchical'        => true,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-analytics',
			'show_in_admin_bar'   => true,
			'show_admin_column'	  => true,
			'show_in_nav_menus'   => false,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
			'rewrite'   => array(
				'slug'  => 'transaction',
				'with_front' => false
			),
			'show_in_rest'        => true,
		);
		register_post_type( 'transaction', $args );
	}

	/**
	 * Registers People CPT
	 *
	 * @return void
	 */
	public function register_people_cpt() {
		$labels = array(
			'name'                  => _x( 'People', 'Post Type General Name', 'shea-co-theme' ),
			'singular_name'         => _x( 'Person', 'Post Type Singular Name', 'shea-co-theme' ),
			'menu_name'             => __( 'People', 'shea-co-theme' ),
			'name_admin_bar'        => __( 'Person', 'shea-co-theme' ),
			'archives'              => __( 'Person Archives', 'shea-co-theme' ),
			'attributes'            => __( 'Person Attributes', 'shea-co-theme' ),
			'parent_item_colon'     => __( 'Parent result:', 'shea-co-theme' ),
			'all_items'             => __( 'All results', 'shea-co-theme' ),
			'add_new_item'          => __( 'Add New Person', 'shea-co-theme' ),
			'add_new'               => __( 'Add New', 'shea-co-theme' ),
			'new_item'              => __( 'New Person', 'shea-co-theme' ),
			'edit_item'             => __( 'Edit Person', 'shea-co-theme' ),
			'update_item'           => __( 'Update Person', 'shea-co-theme' ),
			'view_item'             => __( 'View Person', 'shea-co-theme' ),
			'view_items'            => __( 'View People', 'shea-co-theme' ),
			'search_items'          => __( 'Search Person', 'shea-co-theme' ),
			'not_found'             => __( 'Not found', 'shea-co-theme' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'shea-co-theme' ),
			'featured_image'        => __( 'Featured Image', 'shea-co-theme' ),
			'set_featured_image'    => __( 'Set featured image', 'shea-co-theme' ),
			'remove_featured_image' => __( 'Remove featured image', 'shea-co-theme' ),
			'use_featured_image'    => __( 'Use as featured image', 'shea-co-theme' ),
			'insert_into_item'      => __( 'Insert into result', 'shea-co-theme' ),
			'uploaded_to_this_item' => __( 'Uploaded to this result', 'shea-co-theme' ),
			'items_list'            => __( 'People list', 'shea-co-theme' ),
			'items_list_navigation' => __( 'People list navigation', 'shea-co-theme' ),
			'filter_items_list'     => __( 'Filter results list', 'shea-co-theme' ),
		);
		$args   = array(
			'label'               => __( 'People', 'shea-co-theme' ),
			'description'         => __( 'Associate currently working for Shea & Co', 'shea-co-theme' ),
			'labels'              => $labels,
			'supports'            => array(
				'thumbnail',
	            'title',
	            'page-attributes',
	            'custom-fields',
				'revisions'
			),
			'hierarchical'        => true,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-groups',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => false,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
			'rewrite'			  => array(
				'slug'			  => 'people',
				'with_front'      => false
			),
			'show_in_rest'        => true,
		);
		register_post_type( 'people', $args );
	}




}
