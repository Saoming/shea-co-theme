<?php
/**
 * The template for displaying Single People
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sheacompany
 */

get_header();
?>

<?php if ( have_posts() ) : ?>
	<?php  while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( '/partials/single-people/people' ); ?>
	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
