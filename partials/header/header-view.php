<?php
/**
 * Site Header Default HTML
 *
 * @package TenUpTheme
 *
 */

?>

<?php if( is_page_template('templates/page-headerblack.php')): ?>

<?php else: ?>

	<header class="absolute top-0 left-0 w-full px-[14px] py-4 lg:px-[82px] lg:py-[30px] flex flex-row">
		<div class="inline-flex w-1/2 xl:w-1/3">
			<a
				href="<?php echo esc_html( site_url() );?>"
				class="outline-black"
				aria-label="Link to Home Page"
			>
				<?php echo wp_get_attachment_image( $args['header_brand_white'], null, null, array( 'class' => 'header__logo-img' ) ); ?>
			</a>
		</div>

		<div class="hidden xl:flex xl:flex-row xl:items-center xl:justify-end xl:w-2/3 gap-[31px]">
			<?php echo wp_kses_post( $args['menu_header'] ); ?>
			<div class="flex flex-row items-center justify-center gap-8 xl:hidden 2xl:flex">
				<a
					href="<?php echo esc_url($args['social_link']['url']) ?>"
					rel="no-follow noopener"
					class="outline-black"
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
					class="text-white btn"
				>
					<?php echo esc_attr($args['navigation_button']['title']) ?>
				</a>
			</div>
		</div>

		<div class="flex flex-col items-end justify-center w-1/2 xl:hidden">
			<button
				type="button"
				class="flex flex-col items-center align-middle"
				x-on:click="modal = ! modal"
				:aria-expanded="modal"
				aria-controls="mobile-navigation"
				aria-label="Navigation Menu"
			>
				<svg width="42" height="24" viewBox="0 0 42 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<rect width="42" height="2" fill="white"/>
					<rect y="11" width="42" height="2" fill="white"/>
					<rect y="22" width="42" height="2" fill="white"/>
				</svg>
    		</button>
		</div>

	</header>


<?php endif; ?>
