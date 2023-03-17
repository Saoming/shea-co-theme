<?php
/**
 * Registers Custom Taxonomies
 *
 * @package stride-theme
 */

namespace TenUpTheme\Theme;

/**
 * Handles the taxonomy registration
 */
class RegisterTaxonomy {

	/**
	 * Initialized the WordPress Hooks
	 *
	 * @return void
	 */
	public function init_hooks() {
		add_action( 'init', array( $this, 'register_transaction_taxonomy' ) );
	}

	/**
	 * Register the Resource content type taxonomy
	 *
	 * @return void
	 */
	public function register_transaction_taxonomy() {

		register_taxonomy('transaction-investor', array('transaction'), array(
			'labels'                => array(
				'name'                       => __( 'Buyside Investors', 'sheacompany' ),
				'add_new_item'               => __( 'Add New Buyside Investor', 'textdomain' ),
				'separate_items_with_commas' => __( 'Separate Buyside Investors with commas', 'sheacompany' ),
				'choose_from_most_used'      => __( 'Choose from the most used Buyside Investors', 'sheacompany' ),
			),
			'description'           => 'Investor Buyside Types are like tags.',
			'hierarchical'          => false,
			'show_admin_column'     => true,
			'show_in_rest' => true,
			'update_count_callback' => '_update_post_term_count',
			'rewrite'               => array(
				'slug' => '/transactions/transaction-investor',
				'with_front' => false
			),
		));
    	register_taxonomy_for_object_type( 'transaction-investor', 'transaction' );

		register_taxonomy('transaction-sellside-investor', array('transaction'), array(
			'labels'                => array(
				'name'                       => __( 'Sellside Investors', 'sheacompany' ),
				'add_new_item'               => __( 'Add New Sellside Investor', 'textdomain' ),
				'separate_items_with_commas' => __( 'Separate Sellside Investors with commas', 'sheacompany' ),
				'choose_from_most_used'      => __( 'Choose from the most used Sellside Investors', 'sheacompany' ),
			),
			'description'           => 'Investor Sellside Types are like tags.',
			'hierarchical'          => false,
			'show_admin_column'     => true,
			'update_count_callback' => '_update_post_term_count',
			'rewrite'               => array(
				'slug' => '/transactions/transaction-sellside-investor',
				'with_front' => false
			),
		));
		register_taxonomy_for_object_type( 'transaction-sellside-investor', 'transaction' );

		register_taxonomy('transaction-type', array('transaction'), array(
			'labels'                => array(
				'name'                       => __( 'Transaction Type', 'sheacompany' ),
				'add_new_item'               => __( 'Add New Transaction Type', 'textdomain' ),
				'separate_items_with_commas' => __( 'Separate Transaction Types with commas', 'sheacompany' ),
				'choose_from_most_used'      => __( 'Choose from the most used Transaction Types', 'sheacompany' ),
			),
			'description'           => 'Transaction Types are like tags.',
			'hierarchical'          => false,
			'show_admin_column'     => true,
			'show_in_rest' => true,
			'update_count_callback' => '_update_post_term_count',
			'rewrite'               => array(
				'slug' => '/transactions/transaction-type',
				'with_front' => false
			),
		));
		register_taxonomy_for_object_type( 'transaction-type', 'transaction' );

		register_taxonomy('location', array('transaction'), array(
			'labels'                => array(
				'name'                       => __( 'Location', 'sheacompany' ),
				'add_new_item'               => __( 'Add New Location', 'textdomain' ),
				'separate_items_with_commas' => __( 'Separate Locations with commas', 'sheacompany' ),
				'choose_from_most_used'      => __( 'Choose from the most used Locations', 'sheacompany' ),
			),
			'description'           => 'Locations are like tags.',
			'hierarchical'          => false,
			'show_admin_column'     => true,
			'show_in_rest' => true,
			'update_count_callback' => '_update_post_term_count',
			'rewrite'               => array(
				'slug' => '/transactions/location',
				'with_front' => false
			),
		));
		register_taxonomy_for_object_type( 'location', 'transaction' );

		register_taxonomy('sector', array('transaction'), array(
			'labels'                => array(
				'name'                       => __( 'Sector', 'sheacompany' ),
				'add_new_item'               => __( 'Add New Sector', 'textdomain' ),
				'separate_items_with_commas' => __( 'Separate Sectors with commas', 'sheacompany' ),
				'choose_from_most_used'      => __( 'Choose from the most used Sectors', 'sheacompany' ),
			),
			'description'           => 'Sectors are like tags.',
			'hierarchical'          => false,
			'show_admin_column'     => true,
			'show_in_rest' => true,
			'update_count_callback' => '_update_post_term_count',
			'rewrite'               => array(
				'slug' => '/transactions/sector',
				'with_front' => false
			),
		));
		register_taxonomy_for_object_type( 'sector', 'transaction' );

		register_taxonomy('subsector', array('transaction'), array(
			'labels'                => array(
				'name'                       => __( 'Subsector', 'sheacompany' ),
				'add_new_item'               => __( 'Add New Subsector', 'textdomain' ),
				'separate_items_with_commas' => __( 'Separate Subsectors with commas', 'sheacompany' ),
				'choose_from_most_used'      => __( 'Choose from the most used Subsectors', 'sheacompany' ),
			),
			'description'           => 'Subsectors are like tags.',
			'hierarchical'          => false,
			'show_admin_column'     => true,
			'show_in_rest' => true,
			'update_count_callback' => '_update_post_term_count',
			'rewrite'               => array(
				'slug' => '/transactions/subsector',
				'with_front' => false
			),
		));
		register_taxonomy_for_object_type( 'subsector', 'transaction' );

	}
}
