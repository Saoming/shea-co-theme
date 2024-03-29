<?php
/**
 * Renders the Our Client Section with Content Repeater with Image Gallery as subfield
 *
 * @package TenUpTheme
 */
$id = 'our-client-section-content-three-column-image-gallery-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}
$sub_title      = get_field('sub_title');
$title   		= get_field('title');
$description 	= get_field('description');
$content 		= get_field('content_repeater');


if ( ! get_field( 'block_preview' ) ) {
	?>
	<section 	class="w-full h-full px-[30px] py-[40px] xl:px-[0] lg:py-[72px] bg-main text-white section fade"
				id="<?php echo esc_attr( $id ); ?>"
				>
				<div class="max-w-full lg:mx-auto lg:max-w-[1060px]">
					<div class="flex flex-col items-center justify-center w-full mb[65px]">
						<span class="text-lg font-normal uppercase mb-[25px] tracking-[0.15em] fade fade-delay"><?php echo esc_attr( $sub_title ); ?></span>
						<h2 class="mt-0 mb-[40px] text-white text-[24px] leading-[40px] lg:text-[40px] lg:leading-[50px] text-center fade fade-delay"><?php echo esc_attr( $title ); ?></h2>
						<p class="text-[18px] leading-9 fade fade-delay"> <?php echo esc_textarea( $description ); ?></p>
					</div>

					<?php if ( $content ):  ?>
						<div class="md:mx-auto max-w-full md:max-w-[883px] fade fade-delay">
						<?php foreach ( $content as $content ): ?>
							<?php
								$content_title = $content['title'];
								$gallery       = $content['gallery'];
								$toggle        = $content['right_gallery'];
								$lists         = $content['list'];
							?>
							<?php if( $toggle === true ): ?>
								<div gallery-right class="grid items-center justify-center grid-cols-1 gap-[40px] lg:grid-cols-2">
								<?php else: ?>
								<div gallery-left class="grid items-center justify-center grid-cols-1 gap-[40px] py-[55px] lg:py-0 lg:grid-cols-2">
							<?php endif; ?>
									<div>
										<h4 class="mt-0 mb-0 text-[30px] font-bold text-white"><?php echo esc_attr( $content_title ); ?></h4>
										<?php if ($lists): ?>
											<ul class="pl-0 list-none">
												<?php foreach ($lists as $list): ?>
													<li class="pl-0 mt-0 text-[20px] flex flex-row gap-[4px]"> <span>→</span><?php echo esc_attr( $list['description'] ); ?></li>
												<?php endforeach; ?>
											</ul>
										<?php endif; ?>
									</div>

									<?php if( $gallery ): ?>
									<ul class="grid flex-wrap grid-cols-2 gap-5 pl-0 list-none">
										<?php foreach ( $gallery as $image_id ):  ?>
											<li class="pl-0 mt-0">
												<?php echo wp_get_attachment_image( $image_id, 'full', false, array( "class" => "img-responsive mt-0" ) ); ?>
											</li>
										<?php endforeach; ?>

									</ul>
									<?php endif; ?>
								</div>

						<?php endforeach; ?>
						</div>
					<?php endif;?>
				</div>

	</section>

	<?php } else { ?>
		<div data="gutenberg-preview-img">
			<img style="max-width:100%; height:auto;" src="<?php the_field( 'block_preview' ); ?>">
		</div>
	<?php } ?>
