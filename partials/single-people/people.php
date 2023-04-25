<?php
/**
 * Content for Single Archive People
 *
 * @package TenUpTheme
 */
$args['person_hero_image'] = get_field('person_hero_image');
$args['person_image'] = get_field('person_image');
$args['job_title'] = get_field('job_title');
$args['person_bio'] = get_field('person_bio');
$args['transactions'] = get_field('recent_transactions');
$args['person_location'] = get_field('person_location');
$args['person_linkedin'] = get_field('person_linkedin');
$args['person_email'] = get_field('person_email');
$args['person_image'] = get_field('person_image');
$args['featured_people'] = get_field('people');

get_template_part( 'partials/single-people/people', 'hero', $args );
get_template_part( 'partials/single-people/people', 'view', $args );
get_template_part( 'partials/single-people/people', 'featured', $args );

