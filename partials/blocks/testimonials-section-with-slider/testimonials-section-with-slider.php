<?php
/**
 * Renders the Testimonials Section with Slider
 *
 * @package TenUpTheme
 */
$id = 'testimonials-section-with-slider-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}
$sub_title					= get_field('sub_title');
$title   					= get_field('title');
$testimonials_repeater 		= get_field('testimonials_repeater');

if ( ! get_field( 'block_preview' ) ) {
	?>
	<section 	class="w-full h-full px-[30px] py-[50px] xl:px-[0] lg:py-[100px] bg-lightBlue section fade"
				id="<?php echo esc_attr( $id ); ?>"
				>
				<div class="max-w-full lg:mx-auto lg:max-w-[1060px]">
					<div class="flex flex-col items-center justify-center w-full mb-[40px]">
						<span class="text-lg font-normal uppercase mb-[10px] leading-6 tracking-[0.15em] fade fade-delay"><?php echo esc_attr( $sub_title ); ?></span>
						<h2 class="mt-0 mb-0 text-center hero-leading fade fade-delay"><?php echo esc_attr( $title ); ?></h2>
					</div>

					<?php if( $testimonials_repeater ):  ?>
						<div
							class="splide"
							role="group"
							aria-label="Check our Testimonials Slider"
							data-splide='{"type":"loop","perPage":1}'
						>

							<div class="absolute z-50 hidden md:flex flex-row items-center justify-between w-full splide__arrows top-[42.5%]">
								<button class="splide__arrow splide__arrow--prev bg-main px-[23px] py-[18px]" type="button">
									<svg width="13" height="21" viewBox="0 0 13 21" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M11 19L3 10.5L11 2" stroke="white" stroke-width="3" stroke-linecap="round"/>
									</svg>
								</button>
								<button class="splide__arrow splide__arrow--next bg-main px-[23px] py-[18px]" type="button">
									<svg width="13" height="21" viewBox="0 0 13 21" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M2.00024 2.00049L10.0002 10.5005L2.00024 19.0005" stroke="white" stroke-width="3" stroke-linecap="round"/>
									</svg>
								</button>
							</div>

							<div class="bg-white pt-[40px] pb-[40px] md:pb-[68px] px-[30px] md:px-[54px] lg:px-[108px]">
								<div class=" splide__track">
									<ul class="splide__list">
										<?php foreach ( $testimonials_repeater as $single_testimonial ): ?>
											<?php
												$testimonial_description 		= $single_testimonial['testimonial_description'];
												$testimonial_name 				= $single_testimonial['person_name'];
												$testimonial_job_title 			= $single_testimonial['person_job_title'];
												$testimonial_company 			= $single_testimonial['person_company'];
												$testimonial_image 				= $single_testimonial['person_image'];
											?>
											<li class="splide__slide">
												<p class="mt-0 text-[18px] leading-[40px] mb-[40px]"> <?php echo esc_attr( $testimonial_description ); ?></p>
												<div class="flex flex-col gap-5 md:flex-row">
													<?php echo wp_get_attachment_image( $testimonial_image, 'full', false, array( "class" => "img-responsive" ) ); ?>
													<div class="flex flex-col">
														<span class="font-bold text-[30px] leading-[60px]">
															<?php echo esc_attr( $testimonial_name ); ?>
														</span>
														<span class="font-bold uppercase text-[14px] leading-[18px]  mb-[11px] tracking-[0.15em]">
															<?php echo esc_attr( $testimonial_job_title ); ?>
														</span>
														<span class="font-bold uppercase text-[14px] leading-[18px] tracking-[0.15em]">
															<?php echo esc_attr( $testimonial_company ); ?>
														</span>
													</div>
												</div>
											</li>
										<?php endforeach;?>
									</ul>
								</div>
							</div>

							<ul class="pt-6 splide__pagination"></ul>

						</div>

					<?php endif; ?>

				</div>

	</section>

	<?php } else { ?>
		<div data="gutenberg-preview-img">
			<img style="max-width:100%; height:auto;" src="<?php the_field( 'block_preview' ); ?>">
		</div>
	<?php } ?>
