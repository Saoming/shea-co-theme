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

$transactionTypes = get_terms([
	'taxonomy' => 'transaction-type',
	'hide_empty' => true,
]);

$locations = get_terms([
	'taxonomy' => 'location',
	'hide_empty' => true,
]);

$sectors = get_terms([
	'taxonomy' => 'sector',
	'hide_empty' => true,
]);

$sub_sectors = get_terms([
	'taxonomy' => 'subsector',
	'hide_empty' => true,
]);


if ( ! get_field( 'block_preview' ) ) {
	?>
	<section 	class="w-full h-full px-[14px] lg:px-[82px] flex flex-col justify-center items-center py-[82px]"
				id="<?php echo esc_attr( $id ); ?>"
				x-data
				>

				<div class="flex flex-col md:flex-row gap-[150px]">
					<div class="w-full md:w-3/12">
						<div class="mb-5">
							<div class="text-darkGray text-[16px] leading-[30px]"><span class="font-bold" data-prev="0">0</span>Results</div>
							<button
								class="text-[16px] text-main leading-[30px] underline"
								@click=""
								aria-label="Click to load all the transactions"
							>
								View All
							</a>
						</div>

						<div class="mb-[30px]">
							<h4 class="font-bold text-[18px] leading-[30px] mb-[15px]">Year</h4>
						</div>

						<div class="mb-[30px]">
							<h4 class="font-bold text-[18px] leading-[30px] mb-[15px]">Transaction Type</h4>

						</div>

						<div class="mb-[30px]">
							<h4 class="font-bold text-[18px] leading-[30px] mb-[15px]">Location</h4>

						</div>

						<div class="mb-[30px]">
							<h4 class="font-bold text-[18px] leading-[30px] mb-[15px]">Sector</h4>

						</div>


						<div class="mb-[30px]">
							<h4 class="font-bold text-[18px] leading-[30px] mb-[15px]">Subsector</h4>

						</div>

					</div>

					<div class="w-full md:w-7/12">
						<ul class="grid grid-cols-1 gap-5 md:grid-cols-3">
								<template x-for="transaction in $store.test.transactions" :key="transaction.ID">
									<li class="w-full h-full pl-0 m-0 list-none">
											<a
												class="px-[63px] py-[65px] border border-gray-400 flex flex-col items-center justify-center gap-[37px] h-full"
												x-bind:href="transaction.link"
												target="_blank"
												x-bind:aria-label="Click to go transaction.title transaction"
											>
												<img
													:src="transaction.acf.first_company_image.url"
													class="img-responsive"
												/>
												<span class="max-w-[99px] text-[18px] leading-[22px]">has been aquired by</span>
												<img
													:src="transaction.acf.second_company_image.url"
													class="img-responsive"
												/>
											</a>
										</li>
								</template>
						</ul>
					</div>
				</div>
	</section>

	<?php } else { ?>
		<div data="gutenberg-preview-img">
			<img style="max-width:100%; height:auto;" src="<?php the_field( 'block_preview' ); ?>">
		</div>
	<?php } ?>
