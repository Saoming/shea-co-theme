<?php
/**
 * Transaction Filter Menu Mobile LightBox Setting Default HTML
 *
 * @package TenUpTheme
 *
 */
?>

<section
	x-show="filter"
	id="filter"
	class="fixed top-0 bottom-0 left-0 right-0 z-[190] backdrop-blur-sm"
	x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 scale-90"
    x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-90"
	x-cloak
	tabindex="-1" role="dialog" aria-labelledby="filter">

    <div class="absolute top-0 bottom-0 right-0 z-10 flex flex-col w-11/12 py-4 transition-all bg-white drop-shadow-2xl">
		<div class="flex flex-row justify-between w-full px-5 border-b border-gray-400 border-inherit pb-[21px]">
			<span id="mobile-menu-title" class="font-bold text-[28px]"> All filters </span>

			<!-- Close Button -->
			<button
				type="button"
				x-on:click="filter = ! filter"
				:aria-expanded="filter"
				aria-controls="filter"
				aria-label="Close Filter Menu"
			>
				<svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
					<rect x="14.9836" y="0.712708" width="20.2052" height="0.962152" transform="rotate(135 14.9836 0.712708)" fill="black"/>
					<rect x="14.3032" y="14.9676" width="20.2052" height="0.962152" transform="rotate(-135 14.3032 14.9676)" fill="black"/>
				</svg>
			</button>
		</div>

		<div class="pt-[15px] pb-[65px] px-[20px] flex flex-col gap-4 w-full h-full overflow-y-auto">
			<div x-data="{ open: false }">
				<div @click="open = !open" class="flex items-center justify-between pb-[20px] border-b border-[#D9D9D9]">
					<p class="text-lg">Year</p>
					<span :class="open ? 'hidden' : 'block'">
						<svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M1 1L7 7L0.999999 13" stroke="black" stroke-linecap="round"/>
						</svg>
					</span>
					<span :class="open ? 'block' : 'hidden'">
						<svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M13 0.999999L7 7L1 0.999999" stroke="black" stroke-linecap="round"/>
						</svg>
					</span>
				</div>
				<div x-show.transition.in.duration.800ms="open" class="p-4">
					<?php if($args['years']): ?>
						<ul class="grid grid-rows-[repeat(10,_1fr)] grid-flow-col gap-[15px]">
							<?php foreach($args['years'] as $result): ?>
								<li class="flex flex-row gap-[13px] items-center text-[18px] leading-[36px]">
									<input
										class="w-4 h-4"
										type="radio"
										x-model="yearMobile"
										value="<?php echo esc_attr( $result ); ?>"
										@change="toggleFilter('year','<?php echo esc_attr( $result ); ?>')"
									>
									<?php echo esc_attr($result) ?>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>
			</div>

			<div x-data="{ open: false }">
				<div @click="open = !open" class="flex items-center justify-between pb-[20px] border-b border-[#D9D9D9]">
					<p class="text-lg">Transaction Type</p>
					<span :class="open ? 'hidden' : 'block'">
						<svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M1 1L7 7L0.999999 13" stroke="black" stroke-linecap="round"/>
						</svg>
					</span>
					<span :class="open ? 'block' : 'hidden'">
						<svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M13 0.999999L7 7L1 0.999999" stroke="black" stroke-linecap="round"/>
						</svg>
					</span>
				</div>
				<div x-show.transition.in.duration.800ms="open" class="p-4">
					<?php if($args['transactionTypes']): ?>
						<ul>
							<?php foreach($args['transactionTypes'] as $transactionType): ?>
								<li class="flex flex-row gap-[13px] items-center text-[18px] leading-[36px]">
										<input
											class="w-4 h-4"
											type="radio"
											x-model="transactionTypeMobile"
											value="<?php echo esc_attr( $transactionType->slug ); ?>"
											@change="toggleFilter('transaction-type','<?php echo esc_attr( $transactionType->slug ); ?>')"
										>
										<?php echo esc_attr($transactionType->name) ?>
									</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>
			</div>

			<div x-data="{ open: false }">
				<div @click="open = !open" class="flex items-center justify-between pb-[20px] border-b border-[#D9D9D9]">
					<p class="text-lg">Location</p>
					<span :class="open ? 'hidden' : 'block'">
						<svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M1 1L7 7L0.999999 13" stroke="black" stroke-linecap="round"/>
						</svg>
					</span>
					<span :class="open ? 'block' : 'hidden'">
						<svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M13 0.999999L7 7L1 0.999999" stroke="black" stroke-linecap="round"/>
						</svg>
					</span>
				</div>
				<div x-show.transition.in.duration.800ms="open" class="p-4">
					<?php if($args['locations']): ?>
						<ul>
								<?php foreach($args['locations'] as $location): ?>
									<li class="flex flex-row gap-[13px] items-center text-[18px] leading-[36px]">
										<input
											class="w-4 h-4"
											type="radio"
											x-model="locationMobile"
											value="<?php echo esc_attr( $location->slug ); ?>"
											@change="toggleFilter('location','<?php echo esc_attr( $location->slug ); ?>')"
										>
										<?php echo esc_attr($location->name) ?>
									</li>
								<?php endforeach; ?>
								</ul>
					<?php endif; ?>
				</div>
			</div>

			<div x-data="{ open: false }">
				<div @click="open = !open" class="flex items-center justify-between pb-[20px] border-b border-[#D9D9D9]">
					<p class="text-lg">Sector</p>
					<span :class="open ? 'hidden' : 'block'">
						<svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M1 1L7 7L0.999999 13" stroke="black" stroke-linecap="round"/>
						</svg>
					</span>
					<span :class="open ? 'block' : 'hidden'">
						<svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M13 0.999999L7 7L1 0.999999" stroke="black" stroke-linecap="round"/>
						</svg>
					</span>
				</div>
				<div x-show.transition.in.duration.800ms="open" class="p-4">
					<?php if($args['sectors']): ?>
						<ul>
								<?php foreach($args['sectors'] as $sector): ?>
									<li class="flex flex-row gap-[13px] items-center text-[18px] leading-[36px]">
										<input
											class="w-4 h-4"
											type="radio"
											x-model="sectorMobile"
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
		</div>

		<div class="flex flex-col md:flex-row gap-[10px] justify-between w-full px-5 border-t border-gray-400 border-inherit py-[21px]">
			<button
				class="text-black no-underline border border-black btn-long"
				type="button"
				@click="resetFilter()"
				aria-label="Click to load all the transactions"
			>
				Reset Filter
			</button>

			<button
				class="text-white no-underline border border-main bg-main btn-long"
				type="button"
				x-on:click="filter = ! filter"
				:aria-expanded="filter"
				aria-controls="filter"
				aria-label="Close Filter Menu"
			>
				Update
			</button>
		</div>

	</div>

</section>
