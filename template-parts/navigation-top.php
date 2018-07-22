<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage Pillar
 * @since 1.0
 * @version 2.1.7.2
 */

?>
<nav id="top-nav" aria-label="<?php esc_attr_e( 'Top Menu', 'pillar' ); ?>">
	<?php wp_nav_menu( array(
		'container' 			=> false,
		'theme_location' => 'top',
		'menu_id'        => 'top-menu',
		'menu_class' 			=> 'wrap',
		'after' 					=> '<span class="separator">&nbsp;|&nbsp;</span>'
	) ); ?>
</nav>
