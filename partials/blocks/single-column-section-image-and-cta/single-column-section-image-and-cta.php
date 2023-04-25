<?php
/**
 * Renders the Single Column Section with Image on the left and Cta on the right. Reusable, also it has dark and light mode.
 *
 * @package TenUpTheme
 */
$id = 'single-column-section-image-and-cta-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

$sub_title 				= get_field('sub_title');
$title 					= get_field('title');
$cta 					= get_field('button_link');
if ( $cta ){
	$cta_link           = $cta['url'];
	$cta_title          = $cta['title'];
	$cta_target 	    = $cta['target'] ? $cta['target'] : '_self';
}
$image_right 			= get_field('image_right');
$bg_image       		= get_field('bg_image');
$dark_mode              = get_field('dark_mode');

if( $bg_image ) {
	$bg_url = $bg_image['url'];
}

if ( ! get_field( 'block_preview' ) ) {
	?>
	<section 	class=" w-full h-full 2xl:justify-center pt-[57px] pb-0 px-0 lg:pt-[120px] lg:pb-[120px] flex flex-row flex-wrap
						lg:px-[82px] gap-5"
						<?php if ( $bg_image ) : ?>
						style="
						background: url('<?php echo esc_url( $bg_url ) ?>');
						background-repeat: no-repeat;
						background-size: cover;
						"
				<?php endif; ?>
				id="<?php echo esc_attr( $id ); ?>"
				>
				<div class=" w-full mb-[37px] lg:mb-0 xl:max-w-[515px] text-center
							 xl:text-left flex flex-col justify-center xl:justify-start items-center xl:items-start"
					>
					<?php if( $dark_mode === true ): ?>
						<span class="mb-1 text-lg font-bold leading-6 uppercase"><?php echo esc_attr( $sub_title ); ?></span>
						<h2 class="text-2xl lg:text-[40px] leading-10 lg:leading-[60px] mt-0 mb-[25px] lg:mb-[47px] md:max-w-[419px]"><?php echo esc_attr( $title ); ?></h2>

						<?php if($cta): ?>
							<a
								class="text-black no-underline bg-white border border-black btn-long"
								href="<?php echo esc_url( $cta_link ); ?>"
								aria-label="Link to <?php echo esc_attr( $cta_title ) ?> page"
								target="<?php echo esc_attr( $cta_target ); ?>"
							>
								<?php echo esc_html( $cta_title ); ?>
							</a>
						<?php endif; ?>

					<?php else: ?>
						<span class="mb-1 text-lg font-bold leading-6 text-white uppercase"><?php echo esc_attr( $sub_title ); ?></span>
						<h2 class="text-2xl lg:text-[40px] leading-10 lg:leading-[60px] mt-0 mb-[25px] lg:mb-[47px] md:max-w-[419px] text-white">
							<?php echo esc_attr( $title ); ?>
						</h2>

						<?php if($cta): ?>
							<a
								class="text-white no-underline border border-white btn-long"
								href="<?php echo esc_url( $cta_link ); ?>"
								aria-label="Link to about page"
								target="<?php echo esc_attr( $cta_target ); ?>"
							>
								<?php echo esc_html( $cta_title ); ?>
							</a>
						<?php endif; ?>

					<?php endif; ?>
				</div>

				<div class="w-full md:mx-auto md:max-w-[730px] xl:mx-0 ">
					<?php if ( $image_right ) : ?>
						<div class="w-full md:mx-auto md:w-1/2 md:pb-5 lg:w-full">
							<?php echo wp_get_attachment_image( $image_right, 'full', false, array( "class" => "img-responsive" ) ); ?>
						</div>
					<?php endif; ?>
				</div>
	</section>

	<?php } else { ?>
		<div data="gutenberg-preview-img">
			<img style="max-width:100%; height:auto;" src="<?php the_field( 'block_preview' ); ?>">
		</div>
	<?php } ?>
