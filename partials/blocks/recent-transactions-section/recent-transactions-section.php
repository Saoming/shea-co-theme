<?php
/**
 * Renders the Recent Transactions Section with Slider
 *
 * @package TenUpTheme
 */
$id = 'recent-transactions-section' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}
$sub_title							= get_field('sub_title');
$title   							= get_field('title');
$recent_transactions 				= get_field('recent_transactions_relationships');
$cta 								= get_field('cta_recent_transactions');

if ( $cta ) {
	$cta_link           = $cta['url'];
	$cta_title          = $cta['title'];
	$cta_target 	    = $cta['target'] ? $cta['target'] : '_self';
}

if ( ! get_field( 'block_preview' ) ) {
	?>
	<section 	class="w-full h-full px-[30px] py-[50px] xl:px-[0] lg:py-[100px] bg-lightBlue section fade"
				id="<?php echo esc_attr( $id ); ?>"
				>
				<?php if( $title ): ?>
				<div class="flex flex-col items-center justify-center w-full mb-[22px]">
					<span class="text-lg font-normal uppercase mb-[10px] leading-6 tracking-[0.15em] fade fade-delay"><?php echo esc_attr( $sub_title ); ?></span>
					<h2 class="mt-0 mb-0 text-center text-[24px] md:text-[40px] font-bold leading-[40px] md:leading-[60px] max-w-[1060px] fade fade-delay"><?php echo esc_attr( $title ); ?></h2>
				</div>
				<?php endif; ?>
				<?php if( $recent_transactions ):  ?>
					<div
							class="mx-auto splide recent-transactions"
							role="group"
							aria-label="Check our recent transactions slider"
							data-splide='{ "breakpoints": { "764": { "perPage": 1 } }, "type":"loop", "width": "1060px", "perPage": 3, "pagination": false, "focus": "center", "updateOnMove": true, "trimSpace": "move", "gap": 0 }'
						>

						<div class="absolute z-50 flex flex-row items-center justify-between w-full splide__arrows top-[42.5%]">
								<button class="splide__arrow splide__arrow--prev bg-main px-[23px] py-[18px]" type="button">
									<svg width="13" height="21" viewBox="0 0 13 21" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M11 19L3 10.5L11 2" stroke="white" stroke-width="3" stroke-linecap="round"/>
									</svg>
								</button>
								<button class="splide__arrow splide__arrow--next bg-main px-[23px] py-[18px]" type="button">
									<svg width="13" height="21" viewBox="0 0 13 21" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M2.00024 2.00049L10.0002 10.5005L2.00024 19.0005" stroke="white" stroke-width="3" stroke-linecap="round"/>
									</svg>
								</button>
						</div>

						<div class="pb-[58px] px-0 md:px-[54px] lg:px-[108px]">
							<div class=" splide__track">
								<ul class="list-none splide__list">
									<?php foreach ( $recent_transactions as $post ): ?>
										<?php setup_postdata($post); ?>
										<?php
											$first_company_image_acf 	= get_field('first_company_image', $post->ID);
											$second_company_image_acf 	= get_field('second_company_image', $post->ID);
											$transaction_action_text	= get_field('transaction_action_text', $post->ID);
										?>
										<li class="pl-0 mt-0 mb-0 splide__slide">
											<a
												class="px-[63px] py-[65px] bg-white flex flex-col items-center justify-center gap-[23px] h-full no-underline hover:opacity-100 relative group"
												href="<?php the_permalink($post->ID); ?>"
												aria-label="Click to go to <?php the_title($post->ID); ?> transaction"
												>
												<?php echo wp_get_attachment_image( $first_company_image_acf['id'], array( 185, 60 ), false, array( 'class' => 'recent__transactions-img' ) ); ?>
												<span class="text-[13px] leading-[22px] text-center text-[#767676]"><?php echo esc_attr( $transaction_action_text ); ?></span>
												<?php echo wp_get_attachment_image( $second_company_image_acf['id'], array( 185, 60 ), false, array( 'class' => 'recent__transactions-img' ) ); ?>

												<div
													class="absolute top-0 left-0 flex-col items-center justify-center invisible hidden w-full h-full lg:flex group-hover:visible backdrop-blur-[2px]"
												>
													<button
														class="text-black no-underline bg-white border border-black btn"
													>
														Learn More
													</button>
												</div>
											</a>
										</li>
									<?php endforeach;?>
									<?php wp_reset_postdata(); ?>
							</div>
						</div>
					</div>
				<?php endif; ?>
				<?php if( $cta ): ?>
				<div class="flex flex-col items-center justify-center w-full fade fade-delay">
					<a
						class="text-black no-underline border border-black btn-long"
						href="<?php echo esc_url($cta_link); ?>"
						aria-label="Link to about page"
						target="<?php echo esc_attr( $cta_target ); ?>"
					>
						<?php echo esc_html($cta_title); ?>
					</a>
				</div>
				<?php endif; ?>
	</section>


<?php } else { ?>
		<div data="gutenberg-preview-img">
			<img style="max-width:100%; height:auto;" src="<?php the_field( 'block_preview' ); ?>">
		</div>
	<?php } ?>
