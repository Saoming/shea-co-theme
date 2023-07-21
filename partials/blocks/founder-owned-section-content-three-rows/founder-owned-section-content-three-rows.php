<?php
/**
 * Renders the Founder Owned Section Content Three Rows
 *
 * @package TenUpTheme
 */
$id = 'founder-owned-section-content-three-rows-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}
$sub_title      = get_field('sub_title');
$title   		= get_field('title');
$description 	= get_field('description');
$content 		= get_field('content_repeater');

if ( ! get_field( 'block_preview' ) ) {
	?>
	<section 	class="w-full h-full px-[30px] py-[40px] xl:px-[0] lg:py-[80px] bg-lightBlue section fade"
				id="<?php echo esc_attr( $id ); ?>"
				>
				<div class="2xl:max-w-[1440px] 2xl:mx-auto">
					<div class="flex flex-col items-center justify-center w-full mb-[55px] lg:mb-[84px] lg:mx-auto lg:max-w-[1060px]">
						<span class="text-lg font-normal uppercase mb-[25px] tracking-[0.15em] text-center fade fade-delay"><?php echo esc_attr( $sub_title ); ?></span>
						<h2 class="mt-0 mb-[40px] text-[24px] leading-[40px] lg:text-[40px] lg:leading-[50px] text-center fade fade-delay"><?php echo esc_attr( $title ); ?></h2>
						<p class="text-[18px] leading-9 text-center mb-0 fade fade-delay"> <?php echo esc_textarea( $description ); ?></p>
					</div>

					<?php if ( $content ):  ?>
						<div class="grid w-full max-w-full grid-cols-1 gap-5 md:grid-cols-3 lg:mx-auto lg:max-w-5xl xl:max-w-7xl fade fade-delay">
							<?php foreach( $content as $content_about_service ): ?>
								<?php
									$title_service	  		= $content_about_service['title'];
									$description_service 	= $content_about_service['description'];
								?>
								<div class="flex flex-col items-center h-full gap-5">
									<h3 class="text-[24px] lg:text-[30px] leading-[40px] mt-0 font-bold mb-[40px] text-center">
										<?php echo esc_attr( $title_service ); ?>
									</h3>
									<p class="mb-[13px] text-left text-[18px] leading-[36px]">
										<?php echo esc_attr( $description_service ); ?>
									</p>
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
