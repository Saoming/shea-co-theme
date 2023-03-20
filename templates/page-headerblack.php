<?php
/**
 * Template Name: Header Dark Mode
 *
 * @package TenUpTheme
 */


get_header("black");
?>

<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
		<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
