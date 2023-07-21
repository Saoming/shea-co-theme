<?php
/**
 * Renders the Team Section Block
 *
 * @package TenUpTheme
 */
$id = 'our-team-section-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

$sub_title 				= get_field('sub_title');
$title 					= get_field('title');
$cta 					= get_field('button_link');
if ($cta ){
	$cta_link           = $cta['url'];
	$cta_title          = $cta['title'];
	$cta_target 	    = $cta['target'] ? $cta['target'] : '_self';
}
$team_image 			= get_field('team_image');
$team_image_mobile 		= get_field('team_image_mobile');

if ( ! get_field( 'block_preview' ) ) {
	?>
	<section 	class=" w-full h-full 2xl:justify-center px-[30px] pt-[40px] pb-[42px] flex flex-row flex-wrap
						lg:px-[82px] lg:pt-[91px] lg:pb-[95px] gap-5 section fade"
				id="<?php echo esc_attr( $id ); ?>"
				>
				<div class=" w-full lg:mb-0 xl:max-w-[515px] text-center
							 xl:text-left flex flex-col justify-center xl:justify-start items-center xl:items-start"
					>
					<span class="mb-1 text-lg font-normal leading-6 uppercase tracking-[0.15em]"><?php echo esc_attr( $sub_title ); ?></span>
					<h2 class="text-[24px] md:text-[40px] leading-[40px] md:leading-[60px] mt-0 mb-[25px] lg:mb-[47px] xl:max-w-[419px]"><?php echo esc_attr( $title ); ?></h2>

					<?php if ( $cta ) : ?>
						<a
							class="text-black no-underline bg-white border border-black btn-long"
							href="<?php echo esc_url( $cta_link ); ?>"
							aria-label="Link to our team page"
							target="<?php echo esc_attr( $cta_target ); ?>"
						>
							<?php echo esc_html( $cta_title ); ?>
						</a>
					<?php endif; ?>

				</div>

				<div class="w-full xl:max-w-[550px] wp-xl:max-w-[735px]">
					<?php if ( $team_image ) : ?>
						<div class="hidden lg:block">
							<?php echo wp_get_attachment_image( $team_image, 'full', false, array( "class" => "img-responsive mt-0" ) ); ?>
						</div>
					<?php endif; ?>
					<?php if($team_image_mobile): ?>
						<div class="block w-full mx-auto mt-0 md:w-9/12 lg:hidden lg:w-full">
							<?php echo wp_get_attachment_image( $team_image_mobile, 'full', false, array( "class" => "img-responsive mt-0" )); ?>
						</div>
					<?php endif; ?>
				</div>
	</section>

	<?php } else { ?>
		<div data="gutenberg-preview-img">
			<img style="max-width:100%; height:auto;" src="<?php the_field( 'block_preview' ); ?>">
		</div>
	<?php } ?>
