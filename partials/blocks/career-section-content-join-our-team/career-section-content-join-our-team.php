<?php
/**
 * Renders the Join Our Team Section on Career Section
 *
 * @package TenUpTheme
 */
$id = 'career-section-content-join-our-team-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}
$sub_title      			= get_field('sub_title');
$title   					= get_field('title');
$description 				= get_field('description');
$job_information_title      = get_field('job_information_title');
$job_repeater 				= get_field('job_repeater');

$email_cta 					= get_field('email_cta');
if ($email_cta ){
	$email_cta_link           	= $email_cta['url'];
	$email_cta_title          	= $email_cta['title'];
	$email_cta_target 	    	= $email_cta['target'] ? $email_cta['target'] : '_self';
}

$apply_cta 					= get_field('apply_cta');
if ($apply_cta ){
	$apply_cta_link           	= $apply_cta['url'];
	$apply_cta_title          	= $apply_cta['title'];
	$apply_cta_target 	    	= $apply_cta['target'] ? $apply_cta['target'] : '_self';
}


if ( ! get_field( 'block_preview' ) ) {
	?>
	<section 	class="w-full h-full px-[30px] py-[50px] xl:px-[0] lg:py-[100px] bg-main text-white section fade"
				id="<?php echo esc_attr( $id ); ?>"
				>
				<div class="max-w-full lg:mx-auto lg:max-w-[1060px]">
					<div class="flex flex-col items-center justify-center w-full mb-[43px]">
						<span class="text-lg font-normal uppercase mb-[10px] leading-6 tracking-[0.15em] fade fade-delay"><?php echo esc_attr( $sub_title ); ?></span>
						<h2 class="mt-0 text-white hero-leading fade fade-delay"><?php echo esc_attr( $title ); ?></h2>
						<p class="text-[18px] leading-9 fade fade-delay"> <?php echo esc_textarea( $description ); ?></p>
					</div>

					<div class="flex flex-col items-center justify-center fade fade-delay">
						<div class="text-center mb-[45px] text-[30px] leading-[40px] font-bold"> <?php echo esc_attr( $job_information_title ); ?> </div>
						<div id="grnhse_app"></div>
						<div class="flex flex-col md:flex-row gap-[25px]">
							<?php if($email_cta ): ?>
								<a
									class="text-black no-underline bg-white btn-long"
									href="<?php echo esc_url($email_cta_link); ?>"
									aria-label="Link to about page"
									target="<?php echo esc_attr( $email_cta_target ); ?>"
								>
									<?php echo esc_html($email_cta_title); ?>
								</a>
							<?php endif; ?>

							<?php if($apply_cta ): ?>
								<a
									class="text-black no-underline bg-white btn-long"
									href="<?php echo esc_url($apply_cta_link); ?>"
									aria-label="Link to about page"
									target="<?php echo esc_attr( $apply_cta_target ); ?>"
								>
									<?php echo esc_html($apply_cta_title); ?>
								</a>
							<?php endif; ?>
						</div>
					</div>
				</div>

	</section>

	<?php } else { ?>
		<div data="gutenberg-preview-img">
			<img style="max-width:100%; height:auto;" src="<?php the_field( 'block_preview' ); ?>">
		</div>
	<?php } ?>
