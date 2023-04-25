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
	<section 	class="w-full h-[431px] px-[14px] lg:px-[82px]  lg:h-[545px] max-h-full flex flex-col items-start justify-center"
				id="<?php echo esc_attr( $id ); ?>"
				style="
					background: url('<?php echo esc_url($hero_bg['url']) ?>');
					background-repeat: no-repeat;
					background-size: cover;
				">
				<div
				<?php if( is_page('sectors') ): ?>
					class="max-w-[1143px] text-left"
				<?php else: ?>
					class="max-w-4xl text-left"
				<?php endif; ?>
				>
					<span class="mb-6 text-lg text-white"><?php echo esc_attr($sub_title); ?></span>
					<h1
					<?php if( is_page('team') || is_page('sectors') ): ?>
						class="text-white hero-leading"
					<?php else: ?>
						class="text-white hero-leading max-w-[628px]"
					<?php endif; ?>
					><?php echo esc_attr($title); ?></h1>
				</div>

	</section>

	<?php } else { ?>
		<div data="gutenberg-preview-img">
			<img style="max-width:100%; height:auto;" src="<?php the_field( 'block_preview' ); ?>">
		</div>
	<?php } ?>
