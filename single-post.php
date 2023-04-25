<?php
/**
 * The template for displaying Single Post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sheacompany
 */
get_header("black");
?>

<?php if ( have_posts() ) : ?>
	<?php  while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( '/partials/single-post/post' ); ?>
	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
