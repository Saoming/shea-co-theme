<?php if( $args['transaction_quote_section'] ): ?>
<section class="flex flex-col px-[30px] lg:px-[82px] pb-[58px] w-full">
	<?php foreach ( $args['transaction_quote_section'] as $index => $quote ): ?>
		<?php
			$quote_desc 					= $quote['transaction_quote'];
			$quote_person  					= $quote['transaction_quote_person'];
			$quote_person_title				= $quote['transaction_quote_person_title'];
		?>
		<div class="w-full mb-[75px] md:mb-[15px] 2xl:max-w-[1440px] 2xl:mx-auto">
			<div class="relative w-full  mb-[15px]">

				<div
					<?php if ( $index == 0 || $index == 2 ):  ?>
						class="text-[200px] font-bold leading-[36px] text-left text-unitedNationsBlue"
					<?php elseif ( $index == 1 || $index == 4 ):  ?>
						class="text-[200px] font-bold leading-[36px] text-right text-tertiary"
					<?php else:  ?>
						class="text-[200px] font-bold leading-[36px] text-left text-unitedNationsBlue"
					<?php endif; ?>
				>
					“
				</div>

				<blockquote  class="italic text-[20px] leading-[36px] text-center">
					<span><?php echo esc_textarea( $quote_desc ); ?> </span>
				</blockquote>

			</div>

			<div class="text-center">
				<h4 class="text-[20px] font-bold leading-[36px]">
					<?php echo esc_attr( $quote_person );  ?>
				</h4>
				<p class="text-[20px] leading-[36px]">
					<?php echo esc_attr( $quote_person_title );  ?>
				</p>
			</div>
		</div>
	<?php endforeach; ?>
</section>
<?php endif; ?>
