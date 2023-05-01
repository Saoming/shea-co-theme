<?php
/**
 * Content for Single Transaction
 *
 * @package TenUpTheme
 */
$args['transaction_date']				 			= get_field('transaction_announcement_date');
$args['transaction_lp_title']						= get_field('transaction_lp_title');
$args['first_company']								= get_field('first_company_image');
$args['first_company_image']						= get_field('first_company_image');
$args['second_company']								= get_field('second_company');
$args['second_company_image']						= get_field('second_company_image');
$args['transaction_quote_section']					= get_field('transaction_quote_section');
$args['transaction_additional_information']			= get_field('transaction_additional_information');
$args['transaction_press_release']					= get_field('transaction_press_release');


get_template_part( 'partials/single-transaction/transaction', 'view', $args );
get_template_part( 'partials/single-transaction/transaction', 'testimonials', $args );
get_template_part( 'partials/single-transaction/transaction', 'notes', $args );

