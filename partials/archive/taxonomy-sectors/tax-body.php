<section class="flex flex-col px-[30px] lg:px-[82px] pt-5 pb-[75px] 2xl:px-0 2xl:max-w-[1440px] 2xl:mx-auto">

	<div class="text-base leading-[36px] text-left pb-[10px] pt-[10px] lg:pb-[50px]">
		<a href="/" aria-label="Link to Home Page">
			Home
		</a> /
		<a href="/sectors" aria-label="Link to Sectors Page">
			Sectors
		</a> /
		<span><?php single_term_title(); ?> <span>
	</div>

	<div class="flex flex-col items-start justify-start mb-5 md:flex-row md:items-center gap-7">
		<?php if( $args['icon_id'] ): ?>
			<?php
				echo wp_get_attachment_image(
					$args['icon_id'],
					'full',
					false,
					array( 'class' => 'img-responsive group-hover:opacity-50' )
				);
			?>
		<?php endif; ?>
		<h1 class="text-main font-semibold text-[38px] leading-[48px] ">
			<?php single_term_title(); ?>
		</h1>
	</div>

	<div class="leading-9 text-[18px] flex flex-col gap-4 mb-[40px]">
		<?php echo wp_kses_post( term_description(get_the_ID()) ) ; ?>
	</div>

	<?php if( isset($args['coverage_team']) ): ?>
		<div class="flex flex-col items-center justify-center">
			<h2 class="text-[28px] md:text-[40px] leading-[40px] font-bold mb-[44px] text-center">Coverage Team</h2>
		</div>

		<?php $count = count($args['coverage_team']);  ?>
		<?php if ( $count == 4 ): ?>
			<div class="grid items-center justify-center grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 pb-[47px] mx-auto">
		<?php elseif ($count == 3): ?>
			<div class="grid items-center justify-center grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-5 pb-[47px] mx-auto">
		<?php elseif ($count == 2): ?>
			<div class="grid items-center justify-center grid-cols-1 md:grid-cols-2 gap-5 pb-[47px] mx-auto">
		<?php elseif ($count == 1): ?>
			<div class="grid items-center justify-center grid-cols-1 gap-5 pb-[47px] mx-auto">
		<?php else: ?>
			<div class="grid items-center justify-center grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 pb-[47px] mx-auto">
		<?php endif; ?>
			<?php foreach( $args['coverage_team'] as $post ): //have to be a post query object ?>
				<?php setup_postdata($post); ?>
				<?php $featured_people_image = get_field('person_image');  ?>
				<a
					class="flex flex-col"
					href="<?php echo esc_url( get_permalink() ); ?>"
					target="_self"
					aria-label="Click to go <?php get_the_title() ?> profile"
				>
					<?php
					echo wp_get_attachment_image(
						$featured_people_image,
						array( 304, 341 ),
						false,
						array( 'class' => 'features__people-img' )
						);
					?>

					<div class="flex flex-col justify-center items-center md:items-start md:justify-start pt-[26px] md:max-w-[179px]">
						<div class="text-[30px] leading-[40px] font-bold mb-[6px] text-center md:text-left"><?php the_title(); ?></div>
						<div class="text-[13px] leading-[30px] uppercase tracking-[0.15em] font-bold"><?php the_field('job_title'); ?></div>
					</div>
				</a>
			<?php endforeach; ?>
			<?php wp_reset_postdata(); ?>
		</div>

	<?php endif; ?>

</section>
