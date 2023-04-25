<?php
/**
 * Renders the Whole Post Section
 *
 * @package TenUpTheme
 */
$id = 'whole-team-section-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

$args_market_map = array(
	'post_type'         => 'post',
	'posts_per_page'    => -1,
	'order'             => 'ASC',
	'tax_query' => array(
		array(
			'taxonomy' => 'category',
			'field'    => 'slug',
			'terms'    => array( 'Market Maps' ),
		)
	)
);

$args_industry_insight = array(
	'post_type'         => 'post',
	'posts_per_page'    => -1,
	'order'             => 'ASC',
	'tax_query' => array(
		array(
			'taxonomy' => 'category',
			'field'    => 'slug',
			'terms'    => array( 'Industry Insight' ),
		)
	)
);
$args_quarterly_report = array(
	'post_type'         => 'post',
	'posts_per_page'    => -1,
	'order'             => 'ASC',
	'tax_query' => array(
		array(
			'taxonomy' => 'category',
			'field'    => 'slug',
			'terms'    => array( 'Quarterly Report' ),
		)
	)
);

$industry_insight_categories 	=  new WP_Query($args_industry_insight);
$market_map_categories 			=  new WP_Query($args_market_map);
$quarterly_report_categories 	=  new WP_Query($args_quarterly_report);

$categories 					= get_categories( array(
	'orderby'		=> 'name',
	'order'			=> 'ASC',
	'post_type' 	=> 'insight'
));

$count = 0;

if ( ! get_field( 'block_preview' ) ) {
	?>
	<section 	class="w-full h-full px-[14px] lg:px-[82px] pt-[54px] pb-[82px] flex flex-col justify-center items-center"
				id="<?php echo esc_attr( $id ); ?>"
				x-data="{ currentTab: 0 }"
				>
				<ul class="flex flex-row gap-3">
					<?php if ( $categories ): ?>
						<?php foreach( $categories as $category): ?>
							<li>
								<button
									type="button"
									class="flex flex-col items-center font-bold uppercase align-middle active-tab-insights"
									x-bind:class="{ 'active-tab-insights': currentTab === <?php echo $count; ?> }"
									x-on:click="currentTab = <?php echo $count++ ?>"
									aria-label="<?php echo esc_attr( $category->cat_name );   ?> Tab Button"
								>
									<?php echo esc_attr( $category->cat_name );   ?>
								</button>
							</li>

						<?php endforeach; ?>
					<?php endif; ?>
				</ul>

				<div class="pt-[54px]">
					<div
						class="grid grid-cols-1 gap-5 sm:grid-cols-3 lg:grid-cols-4"
						x-show="currentTab === 0"
						x-cloak
					>
					<?php if ( $industry_insight_categories->have_posts() ) : ?>
						<?php  while ($industry_insight_categories->have_posts()) : $industry_insight_categories->the_post(); ?>
							<?php
								$categories_industry = get_the_category(get_the_ID());
								$content = get_the_excerpt();
								$featured_img = get_post_thumbnail_id();
								$separator = ' ';
								$output = '';
							?>
								<li class="list-none">
									<a
										class="w-full h-full flex flex-col justify-start items-center no-underline py-[41px] px-[34px] border border-gray-400 text-center hover:bg-shades hover:opacity-100 transition-colors"
										href="<?php echo esc_url( get_permalink() ); ?>"
										target="_blank"
										aria-label="Click to go <?php get_the_title() ?> article"
									>
										<?php if( ! empty( $categories_industry )): ?>
											<?php foreach ($categories_industry as $category_industry): ?>
												<span class="text-[18px] text-black opacity-40 mb-[28px] font-bold uppercase"> <?php echo esc_attr( $category_industry->name ); ?> </span>
											<?php endforeach; ?>
										<?php endif; ?>

										<?php
										echo wp_get_attachment_image(
											$featured_img,
											array( 90, 75 ),
											false,
											array( 'class' => 'img-responsive pb-[14px]' )
											);
										?>
										<div class="text-[20px] leading-[48px] font-bold mb-2"><?php the_title(); ?></div>

        								<div class="text-[18px] leading-9 mb-[43px]"><?php echo esc_attr( wp_trim_words( $content, 12, '...' ) ) ; ?></div>
										<div class="font-medium text-[20px] leading-5"> Read More > </div>
									</a>
								</li>
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
					<?php endif; ?>
					</div>

					<div
						class="grid grid-cols-1 gap-5 sm:grid-cols-3 lg:grid-cols-4"
						x-show="currentTab === 1"
						x-cloak
					>
						<?php if ( $market_map_categories->have_posts() ) : ?>
							<?php  while ($market_map_categories->have_posts()) : $market_map_categories->the_post(); ?>
								<?php
									$categories_industry = get_the_category(get_the_ID());
									$content = get_the_excerpt();
									$featured_img = get_post_thumbnail_id();
									$separator = ' ';
									$output = '';
								?>
									<li class="list-none">
										<a
											class="w-full h-full flex flex-col justify-start items-center no-underline py-[41px] px-[34px] border border-gray-400 text-center hover:bg-shades hover:opacity-100 transition-colors"
											href="<?php echo esc_url( get_permalink() ); ?>"
											target="_blank"
											aria-label="Click to go <?php get_the_title() ?> article"
										>
											<?php if( ! empty( $categories_industry )): ?>
												<?php foreach ($categories_industry as $category_industry): ?>
													<span class="text-[18px] text-black opacity-40 mb-[28px] font-bold uppercase"> <?php echo esc_attr( $category_industry->name ); ?> </span>
												<?php endforeach; ?>
											<?php endif; ?>

											<?php
											echo wp_get_attachment_image(
												$featured_img,
												array( 90, 75 ),
												false,
												array( 'class' => 'img-responsive pb-[14px]' )
												);
											?>
											<div class="text-[20px] leading-[48px] font-bold mb-2"><?php the_title(); ?></div>

											<div class="text-[18px] leading-9 mb-[43px]"><?php echo esc_attr( wp_trim_words( $content, 12, '...' ) ) ; ?></div>
											<div class="font-medium text-[20px] leading-5"> Read More > </div>
										</a>
									</li>
							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>
						<?php endif; ?>
					</div>

					<div
						class="grid grid-cols-1 gap-5 sm:grid-cols-3 lg:grid-cols-4"
						x-show="currentTab === 2"
						x-cloak
					>
						<?php if ( $quarterly_report_categories->have_posts() ) : ?>
							<?php  while ($quarterly_report_categories->have_posts()) : $quarterly_report_categories->the_post(); ?>
								<?php
									$categories_industry = get_the_category(get_the_ID());
									$content = get_the_excerpt();
									$featured_img = get_post_thumbnail_id();
									$separator = ' ';
									$output = '';
								?>
									<li class="list-none">
										<a
											class="w-full h-full flex flex-col justify-start items-center no-underline py-[41px] px-[34px] border border-gray-400 text-center hover:bg-shades hover:opacity-100 transition-colors"
											href="<?php echo esc_url( get_permalink() ); ?>"
											target="_blank"
											aria-label="Click to go <?php get_the_title() ?> article"
										>
											<?php if( ! empty( $categories_industry )): ?>
												<?php foreach ($categories_industry as $category_industry): ?>
													<span class="text-[18px] text-black opacity-40 mb-[28px] font-bold uppercase"> <?php echo esc_attr( $category_industry->name ); ?> </span>
												<?php endforeach; ?>
											<?php endif; ?>

											<?php
											echo wp_get_attachment_image(
												$featured_img,
												array( 90, 75 ),
												false,
												array( 'class' => 'img-responsive pb-[14px]' )
												);
											?>
											<div class="text-[20px] leading-[48px] font-bold mb-2"><?php the_title(); ?></div>

											<div class="text-[18px] leading-9 mb-[43px]"><?php echo esc_attr( wp_trim_words( $content, 12, '...' ) ) ; ?></div>
											<div class="font-medium text-[20px] leading-5"> Read More > </div>
										</a>
									</li>
							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>
						<?php endif; ?>
					</div>


				</div>

	</section>

	<?php } else { ?>
		<div data="gutenberg-preview-img">
			<img style="max-width:100%; height:auto;" src="<?php the_field( 'block_preview' ); ?>">
		</div>
	<?php } ?>
