<section class="flex flex-col px-[14px] lg:px-[82px] pt-5 pb-[75px] w-full">

	<div class="pt-[36px] pb-[95px] flex flex-col md:flex-row gap-[126px]">

		<aside class="flex flex-col w-full md:w-3/12 gap-[35px]">
			<div class="px-[63px] py-[65px] border border-gray-400 flex flex-col items-center justify-center gap-[35px]">
				<?php echo wp_get_attachment_image( $args['first_company_image']['id'], 'full', false, array( 'class' => 'img-responsive' ) ); ?>
				<span class="text-[18px] leading-[22px] text-center"><?php echo esc_attr( $args['transaction_action_text'] ); ?></span>
				<?php echo wp_get_attachment_image( $args['second_company_image']['id'], 'full', false, array( 'class' => 'img-responsive' ) ); ?>
			</div>

			<div class="px-[63px] py-[65px] bg-shades flex flex-col gap-[42px] h-full">
        <?php
          $investorsBuy = get_the_terms($post->ID,'transaction-investor');
          $investorsSell = get_the_terms($post->ID,'transaction-sellside-investor');
          $sectors = get_the_terms($post->ID,'sector');
          $subsectors = get_the_terms($post->ID,'subsector');
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
										href="<?php echo esc_url( get_term_link( $sector->term_id ) ); ?>"
										target="_blank"
										aria-label="Click to go <?php echo esc_attr( $sector->name ); ?> sector"
									>
                  	<?php echo esc_attr( $sector->name ); ?>
									</a>
                </li>
              <?php endforeach; ?>
              </ul>
          </div>
        <?php endif;?>

        <?php if( $subsectors ) : ?>
          <div>
            <h4 class="font-bold text-[18px] leading-[36px] mb-[8px]">Subsector</h4>
              <ul>
              <?php foreach ($subsectors as $subsector):  ?>
                <li class="text-[18px] leading-[24px]">
									<a
											href="<?php echo esc_url( get_term_link( $subsector->term_id ) ); ?>"
											target="_blank"
											aria-label="Click to go <?php echo esc_attr( $subsector->name ); ?> sector"
									>
										<?php echo esc_attr( $subsector->name ); ?>
									</a>
								</li>
              <?php endforeach; ?>
              </ul>
          </div>
        <?php endif;?>
      </div>
		</aside>

		<div class="flex flex-col md:w-7/12">

			<div class="text-base leading-[36px] text-center xl:text-left mb-[30px]">
				<a href="/" aria-label="Link to Home Page">
					Home
				</a> /
				<a href="/transactions" aria-label="Link to Transactions Page">
					Transactions
				</a> /
				<span><?php the_title(); ?> <span>
			</div>

			<time class="text-[16px] tracking-[0.05em] leading-[30px] mb-[14px]"><?php echo esc_attr( $args['transaction_date'] ); ?></time>

			<h1 class="text-main text-[36px] font-bold leading-[48px] mb-[50px]">
				<?php echo esc_attr( $args['transaction_lp_title'] ); ?>
			</h1>

			<div class="text-[18px] leading-[18px] single-transaction-content">
				<?php the_content(); ?>
			</div>

		</div>
	</div>
</section>
