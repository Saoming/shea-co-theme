<?php
/**
 * Registers ACF Blocks
 *
 * @package TenUpTheme
 */

namespace TenUpTheme\Blocks;

use TenUpTheme\Theme\ResourceEnqueuer;


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
		$this->register_hero_section_left_aligned_block();
		$this->register_hero_section_before_archive();
		$this->register_our_team_section();
		$this->register_single_column_section_image_and_cta();
		$this->register_career_section_content_three_rows_and_cta_button();
		$this->register_about_section_content_two_column_image();
		$this->register_our_client_section_content_three_column_image_gallery();
		$this->register_our_service_section_content_three_rows_with_icon();
		$this->register_two_full_width_column_content_image_and_description();
		$this->register_alumni_gallery();
		$this->register_career_section_content_join_our_team();
		$this->register_testimonials_section_with_slider();
		$this->register_whole_team_section();
		$this->register_whole_post_section();
		$this->register_selected_sector_section();
		$this->register_transactions_filter_section();
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
	 * Registers the Hero Section block on the homepage
	 */
	protected function register_hero_section_left_aligned_block() {
		acf_register_block_type(
			array(
				'name'            => 'hero-section-left-aligned',
				'title'           => __( 'Hero Section Left Aligned' ),
				'render_template' => 'partials/blocks/hero-section-left-aligned/hero-section-left-aligned.php',
				'mode'     => 'auto',
				'category' => 'shea',
				'supports' => array( 'anchor' => true ),
				'example'  => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'block_preview' => TENUP_THEME_TEMPLATE_URL . '/block-preview/hero-section-left-aligned.jpg',
						),
					),
				),
			)
		);
	}

		/**
	 * Registers the Hero Section block on the Insights and Transactions
	 */
	protected function register_hero_section_before_archive() {
		acf_register_block_type(
			array(
				'name'            => 'hero-section-before-archive',
				'title'           => __( 'Hero Section Before Archive' ),
				'render_template' => 'partials/blocks/hero-section-before-archive/hero-section-before-archive.php',
				'mode'     => 'auto',
				'category' => 'shea',
				'supports' => array( 'anchor' => true ),
				'example'  => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'block_preview' => TENUP_THEME_TEMPLATE_URL . '/block-preview/hero-section-before-archive.jpg',
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

	/**
	 * Registers the Career Section with 3rows on the bottom and Cta on the bottom.
	 */
	protected function register_career_section_content_three_rows_and_cta_button() {
		acf_register_block_type(
			array(
				'name'            => 'career-section-content-three-rows-and-cta-button',
				'title'           => __( 'Career Section with 3 rows and CTA' ),
				'render_template' => 'partials/blocks/career-section-content-three-rows-and-cta-button/career-section-content-three-rows-and-cta-button.php',
				'mode'     => 'auto',
				'category' => 'shea',
				'supports' => array( 'anchor' => true ),
				'example'  => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'block_preview' => TENUP_THEME_TEMPLATE_URL . '/block-preview/career-section-content-three-rows-and-cta-button.jpg',
						),
					),
				),
			)
		);
	}

	/**
	 * Registers the About Section Content with two column image on left or right.
	 */
	protected function register_about_section_content_two_column_image() {
		acf_register_block_type(
			array(
				'name'            => 'about-section-content-two-column-image',
				'title'           => __( 'About Section with 2 Single Column Image' ),
				'render_template' => 'partials/blocks/about-section-content-two-column-image/about-section-content-two-column-image.php',
				'mode'     => 'auto',
				'category' => 'shea',
				'supports' => array( 'anchor' => true ),
				'example'  => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'block_preview' => TENUP_THEME_TEMPLATE_URL . '/block-preview/about-section-content-two-column-image.jpg',
						),
					),
				),
			)
		);
	}

	/**
	 * Registers the Our Client Section with Content Repeater with Image Gallery as subfield.
	 */
	protected function register_our_client_section_content_three_column_image_gallery() {
		acf_register_block_type(
			array(
				'name'            => 'our-client-section-content-three-column-image-gallery',
				'title'           => __( 'Our Client Section with Image Gallery inside Content Repeater' ),
				'render_template' => 'partials/blocks/our-client-section-content-three-column-image-gallery/our-client-section-content-three-column-image-gallery.php',
				'mode'     => 'auto',
				'category' => 'shea',
				'supports' => array( 'anchor' => true ),
				'example'  => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'block_preview' => TENUP_THEME_TEMPLATE_URL . '/block-preview/our-client-section-content-three-column-image-gallery.jpg',
						),
					),
				),
			)
		);
	}

	/**
	 * Registers the Our Service Section Three rows with Icon .
	 */
	protected function register_our_service_section_content_three_rows_with_icon() {
		acf_register_block_type(
			array(
				'name'            => 'our-service-section-content-three-rows-with-icon',
				'title'           => __( 'Our Service Section Three rows with Icon' ),
				'render_template' => 'partials/blocks/our-service-section-content-three-rows-with-icon/our-service-section-content-three-rows-with-icon.php',
				'mode'     => 'auto',
				'category' => 'shea',
				'supports' => array( 'anchor' => true ),
				'example'  => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'block_preview' => TENUP_THEME_TEMPLATE_URL . '/block-preview/our-service-section-content-three-rows-with-icon.jpg',
						),
					),
				),
			)
		);
	}

	/**
	 * Registers the Two Full Width Column with Background Image and Description.
	 */
	protected function register_two_full_width_column_content_image_and_description() {
		acf_register_block_type(
			array(
				'name'            => 'two-full-width-column-content-image-and-description',
				'title'           => __( 'Two Full Width Column with Background Image and Desc' ),
				'render_template' => 'partials/blocks/two-full-width-column-content-image-and-description/two-full-width-column-content-image-and-description.php',
				'mode'     => 'auto',
				'category' => 'shea',
				'supports' => array( 'anchor' => true ),
				'example'  => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'block_preview' => TENUP_THEME_TEMPLATE_URL . '/block-preview/two-full-width-column-content-image-and-description.jpg',
						),
					),
				),
			)
		);
	}

	/**
	 * Registers the Alumni Workplace Gallery
	 */
	protected function register_alumni_gallery() {
		acf_register_block_type(
			array(
				'name'            => 'alumni-gallery',
				'title'           => __( 'Alumni Workplace Gallery' ),
				'render_template' => 'partials/blocks/alumni-gallery/alumni-gallery.php',
				'mode'     => 'auto',
				'category' => 'shea',
				'supports' => array( 'anchor' => true ),
				'example'  => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'block_preview' => TENUP_THEME_TEMPLATE_URL . '/block-preview/alumni-gallery.jpg',
						),
					),
				),
			)
		);
	}

	/**
	 * Registers the Alumni Workplace Gallery
	 */
	protected function register_career_section_content_join_our_team() {
		acf_register_block_type(
			array(
				'name'            => 'career-section-content-join-our-team',
				'title'           => __( 'Join Our Team Section on Career Section' ),
				'render_template' => 'partials/blocks/career-section-content-join-our-team/career-section-content-join-our-team.php',
				'mode'     => 'auto',
				'category' => 'shea',
				'supports' => array( 'anchor' => true ),
				'example'  => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'block_preview' => TENUP_THEME_TEMPLATE_URL . '/block-preview/career-section-content-join-our-team.jpg',
						),
					),
				),
			)
		);
	}

	/**
	 * Registers the Testimonials Section with Slider
	 */
	protected function register_testimonials_section_with_slider() {
		acf_register_block_type(
			array(
				'name'            => 'testimonials-section-with-slider',
				'title'           => __( 'Testimonials Section with Slider' ),
				'render_template' => 'partials/blocks/testimonials-section-with-slider/testimonials-section-with-slider.php',
				'mode'     => 'auto',
				'category' => 'shea',
				'enqueue_assets'  => ResourceEnqueuer::register_splide_assets(),
				'supports' => array( 'anchor' => true ),
				'example'  => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'block_preview' => TENUP_THEME_TEMPLATE_URL . '/block-preview/testimonials-section-with-slider.jpg',
						),
					),
				),
			)
		);
	}

	/**
	 * Registers the Whole Team Section
	 */
	protected function register_whole_team_section() {
		acf_register_block_type(
			array(
				'name'            => 'whole-team-section',
				'title'           => __( 'Whole Team Section' ),
				'render_template' => 'partials/blocks/whole-team-section/whole-team-section.php',
				'mode'     => 'auto',
				'category' => 'shea',
				'supports' => array( 'anchor' => true ),
				'example'  => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'block_preview' => TENUP_THEME_TEMPLATE_URL . '/block-preview/whole-team-section.jpg',
						),
					),
				),
			)
		);
	}

	/**
	 * Registers the Whole Post Section
	 */
	protected function register_whole_post_section() {
		acf_register_block_type(
			array(
				'name'            => 'whole-post-section',
				'title'           => __( 'Whole Post Section' ),
				'render_template' => 'partials/blocks/whole-post-section/whole-post-section.php',
				'mode'     => 'auto',
				'category' => 'shea',
				'supports' => array( 'anchor' => true ),
				'example'  => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'block_preview' => TENUP_THEME_TEMPLATE_URL . '/block-preview/whole-post-section.jpg',
						),
					),
				),
			)
		);
	}

	/**
	 * Registers the Selected Sector Section.
	 */
	protected function register_selected_sector_section() {
		acf_register_block_type(
			array(
				'name'            => 'selected-sector-section',
				'title'           => __( 'Selected Sector Section' ),
				'render_template' => 'partials/blocks/selected-sector-section/selected-sector-section.php',
				'mode'     => 'auto',
				'category' => 'shea',
				'supports' => array( 'anchor' => true ),
				'example'  => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'block_preview' => TENUP_THEME_TEMPLATE_URL . '/block-preview/selected-sector-section.jpg',
						),
					),
				),
			)
		);
	}

	/**
	 * Registers the Transactions Filter Section.
	 */
	protected function register_transactions_filter_section() {
		acf_register_block_type(
			array(
				'name'            => 'transactions-filter-section',
				'title'           => __( 'Transactions Filter Section' ),
				'render_template' => 'partials/blocks/transactions-filter-section/transactions-filter-section.php',
				'mode'     => 'auto',
				'category' => 'shea',
				'enqueue_assets'  => ResourceEnqueuer::enqueue_transactions_filter_script(),
				'supports' => array( 'anchor' => true ),
				'example'  => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'block_preview' => TENUP_THEME_TEMPLATE_URL . '/block-preview/transactions-filter-section.jpg',
						),
					),
				),
			)
		);
	}

}
