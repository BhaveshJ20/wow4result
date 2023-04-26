<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>
	<?php wp_nav_menu( array(
		'theme_location' => 'top',
		'menu_id'        => 'accordion',
		'container_class'=> 'nav-overlay-content', 
		'container'		 => false,
		'menu_class'	 => '',
		'walker'         => new Wow4result_Nav_Menu()
	) ); ?> 
<!-- #site-navigation -->