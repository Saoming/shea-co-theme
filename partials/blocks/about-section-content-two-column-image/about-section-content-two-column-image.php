<?php
/**
 * Renders the About Section Content with two column image on left or right.
 *
 * @package TenUpTheme
 */
$id = 'about-section-content-two-column-image-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}
$content = get_field('content');


if ( ! get_field( 'block_preview' ) ) {
	?>
	<section 	class="w-full h-full px-[14px] py-[40px] xl:px-[0] lg:py-[72px]"
				id="<?php echo esc_attr( $id ); ?>"
				>
				<?php if( have_rows('content')):  ?>
					<div class="max-w-full lg:mx-auto lg:max-w-[1060px] flex flex-col items-start justify-center">
					<?php while ( have_rows('content') ) : the_row(); ?>
						<?php if( get_row_layout() == 'description' ): ?>

							<?php
								$text_editor = get_sub_field('text_editor');
							?>

							<div class="mb-[41px] lg:mb-[60px] text-lg leading-7 lg:leading-9">
								<?php echo wp_kses_post($text_editor); ?>
							</div>

						<?php elseif( get_row_layout() == 'single_column_image_right' ): ?>

							<?php
								$sub_title 	= get_sub_field('sub_title');
								$title 		= get_sub_field('title');
								$image 		= get_sub_field('image');
							?>

							<div class="w-full grid grid-cols-1 lg:grid-cols-2 mb-[41px] lg:mb-[60px] gap-10 lg:gap-[128px] justify-center items-center">
								<div class="order-2 text-center lg:text-left lg:order-1">
									<span class="hidden mb-3 text-lg font-bold leading-6 uppercase md:block">
										<?php echo esc_attr( $sub_title ); ?>
									</span>
									<h3 class="mt-0 mb-0 text-[24px] leading-[40px] lg:text-[36px] font-bold max-w-[412px] lg:leading-[56px]">
										<?php echo esc_attr( $title ); ?>
									</h3>
								</div>

								<div class="order-1 lg:order-2">
									<?php echo wp_get_attachment_image( $image, 'large', false, array( "class" => "img-responsive" ) ); ?>
								</div>
							</div>

						<?php elseif( get_row_layout() == 'single_column_image_left' ): ?>

							<?php
								$title = get_sub_field('title');
								$image = get_sub_field('image');
							?>

							<div class="w-full grid grid-cols-1 lg:grid-cols-2 mb-[41px] lg:mb-[60px] gap-10 lg:gap-[128px] justify-center items-center">

								<div>
									<?php echo wp_get_attachment_image( $image, 'large', false, array( "class" => "img-responsive" ) ); ?>
								</div>

								<div>
									<h3 class="mt-0 mb-0 text-[24px] leading-[40px] lg:text-[36px] font-bold max-w-[412px] lg:leading-[56px]">
										<?php echo esc_attr( $title ); ?>
									</h3>
								</div>

							</div>

						<?php endif; ?>
					<?php endwhile; ?>
					</div>
				<?php endif;?>

	</section>

	<?php } else { ?>
		<div data="gutenberg-preview-img">
			<img style="max-width:100%; height:auto;" src="<?php the_field( 'block_preview' ); ?>">
		</div>
	<?php } ?>
