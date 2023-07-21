<?php
	$term = get_term_by( 'slug', get_query_var('term'), get_query_var('taxonomy') );
	$slug = $term->name;

	$args_tax_transactions = array(
		'post_type'         => 'transaction',
		'posts_per_page'    =>  10,
		'orderby'			=> 'date',
		'order'				=> 'DESC',
		'tax_query' => array(
			array(
				'taxonomy' => 'sector',
				'field' => 'slug',
				'terms' => 	array($slug)
			)
		)
	);

	$query = new WP_Query($args_tax_transactions);
	$count = $query->found_posts;

?>
<section class="w-full h-full px-[30px] py-[50px] xl:px-[0] lg:py-[100px] bg-lightBlue">
			<div class="flex flex-col items-center justify-center w-full mb-[22px]">
				<h2 class="text-[18px] leading-[24px] font-bold mb-[56px] text-center tracking-[0.15em] uppercase">
					<?php single_term_title(); ?> Transactions
				</h2>
			</div>

			<?php if ( $count == 1 || $count == 2 ): ?>
				<div class="2xl:max-w-[1440px] 2xl:mx-auto">
					<?php if ( $query->have_posts() ) : ?>
						<ul class="flex flex-col items-center justify-center gap-5 list-none md:flex-row">
						<?php  while ($query->have_posts()) : $query->the_post(); ?>
							<?php
								$first_company_image_acf 	= get_field('first_company_image', get_the_ID());
								$second_company_image_acf 	= get_field('second_company_image', get_the_ID());
								$transaction_action_text	= get_field('transaction_action_text', get_the_ID());
							?>
							<li class="pl-0 mt-0 mb-0 max-w-[310px]">
								<a
									class="px-[63px] py-[65px] bg-white flex flex-col items-center justify-center gap-[23px] h-full no-underline relative group hover:opacity-100"
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
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
						</ul>
					<?php endif; ?>
				</div>
			<?php else: ?>
				<div
				class="mx-auto splide recent-transactions"
				role="group"
				aria-label="Check our Transactions Slider"
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
								<?php if ( $query->have_posts() ) : ?>
									<?php  while ($query->have_posts()) : $query->the_post(); ?>
											<?php
												$first_company_image_acf 	= get_field('first_company_image', get_the_ID());
												$second_company_image_acf 	= get_field('second_company_image', get_the_ID());
												$transaction_action_text	= get_field('transaction_action_text', get_the_ID());
											?>
											<li class="pl-0 mt-0 mb-0 splide__slide">
												<a
													class="px-[63px] py-[65px] bg-white flex flex-col items-center justify-center gap-[23px] h-full no-underline relative group hover:opacity-100"
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
										<?php endwhile; ?>
										<?php wp_reset_postdata(); ?>
								<?php endif;  ?>
						</div>
					</div>
				</div>

			<?php endif; ?>
</section>

