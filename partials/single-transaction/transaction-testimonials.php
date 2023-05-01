<?php if( $args['transaction_quote_section'] ): ?>
<section class="flex flex-col px-[14px] lg:px-[82px] pb-[58px] w-full">
	<?php foreach ( $args['transaction_quote_section'] as $quote ): ?>
		<?php
			$quote_desc 					= $quote['transaction_quote'];
			$quote_person  					= $quote['transaction_quote_person'];
			$quote_person_title				= $quote['transaction_quote_person_title'];
			$quote_color					= $quote['quote_color'];
			$quote_position					= $quote['quote_position'];
		?>
		<div class="w-full mb-[15px]">
			<div class="relative w-full  mb-[15px]">

				<?php if($quote_color): ?>
				<div
					<?php if ($quote_position == 'left'):  ?>
						class="text-[200px] font-bold leading-[36px] text-left"
					<?php elseif ($quote_position == 'right'):  ?>
						class="text-[200px] font-bold leading-[36px] text-right"
					<?php endif; ?>
					style="color: <?php echo $quote_color; ?>;"
				>
					“
				</div>
				<?php endif; ?>

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
