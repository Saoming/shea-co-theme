<?php if( $args['selected_insights']  ): ?>
<section class="flex flex-col justify-center items-center px-[30px] lg:px-[82px] py-[75px]">
	<h2 class="text-[18px] leading-[24px] font-bold mb-[56px] text-center tracking-[0.15em] uppercase"> <?php single_term_title(); ?> Insights</h2>
	<?php
		$count = count($args['selected_insights']);
	?>
	<?php if ( $count == 4 ): ?>
		<ul class="grid items-center justify-center grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 pb-[47px] mx-auto m-0 pl-0">
	<?php elseif ($count == 3): ?>
		<ul class="grid items-center justify-center grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-5 pb-[47px] mx-auto m-0 pl-0">
	<?php elseif ($count == 2): ?>
		<ul class="grid items-center justify-center grid-cols-1 md:grid-cols-2 gap-5 pb-[47px] mx-auto m-0 pl-0">
	<?php elseif ($count == 1): ?>
		<ul class="grid items-center justify-center grid-cols-1 gap-5 pb-[47px] mx-auto m-0 pl-0">
	<?php else: ?>
		<ul class="grid items-center justify-center grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 pb-[47px] mx-auto m-0 pl-0">
	<?php endif; ?>
		<?php foreach( $args['selected_insights'] as $post ): //have to be a post query object ?>
			<?php setup_postdata($post); ?>
				<?php
					$categories_industry = get_the_category(get_the_ID());
					$content = get_the_excerpt();
					$featured_img = get_post_thumbnail_id();
					$separator = ' ';
					$output = '';
				?>
					<li class="w-full h-full pl-0 m-0 list-none max-w-[345px]">
						<a
							class="w-full h-full flex flex-col justify-start items-center no-underline py-[41px] px-[34px] border border-gray-400 text-center hover:bg-shades hover:opacity-100 transition-colors"
							href="<?php echo esc_url( get_permalink() ); ?>"
							target="_self"
							aria-label="Click to go <?php get_the_title() ?> article"
						>
							<?php if( ! empty( $categories_industry )): ?>
								<?php foreach ($categories_industry as $index => $category_industry): ?>
									<?php if($index > 0): ?>
										<span class="text-[18px] text-black opacity-40 mb-[28px] font-bold uppercase"> <?php echo esc_attr( $category_industry->name ); ?> </span>
									<?php endif; ?>
								<?php endforeach; ?>
							<?php endif; ?>
							<?php
							echo wp_get_attachment_image(
								$featured_img,
								array( 90, 75 ),
								false,
								array( 'class' => 'img-responsive pb-[14px]' )
								);
							?>
							<div class="text-[20px] leading-[48px] font-bold mb-2"><?php the_title(); ?></div>

							<div class="text-[18px] leading-9 mb-[43px]"><?php echo esc_attr( wp_trim_words( $content, 12, '...' ) ) ; ?></div>
							<div class="font-medium text-[20px] leading-5"> Read More > </div>
						</a>
					</li>
			<?php endforeach; ?>
			<?php wp_reset_postdata(); ?>

	</ul>

	<a
		href="/insights"
		aria-label="Link to Insights Page"
		class="text-black border-2 border-black btn"
	>
		View All Insights
	</a>

</section>
<?php endif; ?>
