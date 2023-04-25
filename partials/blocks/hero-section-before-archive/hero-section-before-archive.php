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
	<section 	class="w-full h-full px-[14px] lg:px-[82px] pt-[69px] pb-[14px] md:pb-[43px] flex flex-col items-center justify-center"
				id="<?php echo esc_attr( $id ); ?>"
				style="
					background: url('<?php echo esc_url($hero_bg['url']) ?>');
					background-repeat: no-repeat;
					background-size: cover;
				">
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
						<div class="grid grid-cols-2 lg:grid-cols-4 mb-[32px] md:mb-[66px] gap-[22px] md:gap-5 w-full">
							<?php foreach ( $box_repeater as $single_box ): ?>
								<div class="flex flex-col items-center justify-center text-center bg-unitedNationsBlue pt-[33px] pb-[33px] md:pt-[65px] md:pb-[69px]">
									<h3 class="font-bold text-[40px] md:text-[65px] leading-[84.5px] mb-[15px] text-white"><?php echo esc_attr( $single_box['number'] ); ?></h3>
									<div class="text-[14px] md:text-[18px] leading-6 tracking-[0.1em] text-white max-w-[253px]"><?php echo esc_attr( $single_box['small_description'] ); ?></div>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

					<p class="text-[20px] leading-[40px] mb-0 max-w-[1060px] text-center">
						<?php echo esc_textarea($desc_archive); ?>
					</p>

	</section>

	<?php } else { ?>
		<div data="gutenberg-preview-img">
			<img style="max-width:100%; height:auto;" src="<?php the_field( 'block_preview' ); ?>">
		</div>
	<?php } ?>
