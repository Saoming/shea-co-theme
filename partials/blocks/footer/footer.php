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
		'theme_location'  => 'footer_one',
		'link_before'     => '<span class="menu-item-text">',
		'link_after'      => '<button class="menu-item-toggle" aria-label="Toggle Accordion"></button></span>',
		'items_wrap'      => '<ul id="%1$s" class="%2$s" role="navigation">%3$s</ul>',
	)
);

$args['menu_footer_two'] = wp_nav_menu(
	array(
		'container'       => 'nav',
		'container_class' => 'footer__menu-container--two',
		'echo'            => false,
		'menu_class'      => 'footer__menu footer__menu--two',
		'theme_location'  => 'footer_two',
		'link_before'     => '<span class="menu-item-text">',
		'link_after'      => '<button class="menu-item-toggle" aria-label="Toggle Accordion"></button></span>',
		'items_wrap'      => '<ul id="%1$s" class="%2$s" role="navigation">%3$s</ul>',

	)
);
