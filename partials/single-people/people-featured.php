<?php
	$args_people = array(
		'post_type'         			=> 'people',
		'posts_per_page'    			=>  3,
		'orderby' 						=> 'rand',
		'post__not_in' 					=> array( get_the_ID() ),
		'ignore_custom_sort'          	=> true, // https://www.nsp-code.com/advanced-post-types-order-api/sample-usage/
	);

	$query = new WP_Query($args_people);
	$count = $query->found_posts;
?>

<?php if( $count > 0 ): ?>
<section class="flex flex-col px-[30px] lg:px-[82px] pb-[90px] justify-center items-center 2xl:max-w-[1440px] 2xl:mx-auto">
	<h2 class="text-[28px] md:text-[40px] leading-[40px] font-bold mb-[44px] text-center">The Shea & Co. Team </h2>

	<?php if ( $query->have_posts() ) : ?>
		<div class="grid items-start justify-center grid-cols-1 md:grid-cols-3 gap-5 xl:grid-cols-3 pb-[47px]">
		<?php  while ($query->have_posts()) : $query->the_post(); ?>
			<?php $featured_people_image = get_field('person_image', get_the_ID());  ?>
			<a
				class="flex flex-col "
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
					<div class="text-[30px] leading-[40px] font-bold mb-[6px] text-center md:text-left max-w-[302px] md:max-w-full"><?php the_title(); ?></div>
					<div class="text-[13px] leading-[30px] uppercase tracking-[0.15em] font-bold"><?php the_field('job_title'); ?></div>
				</div>
			</a>
		<?php endwhile; ?>
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
<?php endif; ?>
