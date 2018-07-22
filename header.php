<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Pillar
 * @since 1.0
 * @version 2.1.7.2
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">
		<header id="masthead" class="fixed fullwidth">
			<div class="wrap">
				<?php if ( has_nav_menu( 'top' ) ) : ?>
					<?php get_template_part( 'template-parts/navigation', 'top' ); ?>
				<?php endif; ?>
			</div>
			<div class="wrap">
				<?php get_template_part( 'template-parts/logo', 'image' ); ?>
				<?php if ( has_nav_menu( 'header' ) ) : ?>
					<?php get_template_part( 'template-parts/navigation', 'header' ); ?>
				<?php endif; ?>
			</div>
		</header>
