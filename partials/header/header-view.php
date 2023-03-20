<?php
/**
 * Site Header Default HTML
 *
 * @package TenUpTheme
 *
 */

?>

<?php if( is_page_template('templates/page-headerblack.php')): ?>

	<header class="fixed top-0 left-0 w-full lg:px-[82px] lg:py-[30px] flex flex-row bg-white">
		<div class="inline-flex w-1/2 lg:w-1/3">
			<a
				href="<?php echo esc_html( site_url() );?>"
				aria-label="Link to Home Page"
			>
				<?php echo wp_get_attachment_image( $args['header_brand_black'], null, null, array( 'class' => 'header__logo-img' ) ); ?>
			</a>
		</div>

		<div class=" lg:flex lg:flex-row lg:items-center lg:justify-end lg:w-2/3 gap-[31px]">
			<?php echo wp_kses_post( $args['menu_header_black'] ); ?>
			<div class="flex flex-row items-center justify-center gap-8">
				<a
					href="<?php echo esc_url($args['social_link']['url']) ?>"
					rel="no-follow noopener"
					aria-label="<?php echo esc_attr($args['social_link']['title']) ?>"
				>
					<img
						src="<?php echo esc_url( TENUP_THEME_DIST_URL . 'images/social-icons/linkedin-icon-black.svg' ); ?>"
						alt="Linkedin icon"
					/>
				</a>

				<a
					href="<?php echo esc_url($args['navigation_button']['url']) ?>"
					aria-label="Link to Contact Page"
					class="text-black px-10 py-[15px] border text-lg"
				>
					<?php echo esc_attr($args['navigation_button']['title']) ?>
				</a>
			</div>
		</div>

	</header>

<?php else: ?>

	<header class="absolute top-0 left-0 w-full lg:px-[82px] lg:py-[30px] flex flex-row">
		<div class="inline-flex w-1/2 lg:w-1/3">
			<a
				href="<?php echo esc_html( site_url() );?>"
				aria-label="Link to Home Page"
			>
				<?php echo wp_get_attachment_image( $args['header_brand_white'], null, null, array( 'class' => 'header__logo-img' ) ); ?>
			</a>
		</div>

		<div class=" lg:flex lg:flex-row lg:items-center lg:justify-end lg:w-2/3 gap-[31px]">
			<?php echo wp_kses_post( $args['menu_header'] ); ?>
			<div class="flex flex-row items-center justify-center gap-8">
				<a
					href="<?php echo esc_url($args['social_link']['url']) ?>"
					rel="no-follow noopener"
					aria-label="<?php echo esc_attr($args['social_link']['title']) ?>"
				>
					<img
						src="<?php echo esc_url( TENUP_THEME_DIST_URL . 'images/social-icons/linkedin-icon-white.svg' ); ?>"
						alt="Linkedin icon"
					/>
				</a>

				<a
					href="<?php echo esc_url($args['navigation_button']['url']) ?>"
					aria-label="Link to Contact Page"
					class="text-white px-10 py-[15px] border text-lg"
				>
					<?php echo esc_attr($args['navigation_button']['title']) ?>
				</a>
			</div>
		</div>

	</header>


<?php endif; ?>
