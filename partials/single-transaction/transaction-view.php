<section class="flex flex-col px-[30px] lg:px-[82px] pt-5 pb-[75px] w-full">

	<div class="pt-[36px] pb-[95px] flex flex-col lg:flex-row gap-[126px] 2xl:max-w-[1440px] 2xl:mx-auto">

		<aside class="flex flex-col w-full md:w-3/5 md:mx-auto lg:mx-0 lg:w-3/12 gap-[35px] order-2 lg:order-1">
			<div class="px-[63px] py-[65px] border border-[#767676] flex flex-col items-center justify-center gap-[35px]">
				<?php echo wp_get_attachment_image( $args['first_company_image']['id'], 'full', false, array( 'class' => 'img-responsive max-h-[90px]' ) ); ?>
				<span class="text-[13px] leading-[22px] text-center text-[#767676]"><?php echo esc_attr( $args['transaction_action_text'] ); ?></span>
				<?php echo wp_get_attachment_image( $args['second_company_image']['id'], 'full', false, array( 'class' => 'img-responsive max-h-[90px]' ) ); ?>
			</div>

			<div class="px-[63px] py-[65px] bg-shades flex flex-col gap-[42px] h-full">
        <?php
          $investorsBuy = get_the_terms($post->ID,'transaction-investor');
          $investorsSell = get_the_terms($post->ID,'transaction-sellside-investor');
          $sectors = get_the_terms($post->ID,'sector');
        ?>

        <?php if( $investorsBuy ) : ?>
          <div>
            <h4 class="font-bold text-[18px] leading-[36px] mb-[8px]">Buy-Side Investors</h4>
              <ul>
              <?php foreach ($investorsBuy as $investor):  ?>
                <li class="text-[18px] leading-[24px]"> <?php echo esc_attr( $investor->name ); ?> </li>
              <?php endforeach; ?>
              </ul>
          </div>
        <?php endif;?>

        <?php if( $investorsSell ) : ?>
          <div>
            <h4 class="font-bold text-[18px] leading-[36px] mb-[8px]">Sell-Side Investors</h4>
              <ul>
              <?php foreach ($investorsSell as $investor):  ?>
                <li class="text-[18px] leading-[24px]"> <?php echo esc_attr( $investor->name ); ?> </li>
              <?php endforeach; ?>
              </ul>
          </div>
        <?php endif;?>

        <?php if( $sectors ) : ?>
          <div>
            <h4 class="font-bold text-[18px] leading-[36px] mb-[8px]">Sector</h4>
              <ul>
              <?php foreach ($sectors as $sector):  ?>
                <li class="text-[18px] leading-[24px]">
									<a
										class="text-main"
										href="<?php echo esc_url( get_term_link( $sector->term_id ) ); ?>"
										target="_self"
										aria-label="Click to go <?php echo esc_attr( $sector->name ); ?> sector"
									>
                  	<?php echo esc_attr( $sector->name ); ?>
									</a>
                </li>
              <?php endforeach; ?>
              </ul>
          </div>
        <?php endif;?>
      </div>
		</aside>

		<div class="flex flex-col order-1 w-full md:mx-auto lg:mx-0 md:w-3/5 lg:w-9/12 lg:order-2">

			<div class="text-base leading-[36px] text-left mb-[30px]">
				<a href="/" aria-label="Link to Home Page">
					Home
				</a> /
				<a href="/transactions" aria-label="Link to Transactions Page">
					Transactions
				</a> /
				<span><?php the_title(); ?> <span>
			</div>
			<?php
				$date 					= strtotime($args['transaction_date']); // expensive operations
				$day_from_date 	= date('F j, Y', $date);
			?>
			<time class="text-[16px] tracking-[0.05em] leading-[30px] mb-[14px]"><?php echo esc_attr( $day_from_date ); ?></time>

			<h1 class="text-main text-[36px] font-bold leading-[48px] mb-[50px]">
				<?php echo esc_attr( $args['transaction_lp_title'] ); ?>
			</h1>

			<div class="text-[18px] leading-[18px] single-transaction-content">
				<?php the_content(); ?>
			</div>

		</div>
	</div>
</section>
