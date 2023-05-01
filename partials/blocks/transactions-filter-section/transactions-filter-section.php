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

if ( ! get_field( 'block_preview' ) ) {
	?>
	<section 	class="w-full h-full px-[14px] lg:px-[82px] flex flex-col justify-center items-center py-[82px]"
				id="<?php echo esc_attr( $id ); ?>"
				x-data="transactionsFilter()"
				x-init="transactionsFilter.init();"
				>
				<div>
						<span x-show="isLoading">
							Loading...
						</span>

						<ul x-if="transactions" class="grid grid-cols-1 gap-5 md:grid-cols-3">
							<template x-for="transaction in transactions" :key="transaction.id">
								<li class="w-full h-full pl-0 m-0 list-none">
									<a
										class="px-[63px] py-[65px] border border-gray-400 flex flex-col items-center justify-center gap-[37px] h-full"
										x-bind:href="transaction.link"
										target="_blank"
										x-bind:aria-label="Click to go transaction.title.rendered transaction"
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




	</section>

	<?php } else { ?>
		<div data="gutenberg-preview-img">
			<img style="max-width:100%; height:auto;" src="<?php the_field( 'block_preview' ); ?>">
		</div>
	<?php } ?>
