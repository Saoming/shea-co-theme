<section class="flex flex-col px-[14px] lg:px-[82px] pb-[90px] justify-center items-center">
	<h2 class="text-[28px] md:text-[40px] leading-[40px] font-bold mb-[44px] text-center">The Shea & Co. Team </h2>

	<?php if( isset($args['featured_people']) ): ?>
		<div class="grid items-center justify-center grid-cols-1 md:grid-cols-2 gap-5 xl:grid-cols-4 pb-[47px]">
		<?php foreach( $args['featured_people'] as $post ): //have to be a post query object ?>
			<?php setup_postdata($post); ?>
			<?php $featured_people_image = get_field('person_image');  ?>

			<a
				class="flex flex-col "
				href="<?php echo esc_url( get_permalink() ); ?>"
				target="_blank"
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

	<a
		href="/team"
		aria-label="Link to Team Page"
		class="text-black border-2 border-black btn"
	>
		Meet the Full Team
	</a>

</section>
