<?php
/**
 * Renders the Two Full Width Column with Background Image and Description
 *
 * @package TenUpTheme
 */
$id = 'two-full-width-column-content-image-and-description-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}
$content 		= get_field('content');

if ( ! get_field( 'block_preview' ) ) {
	?>
	<section 	class="w-full h-full bg-lightBlue"
				id="<?php echo esc_attr( $id ); ?>"
				>
				<?php if( have_rows('content')):  ?>
				<div class="flex flex-col">
					<?php while ( have_rows('content') ) : the_row(); ?>
						<?php if( get_row_layout() == 'full_width_image_left_and_right' ): ?>
							<?php
								$title_full_width 		= get_sub_field('title_full_width');
								$desc__full_width 		= get_sub_field('description_full_width');
								$img_uri				= get_sub_field('bg_image_uri');
								$toggle                 = get_sub_field('toggle_right');
							?>
							<?php
								if( $toggle === true):
							?>
								<div order-right class="grid grid-cols-1 mb-10 md:grid-cols-2 md:mb-0">
								<?php else: ?>
								<div order-left class="grid grid-cols-1 mb-10 md:grid-cols-2 md:mb-0">
							<?php endif; ?>
									<div class="px-[14px] lg:px-[82px] flex flex-col justify-center items-center lg:items-start">
									<?php if ( $title_full_width ): ?>
									<h2 class="lg:mt-0 mb-[40px] text-[24px] leading-[40px] lg:text-[40px] lg:leading-[50px] text-center">
										<?php echo esc_attr( $title_full_width ); ?>
									</h2>
									<?php endif; ?>
									<p class="text-[18px] leading-9"> <?php echo esc_textarea( $desc__full_width ); ?></p>
									</div>

									<div
										class="h-[250px] md:h-[492px] 2xl:h-[600px]"
										style="	background: url('<?php echo esc_url( $img_uri ); ?>');
												background-size: cover;
												background-repeat: no-repeat;
										">
									</div>
							</div>

						<?php endif; ?>
					<?php endwhile; ?>
				</div>
				<?php endif; ?>

	</section>

	<?php } else { ?>
		<div data="gutenberg-preview-img">
			<img style="max-width:100%; height:auto;" src="<?php the_field( 'block_preview' ); ?>">
		</div>
	<?php } ?>
