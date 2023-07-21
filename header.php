<?php
/**
 * The template for displaying the header white mode.
 *
 * @package TenUpTheme
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?> x-data="{ modal: false, filter: false }">
		<?php wp_body_open(); ?>

		<?php get_template_part( '/partials/header/header' ); ?>
		<main id="main" role="main" tabindex="-1">
