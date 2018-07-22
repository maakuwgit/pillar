<?php
/**
 * Displays header navigation
 *
 * @package WordPress
 * @subpackage Pillar
 * @since 1.0
 * @version 2.0
 */
?>
<?php wp_nav_menu( array(
	'container' 			=> 'nav',
	'container_id' 		=> 'header-nav', 
	'container_class' => 'cell',
	'theme_location' 	=> 'header',
	'menu_id'        	=> 'header-menu',
	'menu_class' 			=> 'wrap'
) ); ?>
<nav class="show-for-tablet-down small-2 text-right">
	<button data-menu-toggle>
		<em class="fa fa-bars"></em>
	</button>
</nav>