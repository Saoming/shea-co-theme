<?php
/**
 * Renders the Hero Section Block
 *
 * @package TenUpTheme
 */
$id = 'hero-section-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

$title 			= get_field('title');
$button_link 	= get_field('button_link');
$hero_bg 		= get_field('hero_background');
if ( ! get_field( 'block_preview' ) ) {
	?>
	<section 	class="w-full h-[600px] max-h-full flex flex-col items-center justify-center"
				id="<?php echo esc_attr( $id ); ?>"
				style="
					background: url('<?php echo esc_url($hero_bg['url']) ?>');
					background-repeat: no-repeat;
					background-size: cover;
				">
				<div class="max-w-4xl text-center">
					<h1 class="text-[70px] leading-[91px] mb-8 text-white"><?php echo esc_attr($title); ?></h1>
					<a
					class="px-[52px] py-6 bg-white text-black"
					href="<?php esc_url($button_link['url']); ?>"><?php echo esc_attr($button_link['title']); ?> </a>
				</div>

	</section>

	<?php } else { ?>
		<div data="gutenberg-preview-img">
			<img style="max-width:100%; height:auto;" src="<?php the_field( 'block_preview' ); ?>">
		</div>
	<?php } ?>
