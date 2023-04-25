<?php
/**
 * Template Name: Contact Us Page Template
 *
 * @package TenUpTheme
 */


get_header("black");


if ( have_rows( 'location_repeaters', 'option' ) ) {
	$i = 0;
	while ( have_rows( 'location_repeaters', 'option' ) ) {
		the_row();
		$args['location_repeaters'][ $i ]['name']  = get_sub_field( 'location_name' );
		$args['location_repeaters'][ $i ]['address']  = get_sub_field( 'address' );
		$args['location_repeaters'][ $i ]['office_img']  = get_sub_field( 'office_image' );
		$args['location_repeaters'][ $i ]['direction_link']  = get_sub_field( 'direction_link' );

		if( $args['location_repeaters'][ $i ]['direction_link'] ) {
			$args['location_repeaters'][ $i ]['google_map_link']  	= $args['location_repeaters'][ $i ]['direction_link']['url'];
			$args['location_repeaters'][ $i ]['title']  			= $args['location_repeaters'][ $i ]['direction_link']['title'];
			$args['location_repeaters'][ $i ]['target']  			= $args['location_repeaters'][ $i ]['direction_link']['target'] ? $args['location_repeaters'][ $i ]['direction_link']['target'] : '_self';
		}

		$i ++;
	}
}

?>

<section class="flex flex-col flex-wrap lg:flex-row">
	<aside class="pt-[55px] pb-[105px] lg:pt-[115px] lg:pb-[205px] text-white bg-main px-[14px] lg:px-[82px] w-full xl:max-w-[602px]">
		<span class="mb-6 text-lg text-white"> CONTACT US </span>
		<h1 class="text-[35px] leading-[45px] lg:text-[70px] lg:leading-[90px] mb-[35px] lg:mb-[70px] font-bold text-white"> Get in Touch </h1>
		<div class="form-contact">
			<?php echo do_shortcode('[gravityform id="2" title="false"]') ?>
		</div>
	</aside>

	<div class="pt-[55px] pb-[105px] lg:pt-[151px] lg:pb-[205px] px-[14px] lg:px-[123px] flex flex-col">
		<span class="text-[35px] leading-[45px] mb-[35px] lg:mb-[70px] lg:text-[70px] lg:leading-[90px] font-bold text-black"> Locations </span>
		<?php if ( isset( $args['location_repeaters'] ) && $args['location_repeaters'] ): ?>
			<ul class="flex flex-col gap-[61px]">
			<?php foreach( $args['location_repeaters'] as $office_location ): ?>
				<li class="text-lg leading-[40px] mb-3 list-none flex flex-col md:flex-row gap-5">

					<div>
						<?php echo wp_get_attachment_image( $office_location['office_img'], 'full', false, array( "class" => "img-responsive" ) ); ?>
					</div>

					<div>
						<h4 class="text-[18px] leading-[40px] font-bold text-black"><?php echo esc_attr( $office_location['name'] ); ?></h4>
						<div class="text-lg leading-[40px] mb-4 max-w-[302px] "> <?php echo esc_attr( $office_location['address'] ); ?></div>
						<div class="flex flex-wrap gap-[18px]">
							<img
								class=""
								src="<?php echo esc_url( TENUP_THEME_DIST_URL . 'images/marker-icon.svg' ); ?>"
								alt="Location Marker Icon"
							>
							<a
								class="font-bold underline text-main"
								href="<?php echo esc_url($office_location['direction_link']['url']); ?>"
								aria-label="Link to Shea Office <?php echo esc_attr( $office_location['name'] ); ?> Location"
								target="<?php echo esc_attr( $office_location['target'] ); ?>"
							>
								<?php echo esc_html($office_location['direction_link']['title']); ?>
							</a>
						</div>
					</div>

				</li>
			<?php endforeach;?>
			</ul>
		<?php endif; ?>
	</div>

</section>

<?php get_footer(); ?>
