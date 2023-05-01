<?php if( $args['transaction_additional_information'] ): ?>
<section class="flex flex-col justify-center items-center px-[14px] lg:px-[82px] pb-[66px] w-full">
	<div class="w-full h-full bg-tertiary max-w-[1060px] mx-auto mb-[60px]" style="--tw-bg-opacity: 0.4;">
		<div class="relative border-2 border-main top-[10px] left-[10px] pt-[74px] pb-[41px] px-[98px] single-transaction-content text-[18px] leading-[36px]">
				<?php echo wp_kses_post( $args['transaction_additional_information'] ); ?>
		</div>
	</div>

	<a
		class="text-black no-underline border-2 border-black btn"
		href="<?php echo esc_url($args['transaction_press_release']['url']); ?>"
		aria-label="Read the Press Release"
		target="_blank"
	>
		Read The Press Release
	</a>

</section>
<?php endif; ?>
