<?php
/**
 * Site Footer HTML
 *
 * @package TenUpTheme
 *
 */

?>

<footer
	class="	w-full min-h-full bg-shades
			lg:min-h-[686px] lg:px-[82px] lg:pt-[62px] lg:pb-[65px]
		">

	<!-- Top Row -->

	<div class="max-w-fit mb-[46px]">
		<a
			href="<?php echo esc_html( site_url() );?>"
			class=""
			aria-label="Link to Home Page"
		>
			<?php echo wp_get_attachment_image( $args['footer_brand'], null, null, array( 'class' => 'footer__logo-img' ) ); ?>
		</a>
	</div>

	<!-- Middle Row -->

	<div class="flex flex-wrap w-full ">

		<div class="w-full lg:w-4/12">
			<h3 class="text-3xl font-bold mb-[10px] leading-[60px]"> Offices </h3>

			<ul>
				<?php
				if ( isset( $args['location_repeaters'] ) && $args['location_repeaters'] ) {
					foreach( $args['location_repeaters'] as $office_location ) {
					?>
						<li class="max-w-[302px] text-lg leading-[40px] mb-3">
							<h4 class="font-bold text-main"><?php echo esc_attr( $office_location['name'] ); ?></h4>
							<div class="leading-[28px]"> <?php echo esc_attr( $office_location['address'] ); ?></div>
						</li>
						<?php
					}
				}

				?>
				<li class="max-w-[302px] leading-[40px] mb-3">
					<a
						class="text-lg font-bold text-main"
						href="<?php echo esc_attr( $args['footer_email_address']['url'] ); ?>"
						target="_blank"
						aria-label="Click to email us"
						rel="nofolllow noreferrer">
						<?php echo esc_attr( $args['footer_email_address']['title'] ); ?>
					</a>
				</li>
			</ul>

		</div>

		<div class="w-full lg:w-4/12">
			<h3 class="text-3xl font-bold mb-[10px]"> Information </h3>

			<div class="flex flex-wrap w-full">
				<div class="w-1/2">
					<?php echo wp_kses_post( $args['menu_footer_one'] ); ?>
				</div>

				<div class="w-1/2">
					<?php echo wp_kses_post( $args['menu_footer_two'] ); ?>
				</div>
			</div>

		</div>

		<div class="w-4/12">

		</div>



	</div>

	<!-- Bottom Row -->


</footer>
