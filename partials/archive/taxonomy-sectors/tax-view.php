<?php
/**
 * Content for Taxonomy Sector and Sub Sector
 *
 * @package TenUpTheme
 */
$args['icon_id'] 			= get_field('sector_icon');
$args['coverage_team']		= get_field('coverage_team');
$args['selected_insights'] 	= get_field('selected_insights');
?>

<section class="flex flex-col px-[14px] lg:px-[82px] pt-5 pb-[75px] max-w-[1080px] mx-auto">

	<div class="text-base leading-[36px] text-center xl:text-left pb-[10px] pt-[10px] lg:pb-[50px]">
		<a href="/" aria-label="Link to Home Page">
			Home
		</a> /
		<a href="/sectors" aria-label="Link to Sectors Page">
			Sectors
		</a> /
		<span><?php single_term_title(); ?> <span>
	</div>

	<div class="flex flex-row items-center justify-start mb-5 gap-7">
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

		<div class="grid items-center justify-center grid-cols-1 md:grid-cols-2 gap-5 pb-[47px] mx-auto">
			<?php foreach( $args['coverage_team'] as $post ): //have to be a post query object ?>
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

</section>

<?php if( isset( $args['selected_insights'] )  ): ?>
<section class="flex flex-col justify-center items-center px-[14px] lg:px-[82px] py-[75px]">
	<h2 class="text-[18px] leading-[24px] font-bold mb-[56px] text-center tracking-[0.15em]">GOVERNANCE, RISK & COMPLIANCE  INSIGHTS</h2>
	<ul class="grid items-center justify-center lg:grid-cols-4 grid-cols-1 md:grid-cols-2 gap-5 pb-[47px] mx-auto m-0 pl-0">
		<?php foreach( $args['selected_insights'] as $post ): //have to be a post query object ?>
			<?php setup_postdata($post); ?>
				<?php
					$categories_industry = get_the_category(get_the_ID());
					$content = get_the_excerpt();
					$featured_img = get_post_thumbnail_id();
					$separator = ' ';
					$output = '';
				?>
					<li class="w-full h-full pl-0 m-0 list-none">
						<a
							class="w-full h-full flex flex-col justify-start items-center no-underline py-[41px] px-[34px] border border-gray-400 text-center hover:bg-shades hover:opacity-100 transition-colors"
							href="<?php echo esc_url( get_permalink() ); ?>"
							target="_blank"
							aria-label="Click to go <?php get_the_title() ?> article"
						>
							<?php if( ! empty( $categories_industry )): ?>
								<?php foreach ($categories_industry as $category_industry): ?>
									<span class="text-[18px] text-black opacity-40 mb-[28px] font-bold uppercase"> <?php echo esc_attr( $category_industry->name ); ?> </span>
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
