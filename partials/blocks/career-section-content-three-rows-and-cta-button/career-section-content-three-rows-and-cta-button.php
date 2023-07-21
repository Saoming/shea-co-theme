<?php
/**
 * Renders the Career Section with 3rows on the bottom and Cta on the bottom.
 *
 * @package TenUpTheme
 */
$id = 'career-section-content-three-rows-and-cta-button-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

$sub_title 				= get_field('sub_title');
$title 					= get_field('title');
$three_rows_repeater    = get_field('three_rows_repeater');
$cta 					= get_field('button_link');

if ( $cta ) {
	$cta_link           = $cta['url'];
	$cta_title          = $cta['title'];
	$cta_target 	    = $cta['target'] ? $cta['target'] : '_self';
}

if ( ! get_field( 'block_preview' ) ) {
	?>
	<section 	class="bg-lightBlue w-full h-full pt-[65px] pb-[60px] px-[30px] lg:pt-[70px] lg:pb-[75px] lg:px-[82px] gap-5 section fade"
				id="<?php echo esc_attr( $id ); ?>"
				>
				<div class="flex flex-col justify-center items-center gap-5 2xl:max-w-[1440px] 2xl:mx-auto">
					<div class="flex flex-col w-full text-center">
						<span class="mb-3 text-lg font-normal leading-6 uppercase tracking-[0.15em]"><?php echo esc_attr( $sub_title ); ?></span>
						<h2 class="text-[35px] leading-[45px] lg:text-[70px] lg:leading-[60px] mt-0"><?php echo esc_attr( $title ); ?></h2>
					</div>

					<?php if ( $three_rows_repeater ) : ?>
					<div class="grid justify-center w-full grid-cols-1 gap-5 lg:grid-cols-3 mb-[34px]">
						<?php foreach( $three_rows_repeater as $single_row ): ?>
							<div class="flex flex-col items-center text-center">
								<h3 class="text-[22px] xl:text-[28px] wp-xl:text-3xl leading-[25px] lg:leading-[60px] mt-0 font-bold"><?php echo esc_attr( $single_row['title']) ?></h3>
								<p class="text-lg max-w-[412px]"><?php echo esc_attr( $single_row['description']) ?></p>
							</div>
						<?php endforeach; ?>
					</div>
					<?php endif; ?>

					<a
						class="text-black no-underline border border-black btn-long"
						href="<?php echo esc_url($cta_link); ?>"
						aria-label="Link to about page"
						target="<?php echo esc_attr( $cta_target ); ?>"
					>
						<?php echo esc_html($cta_title); ?>
					</a>
				</div>

	</section>

	<?php } else { ?>
		<div data="gutenberg-preview-img">
			<img style="max-width:100%; height:auto;" src="<?php the_field( 'block_preview' ); ?>">
		</div>
	<?php } ?>
