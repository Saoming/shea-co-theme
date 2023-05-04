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
				x-data="transactionFilter"
				>

				<div class="flex flex-col md:flex-row gap-[150px]">
					<div class="w-full md:w-3/12">
						<div class="mb-5">
							<div class="text-darkGray text-[16px] leading-[30px]">
								<span class="font-bold" x-text="transactions.length"></span> Results
							</div>
							<button
								class="text-[16px] text-main leading-[30px] underline"
								@click="showAll()"
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

							<?php if($transactionTypes): ?>
								<ul>
								<?php foreach($transactionTypes as $transactionType): ?>
									<li class="flex flex-row gap-[13px] items-center text-[18px] leading-[36px]">
										<input
											class="w-4 h-4"
											type="radio"
											x-model="transaction-type"
											value="<?php echo esc_attr( $transactionType->slug ); ?>"
											@change="toggleFilter('transaction-type','<?php echo esc_attr( $transactionType->slug ); ?>')"
										>
										<?php echo esc_attr($transactionType->name) ?>
									</li>
								<?php endforeach; ?>
								</ul>
							<?php endif; ?>
						</div>

						<div class="mb-[30px]">
							<h4 class="font-bold text-[18px] leading-[30px] mb-[15px]">Location</h4>

							<?php if($locations): ?>
								<ul>
								<?php foreach($locations as $location): ?>
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

						<div class="mb-[30px]">
							<h4 class="font-bold text-[18px] leading-[30px] mb-[15px]">Sector</h4>

							<?php if($sectors): ?>
								<ul>
								<?php foreach($sectors as $sector): ?>
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


						<div class="mb-[30px]">
							<h4 class="font-bold text-[18px] leading-[30px] mb-[15px]">Subsector</h4>

							<?php if($sub_sectors): ?>
								<ul>
								<?php foreach($sub_sectors as $sub_sector): ?>
									<li class="flex flex-row gap-[13px] items-center text-[18px] leading-[36px]">
										<input
											class="w-4 h-4"
											type="radio"
											x-model="sub_sector"
											value="<?php echo esc_attr( $sub_sector->slug ); ?>"
											@change="toggleFilter('subsector','<?php echo esc_attr( $sub_sector->slug ); ?>')"

										>
										<?php echo esc_attr($sub_sector->name) ?>
									</li>
								<?php endforeach; ?>
								</ul>
							<?php endif; ?>

						</div>

					</div>

					<div class="w-full md:w-7/12">
						<ul class="grid grid-cols-1 gap-5 md:grid-cols-3">
								<template x-for="transaction in actualTransactions" :key="transaction.ID">
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

						<div class="flex flex-col items-center w-full md:flex-row justify-end pt-[40px] gap-[200px]">
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
	</section>

	<?php } else { ?>
		<div data="gutenberg-preview-img">
			<img style="max-width:100%; height:auto;" src="<?php the_field( 'block_preview' ); ?>">
		</div>
	<?php } ?>
