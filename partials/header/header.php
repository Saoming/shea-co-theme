<?php
/**
 * Site Header
 *
 * @package TenUpTheme
 */
$args['menu_header'] = wp_nav_menu(
	array(
		'container'       => 'nav',
		'container_class' => 'header__menu-container',
		'echo'            => false,
		'menu_class'      => 'header__menu header__menu--white',
		'theme_location'  => 'primary',
		'link_before'     => '<span class="menu-item-text">',
		'link_after'      => '</span>',
		'items_wrap'      => '<ul id="%1$s" class="%2$s" role="navigation">%3$s</ul>',
	)
);

$args['menu_header_black'] = wp_nav_menu(
	array(
		'container'       => 'nav',
		'container_class' => 'header__menu-container',
		'echo'            => false,
		'menu_class'      => 'header__menu header__menu--black',
		'theme_location'  => 'primary',
		'link_before'     => '<span class="menu-item-text">',
		'link_after'      => '</span>',
		'items_wrap'      => '<ul id="%1$s" class="%2$s" role="navigation">%3$s</ul>',
	)
);

$args['menu_header_mobile'] = wp_nav_menu(
	array(
		'container'       => 'nav',
		'container_class' => 'header__menu-container-mobile',
		'echo'            => false,
		'menu_class'      => 'header__menu-mobile header__menu--black',
		'theme_location'  => 'primary',
		'link_before'     => '<span class="menu-item-text">',
		'link_after'      => '</span>',
		'items_wrap'      => '<ul id="%1$s" class="%2$s" role="navigation">%3$s</ul>',
	)
);

$args['header_brand_white']  = get_field( 'brand_white', 'option' );
$args['header_brand_black']  = get_field( 'brand_dark', 'option' );
$args['social_link']  		 = get_field( 'social_link', 'option' );
$args['navigation_button']   = get_field( 'navigation_button', 'option' );


get_template_part( 'partials/header/header', 'view', $args );
get_template_part( 'partials/header/header', 'lightbox', $args );
