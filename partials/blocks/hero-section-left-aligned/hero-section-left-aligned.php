<?php
/**
 * Renders the Hero Section with Text Aligned Left Block
 *
 * @package TenUpTheme
 */
$id = 'hero-section-left-aligned-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}
$sub_title 		= get_field('sub_title');
$title 			= get_field('title');
$hero_bg 		= get_field('hero_background');

if ( ! get_field( 'block_preview' ) ) {
	?>
	<section
				<?php if( is_page('team') ): ?>
					class="	w-full min-h-[431px] h-full px-[30px] lg:px-[82px] lg:min-h-[545px] lg:h-[545px] max-h-full flex flex-col items-start justify-center"
				<?php else: ?>
					class="	w-full min-h-[431px] h-full px-[30px] lg:px-[82px] lg:min-h-[545px] lg:h-[545px] max-h-full flex flex-col items-start justify-center section fade"
				<?php endif; ?>
				id="<?php echo esc_attr( $id ); ?>"
				style="
					background: url('<?php echo esc_url($hero_bg['url']) ?>');
					background-repeat: no-repeat;
					background-size: cover;
				">
				<div class="max-w-[1440px] w-full mx-auto flex flex-col">
					<div class="mt-32 text-left">
						<span
							<?php if( is_page('sectors') ): ?>
								class="mb-6 text-lg text-white font-normal tracking-[0.15em] fade fade-delay"
							<?php else: ?>
								class="mb-6 text-lg text-white font-normal tracking-[0.15em]"
							<?php endif; ?>
						>
							<?php echo esc_attr($sub_title); ?>
						</span>
						<h1
						<?php if( is_page('team') ): ?>
							class="mb-0 text-white hero-leading"
						<?php elseif( is_page('sectors') ): ?>
							class="mb-0 text-white hero-leading fade fade-delay"
						<?php else: ?>
							class="text-white hero-leading max-w-[628px] mb-0 fade fade-delay"
						<?php endif; ?>
						><?php echo esc_attr($title); ?></h1>
					</div>
				</div>
	</section>

	<?php } else { ?>
		<div data="gutenberg-preview-img">
			<img style="max-width:100%; height:auto;" src="<?php the_field( 'block_preview' ); ?>">
		</div>
	<?php } ?>
