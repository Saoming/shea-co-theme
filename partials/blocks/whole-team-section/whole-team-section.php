<?php
/**
 * Renders the Whole Team Section
 *
 * @package TenUpTheme
 */
$id = 'whole-team-section-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

$args_people = array(
	'post_type'         => 'people',
	'posts_per_page'    => -1,
	'order'             => 'ASC',
);

$people_categories =  new WP_Query($args_people);

if ( ! get_field( 'block_preview' ) ) {
	?>
	<section 	class="w-full h-full px-[14px] lg:px-[82px] pt-[62px] pb-[80px] flex flex-col justify-center items-center"
				id="<?php echo esc_attr( $id ); ?>"
				>
				<?php if ( $people_categories->have_posts() ) : ?>
					<div class="grid w-full grid-cols-1 gap-5 sm:grid-cols-3 lg:grid-cols-4">
					<?php  while ($people_categories->have_posts()) : $people_categories->the_post(); ?>
						<?php
							$individual_image = get_field('person_image',  get_the_ID());
							$job_title		  = get_field('job_title',  get_the_ID());
						?>
						<a
							class="flex flex-col no-underline"
							href="<?php echo esc_url( get_permalink() ); ?>"
							target="_blank"
							aria-label="Click to go <?php get_the_title() ?> profile"
						>
							<?php
							echo wp_get_attachment_image(
								$individual_image,
								array( 305, 341 ),
								false,
								array( 'class' => 'whole__team__single-img m-0' )
								);
							?>
							<div class="flex flex-col w-full h-full items-start justify-start pt-[26px] md:max-w-[196px]">
								<div class="text-[30px] leading-[40px] font-bold mb-[6px]"><?php the_title(); ?></div>
								<div class="text-[13px] leading-[30px] uppercase tracking-[0.15em] font-bold"><?php echo esc_attr( $job_title ); ?></div>
							</div>
						</a>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
					</div>
				<?php endif; ?>
	</section>

	<?php } else { ?>
		<div data="gutenberg-preview-img">
			<img style="max-width:100%; height:auto;" src="<?php the_field( 'block_preview' ); ?>">
		</div>
	<?php } ?>
