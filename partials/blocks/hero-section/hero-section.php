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

$title 					= get_field('title');
$cta 					= get_field('button_link');
if ($cta ){
	$cta_link           = $cta['url'];
	$cta_title          = $cta['title'];
	$cta_target 	    = $cta['target'] ? $cta['target'] : '_self';
}
$hero_bg 		= get_field('hero_background');
if ( ! get_field( 'block_preview' ) ) {
	?>
	<section 	class="w-full h-[600px] px-[45px]  lg:h-[600px] max-h-full flex flex-col items-center justify-center section fade"
				id="<?php echo esc_attr( $id ); ?>"
				style="
					background: url('<?php echo esc_url($hero_bg['url']) ?>');
					background-repeat: no-repeat;
					background-size: cover;
				">
				<div class="max-w-[1440px] text-center 2xl:pl-[150px]">
					<h1 class="text-white hero-leading"><?php echo esc_attr($title); ?></h1>
					<?php if($cta): ?>
						<a
							class="text-black no-underline bg-white btn-long"
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
