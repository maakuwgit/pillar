<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage Pillar
 * @since 1.0
 * @version 2.7.1
 */

?>
<figure class="logo cell ">
	<?php if ( is_front_page() ) : ?>
	<a href="#top" data-anchor="top" class="block">
		<img alt="<?php bloginfo( 'name' ); ?>" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-pillar.svg" width="115">
	</a>
	<?php else : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="block">
		<img alt="<?php bloginfo( 'name' ); ?>" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-pillar.svg" width="115">
	</a>
	<?php endif; ?>
</figure>