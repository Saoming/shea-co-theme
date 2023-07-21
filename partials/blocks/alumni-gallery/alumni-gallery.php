<?php
/**
 * Renders the Alumni Workplace Gallery
 *
 * @package TenUpTheme
 */
$id = 'alumni-gallery-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}
$alumni_repeater 		= get_field('alumni_repeater');

if ( ! get_field( 'block_preview' ) ) {
	?>
	<section 	class="w-full h-full px-[30px] lg:px-0 pt-[30px] pb-[65px] md:pt-[60px] md:pb-[85px] section fade"
				id="<?php echo esc_attr( $id ); ?>"
				>
				<div class="lg:mx-auto lg:max-w-[1080px]">
				<?php if($alumni_repeater):  ?>
				<div class="grid grid-cols-2 md:grid-cols-3  lg:grid-cols-5 gap-[71px]">
					<?php foreach( $alumni_repeater as $single ): ?>
						<?php
							$img_alumni_id = $single['logo'];
						?>
					<div class="flex flex-col items-center justify-center">
						<?php echo wp_get_attachment_image( $img_alumni_id, 'full', false, array( "class" => "img-responsive img-alumni" ) ); ?>
					</div>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
				</div>

	</section>

	<?php } else { ?>
		<div data="gutenberg-preview-img">
			<img style="max-width:100%; height:auto;" src="<?php the_field( 'block_preview' ); ?>">
		</div>
	<?php } ?>
