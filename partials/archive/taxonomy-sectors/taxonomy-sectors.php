<?php
/**
 * Content for Taxonomy Sector and Sub Sector
 *
 * @package TenUpTheme
 */
$args['icon_id'] 							= get_field('sector_icon');
$args['coverage_team']						= get_field('coverage_team');
$args['selected_insights'] 					= get_field('selected_insights');
$args['recent_transactions_title'] 			= get_field('recent_transactions_title');
$args['recent_transactions_relationships']	= get_field('recent_transactions_relationships');
?>

<?php get_template_part( 'partials/archive/taxonomy-sectors/tax', 'body', $args );?>
<?php get_template_part( 'partials/archive/taxonomy-sectors/tax', 'transactions', $args );?>
<?php get_template_part( 'partials/archive/taxonomy-sectors/tax', 'posts', $args );?>
