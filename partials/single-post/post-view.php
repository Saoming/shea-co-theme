<section class="w-full h-full px-[14px] lg:px-[82px] pt-[54px] pb-[82px] flex flex-col items-start justify-start">

	<div class="text-base leading-[36px] pb-[60px] pt-[38px]">
		<a href="/" aria-label="Link to Home Page">
			Home
		</a> /
		<a href="/insights" aria-label="Link to Team Page">
			Insights
		</a> /
		<span><?php the_title(); ?> <span>
	</div>

	<div class="flex flex-row items-center justify-start text-main mb-[40px] gap-4 ">
		<?php
			echo wp_get_attachment_image(
				$args['featured_img'],
				array( 88, 80 ),
				false,
				array( 'class' => 'img-responsive' )
				);
		?>
		<h1 class="text-[38px] font-bold leading-[50px]"><?php the_title(); ?></h1>
	</div>
	<time class="mb-5 text-[16px] leading-[30px] text-black opacity-40"><?php echo esc_attr($args['post_date'] );?></time>

	<div class="text-[20px] leading-[36px] mb-[38px] single-post-content">
		<?php the_content(); ?>
	</div>

	<a
		class="text-black no-underline bg-white border-black btn"
		href="<?php echo esc_url($args['insight_download_button']['url']); ?>"
		target="_blank"
		aria-label="Click to go download the article"
	>
		Download The Article
	</a>


</section>
