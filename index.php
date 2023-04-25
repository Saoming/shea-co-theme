<?php
/**
 * The main template file
 *
 * @package TenUpTheme
 */

get_header('black'); ?>

	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>

<?php
get_footer();
