<?php
/**
 * Renders the Our Service Section Three rows with Icon
 *
 * @package TenUpTheme
 */
$id = 'our-service-section-content-three-rows-with-icon-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}
$sub_title      = get_field('sub_title');
$title   		= get_field('title');
$description 	= get_field('description');
$content 		= get_field('content_repeater');

if ( ! get_field( 'block_preview' ) ) {
	?>
	<section 	class="w-full h-full px-[30px] py-[40px] xl:px-[0] lg:py-[80px] section fade"
				id="<?php echo esc_attr( $id ); ?>"
				>
				<div class="2xl:max-w-[1440px] 2xl:mx-auto">
					<div class="flex flex-col items-center justify-center w-full mb-[32px] lg:mb-[84px] lg:mx-auto lg:max-w-[1060px]">
						<span class="text-lg font-normal uppercase mb-[25px] tracking-[0.15em] fade fade-delay"><?php echo esc_attr( $sub_title ); ?></span>
						<h2 class="mt-0 mb-[40px] text-[24px] leading-[40px] lg:text-[40px] lg:leading-[50px] text-center fade fade-delay"><?php echo esc_attr( $title ); ?></h2>
						<p class="text-[18px] leading-9 text-center fade fade-delay"> <?php echo esc_textarea( $description ); ?></p>
					</div>

					<?php if ( $content ):  ?>
						<div class="grid w-full max-w-full grid-cols-1 gap-5 md:grid-cols-3 lg:mx-auto lg:max-w-5xl xl:max-w-7xl fade fade-delay">
							<?php foreach( $content as $content_about_service ): ?>
								<?php
									$list_our_service = $content_about_service['list_our_service'];
									$image_id         = $content_about_service['icon'];
									$title_service	  = $content_about_service['title'];
								?>
								<div class="flex flex-col justify-between h-full">

									<div class="flex flex-col items-center w-full text-center mb-[40px]">
										<div class="mb-[13px]">
											<?php echo wp_get_attachment_image( $image_id, 'full', false, array( "class" => "img-responsive" ) ); ?>
										</div>
										<h3 class="text-[24px] lg:text-[30px] leading-[40px] mt-0 font-bold mb-0">
											<?php echo esc_attr( $title_service ); ?>
										</h3>
									</div>

									<?php if ( $list_our_service ): ?>
										<ul class="p-0 m-0">
											<?php foreach( $list_our_service as $our_service_desc ): ?>
												<li class="list-none pl-0 mt-0 text-[20px] flex flex-row gap-[4px]"> <span>→</span> <?php echo esc_attr( $our_service_desc['description'] );  ?> </li>
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
