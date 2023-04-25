<section class="flex flex-col px-[14px] lg:px-[82px] pt-5 pb-[90px]">

	<div class="text-base leading-[36px] text-center xl:text-left pb-[10px] lg:[pb-0] pt-[97px] xl:pt-0">
		<a href="/" aria-label="Link to Home Page">
			Home
		</a> /
		<a href="/team" aria-label="Link to Team Page">
			Team
		</a> /
		<span><?php the_title(); ?> <span>
	</div>

	<div class="text-center xl:pt-[97px] pb-[36px]">
		<h1 class="text-[28px] md:text-[40px] leading-[40px] font-bold"><?php the_title(); ?> </h1>
		<div class="font-bold tracking-[0.15em] leading-[35px] uppercase"><?php echo esc_attr($args['job_title'] = get_field('job_title')); ?></div>
	</div>

	<div class="flex flex-col lg:flex-row gap-[30px] xl:gap-[169px]">
		<aside class="order-2 w-full lg:w-4/12 xl:w-3/12 lg:order-1 mb-[30px]">
			<?php  if( isset($args['transactions']) ): ?>
			<div class="flex flex-col items-center justify-center lg:justify-start lg:items-start mb-[30px]">
					<h4 class="text-[18px] leading-[40px] tracking-[0.15em] font-bold uppercase">Select Transactions</h4>
					<ul>
					<?php foreach( $args['transactions'] as $transaction): ?>
						<li>
							<a
								class="text-main text-[18px] leading-[44px]"
								href="<?php echo esc_url( get_permalink( $transaction ) ); ?>"
								target="_blank"
								aria-label="Go to Transaction: <?php echo esc_attr( get_the_title( $transaction ) ); ?>"
							>
								<?php echo esc_attr( get_the_title( $transaction ) );   ?>
							</a>
						</li>
					<?php endforeach; ?>
					</ul>
			</div>
			<?php endif; ?>

			<div class="flex flex-col items-center justify-center lg:justify-start lg:items-start">
				<h4 class="text-[18px] leading-[40px] tracking-[0.15em] font-bold uppercase">Connect</h4>
				<ul>
				<?php  if( isset($args['person_linkedin'] ) ): ?>
					<li class="ml-[-8px]">
						<a
							class="text-main text-[18px] leading-[44px] flex flex-row items-center"
							href="<?php echo esc_url( $args['person_linkedin'] ); ?>"
							target="_blank"
							aria-label="Check Our Team Linkedin"
						>
							<img
								src="<?php echo esc_url( TENUP_THEME_DIST_URL . 'images/social-icons/linkedin-icon-black.svg' ); ?>"
								alt="Linkedin icon"
							/>
							Linkedin
						</a>
					</li>
				<?php endif; ?>
				<?php  if( isset( $args['person_email'] ) ): ?>
					<li class="ml-[-6px]">
						<a
							class="text-main text-[18px] leading-[44px] flex flex-row items-center"
							href="<?php echo esc_url( $args['person_email'] ); ?>"
							target="_blank"
							aria-label="Send Our Team Email"
						>
							<img
								src="<?php echo esc_url( TENUP_THEME_DIST_URL . 'images/social-icons/email-icon-black.svg' ); ?>"
								alt="Email icon"
							/>
							Email
						</a>
					</li>
				<?php endif; ?>
				</ul>
			</div>
		</aside>

		<div class="order-1 w-full lg:w-8/12 xl::w-9/12 lg:order-2 ">
			<div class="leading-9 text-[18px] flex flex-col gap-3 text-center lg:text-left">
				<?php echo wp_kses_post( $args['person_bio'] ) ; ?>
			</div>
		</div>
	</div>

</section>
