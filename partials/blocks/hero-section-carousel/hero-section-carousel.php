<?php
/**
 * Renders the Hero Section Carousel Block
 *
 * @package TenUpTheme
 */
$id = 'hero-section-carousel-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

$title 					= get_field('title');
$cta 					= get_field('button_link');
if ($cta ){
	$cta_link           = $cta['url'];
	$cta_title          = $cta['title'];
	$cta_target 	    = $cta['target'] ? $cta['target'] : '_self';
}
$hero_carousel 			= get_field('hero_carousels');

if ( ! get_field( 'block_preview' ) ) {
	?>
	<section 	class="w-full h-[600px] px-[45px] lg:h-[600px] max-h-full flex flex-col items-center justify-center relative section fade"
				id="<?php echo esc_attr( $id ); ?>"
				>
				<?php if ($hero_carousel):  ?>
					<div class="absolute top-0 left-0 z-[-1] w-full h-full">
						<div
								class="w-full splide"
								role="group"
								aria-label="Check our Testimonials Slider"
								data-splide='{"type":"loop", "arrows": false, "autoplay": true, "pagination": false, "focus": "center", "drag": false, "speed": "1000"}'
							>
								<div class=" splide__track">
									<ul class="list-none splide__list">
										<?php foreach ( $hero_carousel as $hero_item ): ?>
											<li class="pl-0 splide__slide h-[600px] mt-0 mb-0" data-splide-interval="8000">
												<?php
													echo wp_get_attachment_image(
														$hero_item['hero_background'],
														'full',
														false,
														array( 'class' => 'img-responsive w-full h-full mt-0 object-cover' )
													);
												?>
											</li>
										<?php endforeach;?>
										<?php wp_reset_postdata(); ?>
								</div>
						</div>
					</div>
				<?php endif; ?>

				<div class="max-w-4xl text-center">
					<h1 class="text-white hero-leading fade fade-delay"><?php echo esc_attr($title); ?></h1>
					<?php if($cta): ?>
						<a
							class="text-black no-underline bg-white btn-long fade fade-delay"
							href="<?php echo esc_url($cta_link); ?>"
							aria-label="Link to about page"
							target="<?php echo esc_attr( $cta_target ); ?>"
						>
							<?php echo esc_html($cta_title); ?>
						</a>
					<?php endif; ?>
				</div>

	</section>

	<?php } else { ?>
		<div data="gutenberg-preview-img">
			<img style="max-width:100%; height:auto;" src="<?php the_field( 'block_preview' ); ?>">
		</div>
	<?php } ?>
