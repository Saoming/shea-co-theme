<?php
/**
 * Content for Archive / Taxonomy
 *
 * @link https://developer.wordpress.org/themes/basics/conditional-tags/
 *
 * @package TenUpTheme
 */

 if ( is_tax('subsector') || is_tax('sector') ) {
	get_template_part( 'partials/archive/taxonomy-sectors/taxonomy', 'sectors');
 }





