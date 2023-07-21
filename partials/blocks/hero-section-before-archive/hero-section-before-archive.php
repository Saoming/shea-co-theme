<?php
/**
 * Renders the Hero Section Before Archive Style. This Style Applied on Transactions and Insights
 *
 * @package TenUpTheme
 */
$id = 'hero-section-before-archive-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

$title 			= get_field('title');
$box_repeater	= get_field('box_repeater');
$desc_archive	= get_field('desc_archive');

if ( ! get_field( 'block_preview' ) ) {
	?>
	<section 	class="w-full h-full px-[30px] lg:px-[82px] pt-[50px] lg:pt-[70px] md:pb-[43px]"
				id="<?php echo esc_attr( $id ); ?>"
				>
				<div class="flex flex-col items-center justify-center 2xl:max-w-[1440px] 2xl:mx-auto">
					<h1
						<?php if ( is_page('insights')) :?>
							class="text-center text-main hero-leading mb-[30px] font-bold"
						<?php else: ?>
							class="text-center text-main hero-leading mb-[50px] font-bold"
						<?php endif; ?>
					>
						<?php echo esc_attr($title); ?>
					</h1>

					<?php if( $box_repeater ): ?>
						<div
							class="grid grid-cols-2 lg:grid-cols-4 mb-[32px] md:mb-[66px] gap-[22px] md:gap-5 w-full"
						>
							<?php foreach ( $box_repeater as $single_box ): ?>
								<div class="flex flex-col items-center justify-start md:justify-center text-center bg-unitedNationsBlue pt-[33px] pb-[33px] md:pt-[65px] md:pb-[69px]"
									x-data="animatedCounter(<?php echo esc_html($single_box['number_value']);  ?>)"
									x-init="updateCounter"
								>
									<h3 class="font-bold text-[28px] sm:text-[40px] md:text-[65px]  lg:text-[55px] xl:text-[65px] leading-[84.5px] mb-[15px] text-white flex">
										<?php if($single_box['number_prefix']): ?>
											<?php echo esc_html( $single_box['number_prefix'] ); ?>
										<?php endif; ?>
										<span
											class="transition duration-[400ms] ease-out"
											x-transition:enter="transition ease-out duration-[400ms]"
											x-transition:enter-start="opacity-[.4]"
											x-transition:enter-end="opacity-100"
											x-text="Math.round(current)">
										</span>
										<?php if($single_box['number_affix']): ?>
											<?php echo esc_html( $single_box['number_affix'] ); ?>
										<?php endif; ?>
									</h3>
									<div class="text-[14px] md:text-[18px] leading-6 tracking-[0.1em] text-white max-w-[253px]"><?php echo esc_attr( $single_box['small_description'] ); ?></div>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

					<p class="text-[20px] leading-[40px] mb-0 max-w-[1060px] text-center">
						<?php echo esc_textarea($desc_archive); ?>
					</p>
				</div>
	</section>

	<?php } else { ?>
		<div data="gutenberg-preview-img">
			<img style="max-width:100%; height:auto;" src="<?php the_field( 'block_preview' ); ?>">
		</div>
	<?php } ?>
