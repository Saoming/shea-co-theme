<?php
/**
 * Renders the Transactions Page Filter Section
 *
 * @package TenUpTheme
 */
$id = 'transactions-filter-section-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

$args['transactionTypes'] = get_terms([
	'taxonomy' => 'transaction-type',
	'hide_empty' => true,
]);

$args['locations'] = get_terms([
	'taxonomy' => 'location',
	'hide_empty' => true,
]);

$args['sectors'] = get_terms([
	'taxonomy' => 'sector',
	'hide_empty' => true,
]);


if ( ! get_field( 'block_preview' ) ) {
	?>
	<section 	class="w-full h-full px-[30px] lg:px-[82px] flex flex-col justify-center items-center py-[55px] lg:py-[82px]"
				id="<?php echo esc_attr( $id ); ?>"
				x-data="transactionFilter"
				>

				<div class="flex flex-col lg:flex-row justify-center gap-0 lg:gap-[60px] 2xl:max-w-[1440px] 2xl:mx-auto">
					<div class="w-full lg:w-3/12 wp-xl:w-[20%]">

						<div class="flex flex-col items-center justify-center mb-5 lg:hidden">
							<button
								class="flex flex-row items-center gap-[20px] text-[18px] align-middle text-black no-underline border border-black btn-long"
								x-on:click="filter = ! filter"
								:aria-expanded="filter"
								aria-controls="filter"
								aria-label="Transaction Setting Menu"
							>
								<img
									class="img-responsive"
									src="<?php echo esc_url( TENUP_THEME_DIST_URL . 'images/transactions-setting-icon.svg' ); ?>"
									alt="mobile icon settings"
									width="38"
									height="18"
								/>
									Filter
							</button>
						</div>

						<div class="flex flex-row justify-center mb-5 lg:flex-col lg:justify-start gap-[10px] lg:gap-0">
							<div class="text-darkGray text-[16px] leading-[30px]">
								<span class="font-bold" x-text="transactions.length"></span> Results
							</div>
							<div class="flex flex-row gap-[10px]">
								<!-- <button
									class="text-[16px] text-main leading-[30px] underline"
									@click="showAll()"
									aria-label="Click to load all the transactions"
								>
									View All
								</button> -->

								<button
									class="text-[16px] text-main leading-[30px] underline hidden lg:block"
									@click="resetFilter()"
									aria-label="Click to load all the transactions"
								>
									Reset Filter
								</button>
							</div>

						</div>

						<div class="hidden lg:block mb-[30px]">
							<h4 class="font-bold text-[18px] leading-[30px] mb-[15px]">Year</h4>
							<select class="text-[18px] leading-[36px] border-b border-black w-[146px]" @change="toggleFilter('year', event.target.value)" x-model="yearx">
								<option value="" selected>Select</option>
								<?php
									$array = array();

									$args_all_transactions = array(
										'post_type'         => 'transaction',
										'posts_per_page'    => -1,
										'orderby'			=> 'meta_value',
										'order'				=> 'DESC',
										'meta_query'		=> array (
											array(
												'key'     => 'transaction_announcement_date',
												'compare' => 'LIKE',
											)
										)
									);

									$query = new WP_Query($args_all_transactions);
								?>
								<?php
									if ( $query->have_posts() ) {
										$counter = 0;
										while ( $query->have_posts() ) {
											$query->the_post();
											$array[ $counter ][ 'year' ]        = date('Y', strtotime(get_field('transaction_announcement_date', get_the_ID())));
											$counter++;
										}
										$result = wp_list_pluck($array, 'year');
										$args['years'] = array_unique($result, SORT_REGULAR);
									}
									wp_reset_postdata();
								?>
								<?php foreach($args['years'] as $result): ?>
									<option
									value="<?php echo $result ?>"
								>
									<?php echo $result ?>
								</option>
								<?php endforeach; ?>
							</select>
						</div>

						<div class="hidden lg:block mb-[30px]">
							<h4 class="font-bold text-[18px] leading-[30px] mb-[15px]">Transaction Type</h4>

							<?php if($args['transactionTypes']): ?>
								<ul>
								<?php foreach($args['transactionTypes'] as $transactionType): ?>
									<li class="flex flex-row gap-[13px] items-center text-[18px] leading-[36px]">
										<input
											class="w-4 h-4"
											type="radio"
											x-model="transactionType"
											value="<?php echo esc_attr( $transactionType->slug ); ?>"
											@change="toggleFilter('transaction-type','<?php echo esc_attr( $transactionType->slug ); ?>')"
										>
										<?php echo esc_attr($transactionType->name) ?>
									</li>
								<?php endforeach; ?>
								</ul>
							<?php endif; ?>
						</div>

						<div class="hidden lg:block mb-[30px]">
							<h4 class="font-bold text-[18px] leading-[30px] mb-[15px]">Location</h4>

							<?php if($args['locations']): ?>
								<ul>
								<?php foreach($args['locations'] as $location): ?>
									<li class="flex flex-row gap-[13px] items-center text-[18px] leading-[36px]">
										<input
											class="w-4 h-4"
											type="radio"
											x-model="locationx"
											value="<?php echo esc_attr( $location->slug ); ?>"
											@change="toggleFilter('location','<?php echo esc_attr( $location->slug ); ?>')"
										>
										<?php echo esc_attr($location->name) ?>
									</li>
								<?php endforeach; ?>
								</ul>
							<?php endif; ?>

						</div>

						<div class="hidden lg:block mb-[30px]">
							<h4 class="font-bold text-[18px] leading-[30px] mb-[15px]">Sector</h4>

							<?php if($args['sectors']): ?>
								<ul>
								<?php foreach($args['sectors'] as $sector): ?>
									<li class="flex flex-row gap-[13px] items-center text-[18px] leading-[36px]">
										<input
											class="w-4 h-4"
											type="radio"
											x-model="sector"
											value="<?php echo esc_attr( $sector->slug ); ?>"
											@change="toggleFilter('sector','<?php echo esc_attr( $sector->slug ); ?>')"
										>
										<?php echo esc_attr($sector->name) ?>
									</li>
								<?php endforeach; ?>
								</ul>
							<?php endif; ?>

						</div>
					</div>

					<div class="w-full lg:w-7/12">
						<ul class="grid grid-cols-1 gap-5 md:grid-cols-3 lg:grid-cols-2 xl:grid-cols-3">
								<template x-for="transaction in actualTransactions" :key="transaction.ID">
									<li class="w-full h-full pl-0 m-0 list-none max-w-[320px] mx-auto md:max-w-full md:mx-0">
											<a
												class="px-[63px] py-[65px] border border-[#767676] flex flex-col items-center justify-center gap-[37px] h-full group relative hover:opacity-100"
												x-bind:href="transaction.link"
												target="_self"
												x-bind:aria-label="'Click to go to ' + transaction.title + ' transaction'"
											>
												<img
													:src="transaction.acf.first_company_image.url"
													class="img-responsive max-h-[90px]"
												/>
												<span class="text-[13px] leading-[22px] text-center text-[#767676]" x-text="transaction.acf.transaction_action_text"></span>
												<img
													:src="transaction.acf.second_company_image.url"
													class="img-responsive max-h-[90px]"
												/>
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
								</template>
						</ul>

						<div class="flex flex-col items-center w-full md:flex-row justify-center lg:justify-end pt-[40px] gap-[50px] lg:gap-[200px]">
							<button
								class="text-black no-underline border border-black btn-long"
								@click="loadMore()"
								aria-label="Click to load more the transactions"
							>
								Load More
							</button>

							<div>

								<div class="text-darkGray text-[16px] leading-[30px]">
									Showing <span class="font-bold" x-text="actualTransactions.length"></span> of <span x-text="transactions.length"></span>
								</div>
							</div>
						</div>
					</div>
				</div>

				<?php get_template_part( 'partials/blocks/transactions-filter-section/filter', 'mobile', $args );?>
	</section>


	<?php } else { ?>
		<div data="gutenberg-preview-img">
			<img style="max-width:100%; height:auto;" src="<?php the_field( 'block_preview' ); ?>">
		</div>
	<?php } ?>
