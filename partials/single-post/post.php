<?php
/**
 * Content for Single Post
 *
 * @package TenUpTheme
 */
$args['featured_img']			 = get_post_thumbnail_id();
$args['post_date']				 = get_the_date('F j, Y', get_the_ID());
$args['insight_download_button'] = get_field('insight_download_button');

get_template_part( 'partials/single-post/post', 'view', $args );

