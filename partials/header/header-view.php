<?php
/**
 * Site Header Default HTML
 *
 * @package TenUpTheme
 *
 */

?>

<?php if( is_page_template('templates/page-headerblack.php') || is_page_template('templates/page-contact.php') || is_single() || is_tax()  ): ?>

	<header class="absolute top-0 left-0 w-full px-[30px] py-4 lg:px-[82px] lg:py-[30px] z-[100]">
		<div class="flex flex-row 2xl:max-w-[1440px] 2xl:mx-auto">
			<div class="inline-flex w-1/2 xl:w-1/3">
				<a
					href="<?php echo esc_html( site_url() );?>"
					aria-label="Link to Home Page"
				>
					<?php echo wp_get_attachment_image( $args['header_brand_black'], null, null, array( 'class' => 'header__logo-img' ) ); ?>
				</a>
			</div>

			<div class="hidden xl:flex xl:flex-row xl:items-center xl:justify-end xl:w-2/3 gap-[28px] 2xl:gap-[30px]">
				<?php echo wp_kses_post( $args['menu_header_black'] ); ?>
				<div class="flex flex-row items-center justify-center gap-6 xl:gap-[10px] 2xl:gap-8">
					<a
						target="_blank"
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
						<?php if(is_page_template('templates/page-contact.php')): ?>
							class="text-white bg-main btn"
						<?php else: ?>
							class="text-black border-2 border-black btn"
						<?php endif; ?>
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
						<rect width="42" height="2" fill="black"/>
						<rect y="11" width="42" height="2" fill="black"/>
						<rect y="22" width="42" height="2" fill="black"/>
					</svg>
				</button>
			</div>
		</div>
	</header>

	<div class="h-[80px] md:h-[130px] lg:h-[160px] bg-white"></div>


<?php else: ?>

	<header class="absolute top-0 left-0 w-full px-[30px] py-4 lg:px-[82px] lg:py-[30px] z-[100]">
		<div class="flex flex-row 2xl:max-w-[1440px] 2xl:mx-auto">
			<div class="inline-flex w-1/2 xl:w-1/3">
				<a
					href="<?php echo esc_html( site_url() );?>"
					aria-label="Link to Home Page"
				>
					<?php echo wp_get_attachment_image( $args['header_brand_white'], null, null, array( 'class' => 'header__logo-img' ) ); ?>
				</a>
			</div>

			<div class="hidden xl:flex xl:flex-row xl:items-center xl:justify-end xl:w-2/3 gap-[28px] 2xl:gap-[30px]">
				<?php echo wp_kses_post( $args['menu_header'] ); ?>
				<div class="flex flex-row items-center justify-center gap-6 xl:gap-[10px] 2xl:gap-8">
					<a
						href="<?php echo esc_url($args['social_link']['url']) ?>"
						target="_blank"
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
		</div>

	</header>


<?php endif; ?>
