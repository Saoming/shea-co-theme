<?php
/**
 * Site Footer
 *
 * @package TenUpTheme
 */

 $args['menu_footer_one'] = wp_nav_menu(
	array(
		'container'       => 'nav',
		'container_class' => 'footer__menu-container--one',
		'echo'            => false,
		'menu_class'      => 'footer__menu footer__menu--one',
		'theme_location'  => 'menu_footer_one',
		'link_before'     => '<span class="menu-item-text">',
		'link_after'      => '</span>',
		'items_wrap'      => '<ul id="%1$s" class="%2$s" role="navigation">%3$s</ul>',
	)
);

$args['menu_footer_two'] = wp_nav_menu(
	array(
		'container'       => 'nav',
		'container_class' => 'footer__menu-container--two',
		'echo'            => false,
		'menu_class'      => 'footer__menu footer__menu--two',
		'theme_location'  => 'menu_footer_two',
		'link_before'     => '<span class="menu-item-text">',
		'link_after'      => '</span>',
		'items_wrap'      => '<ul id="%1$s" class="%2$s" role="navigation">%3$s</ul>',

	)
);
$args['social_link']  		 	= get_field( 'social_link', 'option' );
$args['footer_brand']  			= get_field( 'brand', 'option' );
$args['footer_email_address'] 	= get_field( 'email_address', 'option' );

if ( have_rows( 'location_repeaters', 'option' ) ) {
	$i = 0;
	while ( have_rows( 'location_repeaters', 'option' ) ) {
		the_row();
		$args['location_repeaters'][ $i ]['name']  = get_sub_field( 'location_name' );
		$args['location_repeaters'][ $i ]['address']  = get_sub_field( 'address' );
		$i ++;
	}
}

get_template_part( 'partials/footer/footer', 'view', $args );

