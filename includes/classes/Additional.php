<?php
/**
 * Additional Site Hooks and Filter
 *
 * @package TenUpTheme
 */

namespace TenUpTheme;

use TenUpTheme\Blocks\RegisterBlocks;
use TenUpTheme\Theme\AcfOptionsPage;
use TenUpTheme\Theme\RegisterPostTypes;
use TenUpTheme\Theme\RegisterTaxonomy;
use TenUpTheme\Theme\AddSvgSupport;
use TenUpTheme\Theme\MenuSettings;
use TenUpTheme\Blocks\RegisterBlockCategory;

/**
 * Register Additional Functionality to support the theme
 */

 Class Additional {

	protected $post_types_register;
	protected $register_block_categories;
	protected $register_blocks;
	protected $acf_options_page;
	protected $register_taxonomy;
	protected $add_svg_support;
	protected $menu_settings;
	protected $register;


	/**
	 * Creates all the Classes
	 */
	public function __construct() {
		$this->post_types_register        = new RegisterPostTypes();
		$this->register_block_categories  = new RegisterBlockCategory();
		$this->register_blocks            = new RegisterBlocks();
		$this->acf_options_page           = new AcfOptionsPage();
		$this->register_taxonomy          = new RegisterTaxonomy();
		$this->add_svg_support            = new AddSvgSupport();
		$this->menu_settings			  = new MenuSettings();
	}

	/**
	 * Initializes the WordPress hooks
	 *
	 * @return void
	 */
	public function init_hooks() {
		$this->post_types_register->init_hooks();
		$this->register_block_categories->init_hooks();
		$this->register_blocks->init_hooks();
		$this->register_taxonomy->init_hooks();
		$this->acf_options_page->init_hooks();
		$this->add_svg_support->init_hooks();
		$this->menu_settings->init_hooks();
	}

}
