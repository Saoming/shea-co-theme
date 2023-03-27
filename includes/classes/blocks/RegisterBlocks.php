<?php
/**
 * Registers ACF Blocks
 *
 * @package TenUpTheme
 */

namespace TenUpTheme\Blocks;

/**
 * Handles Registration of the Custom Blocks
 */
class RegisterBlocks {

	/**
	 * Initializes WordPress Hooks
	 *
	 * @return void
	 */
	public function init_hooks() {
		add_action( 'acf/init', array( $this, 'register_custom_blocks' ) );
	}

	/**
	 * Registers the ACF Blocks
	 *
	 * @return void
	 */
	public function register_custom_blocks() {
		if ( ! function_exists( 'acf_register_block_type' ) ) {
			return;
		}
		$this->register_hero_section_block();
		$this->register_our_team_section();
		$this->register_single_column_section_image_and_cta();

	}

	/**
	 * Registers the Hero Section block on the homepage
	 */
	protected function register_hero_section_block() {
		acf_register_block_type(
			array(
				'name'            => 'hero-section',
				'title'           => __( 'Hero Section' ),
				'render_template' => 'partials/blocks/hero-section/hero-section.php',
				'mode'     => 'auto',
				'category' => 'shea',
				'supports' => array( 'anchor' => true ),
				'example'  => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'block_preview' => TENUP_THEME_TEMPLATE_URL . '/block-preview/hero-section.png',
						),
					),
				),
			)
		);
	}

	/**
	 * Registers the Our Team Section in Homepage
	 */
	protected function register_our_team_section() {
		acf_register_block_type(
			array(
				'name'            => 'our-team-section',
				'title'           => __( 'Our Team Section' ),
				'render_template' => 'partials/blocks/our-team-section/our-team-section.php',
				'mode'     => 'auto',
				'category' => 'shea',
				'supports' => array( 'anchor' => true ),
				'example'  => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'block_preview' => TENUP_THEME_TEMPLATE_URL . '/block-preview/our-team.jpg',
						),
					),
				),
			)
		);
	}

	/**
	 * Registers the Culture section on Homepage, this section is reusable. it has dark and light mode.
	 */
	protected function register_single_column_section_image_and_cta() {
		acf_register_block_type(
			array(
				'name'            => 'single-column-section-image-and-cta',
				'title'           => __( 'Single Column Section with Image and CTA' ),
				'render_template' => 'partials/blocks/single-column-section-image-and-cta/single-column-section-image-and-cta.php',
				'mode'     => 'auto',
				'category' => 'shea',
				'supports' => array( 'anchor' => true ),
				'example'  => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'block_preview' => TENUP_THEME_TEMPLATE_URL . '/block-preview/single-column-section-image-and-cta.jpg',
						),
					),
				),
			)
		);
	}

}
